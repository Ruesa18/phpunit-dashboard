<?php

namespace App\Definition;

use App\Entity\Failure;
use araise\CrudBundle\Block\Block;
use araise\CrudBundle\Builder\DefinitionBuilder;
use araise\CrudBundle\Definition\AbstractDefinition;
use araise\CrudBundle\Enums\BlockSize;
use araise\CrudBundle\Enums\Page;
use araise\TableBundle\Table\Table;

class FailureDefinition extends AbstractDefinition
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
        return Failure::class;
    }

    /**
     * @param Failure $data
     */
    public function configureView(DefinitionBuilder $builder, $data): void
    {
        parent::configureView($builder, $data);

        $builder
            ->addBlock('base', null, [
				Block::OPT_SIZE => BlockSize::LARGE,
			])
			->addContent('type', null, [
			])
			->addContent('content', null, [
			])
        ;
    }

    public function configureTable(Table $table): void
    {
        parent::configureTable($table);
        $table
            ->addColumn('type', null, [
			])
            ->addColumn('content', null, [
			])
        ;
    }
}
