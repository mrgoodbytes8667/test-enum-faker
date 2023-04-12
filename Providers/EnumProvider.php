<?php


namespace Bytes\Common\Faker\Providers;


use BackedEnum;
use Faker\Generator;
use Faker\Provider\Address;
use Faker\Provider\Barcode;
use Faker\Provider\Base;
use Faker\Provider\Biased;
use Faker\Provider\Color;
use Faker\Provider\Company;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Medical;
use Faker\Provider\Miscellaneous;
use Faker\Provider\Payment;
use Faker\Provider\Person;
use Faker\Provider\PhoneNumber;
use Faker\Provider\Text;
use Faker\Provider\UserAgent;
use Faker\Provider\Uuid;

/**
 * Class EnumProvider
 * @package Bytes\Common\Faker\Providers
 *
 * @property Generator|MiscProvider|Address|Barcode|Biased|Color|Company|DateTime|File|HtmlLorem|Image|Internet|Lorem|Medical|Miscellaneous|Payment|Person|PhoneNumber|Text|UserAgent|Uuid $generator
 */
class EnumProvider extends Base
{
    use SetupDependenciesTrait;

    /**
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        self::addProviderIfNeeded(MiscProvider::class, $generator);
        parent::__construct($generator);
    }

    /**
     * @param class-string<BackedEnum> $enum
     * @return BackedEnum
     */
    public function randomEnum(string $enum): BackedEnum
    {
        return static::randomElement($enum::cases());
    }

    /**
     * @param class-string<BackedEnum> $enum
     * @return int|string
     */
    public function randomEnumValue(string $enum)
    {
        return static::randomElement($enum::cases())->value;
    }
}
