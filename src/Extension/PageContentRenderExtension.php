<?php

namespace App\Extension;

use App\Manager\PageContentRenderManager;
use App\PageContent\AbstractPageContent;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PageContentRenderExtension extends AbstractExtension {
	public function __construct(
		protected PageContentRenderManager $pageContentRenderManager,
	) {}

	public function getFunctions(): array {
		$options = [
			'is_safe' => ['html'],
			'is_safe_callback' => true,
		];

		return [
			new TwigFunction(
				'render_page_content',
				function(AbstractPageContent $pageContent): string {
					return $this->pageContentRenderManager->render(
						$pageContent->getOption(AbstractPageContent::OPT_TEMPLATE),
						$pageContent->getOptions()
					);
				},
				$options
			)
		];
	}
}
