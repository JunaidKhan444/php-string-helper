<?php

namespace JunaidKhan\StringHelper;

class StringHelper
{
    // Slugifier methods
    public static function slugify(string $text): string
    {
        return Slugifier::slugify($text);
    }

    public static function toCamelCase(string $text): string
    {
        return Slugifier::toCamelCase($text);
    }

    public static function toSnakeCase(string $text): string
    {
        return Slugifier::toSnakeCase($text);
    }

    public static function toKebabCase(string $text): string
    {
        return Slugifier::toKebabCase($text);
    }

    // Formatter methods
    public static function startsWith(string $haystack, string $needle): bool
    {
        return Formatter::startsWith($haystack, $needle);
    }

    public static function endsWith(string $haystack, string $needle): bool
    {
        return Formatter::endsWith($haystack, $needle);
    }

    public static function contains(string $haystack, string $needle): bool
    {
        return Formatter::contains($haystack, $needle);
    }

    public static function truncate(string $text, int $maxLength): string
    {
        return Formatter::truncate($text, $maxLength);
    }

    public static function limitWords(string $text, int $wordLimit): string
    {
        return Formatter::limitWords($text, $wordLimit);
    }

    public static function isJson(string $text): bool
    {
        return Formatter::isJson($text);
    }

    public static function removeSpecialChars(string $text): string
    {
        return Formatter::removeSpecialChars($text);
    }

    public static function reverse(string $text): string
    {
        return Formatter::reverse($text);
    }
}
