<?php

namespace JunaidKhan\StringHelper;

class Slugifier
{
    public static function slugify(string $text): string
    {
        $text = preg_replace('/([A-Z]+)([A-Z][a-z])/', '$1 $2', trim($text));
        $text = preg_replace('/(?<=[a-z0-9])([A-Z])/', ' $1', $text);
        $text = preg_replace('/[^a-zA-Z0-9]+/', ' ', $text);

        return preg_replace('/\s+/', '-', trim(strtolower($text)));
    }

    public static function toCamelCase(string $text): string
    {
        $text = preg_replace('/[^a-zA-Z0-9]+/', ' ', trim($text));
        $text = preg_replace('/(?<=[a-z0-9])([A-Z])/', ' $1', $text);
        $text = ucwords(strtolower($text));
        $text = str_replace(' ', '', $text);

        return lcfirst($text);
    }

    public static function toSnakeCase(string $text): string
    {
        $text = preg_replace('/[-_]+/', ' ', trim($text));
        $text = preg_replace('/(?<=[a-z])([A-Z])/', ' $1', $text);
        $text = preg_replace('/[^a-zA-Z0-9 ]+/', '', $text);
        $text = strtolower($text);
        $text = preg_replace('/\s+/', '_', trim($text));

        return $text;
    }

    public static function toKebabCase(string $text): string
    {
        $text = preg_replace('/([A-Z]+)([A-Z][a-z])/', '$1 $2', trim($text));
        $text = preg_replace('/(?<=[a-z0-9])([A-Z])/', ' $1', $text);
        $text = preg_replace('/[^a-zA-Z0-9]+/', ' ', $text);
        $text = strtolower($text);

        return preg_replace('/\s+/', '-', trim($text));
    }
}
