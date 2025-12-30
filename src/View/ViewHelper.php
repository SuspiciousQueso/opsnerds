<?php

namespace App\View;

use App\Security\CsrfProtection;

class ViewHelper
{
    /**
     * Escape output for HTML context (XSS prevention)
     */
    public static function escape(?string $value): string
    {
        if ($value === null) {
            return '';
        }

        return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Alias for escape()
     */
    public static function e(?string $value): string
    {
        return self::escape($value);
    }

    /**
     * Escape for use in HTML attributes
     */
    public static function escapeAttr(?string $value): string
    {
        return self::escape($value);
    }

    /**
     * Escape for use in JavaScript strings
     */
    public static function escapeJs(?string $value): string
    {
        if ($value === null) {
            return '';
        }

        return json_encode($value, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }

    /**
     * Escape for use in URLs
     */
    public static function escapeUrl(?string $value): string
    {
        if ($value === null) {
            return '';
        }

        return rawurlencode($value);
    }

    /**
     * Generate CSRF token field
     */
    public static function csrf(): string
    {
        return CsrfProtection::field();
    }

    /**
     * Format date for display
     */
    public static function formatDate(?string $date, string $format = 'Y-m-d H:i'): string
    {
        if ($date === null) {
            return '';
        }

        $timestamp = strtotime($date);
        if ($timestamp === false) {
            return '';
        }

        return date($format, $timestamp);
    }

    /**
     * Truncate text with ellipsis
     */
    public static function truncate(?string $text, int $length = 100, string $suffix = '...'): string
    {
        if ($text === null || mb_strlen($text) <= $length) {
            return self::escape($text);
        }

        return self::escape(mb_substr($text, 0, $length)) . $suffix;
    }
}
