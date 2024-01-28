<?php

namespace App\Menu;

use App\Definition\FailureDefinition;
use App\Definition\ReportDefinition;
use App\Definition\TestCaseDefinition;
use App\Definition\TestClassDefinition;
use App\Definition\TestsuiteDefinition;
use Knp\Menu\ItemInterface;

class MenuBuilder extends \araise\CrudBundle\Menu\MenuBuilder {

	public function createMainMenu(): ItemInterface {
		$menu = $this->factory->createItem('');
		$menu->addChild('Dashboard', [
			self::OPT_LABEL => 'araise_crud.dashboard',
			self::OPT_ROUTE => 'araise_crud_dashboard',
			self::OPT_ATTR => [
				self::OPT_ATTR_ICON => 'house-door',
			],
		]);

		$dataMenu = $this->factory->createItem('menu.baseData', [
			self::OPT_ATTR => [
				self::OPT_ATTR_ICON => 'database'
			]
		]);
		$this->addDefinition($dataMenu, ReportDefinition::class);
		$this->addDefinition($dataMenu, TestsuiteDefinition::class);
		$this->addDefinition($dataMenu, TestClassDefinition::class);
		$this->addDefinition($dataMenu, TestCaseDefinition::class);
		$menu->addChild($dataMenu);

		return $menu;
	}
}
