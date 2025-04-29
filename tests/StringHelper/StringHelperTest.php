<?php

declare(strict_types=1);

use JunaidKhan\StringHelper\StringHelper;

describe('Slugifier -> slugify', function () {
    it('can slugify a string', function () {
        expect(StringHelper::slugify('Hello World!'))->toBe('hello-world');
        expect(StringHelper::slugify('  PHP is Great!!  '))->toBe('php-is-great');
        expect(StringHelper::slugify('Make@it#clean'))->toBe('make-it-clean');
        expect(StringHelper::slugify('camelCase'))->toBe('camel-case');
        expect(StringHelper::slugify('PascalCase'))->toBe('pascal-case');
        expect(StringHelper::slugify('snake_case'))->toBe('snake-case');
        expect(StringHelper::slugify('kebab-case'))->toBe('kebab-case');
        expect(StringHelper::slugify('mixed_Formats-WithSymbols!'))->toBe('mixed-formats-with-symbols');
        expect(StringHelper::slugify('already-valid'))->toBe('already-valid');
        expect(StringHelper::slugify('---Totally@@@Chaotic___Case99!'))->toBe('totally-chaotic-case99');
    });

    it('can slugify with custom symbol', function () {
        expect(StringHelper::slugify('Hello World!', '$'))->toBe('hello$world');
        expect(StringHelper::slugify('  PHP is Great!!  ', '$'))->toBe('php$is$great');
        expect(StringHelper::slugify('Make@it#clean', '$'))->toBe('make$it$clean');
        expect(StringHelper::slugify('camelCase', '$'))->toBe('camel$case');
        expect(StringHelper::slugify('PascalCase', '$'))->toBe('pascal$case');
        expect(StringHelper::slugify('snake_case', '$'))->toBe('snake$case');
        expect(StringHelper::slugify('kebab-case', '$'))->toBe('kebab$case');
        expect(StringHelper::slugify('mixed_Formats-WithSymbols!', '$'))->toBe('mixed$formats$with$symbols');
        expect(StringHelper::slugify('already$valid', '$'))->toBe('already$valid');
        expect(StringHelper::slugify('---Totally@@@Chaotic___Case99!', '$'))->toBe('totally$chaotic$case99');
    });
});

describe('Slugifier -> toCamelCase', function () {
    it('can convert to camelCase', function () {
        expect(StringHelper::toCamelCase('hello_world'))->toBe('helloWorld');
        expect(StringHelper::toCamelCase('this-is-camel'))->toBe('thisIsCamel');
        expect(StringHelper::toCamelCase('AlreadyCamel'))->toBe('alreadyCamel');
        expect(StringHelper::toCamelCase('some-Thing_New'))->toBe('someThingNew');
    });
});

describe('Slugifier -> toSnakeCase', function () {
    it('can convert to snake_case', function () {
        expect(StringHelper::toSnakeCase('withSymbols!'))->toBe('with_symbols');
        expect(StringHelper::toSnakeCase('Snake Case Already'))->toBe('snake_case_already');
        expect(StringHelper::toSnakeCase('ThisIsIt'))->toBe('this_is_it');
        expect(StringHelper::toSnakeCase('already_snake_case'))->toBe('already_snake_case');
        expect(StringHelper::toSnakeCase('some-Thing_New'))->toBe('some_thing_new');
    });
});

describe('Slugifier -> toKebabCase', function () {
    it('can convert to kebab-case', function () {
        expect(StringHelper::toKebabCase('camelCaseExample'))->toBe('camel-case-example');
        expect(StringHelper::toKebabCase('Kebab Case Already'))->toBe('kebab-case-already');
        expect(StringHelper::toKebabCase('Symbols@Here'))->toBe('symbols-here');
        expect(StringHelper::toKebabCase('PascalCase'))->toBe('pascal-case');
        expect(StringHelper::toKebabCase('snake_case'))->toBe('snake-case');
        expect(StringHelper::toKebabCase('some-Thing_New'))->toBe('some-thing-new');
        expect(StringHelper::toKebabCase('---Some_WILDText99--Example!___'))->toBe('some-wild-text99-example');
    });
});

describe('Formatter -> startsWith', function () {
    it('can check startsWith', function () {
        expect(StringHelper::startsWith('HelloWorld', 'Hello'))->toBeTrue();
        expect(StringHelper::startsWith('HelloWorld', 'hello'))->toBeFalse();
        expect(StringHelper::startsWith('', 'a'))->toBeFalse();
        expect(StringHelper::startsWith('text', ''))->toBeTrue();
        expect(StringHelper::startsWith('', ''))->toBeTrue();
        expect(StringHelper::startsWith('test', 'test'))->toBeTrue();
        expect(StringHelper::startsWith('🌟StarPower', '🌟'))->toBeTrue();
    });
});

