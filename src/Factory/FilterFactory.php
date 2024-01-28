<?php

namespace App\Factory;

use araise\TableBundle\Entity\Filter;
use araise\TableBundle\Repository\FilterRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Filter>
 *
 * @method        Filter|Proxy                     create(array|callable $attributes = [])
 * @method static Filter|Proxy                     createOne(array $attributes = [])
 * @method static Filter|Proxy                     find(object|array|mixed $criteria)
 * @method static Filter|Proxy                     findOrCreate(array $attributes)
 * @method static Filter|Proxy                     first(string $sortedField = 'id')
 * @method static Filter|Proxy                     last(string $sortedField = 'id')
 * @method static Filter|Proxy                     random(array $attributes = [])
 * @method static Filter|Proxy                     randomOrCreate(array $attributes = [])
 * @method static FilterRepository|RepositoryProxy repository()
 * @method static Filter[]|Proxy[]                 all()
 * @method static Filter[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Filter[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Filter[]|Proxy[]                 findBy(array $attributes)
 * @method static Filter[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Filter[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class FilterFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'arguments' => [],
            'conditions' => [],
            'name' => self::faker()->text(50),
            'route' => self::faker()->text(256),
        ];
    }

    protected static function getClass(): string
    {
        return Filter::class;
    }
}
