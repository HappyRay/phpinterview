<?php

namespace HappyRay\PhpInterview;

/**
 * Given two strings, check if they’re anagrams or not.
 * - See more at: http://www.ardendertat.com/2011/11/17/programming-interview-questions-16-anagram-strings/
 *
 * Two strings are anagrams if they are written using the same exact letters,
 * ignoring space, punctuation and capitalization.
 * Each letter should have the same count in both strings.
 */
class AnagramStrings
{
    /**
     * @param string $word1
     * @param string $word2
     *
     * @return bool
     */
    public function isAnagram($word1, $word2)
    {
        $sig1 = $this->getSignature($word1);
        $sig2 = $this->getSignature($word2);
        $same = $sig1 === $sig2;

        return $same;
    }

    /**
     * @param string $word
     *
     * @return string
     */
    private function getSignature($word)
    {
        $letterFrequency = [];

        foreach (range('a', 'z') as $l) {
            $letterFrequency[$l] = 0;
        }

        $length = strlen($word);
        for ($i = 0; $i < $length; $i++ ){
            $letter = $word[$i];
            $lowercaseLetter = mb_strtolower($letter);
            if (array_key_exists($lowercaseLetter, $letterFrequency)) {
                $letterFrequency[$lowercaseLetter] += 1;
            }
        }

        $letterPlusCount = [];
        foreach ($letterFrequency as $letter => $count) {
            if ($count !== 0) {
                $element = $letter . strval($count);
                $letterPlusCount[] = $element;
            }
        }
        $signature = join('', $letterPlusCount);

        return $signature;
    }
}
