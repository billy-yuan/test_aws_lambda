<?php

class HandleFlakyTests
{
    private const PATH = './outputs/flaky_tests.txt';

    public function writeToFile(string $testFilePath): void
    {
        $outputFile = fopen(self::PATH, 'a');
        fwrite($outputFile, trim($testFilePath, "\n") . "\n");
    }
}