describe('Formatter -> endsWith', function () {
    it('can check endsWith', function () {
        expect(StringHelper::endsWith('HelloWorld', 'World'))->toBeTrue();
        expect(StringHelper::endsWith('HelloWorld', 'world'))->toBeFalse();
        expect(StringHelper::endsWith('', 'a'))->toBeFalse();
        expect(StringHelper::endsWith('text', ''))->toBeTrue();
        expect(StringHelper::endsWith('', ''))->toBeTrue();
        expect(StringHelper::endsWith('test', 'test'))->toBeTrue();
        expect(StringHelper::endsWith('StarPower💥', '💥'))->toBeTrue();
    });
});

describe('Formatter -> contains', function () {
    it('can check contains', function () {
        expect(StringHelper::contains('LookWithinThis', 'Within'))->toBeTrue();
        expect(StringHelper::contains('LookWithinThis', 'within'))->toBeFalse();
        expect(StringHelper::contains('', 'a'))->toBeFalse();
        expect(StringHelper::contains('text', ''))->toBeTrue();
        expect(StringHelper::contains('', ''))->toBeTrue();
        expect(StringHelper::contains('test', 'test'))->toBeTrue();
        expect(StringHelper::contains('Star✨Power', '✨'))->toBeTrue();
    });

    it('returns true if needle is in haystack', function () {
        expect(StringHelper::contains('Hello World', 'World'))->toBeTrue();
        expect(StringHelper::contains('PHP is awesome', 'awesome'))->toBeTrue();
    });

    it('returns false if needle is not in haystack', function () {
        expect(StringHelper::contains('Hello World', 'Universe'))->toBeFalse();
        expect(StringHelper::contains('PHP is fun', 'Java'))->toBeFalse();
    });

    it('is case-sensitive', function () {
        expect(StringHelper::contains('Hello World', 'world'))->toBeFalse();
        expect(StringHelper::contains('Hello World', 'World'))->toBeTrue();
    });

    it('returns true if needle is an empty string', function () {
        expect(StringHelper::contains('Some string', ''))->toBeTrue();
    });

    it('returns false if haystack is empty and needle is not', function () {
        expect(StringHelper::contains('', 'test'))->toBeFalse();
    });

    it('returns true if both haystack and needle are empty', function () {
        expect(StringHelper::contains('', ''))->toBeTrue();
    });

    it('works with special characters and symbols', function () {
        expect(StringHelper::contains('email@example.com', '@'))->toBeTrue();
        expect(StringHelper::contains('100% true!', '%'))->toBeTrue();
    });

    it('works with multibyte characters', function () {
        expect(StringHelper::contains('こんにちは世界', '世界'))->toBeTrue();
        expect(StringHelper::contains('👋🌍', '🌍'))->toBeTrue();
    });
});

