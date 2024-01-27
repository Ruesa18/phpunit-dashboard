<?php

use App\Dto\FailureDto;
use App\Dto\ReportDto;
use App\Dto\TestCaseDto;
use App\Dto\TestClassDto;
use App\Dto\TestsuiteDto;

class ReportConverter {
	public function convert(array $data): ReportDto {
		return $this->buildReport($data);
	}

	private function buildReport(array $data): ReportDto {
		$reportDto = new ReportDto();
		$reportDto->setTestCount($data['testsuite']['@attributes']['tests']);
		$reportDto->setAssertionCount($data['testsuite']['@attributes']['assertions']);
		$reportDto->setErrorCount($data['testsuite']['@attributes']['errors']);
		$reportDto->setWarningCount($data['testsuite']['@attributes']['warnings']);
		$reportDto->setFailureCount($data['testsuite']['@attributes']['failures']);
		$reportDto->setSkipCount($data['testsuite']['@attributes']['skipped']);
		$reportDto->setTime($data['testsuite']['@attributes']['time']);

		if(array_key_exists('@attributes', $data['testsuite']['testsuite'])) {
			$reportDto->addTestsuite($this->buildTestsuite($data['testsuite']['testsuite']));
			return $reportDto;
		}

		foreach($data['testsuite']['testsuite'] as $testsuite) {
			$reportDto->addTestsuite($this->buildTestsuite($testsuite));
		}

		return $reportDto;
	}

	private function buildTestsuite(array $data): TestsuiteDto {
		$testsuiteDto = new TestsuiteDto();

		$testsuiteDto->setName($data['@attributes']['name']);
		$testsuiteDto->setTestCount($data['@attributes']['tests']);
		$testsuiteDto->setAssertionCount($data['@attributes']['assertions']);
		$testsuiteDto->setErrorCount($data['@attributes']['errors']);
		$testsuiteDto->setWarningCount($data['@attributes']['warnings']);
		$testsuiteDto->setFailureCount($data['@attributes']['failures']);
		$testsuiteDto->setSkipCount($data['@attributes']['skipped']);
		$testsuiteDto->setTime($data['@attributes']['time']);

		if(array_key_exists('@attributes', $data['testsuite'])) {
			$testsuiteDto->addTestClass($this->buildTestClass($data['testsuite']));
			return $testsuiteDto;
		}

		foreach($data['testsuite'] as $testClass) {
			$testsuiteDto->addTestClass($this->buildTestClass($testClass));
		}

		return $testsuiteDto;
	}

	private function buildTestClass(array $data): TestClassDto {
		$testClassDto = new TestClassDto();

		$testClassDto->setName($data['@attributes']['name']);
		$testClassDto->setFile($data['@attributes']['file']);
		$testClassDto->setTestCount($data['@attributes']['tests']);
		$testClassDto->setAssertionCount($data['@attributes']['assertions']);
		$testClassDto->setErrorCount($data['@attributes']['errors']);
		$testClassDto->setWarningCount($data['@attributes']['warnings']);
		$testClassDto->setFailureCount($data['@attributes']['failures']);
		$testClassDto->setSkipCount($data['@attributes']['skipped']);
		$testClassDto->setTime($data['@attributes']['time']);

		if(array_key_exists('@attributes', $data['testcase'])) {
			var_dump($data['testcase']);
			$testClassDto->addTestCase($this->buildTestCase($data['testcase']));
			return $testClassDto;
		}

		foreach($data['testcase'] as $testClass) {
			$testClassDto->addTestCase($this->buildTestCase($testClass));
		}

		return $testClassDto;
	}

	private function buildTestCase(array $data): TestCaseDto {
		$testCaseDto = new TestCaseDto();

		$testCaseDto->setName($data['@attributes']['name']);
		if(array_key_exists('class', $data['@attributes'])) {
			$testCaseDto->setClass($data['@attributes']['class']);
		}
		if(array_key_exists('classname', $data['@attributes'])) {
			$testCaseDto->setClassName($data['@attributes']['classname']);
		}
		if(array_key_exists('file', $data['@attributes'])) {
			$testCaseDto->setFile($data['@attributes']['file']);
		}
		if(array_key_exists('line', $data['@attributes'])) {
			$testCaseDto->setLine($data['@attributes']['line']);
		}
		$testCaseDto->setAssertionCount($data['@attributes']['assertions']);
		$testCaseDto->setTime($data['@attributes']['time']);

		if(array_key_exists('failure', $data)) {
			$testCaseDto->setFailure($this->buildFailure($data['failure']));
		}

		return $testCaseDto;
	}

	private function buildFailure(array $data): FailureDto {
		$failureDto = new FailureDto();

		$failureDto->setType($data['@attributes']['type']);
		$failureDto->setContent($data['@content']);

		return $failureDto;
	}
}
