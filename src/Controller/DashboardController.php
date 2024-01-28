<?php

namespace App\Controller;

use App\Enum\PageContentSizeEnum;
use App\PageContent\AbstractPageContent;
use App\PageContent\ChartPageContent;
use App\Repository\ReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class DashboardController extends AbstractController {
	public const ROUTE_DASHBOARD = 'dashboard';

	public function __construct(
		protected TranslatorInterface $translator,
		protected ReportRepository $reportRepository,
		protected ChartBuilderInterface $chartBuilder
	) {}

	#[Route('/', name: self::ROUTE_DASHBOARD)]
	public function dashboard(): Response
	{
		$chartContent = new ChartPageContent();
		$chartContent->setOption(AbstractPageContent::OPT_TITLE, $this->translator->trans('dashboard.last_reports_state_chart'));
		$chartContent->setOption(AbstractPageContent::OPT_SIZE, PageContentSizeEnum::MIDDLE);
		$chartContent->setOption(ChartPageContent::OPT_CHART, $this->getLastReportsStatusChart());
		$chartContents[] = $chartContent;

		return $this->render('dashboard.html.twig', [
			'pageContents' => $chartContents,
		]);
	}

	private function getLastReportsStatusChart(): Chart {
		$chart = $this->chartBuilder->createChart(Chart::TYPE_BAR);

		$reports = $this->reportRepository->getLastFewReports();
		$dataError = [];
		$dataAssertions = [];
		$labels = [];

		foreach($reports as $report) {
			$dataAssertions[] = $report->getAssertionCount();
			$dataError[] = $report->getErrorCount();
			$labels[] = $report->getExecutionTimestamp()?->format('d.m.y h:i');
		}

		$chart->setData([
			'labels' => $labels,
			'datasets' => [
				[
					'label' => 'Assertions',
					'data' => $dataAssertions,
					'stack' => 0,
					'backgroundColor' => '#c20ac2',
				],
				[
					'label' => 'Errors',
					'data' => $dataError,
					'stack' => 1,
					'backgroundColor' => '#c20a48',
				]
			]
		]);

		$chart->setOptions([
			'scales' => [
				'x' => [
					'ticks' => [
						'maxRotation' => 45,
						'minRotation' => 25,
					],
				]
			],
		]);

		return $chart;
	}
}
