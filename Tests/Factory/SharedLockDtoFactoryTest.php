<?php

namespace Fake\ChasterDtoFactory\Tests\Factory;

use Fake\ChasterDtoBundle\Objects\Dto\SharedLockDto;
use Fake\ChasterDtoFactory\Factory\SharedLockDtoFactory;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class SharedLockDtoFactoryTest extends TestCase
{
    use Factories;

    public function testFactory()
    {
        $tag = SharedLockDtoFactory::createOne();
        self::assertInstanceOf(SharedLockDto::class, $tag);
    }
}
