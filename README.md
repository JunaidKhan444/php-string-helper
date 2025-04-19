# String Helper

**String Helper** is a PHP helper library for common string operations, built for PHP 8+.

---

##  Features

-  Convert strings to `camelCase`, `snake_case`, and `kebab-case`
-  Truncate strings by character count (with word-safe, custom suffixes and HTML-stripping or HTML-preserving)
-  Limit strings by word count with custom suffixes
-  Check if strings start with, end with, or contain a substring
-  Reverse strings easily
-  Remove special characters with optional Unicode, dash, or underscore preservation
-  Detect valid JSON strings with a simple check
-  Create clean slugs for URLs or SEO

---

##  Installation

Install via Composer:

```bash
composer require junaidkhan/php-string-helper
```

##  Usage

### 1. Autoload with Composer

```php
require 'vendor/autoload.php';
```

### 2. Import the class

```php
use JunaidKhan\StringHelper\StringHelper;
```

### 3. Use the methods

```php
// Slugify
echo StringHelper::slugify('  Mastering PHP in 2025!  '); // master-php-in-2025

// Case conversions
echo StringHelper::toCamelCase('modern_php_tutorial');       // modernPhpTutorial
echo StringHelper::toSnakeCase('modernPhpTutorial');         // modern_php_tutorial
echo StringHelper::toKebabCase('modernPhpTutorial');         // modern-php-tutorial

// String checks
echo StringHelper::startsWith('FrameworkX', 'Frame');         // true
echo StringHelper::endsWith('SuperTool', 'Tool');             // true
echo StringHelper::contains('Debugging helps developers', 'help'); // true

// Truncate with suffix (text, maxLength, suffix, wordSafe, stripHtml, preserveHtml)
echo StringHelper::truncate('Mastering PHP in 2025!', 15, '...', true, false, false); // Mastering PHP...

// Limit words with suffix (text, wordLimit, suffix)
echo StringHelper::limitWords('Master PHP with real-world projects', 3, '...'); // Master PHP with...

// Reverse string (text)
echo StringHelper::reverse('Productivity'); // ytivitcudorP

// Remove special characters (text, preserveUnderscore, preserveDash, allowUnicode)
echo StringHelper::removeSpecialChars('E-mail@example.com!', false, false, false); // Emailexamplecom

// Check valid JSON (string)
echo StringHelper::isJson('{'valid':true}'); // true
```

---

##  Methods

| Method                          | Parameters                                                                                      | Description                                                                 |
|---------------------------------|--------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------|
| `slugify`                       | `string $string`                                                                                 | Convert a string into a URL-friendly slug                                   |
| `toCamelCase`                  | `string $text`                                                                                   | Convert to camelCase                                                        |
| `toSnakeCase`                  | `string $text`                                                                                   | Convert to snake_case                                                       |
| `toKebabCase`                  | `string $text`                                                                                   | Convert to kebab-case                                                       |
| `startsWith`                   | `string $haystack, string $needle`                                                               | Check if string starts with a given substring                               |
| `endsWith`                     | `string $haystack, string $needle`                                                               | Check if string ends with a given substring                                 |
| `contains`                     | `string $haystack, string $needle`                                                               | Check if string contains a given substring                                  |
| `truncate`                    | `string $text, int $maxLength, string $suffix, bool $wordSafe, bool $stripHtml, bool $preserveHtml` | Truncate string with full support for HTML, suffix, and word-safety        |
| `limitWords`                  | `string $text, int $wordLimit, string $suffix`                                                   | Limit string by number of words, appending suffix if trimmed                |
| `reverse`                      | `string $text`                                                                                   | Reverse the given string                                                    |
| `removeSpecialChars`          | `string $text, bool $preserveUnderscore, bool $preserveDash, bool $allowUnicode`                 | Remove all non-alphanumeric characters (with optional preservation)         |
| `isJson`                       | `string $string`                                                                                 | Check if the string is valid JSON                                           |

---

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🙌 Contributing

Contributions are welcome! Feel free to fork the repository, open issues, or submit pull requests to help improve the package.
