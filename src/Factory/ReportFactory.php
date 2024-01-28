<?php

namespace App\Factory;

use App\Entity\Report;
use App\Repository\ReportRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Report>
 *
 * @method        Report|Proxy                     create(array|callable $attributes = [])
 * @method static Report|Proxy                     createOne(array $attributes = [])
 * @method static Report|Proxy                     find(object|array|mixed $criteria)
 * @method static Report|Proxy                     findOrCreate(array $attributes)
 * @method static Report|Proxy                     first(string $sortedField = 'id')
 * @method static Report|Proxy                     last(string $sortedField = 'id')
 * @method static Report|Proxy                     random(array $attributes = [])
 * @method static Report|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ReportRepository|RepositoryProxy repository()
 * @method static Report[]|Proxy[]                 all()
 * @method static Report[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Report[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Report[]|Proxy[]                 findBy(array $attributes)
 * @method static Report[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Report[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ReportFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'assertionCount' => self::faker()->randomNumber(),
            'errorCount' => self::faker()->randomNumber(),
            'failureCount' => self::faker()->randomNumber(),
            'skipCount' => self::faker()->randomNumber(),
            'testCount' => self::faker()->randomNumber(),
            'time' => self::faker()->randomFloat(),
            'warningCount' => self::faker()->randomNumber(),
        ];
    }

    protected static function getClass(): string
    {
        return Report::class;
    }
}
