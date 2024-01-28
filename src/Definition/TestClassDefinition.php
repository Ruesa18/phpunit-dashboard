<?php

namespace App\Definition;

use App\Entity\TestClass;
use araise\CrudBundle\Block\Block;
use araise\CrudBundle\Builder\DefinitionBuilder;
use araise\CrudBundle\Content\Content;
use araise\CrudBundle\Content\RelationContent;
use araise\CrudBundle\Definition\AbstractDefinition;
use araise\CrudBundle\Enums\BlockSize;
use araise\CrudBundle\Enums\Page;
use araise\TableBundle\Table\Table;

class TestClassDefinition extends AbstractDefinition
{
	public static function getCapabilities(): array {
		return [
			Page::INDEX,
			Page::SHOW,
			Page::JSONSEARCH,
		];
	}

	public static function getEntity(): string
    {
        return TestClass::class;
    }

    /**
     * @param TestClass $data
     */
    public function configureView(DefinitionBuilder $builder, $data): void
    {
        parent::configureView($builder, $data);

        $builder
            ->addBlock('base', null, [
				Block::OPT_SIZE => BlockSize::LARGE,
			])
			->addContent('name', null, [
			])
			->addContent('file', null, [
			])
			->addContent('testCount', null, [
			])
			->addContent('assertionCount', null, [
			])
			->addContent('errorCount', null, [
			])
			->addContent('warningCount', null, [
			])
			->addContent('failureCount', null, [
			])
			->addContent('skipCount', null, [
			])
			->addContent('time', null, [
			])
			->addContent('testCases', null, [
				RelationContent::OPT_TABLE_CONFIGURATION => function(Table $table) {
					$table
						->removeColumn('class')
						->removeColumn('className')
						->removeColumn('file')
						->removeColumn('line')
						->removeColumn('assertionCount')
						->removeColumn('time')
					;
				}
			])
        ;
    }

    public function configureTable(Table $table): void
    {
        parent::configureTable($table);
        $table
            ->addColumn('name', null, [
			])
            ->addColumn('testCount', null, [
			])
            ->addColumn('assertionCount', null, [
			])
            ->addColumn('errorCount', null, [
			])
            ->addColumn('warningCount', null, [
			])
            ->addColumn('failureCount', null, [
			])
            ->addColumn('time', null, [
			])
        ;
    }
}
