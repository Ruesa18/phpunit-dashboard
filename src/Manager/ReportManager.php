<?php

namespace App\Manager;

use App\Dto\FailureDto;
use App\Dto\ReportDto;
use App\Dto\TestCaseDto;
use App\Dto\TestClassDto;
use App\Dto\TestsuiteDto;
use App\Entity\Failure;
use App\Entity\Report;
use App\Entity\TestCase;
use App\Entity\TestClass;
use App\Entity\Testsuite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ReportManager {
	protected Serializer $serializer;

	public function __construct(
		protected EntityManagerInterface $entityManager,
	) {
		$encoders = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$this->serializer = new Serializer($normalizers, $encoders);
	}

	public function save(ReportDto $reportDto): void {
		$report = new Report();

		$report
			->setTestCount($reportDto->testCount)
			->setAssertionCount($reportDto->assertionCount)
			->setErrorCount($reportDto->errorCount)
			->setWarningCount($reportDto->warningCount)
			->setFailureCount($reportDto->failureCount)
			->setSkipCount($reportDto->skipCount)
			->setTime($reportDto->time)
		;

		foreach($reportDto->testsuites as $testsuiteDto) {
			$testsuite = new Testsuite();

			$testsuite
				->setName($testsuiteDto->name)
				->setTestCount($testsuiteDto->testCount)
				->setAssertionCount($testsuiteDto->assertionCount)
				->setErrorCount($testsuiteDto->errorCount)
				->setWarningCount($testsuiteDto->warningCount)
				->setFailureCount($testsuiteDto->failureCount)
				->setSkipCount($testsuiteDto->skipCount)
				->setTime($testsuiteDto->time);

			foreach($testsuiteDto->testClasses as $testClassDto) {
				$testClass = new TestClass();

				$testClass
					->setName($testClassDto->name)
					->setFile($testClassDto->file)
					->setTestCount($testClassDto->testCount)
					->setAssertionCount($testClassDto->assertionCount)
					->setErrorCount($testClassDto->errorCount)
					->setWarningCount($testClassDto->warningCount)
					->setFailureCount($testClassDto->failureCount)
					->setSkipCount($testClassDto->skipCount)
					->setTime($testClassDto->time);

				foreach($testClassDto->testCases as $testCaseDto) {
					$testCase = new TestCase();

					$testCase
						->setName($testCaseDto->name)
						->setClass($testCaseDto->class)
						->setClassName($testCaseDto->className)
						->setFile($testCaseDto->file)
						->setLine($testCaseDto->line)
						->setAssertionCount($testCaseDto->assertionCount)
						->setTime($testCaseDto->time);

					if($testCaseDto->failure) {
						$failure = new Failure();

						$failure
							->setContent($testCaseDto->failure->content)
							->setType($testCaseDto->failure->type);

						$testCase->setFailure($failure);
					}

					$testClass->addTestCase($testCase);
				}
				$testsuite->addTestClass($testClass);
			}
			$report->addTestsuite($testsuite);
		}
		$this->entityManager->persist($report);
		$this->entityManager->flush();
	}

	public function deserialize(string $jsonData): ReportDto {
		$reportDto = $this->serializer->deserialize($jsonData, ReportDto::class, 'json');
		$testsuites = [];
		foreach($reportDto->testsuites as $testsuite) {
			$testsuiteDto = $this->serializer->denormalize($testsuite, TestsuiteDto::class);

			$testClassDtos = [];
			foreach($testsuiteDto->testClasses as $testClass) {
				$testClassDto = $this->serializer->denormalize($testClass, TestClassDto::class);

				$testCaseDtos = [];
				foreach($testClassDto->testCases as $testCase) {
					if(array_key_exists('failure', $testCase) && $testCase['failure'] !== null) {
						$failureDto = $this->serializer->denormalize($testCase['failure'], FailureDto::class);
						$testCase['failure'] = $failureDto;
					}

					$testCaseDto = $this->serializer->denormalize($testCase, TestCaseDto::class);

					$testCaseDtos[] = $testCaseDto;
				}

				$testClassDto->setTestCases($testCaseDtos);
				$testClassDtos[] = $testClassDto;
			}
			$testsuiteDto->setTestClasses($testClassDtos);
			$testsuites[] = $testsuiteDto;
		}
		$reportDto->setTestsuites($testsuites);
		return $reportDto;
	}

}
