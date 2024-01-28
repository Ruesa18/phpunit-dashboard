<?php

namespace App\Factory;

use App\Entity\Testsuite;
use App\Repository\TestsuiteRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Testsuite>
 *
 * @method        Testsuite|Proxy                     create(array|callable $attributes = [])
 * @method static Testsuite|Proxy                     createOne(array $attributes = [])
 * @method static Testsuite|Proxy                     find(object|array|mixed $criteria)
 * @method static Testsuite|Proxy                     findOrCreate(array $attributes)
 * @method static Testsuite|Proxy                     first(string $sortedField = 'id')
 * @method static Testsuite|Proxy                     last(string $sortedField = 'id')
 * @method static Testsuite|Proxy                     random(array $attributes = [])
 * @method static Testsuite|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TestsuiteRepository|RepositoryProxy repository()
 * @method static Testsuite[]|Proxy[]                 all()
 * @method static Testsuite[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Testsuite[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Testsuite[]|Proxy[]                 findBy(array $attributes)
 * @method static Testsuite[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Testsuite[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TestsuiteFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'assertionCount' => self::faker()->randomNumber(),
            'errorCount' => self::faker()->randomNumber(),
            'failureCount' => self::faker()->randomNumber(),
            'name' => self::faker()->text(255),
            'skipCount' => self::faker()->randomNumber(),
            'testCount' => self::faker()->randomNumber(),
            'time' => self::faker()->randomFloat(),
            'warningCount' => self::faker()->randomNumber(),
        ];
    }

    protected static function getClass(): string
    {
        return Testsuite::class;
    }
}
