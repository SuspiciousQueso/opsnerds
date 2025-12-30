<?php

namespace App\Handler;

use App\Config\Environment;
use App\Exception\ApplicationException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Throwable;

class ExceptionHandler
{
    private static ?Logger $logger = null;

    /**
     * Register exception and error handlers
     */
    public static function register(): void
    {
        set_exception_handler([self::class, 'handleException']);
        set_error_handler([self::class, 'handleError']);
        register_shutdown_function([self::class, 'handleShutdown']);
    }

    /**
     * Handle uncaught exceptions
     */
    public static function handleException(Throwable $exception): void
    {
        self::logException($exception);

        $statusCode = 500;
        if ($exception instanceof ApplicationException) {
            $statusCode = $exception->getStatusCode();
        }

        http_response_code($statusCode);

        if (Environment::isDebug()) {
            self::renderDebugPage($exception);
        } else {
            self::renderErrorPage($statusCode);
        }

        exit(1);
    }

    /**
     * Handle PHP errors
     */
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        if (!(error_reporting() & $errno)) {
            return false;
        }

        $message = sprintf(
            '%s in %s on line %d',
            $errstr,
            $errfile,
            $errline
        );

        self::getLogger()->error($message, [
            'errno' => $errno,
            'file' => $errfile,
            'line' => $errline
        ]);

        if (Environment::isDebug()) {
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        }

        return true;
    }

    /**
     * Handle fatal errors on shutdown
     */
    public static function handleShutdown(): void
    {
        $error = error_get_last();
        
        if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
            self::getLogger()->critical('Fatal error', $error);
            
            if (!Environment::isDebug()) {
                http_response_code(500);
                self::renderErrorPage(500);
            }
        }
    }

    /**
     * Log exception
     */
    private static function logException(Throwable $exception): void
    {
        $logger = self::getLogger();
        
        $context = [
            'exception' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString()
        ];

        if ($exception instanceof ApplicationException) {
            $logger->warning($exception->getMessage(), $context);
        } else {
            $logger->error($exception->getMessage(), $context);
        }
    }

    /**
     * Get logger instance
     */
    private static function getLogger(): Logger
    {
        if (self::$logger === null) {
            $logDir = dirname(__DIR__, 2) . '/logs';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0755, true);
            }

            self::$logger = new Logger('app');
            self::$logger->pushHandler(
                new StreamHandler(
                    $logDir . '/app.log',
                    Environment::get('LOG_LEVEL', Logger::DEBUG)
                )
            );
        }

        return self::$logger;
    }

    /**
     * Render debug page with exception details
     */
    private static function renderDebugPage(Throwable $exception): void
    {
        $statusCode = $exception instanceof ApplicationException 
            ? $exception->getStatusCode() 
            : 500;

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error <?= $statusCode ?></title>
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; padding: 20px; background: #f5f5f5; }
                .error-container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
                h1 { color: #d32f2f; margin: 0 0 10px; }
                .error-type { color: #666; font-size: 14px; margin-bottom: 20px; }
                .error-message { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
                .error-location { background: #f5f5f5; padding: 10px; margin: 10px 0; font-family: monospace; font-size: 13px; }
                .stack-trace { background: #263238; color: #aed581; padding: 20px; border-radius: 4px; overflow-x: auto; font-family: 'Courier New', monospace; font-size: 12px; line-height: 1.6; }
                .stack-trace pre { margin: 0; white-space: pre-wrap; }
            </style>
        </head>
        <body>
            <div class="error-container">
                <h1>Error <?= $statusCode ?></h1>
                <div class="error-type"><?= htmlspecialchars(get_class($exception)) ?></div>
                
                <div class="error-message">
                    <strong>Message:</strong> <?= htmlspecialchars($exception->getMessage()) ?>
                </div>
                
                <div class="error-location">
                    <strong>File:</strong> <?= htmlspecialchars($exception->getFile()) ?><br>
                    <strong>Line:</strong> <?= $exception->getLine() ?>
                </div>

                <h3>Stack Trace</h3>
                <div class="stack-trace">
                    <pre><?= htmlspecialchars($exception->getTraceAsString()) ?></pre>
                </div>
            </div>
        </body>
        </html>
        <?php
    }

    /**
     * Render production error page
     */
    private static function renderErrorPage(int $statusCode): void
    {
        $messages = [
            403 => 'Access Denied',
            404 => 'Page Not Found',
            419 => 'Page Expired',
            422 => 'Validation Error',
            500 => 'Internal Server Error'
        ];

        $title = $messages[$statusCode] ?? 'Error';

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $title ?></title>
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; padding: 20px; background: #f5f5f5; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
                .error-container { max-width: 500px; text-align: center; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
                h1 { color: #d32f2f; margin: 0 0 10px; font-size: 72px; }
                h2 { color: #333; margin: 0 0 20px; }
                p { color: #666; line-height: 1.6; }
                a { color: #007BFF; text-decoration: none; }
                a:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class="error-container">
                <h1><?= $statusCode ?></h1>
                <h2><?= $title ?></h2>
                <p>Sorry, something went wrong. Please try again or <a href="/">return to the homepage</a>.</p>
            </div>
        </body>
        </html>
        <?php
    }
}
