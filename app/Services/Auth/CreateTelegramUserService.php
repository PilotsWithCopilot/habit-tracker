<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Data\Auth\TelegramUserData;
use App\Models\User;
use Illuminate\Container\Attributes\Config;
use Illuminate\Support\Facades\Log;

final readonly class CreateTelegramUserService
{
    public function __construct(
        #[Config('app.locale')] private string $defaultLanguageCode,
    ) {
    }

    public function handle(TelegramUserData $telegramUserData): User
    {
        /** @var User|null $user */
        $user = User::query()->firstWhere('telegram_id', $telegramUserData->telegramId);

        if (!$user) {
            $user = new User();
            $user->id = $user->newUniqueId();
            $user->telegram_id = $telegramUserData->telegramId;
        }

        $user->first_name = $telegramUserData->firstName;
        $user->last_name = $telegramUserData->lastName;
        $user->username = $telegramUserData->username;
        $user->photo_url = $telegramUserData->photoUrl;
        $user->language_code = $this->defaultLanguageCode;

        $user->save();

        Log::info('User created/updated successfully', [
            'user_id' => $user->id,
            'telegram_id' => $user->telegram_id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
        ]);

        return $user;
    }
}
