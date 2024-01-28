<?php

namespace App\PageContent;

use Symfony\UX\Chartjs\Model\Chart;

class ChartPageContent extends AbstractPageContent {
	public const OPT_CHART = 'chart';

	public function setDefaults(): void {
		parent::setDefaults();
		$this->setOption(self::OPT_TEMPLATE, 'page_contents/chart.html.twig');
		$this->setOption(self::OPT_CHART, new Chart(''));
	}
}
