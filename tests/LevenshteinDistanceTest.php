<?php

use Designbycode\LevenshteinDistance\LevenshteinDistance;

describe('LevenshteinDistance', function () {
    it('calculates the Levenshtein distance between two identical strings', function () {
        expect(LevenshteinDistance::calculate('hello', 'hello'))->toBe(0);
    });

    it('calculates the Levenshtein distance between two different strings', function () {
        expect(LevenshteinDistance::calculate('hello', 'world'))->toBe(4);
    });

    it('calculates the Levenshtein distance between a string and an empty string', function () {
        expect(LevenshteinDistance::calculate('hello', ''))->toBe(5);
    });

    it('calculates the Levenshtein distance between two strings with a single character difference', function () {
        expect(LevenshteinDistance::calculate('hello', 'hallo'))->toBe(1);
    });

    it('calculates the Levenshtein distance between two strings with multiple character differences', function () {
        expect(LevenshteinDistance::calculate('hello', 'hxlle'))->toBe(2);
    });

    it('throws an exception when the input strings are not strings', function () {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Argument 2 passed to LevenshteinDistance::calculate() must be of the type string');
        LevenshteinDistance::calculate('hello', 123);
    });
});
