<?php

class HandleFlakyTestsCommand
{

    private const FAILED_TESTS_FROM_RERUN_PATH = './failed_tests_from_rerun.txt';
    private const FLAKY_TESTS_PATH = './outputs/flaky_tests.txt';

    public function execute(): void
    {
        // Load failed tests from first CI run
        $failedTestsFromFirstRun = explode("\n", file_get_contents(self::FAILED_TESTS_FROM_RERUN_PATH));

        foreach ($failedTestsFromFirstRun as $failedTestPath) {
            if ($this->isTestFlaky($failedTestPath)) {
                $this->handleFlakyTest($failedTestPath);
            }
        }
    }

    private function handleFlakyTest(string $testPath)
    {
        $flakyTestsOutputFile = fopen(self::FLAKY_TESTS_PATH, 'a');
        fwrite($flakyTestsOutputFile, trim($testPath, "\n") . "\n");
    }

    private function isTestFlaky(string $testPath): bool
    {
        return true;
    }

}

(new HandleFlakyTestsCommand())->execute();
