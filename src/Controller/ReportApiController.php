<?php

namespace App\Controller;

use App\Dto\ReportDto;
use App\Manager\ReportManager;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api')]
class ReportApiController extends AbstractController
{
	public const ROUTE_CREATE_REPORT = 'app_report_api';

	protected Serializer $serializer;

	public function __construct(
		protected ReportManager $reportManager,
	) {
		$encoders = [new JsonEncoder()];
		$normalizers = [new ObjectNormalizer()];
		$this->serializer = new Serializer($normalizers, $encoders);
	}

    #[Route('/report', name: self::ROUTE_CREATE_REPORT, methods: ['POST'])]
    public function createReport(Request $request): JsonResponse
    {
		$date = DateTimeImmutable::createFromFormat('Y.m.d-H:i:s', $request->get('time'));

		$report = $request->get('report');
		$reportDto = $this->serializer->deserialize($report, ReportDto::class, 'json');

		$this->reportManager->save($reportDto);

		return new JsonResponse(sprintf('Yep %s', $date->format('d.m.Y H.i:s')), 201);
    }
}