describe('Formatter -> truncate', function () {
    it('returns empty string if input is empty', function () {
        expect(StringHelper::truncate('', 10))->toBe('');
    });

    it('returns ellipsis only for all-whitespace input', function () {
        expect(StringHelper::truncate('     ', 5))->toBe('...');
    });

    it('returns original string if shorter than maxLength', function () {
        expect(StringHelper::truncate('Hello World', 20))->toBe('Hello World');
    });

    it('truncates and cuts mid-word if wordSafe is false', function () {
        expect(StringHelper::truncate('ThisIsALongWord', 8, '...', false))->toBe('ThisI...');
    });

    it('truncates safely at word boundary', function () {
        expect(StringHelper::truncate('This is a very long description', 20))->toBe('This is a very...');
    });

    it('uses custom suffix correctly with wordSafe = false', function () {
        expect(StringHelper::truncate('This is a long string', 12, '***', false))->toBe('This is a***');
    });

    it('uses custom suffix correctly with wordSafe = true', function () {
        expect(StringHelper::truncate('This is a long string', 12, '***'))->toBe('This is a***');
    });

    it('handles short limit with suffix properly', function () {
        expect(StringHelper::truncate('Hello World', 3))->toBe('...');
    });

    it('preserves full words when possible with multibyte', function () {
        expect(StringHelper::truncate('你好世界朋友', 5))->toBe('你好...');
        expect(StringHelper::truncate('Emoji 💫✨🚀 zone', 10))->toBe('Emoji...');
    });

    it('handles exact suffix fit', function () {
        expect(StringHelper::truncate('123456789', 3))->toBe('...');
        expect(StringHelper::truncate('123456789', 4, '**'))->toBe('12**');
    });

    it('strips HTML by default', function () {
        expect(StringHelper::truncate('<p>Hello <b>World</b></p>', 10))->toBe('Hello...');
    });

    it('keeps HTML if stripHtml is false', function () {
        expect(StringHelper::truncate('<p>Hello <b>World</b></p>', 12, '...', false, false, true))
            ->toBe('<p>Hello <b>Wor...</b></p>');
    });

    it('handles long special character strings', function () {
        expect(StringHelper::truncate('✨✨✨✨✨✨✨', 5))->toBe('✨✨...');
    });

    it('handles strings with no spaces', function () {
        expect(StringHelper::truncate('SuperLongWordWithNoBreaks', 14))->toBe('SuperLongWo...');
        expect(StringHelper::truncate('SuperLongWordWithNoBreaks', 14, '...', false))->toBe('SuperLongWo...');
    });

    it('truncates with suffix longer than maxLength', function () {
        expect(StringHelper::truncate('This is something', 2, '>>>'))->toBe('>>');
        expect(StringHelper::truncate('This is something', 1, '...'))->toBe('.');
        expect(StringHelper::truncate('This is something', 0, '...'))->toBe('');
    });

    it('handles mixed input with HTML, symbols, and spacing', function () {
        expect(StringHelper::truncate('<h1>🔥 Hot & <em>Spicy</em>!</h1>', 10))->toBe('🔥 Hot &...');
    });

    it('handles self-closing HTML tags', function () {
        expect(StringHelper::truncate('<br/>', 5, '...', true, false, true))->toBe('<br/>');
    });

    it('truncates spaces properly if suffix is shorter than spaces', function () {
        expect(StringHelper::truncate('     ', 3, '*', true, true, false))->toBe('*');
    });

    it('handles all options combined', function () {
        expect(StringHelper::truncate('<div>Hello world</div>', 10, '**', true, false, true))
            ->toBe('<div>Hello**</div>');
    });

    it('returns unmodified string if suffix fits without truncation', function () {
        expect(StringHelper::truncate('Hi', 5, '...', true, true, false))->toBe('Hi');
    });

    it('closes unclosed HTML tags when preserving HTML', function () {
        expect(StringHelper::truncate('<p><b>Bold Text</b>', 6, '...', true, false, true))
            ->toBe('<p><b>Bol...</b></p>');
    });
});

describe('Formatter -> limitWords', function () {
    it('limits to exact number of words with suffix', function () {
        expect(StringHelper::limitWords('Hello world from Mars', 2, '...'))->toBe('Hello world...');
    });

    it('returns full text if word count is equal to limit', function () {
        expect(StringHelper::limitWords('Just three words', 3, '...'))->toBe('Just three words');
    });

    it('returns full text if word count is less than limit', function () {
        expect(StringHelper::limitWords('Short text', 5, '...'))->toBe('Short text');
    });

    it('normalizes whitespace and limits words correctly', function () {
        expect(StringHelper::limitWords("   Hello     world    from    Mars   ", 3, '...'))->toBe('Hello world from...');
    });

    it('works with empty input', function () {
        expect(StringHelper::limitWords('', 3, '...'))->toBe('');
    });

    it('works with wordLimit = 0', function () {
        expect(StringHelper::limitWords('Some random text', 0, '...'))->toBe('...');
    });

    it('works with custom suffix', function () {
        expect(StringHelper::limitWords('Some longer text for testing', 2, ' [cut]'))->toBe('Some longer [cut]');
    });

    it('removes excess whitespace from final output', function () {
        expect(StringHelper::limitWords("  One    two three  ", 2, '...'))->toBe('One two...');
    });

    it('supports suffix with special symbols', function () {
        expect(StringHelper::limitWords('Cut this text here', 3, ' ✂️'))->toBe('Cut this text ✂️');
    });

    it('handles Japanese characters correctly', function () {
        expect(StringHelper::limitWords('これは日本語の文章です', 3, '...'))->toBe('これは日本語の文章です');
    });

    it('works with punctuation and trims properly', function () {
        expect(StringHelper::limitWords('Hello, world! This... is a test.', 4, ' (more)'))->toBe('Hello, world! This... is (more)');
    });
});

