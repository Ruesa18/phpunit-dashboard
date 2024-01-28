<?php

namespace App\Factory;

use App\Entity\TestClass;
use App\Repository\TestClassRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TestClass>
 *
 * @method        TestClass|Proxy                     create(array|callable $attributes = [])
 * @method static TestClass|Proxy                     createOne(array $attributes = [])
 * @method static TestClass|Proxy                     find(object|array|mixed $criteria)
 * @method static TestClass|Proxy                     findOrCreate(array $attributes)
 * @method static TestClass|Proxy                     first(string $sortedField = 'id')
 * @method static TestClass|Proxy                     last(string $sortedField = 'id')
 * @method static TestClass|Proxy                     random(array $attributes = [])
 * @method static TestClass|Proxy                     randomOrCreate(array $attributes = [])
 * @method static TestClassRepository|RepositoryProxy repository()
 * @method static TestClass[]|Proxy[]                 all()
 * @method static TestClass[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static TestClass[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static TestClass[]|Proxy[]                 findBy(array $attributes)
 * @method static TestClass[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static TestClass[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class TestClassFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'assertionCount' => self::faker()->randomNumber(),
            'errorCount' => self::faker()->randomNumber(),
            'failureCount' => self::faker()->randomNumber(),
            'file' => self::faker()->text(255),
            'name' => self::faker()->text(255),
            'skipCount' => self::faker()->randomNumber(),
            'testCount' => self::faker()->randomNumber(),
            'time' => self::faker()->randomFloat(),
            'warningCount' => self::faker()->randomNumber(),
        ];
    }

    protected static function getClass(): string
    {
        return TestClass::class;
    }
}
