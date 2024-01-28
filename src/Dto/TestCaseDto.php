<?php

namespace App\Dto;

class TestCaseDto extends AbstractDto {
	public string $name;
	public ?string $class = null;
	public ?string $className = null;
	public ?string $file = null;
	public ?int $line = null;
	public int $assertionCount;
	public float $time;
	public ?FailureDto $failure = null;

	/**
	 * @param string $name
	 * @return TestCaseDto
	 */
	public function setName(string $name): TestCaseDto {
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $class
	 * @return TestCaseDto
	 */
	public function setClass(?string $class): TestCaseDto {
		$this->class = $class;
		return $this;
	}

	/**
	 * @param string $className
	 * @return TestCaseDto
	 */
	public function setClassName(?string $className): TestCaseDto {
		$this->className = $className;
		return $this;
	}

	/**
	 * @param string $file
	 * @return TestCaseDto
	 */
	public function setFile(?string $file): TestCaseDto {
		$this->file = $file;
		return $this;
	}

	/**
	 * @param int $line
	 * @return TestCaseDto
	 */
	public function setLine(?int $line): TestCaseDto {
		$this->line = $line;
		return $this;
	}

	/**
	 * @param int $assertionCount
	 * @return TestCaseDto
	 */
	public function setAssertionCount(int $assertionCount): TestCaseDto {
		$this->assertionCount = $assertionCount;
		return $this;
	}

	/**
	 * @param float $time
	 * @return TestCaseDto
	 */
	public function setTime(float $time): TestCaseDto {
		$this->time = $time;
		return $this;
	}

	/**
	 * @param FailureDto|null $failure
	 * @return TestCaseDto
	 */
	public function setFailure(?FailureDto $failure): TestCaseDto {
		$this->failure = $failure;
		return $this;
	}
}
