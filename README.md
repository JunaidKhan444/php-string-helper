# StringHelper

**StringHelper** StringHelper is a simple PHP helper library for common string operations, built for PHP 8+.

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
echo StringHelper::slugify("Hello World!"); // hello-world

// Case conversions
echo StringHelper::toCamelCase("hello_world"); // helloWorld
echo StringHelper::toSnakeCase("helloWorld");  // hello_world
echo StringHelper::toKebabCase("helloWorld");  // hello-world

// String checks
echo StringHelper::startsWith("Laravel", "Lar");        // true
echo StringHelper::endsWith("Framework", "work");       // true
echo StringHelper::contains("OpenAI is awesome", "AI"); // true

// Text formatting
echo StringHelper::truncate("This is a long string", 10); // This is...
echo StringHelper::limitWords("This is a long sentence.", 3); // This is a...

// Other utilities
echo StringHelper::isJson('{"valid":true}');               // true
echo StringHelper::removeSpecialChars("hello@world!");     // helloworld
echo StringHelper::reverse("hello");                       // olleh
```

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🙌 Contributing

Contributions are welcome! Feel free to fork the repository, open issues, or submit pull requests to help improve the package.

---
