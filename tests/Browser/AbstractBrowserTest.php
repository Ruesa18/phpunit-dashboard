<?php

namespace App\Tests\Browser;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Browser\Test\HasBrowser;

abstract class AbstractBrowserTest extends KernelTestCase {
	use HasBrowser;

	protected function setUp(): void
	{
		self::bootKernel();
	}
}
