# String Helper

**String Helper** is a simple PHP helper library for common string operations, built for PHP 8+.

## 🚀 Usage

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
echo StringHelper::slugify('  PHP is Great!!  '); // php-is-great

// Case conversions
echo StringHelper::toCamelCase("learn_php_fast"); // learnPhpFast
echo StringHelper::toSnakeCase("learnPhpFast");   // learn_php_fast
echo StringHelper::toKebabCase("learnPhpFast");   // learn-php-fast

// String checks
echo StringHelper::startsWith("FrameworkX", "Frame");       // true
echo StringHelper::endsWith("BackendTool", "Tool");         // true
echo StringHelper::contains("Debugging is essential", "bug"); // true

// Text formatting
echo StringHelper::truncate("Mastering PHP step by step", 12); // Mastering P...
echo StringHelper::limitWords("Write clean and efficient code.", 3); // Write clean and...

// Other utilities
echo StringHelper::isJson('{"success":true}');                  // true
echo StringHelper::removeSpecialChars("email@domain.com!");     // emaildomaincom
echo StringHelper::reverse("developer");                        // repoleved

```

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🙌 Contributing

Contributions are welcome! Feel free to fork the repository, open issues, or submit pull requests to help improve the package.

---
