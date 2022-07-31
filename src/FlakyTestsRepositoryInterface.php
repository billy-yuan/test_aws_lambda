<?php

interface FlakyTestsRepositoryInterface
{
    public function isTestFlaky(string $testPath): bool;



}
