<?php

namespace App\Dto;

class TestsuiteDto extends AbstractDto {
	public string $name;
	public int $testCount;
	public int $assertionCount;
	public int $errorCount;
	public int $warningCount;
	public int $failureCount;
	public int $skipCount;
	public float $time;

	/**
	 * @var TestClassDto[]
	 */
	public array $testClasses = [];

	/**
	 * @param string $name
	 * @return TestsuiteDto
	 */
	public function setName(string $name): TestsuiteDto {
		$this->name = $name;
		return $this;
	}

	/**
	 * @param int $testCount
	 * @return TestsuiteDto
	 */
	public function setTestCount(int $testCount): TestsuiteDto {
		$this->testCount = $testCount;
		return $this;
	}

	/**
	 * @param int $assertionCount
	 * @return TestsuiteDto
	 */
	public function setAssertionCount(int $assertionCount): TestsuiteDto {
		$this->assertionCount = $assertionCount;
		return $this;
	}

	/**
	 * @param int $errorCount
	 * @return TestsuiteDto
	 */
	public function setErrorCount(int $errorCount): TestsuiteDto {
		$this->errorCount = $errorCount;
		return $this;
	}

	/**
	 * @param int $warningCount
	 * @return TestsuiteDto
	 */
	public function setWarningCount(int $warningCount): TestsuiteDto {
		$this->warningCount = $warningCount;
		return $this;
	}

	/**
	 * @param int $failureCount
	 * @return TestsuiteDto
	 */
	public function setFailureCount(int $failureCount): TestsuiteDto {
		$this->failureCount = $failureCount;
		return $this;
	}

	/**
	 * @param int $skipCount
	 * @return TestsuiteDto
	 */
	public function setSkipCount(int $skipCount): TestsuiteDto {
		$this->skipCount = $skipCount;
		return $this;
	}

	/**
	 * @param float $time
	 * @return TestsuiteDto
	 */
	public function setTime(float $time): TestsuiteDto {
		$this->time = $time;
		return $this;
	}

	/**
	 * @param array $testClasses
	 * @return TestsuiteDto
	 */
	public function setTestClasses(array $testClasses): TestsuiteDto {
		$this->testClasses = $testClasses;
		return $this;
	}

	/**
	 * @param TestClassDto $testClassDto
	 * @return $this
	 */
	public function addTestClass(TestClassDto $testClassDto): TestsuiteDto {
		$this->testClasses[] = $testClassDto;
		return $this;
	}
}
