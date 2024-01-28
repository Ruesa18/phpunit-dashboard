<?php

namespace App\Factory;

use App\Entity\TestCase;
use App\Repository\TestCaseRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TestCase>
 *
 * @method        TestCase|Proxy                     create(array|callable $attributes = [])
 * @method static TestCase|Proxy                     createOne(array $attributes = [])
 * @method static TestCase|Proxy                     find(object|array|mixed $criteria)
 * @method static TestCase|Proxy                     findOrCreate(array $attributes)
 * @method static TestCase|Proxy                     first(string $sortedField = 'id')
 * @method static TestCase|Proxy                     last(string $sortedField = 'id')
 * @method static TestCase|Proxy                     random(array $attributes = [])
 * @method static TestCase|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TestCaseRepository|RepositoryProxy repository()
 * @method static TestCase[]|Proxy[]                 all()
 * @method static TestCase[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static TestCase[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static TestCase[]|Proxy[]                 findBy(array $attributes)
 * @method static TestCase[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static TestCase[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TestCaseFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'assertionCount' => self::faker()->randomNumber(),
            'name' => self::faker()->text(255),
            'testClass' => TestClassFactory::new(),
            'time' => self::faker()->randomFloat(),
        ];
    }

    protected static function getClass(): string
    {
        return TestCase::class;
    }
}
