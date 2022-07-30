<?php

class HandleFailedTests
{
    private const PATH = './outputs/failed_tests.txt';

    public function writeToFile(string $testFilePath): void
    {
        $outputFile = fopen(self::PATH, 'a');
        fwrite($outputFile, trim($testFilePath, "\n") . "\n");
    }
}
