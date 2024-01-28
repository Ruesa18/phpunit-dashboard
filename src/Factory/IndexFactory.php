<?php

namespace App\Factory;

use araise\SearchBundle\Entity\Index;
use araise\SearchBundle\Repository\IndexRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Index>
 *
 * @method        Index|Proxy                     create(array|callable $attributes = [])
 * @method static Index|Proxy                     createOne(array $attributes = [])
 * @method static Index|Proxy                     find(object|array|mixed $criteria)
 * @method static Index|Proxy                     findOrCreate(array $attributes)
 * @method static Index|Proxy                     first(string $sortedField = 'id')
 * @method static Index|Proxy                     last(string $sortedField = 'id')
 * @method static Index|Proxy                     random(array $attributes = [])
 * @method static Index|Proxy                     randomOrCreate(array $attributes = [])
 * @method static IndexRepository|RepositoryProxy repository()
 * @method static Index[]|Proxy[]                 all()
 * @method static Index[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Index[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Index[]|Proxy[]                 findBy(array $attributes)
 * @method static Index[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Index[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class IndexFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'content' => self::faker()->text(),
            'foreignId' => self::faker()->randomNumber(),
            'group' => self::faker()->text(90),
            'model' => self::faker()->text(150),
        ];
    }

    protected static function getClass(): string
    {
        return Index::class;
    }
}
