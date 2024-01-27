<?php

namespace App\Dto;

class ReportDto extends AbstractDto {
	public int $testCount;
	public int $assertionCount;
	public int $errorCount;
	public int $warningCount;
	public int $failureCount;
	public int $skipCount;
	public float $time;
	/**
	 * @var TestsuiteDto[]
	 */
	public array $testsuites;

	/**
	 * @param int $testCount
	 * @return ReportDto
	 */
	public function setTestCount(int $testCount): ReportDto {
		$this->testCount = $testCount;
		return $this;
	}

	/**
	 * @param int $assertionCount
	 * @return ReportDto
	 */
	public function setAssertionCount(int $assertionCount): ReportDto {
		$this->assertionCount = $assertionCount;
		return $this;
	}

	/**
	 * @param int $errorCount
	 * @return ReportDto
	 */
	public function setErrorCount(int $errorCount): ReportDto {
		$this->errorCount = $errorCount;
		return $this;
	}

	/**
	 * @param int $warningCount
	 * @return ReportDto
	 */
	public function setWarningCount(int $warningCount): ReportDto {
		$this->warningCount = $warningCount;
		return $this;
	}

	/**
	 * @param int $failureCount
	 * @return ReportDto
	 */
	public function setFailureCount(int $failureCount): ReportDto {
		$this->failureCount = $failureCount;
		return $this;
	}

	/**
	 * @param int $skipCount
	 * @return ReportDto
	 */
	public function setSkipCount(int $skipCount): ReportDto {
		$this->skipCount = $skipCount;
		return $this;
	}

	/**
	 * @param float $time
	 * @return ReportDto
	 */
	public function setTime(float $time): ReportDto {
		$this->time = $time;
		return $this;
	}

	/**
	 * @param array $testsuites
	 * @return ReportDto
	 */
	public function setTestsuites(array $testsuites): ReportDto {
		$this->testsuites = $testsuites;
		return $this;
	}

	/**
	 * @param TestsuiteDto $testsuiteDto
	 * @return $this
	 */
	public function addTestsuite(TestsuiteDto $testsuiteDto): ReportDto {
		$this->testsuites[] = $testsuiteDto;
		return $this;
	}
}
