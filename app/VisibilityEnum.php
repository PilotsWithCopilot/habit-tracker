<?php

declare(strict_types=1);

namespace App;

enum VisibilityEnum: string
{
    case Private = 'private'; // Only you can see
    case Protected = 'protected'; // Only you and your friends can see
    case Public = 'public'; // Everyone can see
}
