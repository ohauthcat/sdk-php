<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Values of Profile::getAccessPolicy(). */
enum AccessPolicy: string
{
    /** The sign-in was admitted under the organization's guest policy (a domain outside its verified domains). */
    case Guest = 'guest';

    /** True when the profile signed in as a guest. email_domain_verified stays true for guests. */
    public static function isGuest(?Models\Profile $profile): bool
    {
        return $profile !== null && self::tryFrom((string) $profile->getAccessPolicy()) === self::Guest;
    }
}
