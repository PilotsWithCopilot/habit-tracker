<?php

declare(strict_types=1);

namespace App\Data\Auth;

final readonly class TelegramUserData
{
    public function __construct(
        public string $telegramId,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $username = null,
        public ?string $photoUrl = null,
    ) {
    }
}
