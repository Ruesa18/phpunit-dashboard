<?php

namespace App\PageContent;

use App\Enum\PageContentSizeEnum;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use Symfony\Contracts\Service\Attribute\Required;
use Twig\Environment;

class AbstractPageContent {
	public const OPT_TEMPLATE = 'template';
	public const OPT_TITLE = 'title';
	public const OPT_SIZE = 'size';
	public const OPT_CONTENT = 'content';

	protected array $options;

	public function __construct() {
		$this->setDefaults();
	}

	public function getOption(string $key): mixed {
		return $this->options[$key] ?? null;
	}

	public function setOption(string $key, mixed $value): self {
		$this->options[$key] = $value;
		return $this;
	}

	public function getOptions(): array {
		return $this->options;
	}

	public function setDefaults(): void {
		$this->options = [
			self::OPT_TITLE => false,
			self::OPT_SIZE => PageContentSizeEnum::SMALL,
			self::OPT_TEMPLATE => 'page_contents/page_content.html.twig',
			self::OPT_CONTENT => false,
		];
	}
}