describe('StringHelper -> isJson', function () {
    it('returns true for valid JSON objects', function () {
        expect(StringHelper::isJson('{"name":"John","age":30}'))->toBeTrue();
    });

    it('returns true for valid JSON arrays', function () {
        expect(StringHelper::isJson('[1, 2, 3, 4]'))->toBeTrue();
    });

    it('returns true for valid JSON string literal', function () {
        expect(StringHelper::isJson('"Hello World"'))->toBeTrue();
    });

    it('returns true for valid JSON number', function () {
        expect(StringHelper::isJson('123'))->toBeTrue();
    });

    it('returns true for valid JSON null', function () {
        expect(StringHelper::isJson('null'))->toBeTrue();
    });

    it('returns false for empty string', function () {
        expect(StringHelper::isJson(''))->toBeFalse();
    });

    it('returns false for plain text', function () {
        expect(StringHelper::isJson('Just a regular string'))->toBeFalse();
    });

    it('returns false for malformed JSON', function () {
        expect(StringHelper::isJson('{name: "John", age: 30}'))->toBeFalse();
        expect(StringHelper::isJson('{"name": "John", "age": }'))->toBeFalse();
    });

    it('returns false for partial JSON', function () {
        expect(StringHelper::isJson('{"name": "John"'))->toBeFalse();
    });
});

describe('Formatter -> removeSpecialChars', function () {
    it('removes all special characters by default', function () {
        expect(StringHelper::removeSpecialChars('Hello!@# World$%^'))->toBe('Hello World');
        expect(StringHelper::removeSpecialChars('Café! Déjà vu?'))->toBe('Caf Dj vu');
    });

    it('preserves underscore when preserveUnderscore is true', function () {
        expect(StringHelper::removeSpecialChars('var_name$', true))->toBe('var_name');
        expect(StringHelper::removeSpecialChars('some_value@here!', true))->toBe('some_valuehere');
    });

    it('preserves dash when preserveDash is true', function () {
        expect(StringHelper::removeSpecialChars('dash-separated-text!', false, true))->toBe('dash-separated-text');
        expect(StringHelper::removeSpecialChars('--weird$$--text--', false, true))->toBe('--weird--text--');
    });

    it('preserves both underscore and dash when both are true', function () {
        expect(StringHelper::removeSpecialChars('mix-ed_case-test#$', true, true))->toBe('mix-ed_case-test');
    });

    it('allows unicode when allowUnicode is true', function () {
        expect(StringHelper::removeSpecialChars('Café déjà vu?', false, false, true))->toBe('Café déjà vu');
        expect(StringHelper::removeSpecialChars('你好，世界！', false, false, true))->toBe('你好世界');
    });

    it('preserves unicode with underscores and dashes together', function () {
        expect(StringHelper::removeSpecialChars('résumé-test_case!', true, true, true))->toBe('résumé-test_case');
    });

    it('handles empty string gracefully', function () {
        expect(StringHelper::removeSpecialChars('', true, true, true))->toBe('');
        expect(StringHelper::removeSpecialChars('', false, false, false))->toBe('');
    });

    it('removes everything if all characters are special', function () {
        expect(StringHelper::removeSpecialChars('!@#$%^&*()'))->toBe('');
    });

    it('trims leading/trailing spaces after cleanup', function () {
        expect(StringHelper::removeSpecialChars('   clean   '))->toBe('clean');
        expect(StringHelper::removeSpecialChars('   -keep-this-   ', false, true))->toBe('-keep-this-');
    });
});

describe('Formatter -> reverse', function () {
    it('reverses a simple ASCII string', function () {
        expect(StringHelper::reverse('hello'))->toBe('olleh');
    });

    it('reverses a string with spaces', function () {
        expect(StringHelper::reverse('hello world'))->toBe('dlrow olleh');
    });

    it('reverses a numeric string', function () {
        expect(StringHelper::reverse('12345'))->toBe('54321');
    });

    it('reverses a Unicode string with accented characters', function () {
        expect(StringHelper::reverse('Café'))->toBe('éfaC');
    });

    it('reverses a string with multibyte characters (e.g. Chinese)', function () {
        expect(StringHelper::reverse('你好世界'))->toBe('界世好你');
    });

    it('reverses a string with emojis', function () {
        expect(StringHelper::reverse('👍🏽🔥'))->toBe('🔥🏽👍');
    });

    it('returns an empty string if input is empty', function () {
        expect(StringHelper::reverse(''))->toBe('');
    });

    it('reverses a palindromic string', function () {
        expect(StringHelper::reverse('madam'))->toBe('madam');
    });

    it('reverses special characters and punctuation', function () {
        expect(StringHelper::reverse('Hello, world!'))->toBe('!dlrow ,olleH');
    });

    it('reverses mixed content with letters, numbers, and symbols', function () {
        expect(StringHelper::reverse('abc123!@#'))->toBe('#@!321cba');
    });
});
