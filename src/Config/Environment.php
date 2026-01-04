<?php

namespace App\Config;

use App\Exception\ConfigurationException;

class Environment
{
    private static bool $loaded = false;

    /**
     * Load and validate environment variables
     */
    public static function load(): void
    {
        if (self::$loaded) {
            return;
        }

        $envFile = dirname(__DIR__, 2) . '/.env';
        
        if (!file_exists($envFile)) {
            throw new ConfigurationException(
                '.env file not found. Copy .env.example to .env and configure it.'
            );
        }

        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        self::validateRequired();
        self::$loaded = true;
    }

    /**
     * Validate required environment variables
     */
    private static function validateRequired(): void
    {
        $required = [
            'APP_NAME',
            'APP_ENV',
            'APP_URL',
            'DB_HOST',
            'MARIADB_DB',
            'MARIADB_DBU',
            'MARIADB_DBU_PW',
            'SESSION_LIFETIME',
            'PASSWORD_MIN_LENGTH',
        ];

        $missing = [];
        foreach ($required as $var) {
            if (empty($_ENV[$var])) {
                $missing[] = $var;
            }
        }

        if (!empty($missing)) {
            throw new ConfigurationException(
                'Missing required environment variables: ' . implode(', ', $missing)
            );
        }
    }

    /**
     * Get environment variable with optional default
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }

    /**
     * Check if running in production
     */
    public static function isProduction(): bool
    {
        return self::get('APP_ENV') === 'production';
    }

    /**
     * Check if running in development
     */
    public static function isDevelopment(): bool
    {
        return self::get('APP_ENV') === 'development';
    }

    /**
     * Check if debug mode is enabled
     */
    public static function isDebug(): bool
    {
        return filter_var(self::get('APP_DEBUG', false), FILTER_VALIDATE_BOOLEAN);
    }
}
