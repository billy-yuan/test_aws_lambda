<?php

include_once 'HandleFlakyTests.php';
include_once 'FlakyTestsRepository.php';
include_once 'FlakyTestsRepository.php';
include_once 'HandleFailedTests.php';

class HandleFlakyTestsCommand
{
    private const FAILED_TESTS_FROM_RERUN_PATH = './failed_tests_from_rerun.txt';

    private HandleFlakyTests $handleFlakyTests;
    private HandleFailedTests $handleFailedTests;
    private FlakyTestsRepositoryInterface $flakyTestsRepository;

    public function __construct(HandleFlakyTests $handleFlakyTests, HandleFailedTests $handleFailedTests, FlakyTestsRepository $flakyTestsRepository)
    {
        $this->handleFlakyTests = $handleFlakyTests;
        $this->handleFailedTests = $handleFailedTests;
        $this->flakyTestsRepository = $flakyTestsRepository;
    }

    public function execute(): void
    {
        $failedTestsFromRerun = explode("\n", file_get_contents(self::FAILED_TESTS_FROM_RERUN_PATH));

        foreach ($failedTestsFromRerun as $failedTestPath) {
            if ($this->flakyTestsRepository->isTestFlaky($failedTestPath)) {
                $this->handleFlakyTests->writeToFile($failedTestPath);
            }
            else {
                $this->handleFailedTests->writeToFile($failedTestPath);
            }
        }
    }
}
