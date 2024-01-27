<?php

namespace App\Tests\Browser;

use App\Controller\ReportApiController;
use DateTime;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;

class ReportApiControllerTest extends AbstractBrowserTest {

	public function testCreateReport(): void {
		$dateTime = new DateTime();
		$postdata = [
			'time' => $dateTime->format('Y.m.d-H:i:s')
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
			->post('/api/report', ['post' => $postdata])
			->saveSource('test_create_report_negative.html')
			->assertStatus(500)
		;
	}
}
