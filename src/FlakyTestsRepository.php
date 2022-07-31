<?php

require_once "FlakyTestsRepositoryInterface.php";

class FlakyTestsRepository implements FlakyTestsRepositoryInterface
{
    // TODO: add TreasureData

    public function isTestFlaky(string $testPath): bool
    {
        echo "Checking if " . $testPath . " is flaky...\n";
        return true;
    }
}
