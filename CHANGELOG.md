# Changelog

All notable changes to this project will be documented in this file.

This project follows [Semantic Versioning](https://semver.org/)
and uses the [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) format.

---

## [0.1.0] - 2025-04-19

Initial pre-release of `junaidkhan/php-string-helper`.

###  Added

####  String Utilities
- `truncate()` — truncate by character count with:
  - Word-safe truncation (`wordSafe`)
  - Custom suffixes (`...`, etc.)
  - Optional HTML stripping (`stripHtml`)
  - Optional HTML preservation (`preserveHtml`)
- `limitWords()` — truncate by number of words with suffix and HTML-safe handling
- `reverse()` — reverse multibyte-safe strings
- `isJson()` — check for valid JSON strings
- `removeSpecialChars()` — strip all non-alphanumeric characters with options to preserve underscores, dashes, and Unicode

####  Slug & Case Converters (via `Slugifier`)
- `slugify()` — generate SEO-friendly slugs
- `toCamelCase()` — convert to camelCase
- `toSnakeCase()` — convert to snake_case
- `toKebabCase()` — convert to kebab-case

####  String Checkers
- `startsWith()` — check if a string starts with a given substring
- `endsWith()` — check if a string ends with a given substring
- `contains()` — check if a string contains a substring

###  Testing
- Pest test suite for all methods and edge cases

###  Internal
- PSR-4 autoloading under `JunaidKhan\\StringHelper\\`
- Composer integration (`junaidkhan/php-string-helper`)
- MIT license

---

##  Notes

This is the **first tagged version** and may undergo breaking changes in future `0.x` releases.  
Please report issues and ideas on GitHub — contributions are welcome!
