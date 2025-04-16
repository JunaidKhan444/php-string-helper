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

    public static function truncate(
        string $text,
        int $maxLength,
        string $suffix,
        bool $wordSafe,
        bool $stripHtml,
        bool $preserveHtml
    ): string {
        if ($stripHtml && $preserveHtml) {
            $preserveHtml = false;
        }

        if ($text === '') {
            return '';
        }

        $originalLength = mb_strlen($text);
        $suffixLength = mb_strlen($suffix);

        if ($stripHtml) {
            $text = strip_tags($text);
        }

        if (!$preserveHtml) {
            $trimmed = mb_trim($text);

            if ($trimmed === '') {
                return $originalLength >= $suffixLength
                    ? $suffix
                    : mb_substr($suffix, 0, $originalLength);
            }

            if (mb_strlen($text) <= $maxLength) {
                if (mb_strlen($text) + $suffixLength <= $maxLength) {
                    return $text;
                }
                $cut = $wordSafe
                    ? self::wordSafeCut($text, max(0, $maxLength - $suffixLength))
                    : mb_substr($text, 0, max(0, $maxLength - $suffixLength));
                return $cut . $suffix;
            }

            if ($suffixLength >= $maxLength) {
                return mb_substr($suffix, 0, $maxLength);
            }

            $cutLength = $maxLength - $suffixLength;
            $cut = $wordSafe
                ? self::wordSafeCut($text, $cutLength)
                : mb_substr($text, 0, $cutLength);
            return $cut . $suffix;
        }

        return self::truncateHtmlAware($text, $maxLength, $suffix, $wordSafe);
    }

    public static function limitWords(string $text, int $wordLimit, string $suffix): string
    {
        $text = preg_replace('/\s+/', ' ', mb_trim($text));
        $words = explode(' ', $text);

        if (count($words) <= $wordLimit) {
            return $text;
        }

        $limitedText = implode(' ', array_slice($words, 0, $wordLimit));

        return $limitedText . $suffix;
    }

    public static function isJson(string $json): bool
    {
        if (!is_string($json)) return false;

        json_decode($json);
        return json_last_error() === JSON_ERROR_NONE && $json !== '';
    }

    public static function removeSpecialChars(
        string $text,
        bool $preserveUnderscore,
        bool $preserveDash,
        bool $allowUnicode
    ): string {
        $allowed = '\s0-9a-zA-Z';

        if ($preserveUnderscore) {
            $allowed .= '_';
        }

        if ($preserveDash) {
            $allowed .= '\-';
        }

        $pattern = $allowUnicode
            ? '/[^\p{L}\p{N}' . ($preserveUnderscore ? '_' : '') . ($preserveDash ? '\-' : '') . '\s]/u'
            : '/[^' . $allowed . ']/';

        return mb_trim(preg_replace($pattern, '', $text));
    }

    public static function reverse(string $text): string
    {
        $reversed = '';
        $length = mb_strlen($text);

        while ($length-- > 0) {
            $reversed .= mb_substr($text, $length, 1);
        }

        return $reversed;
    }

    private static function wordSafeCut(string $text, int $limit): string
    {
        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        $cut = mb_substr($text, 0, $limit + 1);
        $spacePos = mb_strrpos($cut, ' ');
        if ($spacePos !== false && $spacePos > 0) {
            return mb_rtrim(mb_substr($cut, 0, $spacePos));
        }

        return mb_substr($text, 0, $limit);
    }

    private static function truncateHtmlAware(string $html, int $maxLength, string $suffix, bool $wordSafe): string
    {
        $totalLength = 0;
        $openTags = [];
        $truncated = '';
        $suffixAdded = false;

        preg_match_all('/(<[^>]+>|[^<]+)/u', $html, $tokens);

        foreach ($tokens[0] as $token) {
            if (preg_match('/<[^>]+>/', $token)) {
                if (preg_match('/^<\s*\/([^\s>]+)\s*>$/', $token, $matches)) {
                    $tag = strtolower($matches[1]);
                    if (($key = array_search($tag, array_reverse($openTags, true))) !== false) {
                        unset($openTags[count($openTags) - 1 - $key]);
                    }
                } elseif (preg_match('/^<\s*([^\s>\/]+).*?>$/', $token, $matches)) {
                    $tag = strtolower($matches[1]);
                    if (!preg_match('/\/\s*>$/', $token)) {
                        $openTags[] = $tag;
                    }
                }
                $truncated .= $token;
            } else {
                $segment = $token;
                $segmentLength = mb_strlen($segment);

                if ($totalLength + $segmentLength + mb_strlen($suffix) > $maxLength) {
                    $remaining = $maxLength - $totalLength - mb_strlen($suffix);
                    $cut = $wordSafe
                        ? self::wordSafeCut($segment, $remaining)
                        : mb_substr($segment, 0, $remaining);
                    $truncated .= $cut . $suffix;
                    $suffixAdded = true;
                    break;
                }

                $truncated .= $segment;
                $totalLength += $segmentLength;
            }
        }

        if (!$suffixAdded && mb_strlen(strip_tags($truncated)) < mb_strlen(strip_tags($html))) {
            $truncated .= $suffix;
        }

        foreach (array_reverse($openTags) as $tag) {
            $truncated .= "</$tag>";
        }

        return $truncated;
    }
}
