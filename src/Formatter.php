<?php

namespace JunaidKhan\StringHelper;

class Formatter
{
    public static function startsWith(string $haystack, string $needle): bool
    {
        return str_starts_with($haystack, $needle);
    }

    public static function endsWith(string $haystack, string $needle): bool
    {
        return str_ends_with($haystack, $needle);
    }

    public static function contains(string $haystack, string $needle): bool
    {
        return str_contains($haystack, $needle);
    }

    public static function truncate(string $text, int $maxLength): string
    {
        return strlen($text) > $maxLength
            ? substr($text, 0, $maxLength - 3) . '...'
            : $text;
    }

    public static function limitWords(string $text, int $wordLimit): string
    {
        $words = explode(' ', $text);
        if (count($words) <= $wordLimit) return $text;
        return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
    }

    public static function isJson(string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function removeSpecialChars(string $text): string
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $text);
    }

    public static function reverse(string $text): string
    {
        return strrev($text);
    }
}
