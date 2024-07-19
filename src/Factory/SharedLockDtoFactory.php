<?php

namespace Fake\ChasterDtoFactory\Factory;

use Fake\ChasterDtoBundle\Objects\Dto\SharedLockDto;
use Fake\ChasterFactory\Factory\SharedLockFactory;
use Fake\ChasterFactory\Factory\UnsplashPhotoFactory;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<SharedLockDto>
 *
 * @method        SharedLockDto   create(array|callable $attributes = [])
 * @method static SharedLockDto   createOne(array $attributes = [])
 * @method static SharedLockDto[] createMany(int $number, array|callable $attributes = [])
 * @method static SharedLockDto[] createSequence(iterable|callable $sequence)
 */
final class SharedLockDtoFactory extends SharedLockFactory
{
    public static function class(): string
    {
        return SharedLockDto::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        $defaults = parent::defaults();

        $unsplash = UnsplashPhotoFactory::new();

        $requirePassword = $defaults['requirePassword'];

        $defaults['unsplashPhoto'] = $unsplash;
        $defaults['photoId'] = $unsplash->create()->getId();
        $defaults['password'] = $requirePassword ? self::faker()->password() : null;

        return $defaults;
    }
}
