<?php

namespace App\Definition;

use App\Entity\TestCase;
use App\Formatter\FailureFormatter;
use araise\CrudBundle\Block\Block;
use araise\CrudBundle\Builder\DefinitionBuilder;
use araise\CrudBundle\Content\Content;
use araise\CrudBundle\Content\RelationContent;
use araise\CrudBundle\Definition\AbstractDefinition;
use araise\CrudBundle\Enums\BlockSize;
use araise\CrudBundle\Enums\Page;
use araise\TableBundle\Table\Table;

class TestCaseDefinition extends AbstractDefinition
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
        return TestCase::class;
    }

    /**
     * @param TestCase $data
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
			->addContent('class', null, [
			])
			->addContent('className', null, [
			])
			->addContent('file', null, [
			])
			->addContent('line', null, [
			])
			->addContent('assertionCount', null, [
			])
			->addContent('time', null, [
			])
			->addContent('failure', null, [
				Content::OPT_FORMATTER => FailureFormatter::class,
			])
        ;
    }

    public function configureTable(Table $table): void
    {
        parent::configureTable($table);
        $table
            ->addColumn('name', null, [
			])
            ->addColumn('class', null, [
			])
            ->addColumn('assertionCount', null, [
			])
            ->addColumn('time', null, [
			])
        ;
    }
}
