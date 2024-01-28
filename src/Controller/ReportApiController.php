<?php

namespace App\Controller;

use App\Dto\ReportDto;
use App\Manager\ReportManager;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ReportApiController extends AbstractController
{
	public const ROUTE_CREATE_REPORT = 'app_report_api';

	public function __construct(
		protected ReportManager $reportManager,
	) {}

    #[Route('/report', name: self::ROUTE_CREATE_REPORT, methods: ['POST'])]
    public function createReport(Request $request): JsonResponse
    {
		$timeFormat = 'Y.m.d-H:i:s';

		$timeParameter = $request->get('time');
		if($timeParameter === null) {
			throw new BadRequestException(sprintf('time must be in the format: %s', $timeFormat));
		}

		$date = DateTimeImmutable::createFromFormat($timeFormat, $timeParameter);
		if($date === false) {
			throw new BadRequestException(sprintf('time must be in the format: %s', $timeFormat));
		}

		$reportJson = $request->get('report');

		$reportDto = $this->reportManager->deserialize($reportJson);

		$this->reportManager->save($reportDto);

		return new JsonResponse(sprintf('Yep %s', $date->format('d.m.Y H.i:s')), 201);
    }
}
