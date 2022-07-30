<?php

require_once "src/HandleFlakyTests.php";
require_once "src/FlakyTestsQueryService.php";
require_once "src/HandleFlakyTestsCommand.php";

$handleFlakyTests = new HandleFlakyTests();
$flakyTestsQueryService = new FlakyTestsQueryService();
(new HandleFlakyTestsCommand($handleFlakyTests, $flakyTestsQueryService))->execute();
