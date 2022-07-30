<?php

include_once 'HandleFlakyTests.php';
include_once 'FlakyTestsQueryService.php';

class HandleFlakyTestsCommand
{

    private const FAILED_TESTS_FROM_RERUN_PATH = './failed_tests_from_rerun.txt';

    private $handleFlakyTests;
    private $flakyTestsQueryService;

    public function __construct(HandleFlakyTests $handleFlakyTests, FlakyTestsQueryService $flakyTestsQueryService)
    {
        $this->handleFlakyTests = $handleFlakyTests;
        $this->flakyTestsQueryService = $flakyTestsQueryService;
    }

    public function execute(): void
    {
        $failedTestsFromRerun = explode("\n", file_get_contents(self::FAILED_TESTS_FROM_RERUN_PATH));

        foreach ($failedTestsFromRerun as $failedTestPath) {
            if ($this->flakyTestsQueryService->isTestFlaky($failedTestPath)) {
                $this->handleFlakyTests->writeToFile($failedTestPath);
            }
        }

        $this->handleFlakyTests->postToSlack();
    }
}

$handleFlakyTests = new HandleFlakyTests();
$flakyTestsQueryService = new FlakyTestsQueryService();
(new HandleFlakyTestsCommand($handleFlakyTests, $flakyTestsQueryService))->execute();
