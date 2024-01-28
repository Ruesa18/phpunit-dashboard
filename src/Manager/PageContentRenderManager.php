<?php

namespace App\Manager;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PageContentRenderManager {
	public function __construct(protected Environment $twig) {}

	/**
	 * @throws SyntaxError
	 * @throws RuntimeError
	 * @throws LoaderError
	 */
	public function render(string $template, array $options): string {
		return $this->twig->render(
			$template,
			[
				'options' => $options
			]
		);
	}
}
