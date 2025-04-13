<?php

namespace JunaidKhan\StringHelper;

class Slugifier
{
    public static function slugify(string $string): string
    {
        $string = strtolower(trim($string));
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);
        return trim($string, '-');
    }

    public static function toCamelCase(string $text): string
    {
        $text = str_replace(['-', '_'], ' ', strtolower($text));
        $text = ucwords($text);
        $text = str_replace(' ', '', $text);
        return lcfirst($text);
    }

    public static function toSnakeCase(string $text): string
    {
        $text = preg_replace('/[A-Z]/', '_$0', $text);
        return strtolower(preg_replace('/[^a-z0-9_]+/i', '_', trim($text, '_')));
    }

    public static function toKebabCase(string $text): string
    {
        $text = preg_replace('/[A-Z]/', '-$0', $text);
        return strtolower(preg_replace('/[^a-z0-9\-]+/i', '-', trim($text, '-')));
    }
}
