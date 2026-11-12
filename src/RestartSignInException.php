<?php

declare(strict_types=1);

namespace OhAuthCat;

/** The authorization code cannot be reused: start a fresh sign-in. */
final class RestartSignInException extends OhAuthCatException
{
}
