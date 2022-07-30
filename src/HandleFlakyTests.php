<?php

class HandleFlakyTests
{
    private const FLAKY_TESTS_PATH = './outputs/flaky_tests.txt';

    public function writeToFile(string $testFilePath): void
    {
        $flakyTestsOutputFile = fopen(self::FLAKY_TESTS_PATH, 'a');
        fwrite($flakyTestsOutputFile, trim($testFilePath, "\n") . "\n");
    }
}
