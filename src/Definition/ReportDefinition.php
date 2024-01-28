<?php

namespace App\Definition;

use App\Entity\Report;
use araise\CoreBundle\Formatter\DateTimeFormatter;
use araise\CrudBundle\Block\Block;
use araise\CrudBundle\Builder\DefinitionBuilder;
use araise\CrudBundle\Content\Content;
use araise\CrudBundle\Content\RelationContent;
use araise\CrudBundle\Definition\AbstractDefinition;
use araise\CrudBundle\Enums\BlockSize;
use araise\CrudBundle\Enums\Page;
use araise\TableBundle\Table\AbstractColumn;
use araise\TableBundle\Table\Column;
use araise\TableBundle\Table\Table;

class ReportDefinition extends AbstractDefinition
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
        return Report::class;
    }

    /**
     * @param Report $data
     */
    public function configureView(DefinitionBuilder $builder, $data): void
    {
        parent::configureView($builder, $data);

        $builder
            ->addBlock('base', null, [
				Block::OPT_SIZE => BlockSize::LARGE,
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
			->addContent('executionTimestamp', null, [
				Content::OPT_FORMATTER => DateTimeFormatter::class,
			])
			->addContent('testsuites', null, [
				RelationContent::OPT_TABLE_CONFIGURATION => function(Table $table) {
					$table
						->removeColumn('testCount')
						->removeColumn('assertionCount')
						->removeColumn('errorCount')
						->removeColumn('warningCount')
						->removeColumn('failureCount')
						->removeColumn('skipCount')
					;
				}
			])
        ;
    }

    public function configureTable(Table $table): void
    {
        parent::configureTable($table);
        $table
			->addColumn('executionTimestamp', null, [
				Column::OPT_FORMATTER => DateTimeFormatter::class,
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
			->addColumn('skipCount', null, [
			])
        ;
    }
}
