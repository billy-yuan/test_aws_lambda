<?php

require_once "src/HandleFlakyTests.php";
require_once "src/HandleFailedTests.php";
require_once "src/FlakyTestsRepository.php";
require_once "src/HandleFlakyTestsCommand.php";

$handleFlakyTests = new HandleFlakyTests();
$handleFailedTests = new HandleFailedTests();
$flakyTestsRepository = new FlakyTestsRepository();
(new HandleFlakyTestsCommand($handleFlakyTests, $handleFailedTests, $flakyTestsRepository))->execute();
