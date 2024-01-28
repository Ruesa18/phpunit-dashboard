<?php

namespace App\Controller;

use App\Repository\ReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractController {
	public const ROUTE_DASHBOARD = 'dashboard';

	public function __construct(protected TranslatorInterface $translator, protected ReportRepository $reportRepository) {}

	#[Route('/', name: self::ROUTE_DASHBOARD)]
	public function dashboard(): Response
	{
		return $this->render('dashboard.html.twig', [
			'cards' => [
				[
					'title' => $this->translator->trans('dashboard.reports'),
					'value' => $this->reportRepository->countAll(),
					'icon' => 'check',
				]
			],
		]);
	}
}
