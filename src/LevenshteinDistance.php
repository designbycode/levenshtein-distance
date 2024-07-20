<?php

namespace Designbycode\LevenshteinDistance;

use TypeError;

class LevenshteinDistance
{
    /**
     * Calculate the Levenshtein distance between two strings.
     *
     * The Levenshtein distance is a measure of the minimum number of single-character edits
     * (insertions, deletions or substitutions) required to change one word into the other.
     *
     * @param  string  $str1  The first string.
     * @param  string  $str2  The second string.
     * @return int The Levenshtein distance between the two strings.
     */
    public static function calculate(mixed $str1, mixed $str2): int
    {

        if (! is_string($str1)) {
            throw new TypeError('Argument 1 passed to LevenshteinDistance::calculate() must be of the type string');
        }

        if (! is_string($str2)) {
            throw new TypeError('Argument 2 passed to LevenshteinDistance::calculate() must be of the type string');
        }

        // Create a 2D array to store the distances between substrings of $str1 and $str2
        $distanceMatrix = [];

        // Initialize the first row and column of the matrix
        $str1Length = strlen($str1);
        $str2Length = strlen($str2);
        for ($i = 0; $i <= $str1Length; $i++) {
            $distanceMatrix[$i][0] = $i; // Distance from empty string to $str1 substrings
        }
        for ($j = 0; $j <= $str2Length; $j++) {
            $distanceMatrix[0][$j] = $j; // Distance from empty string to $str2 substrings
        }

        // Iterate through the characters of $str1 and $str2
        for ($i = 1; $i <= $str1Length; $i++) {
            for ($j = 1; $j <= $str2Length; $j++) {
                // Calculate the cost of substitution (0 if characters match, 1 if they don't)
                $substitutionCost = ($str1[$i - 1] == $str2[$j - 1]) ? 0 : 1;

                // Calculate the minimum distance between the current substrings
                $insertionDistance = $distanceMatrix[$i - 1][$j] + 1; // Insert a character into $str1
                $deletionDistance = $distanceMatrix[$i][$j - 1] + 1; // Delete a character from $str1
                $substitutionDistance = $distanceMatrix[$i - 1][$j - 1] + $substitutionCost; // Substitute a character in $str1

                // Choose the minimum distance
                $distanceMatrix[$i][$j] = min($insertionDistance, $deletionDistance, $substitutionDistance);
            }
        }

        // Return the Levenshtein distance between the entire strings
        return $distanceMatrix[$str1Length][$str2Length];
    }
}
