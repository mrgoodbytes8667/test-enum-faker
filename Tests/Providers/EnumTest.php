<?php

namespace Bytes\Common\Faker\Tests\Providers;

use Bytes\Common\Faker\Enum\TestEnumFakerTrait;
use Bytes\Common\Faker\Tests\Fixtures\BackedEnum;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class EnumTest extends TestCase
{
    use TestEnumFakerTrait;

    /**
     * @return void
     */
    public function testRandomEnum()
    {
        static::assertInstanceOf(BackedEnum::class, $this->faker->randomEnum(BackedEnum::class));
    }

    /**
     * @return Generator
     */
    public function provideEnumClasses()
    {
        yield 'BackedEnum' => [BackedEnum::class];
    }

    /**
     * @return void
     */
    public function testRandomEnumValue()
    {
        static::assertTrue(in_array($this->faker->randomEnumValue(BackedEnum::class), BackedEnum::values()));
    }
}
