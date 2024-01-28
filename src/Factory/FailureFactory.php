<?php

namespace App\Factory;

use App\Entity\Failure;
use App\Repository\FailureRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Failure>
 *
 * @method        Failure|Proxy                     create(array|callable $attributes = [])
 * @method static Failure|Proxy                     createOne(array $attributes = [])
 * @method static Failure|Proxy                     find(object|array|mixed $criteria)
 * @method static Failure|Proxy                     findOrCreate(array $attributes)
 * @method static Failure|Proxy                     first(string $sortedField = 'id')
 * @method static Failure|Proxy                     last(string $sortedField = 'id')
 * @method static Failure|Proxy                     random(array $attributes = [])
 * @method static Failure|Proxy                     randomOrCreate(array $attributes = [])
 * @method static FailureRepository|RepositoryProxy repository()
 * @method static Failure[]|Proxy[]                 all()
 * @method static Failure[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Failure[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Failure[]|Proxy[]                 findBy(array $attributes)
 * @method static Failure[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Failure[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class FailureFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'content' => self::faker()->text(255),
            'type' => self::faker()->text(255),
        ];
    }

    protected static function getClass(): string
    {
        return Failure::class;
    }
}
