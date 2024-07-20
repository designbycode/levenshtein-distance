# Levenshtein Distance

[![Latest Version on Packagist](https://img.shields.io/packagist/v/designbycode/levenshtein-distance.svg?style=flat-square)](https://packagist.org/packages/designbycode/levenshtein-distance)
[![Tests](https://img.shields.io/github/actions/workflow/status/designbycode/levenshtein-distance/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/designbycode/levenshtein-distance/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/designbycode/levenshtein-distance.svg?style=flat-square)](https://packagist.org/packages/designbycode/levenshtein-distance)

The LevenshteinDistance class provides a method to calculate the Levenshtein distance between two strings. The Levenshtein distance is a measure of the minimum number of single-character edits (insertions, deletions, or substitutions) required to change one word into the other.


## Installation

You can install the package via composer:

```bash
composer require designbycode/levenshtein-distance
```

## Method: calculate
### Parameters
 - mixed $str1: The first string.
 - mixed $str2: The second string.
 - 
### Return Value
 - int: The Levenshtein distance between the two strings.
### Description
 - Calculates the Levenshtein distance between two strings. The method throws a TypeError if either of the input parameters is not a string.

## Use Cases
 1. Spell Checking: Calculate the Levenshtein distance between a user's input and a list of known words to suggest corrections.
 2. Text Similarity: Measure the similarity between two pieces of text by calculating the Levenshtein distance.
 3. Data Validation: Verify the correctness of user input by calculating the Levenshtein distance between the input and a known valid value.

## Usage
### Example 1: Calculating the Levenshtein distance between two strings

```php
$str1 = 'kitten';
$str2 = 'sitting';
$distance = LevenshteinDistance::calculate($str1, $str2);
echo "Levenshtein distance: $distance"; // Output: 3
```

### Example 2: Handling non-string input
```php
$str1 = 'hello';
$nonString = 123;
try {
    LevenshteinDistance::calculate($str1, $nonString);
} catch (TypeError $e) {
    echo "Error: " . $e->getMessage(); // Output: Argument 2 passed to LevenshteinDistance::calculate() must be of the type string
}
```

### Example 3: Using Levenshtein distance for spell checking
```php
$userInput = 'teh';
$knownWords = ['the', 'tea', 'ten'];
$minDistance = PHP_INT_MAX;
$closestWord = '';

foreach ($knownWords as $word) {
    $distance = LevenshteinDistance::calculate($userInput, $word);
    if ($distance < $minDistance) {
        $minDistance = $distance;
        $closestWord = $word;
    }
}

echo "Did you mean: $closestWord"; // Output: Did you mean: the
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Claude Myburgh](https://github.com/claudemyburgh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
