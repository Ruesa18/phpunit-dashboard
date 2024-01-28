<?php

namespace App\Dto;

class TestClassDto extends AbstractDto {
	public string $name;
	public string $file;
	public int $testCount;
	public int $assertionCount;
	public int $errorCount;
	public int $warningCount;
	public int $failureCount;
	public int $skipCount;
	public float $time;
	/** @var TestCaseDto[] */
	public array $testCases = [];

	/**
	 * @param string $name
	 * @return TestClassDto
	 */
	public function setName(string $name): TestClassDto {
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $file
	 * @return TestClassDto
	 */
	public function setFile(string $file): TestClassDto {
		$this->file = $file;
		return $this;
	}

	/**
	 * @param int $testCount
	 * @return TestClassDto
	 */
	public function setTestCount(int $testCount): TestClassDto {
		$this->testCount = $testCount;
		return $this;
	}

	/**
	 * @param int $assertionCount
	 * @return TestClassDto
	 */
	public function setAssertionCount(int $assertionCount): TestClassDto {
		$this->assertionCount = $assertionCount;
		return $this;
	}

	/**
	 * @param int $errorCount
	 * @return TestClassDto
	 */
	public function setErrorCount(int $errorCount): TestClassDto {
		$this->errorCount = $errorCount;
		return $this;
	}

	/**
	 * @param int $warningCount
	 * @return TestClassDto
	 */
	public function setWarningCount(int $warningCount): TestClassDto {
		$this->warningCount = $warningCount;
		return $this;
	}

	/**
	 * @param int $failureCount
	 * @return TestClassDto
	 */
	public function setFailureCount(int $failureCount): TestClassDto {
		$this->failureCount = $failureCount;
		return $this;
	}

	/**
	 * @param int $skipCount
	 * @return TestClassDto
	 */
	public function setSkipCount(int $skipCount): TestClassDto {
		$this->skipCount = $skipCount;
		return $this;
	}

	/**
	 * @param float $time
	 * @return TestClassDto
	 */
	public function setTime(float $time): TestClassDto {
		$this->time = $time;
		return $this;
	}

	/**
	 * @param array $testCases
	 * @return TestClassDto
	 */
	public function setTestCases(array $testCases): TestClassDto {
		$this->testCases = $testCases;
		return $this;
	}

	/**
	 * @param TestCaseDto $testCaseDto
	 * @return $this
	 */
	public function addTestCase(TestCaseDto $testCaseDto): TestClassDto {
		$this->testCases[] = $testCaseDto;
		return $this;
	}
}
