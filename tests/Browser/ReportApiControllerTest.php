<?php

namespace App\Tests\Browser;

use App\Dto\ReportDto;
use DateTime;

class ReportApiControllerTest extends AbstractBrowserTest {

	public function testCreateReport(): void {
		$dateTime = new DateTime();
		$postdata = [
			'time' => $dateTime->format('Y.m.d-H:i:s'),
			'report' => json_encode($this->getTestReportDto(), true),
		];

		$this->browser()
			->post(
				'/api/report',
				['body' => $postdata]
			)
			->saveSource('test_create_report.html')
			->assertStatus(201)
		;
	}

	public function testCreateReportNegative(): void {
		$datetime = null;
		$postdata = [
			'time' => $datetime,
		];

		$this->browser()
			->post(
				'/api/report',
				['post' => $postdata]
			)
			->assertStatus(400)
		;
	}

	private function getTestReportDto(): ReportDto {
		$reportDto = new ReportDto();

		$reportDto
			->setTime(0.0)
			->setTestCount(0)
			->setSkipCount(0)
			->setFailureCount(0)
			->setWarningCount(0)
			->setErrorCount(0)
			->setAssertionCount(0)
		;

		return $reportDto;
	}
}
