<?php


namespace App\Utils;

class Sessions
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
            $_SESSION = [];
        }
    }
}
