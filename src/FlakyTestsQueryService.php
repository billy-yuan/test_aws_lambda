<?php

class FlakyTestsQueryService
{

    public function isTestFlaky(string $testPath)
    {
        echo "Checking if " . $testPath . " is flaky...\n";
        return true;
    }
}
