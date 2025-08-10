<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Data\Auth\TelegramUserData;
use App\Http\Controllers\Controller;
use App\Services\Auth\CreateTelegramUserService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Socialite\Contracts\Factory;
use SocialiteProviders\Manager\OAuth2\User as TelegramUser;

final class TelegramController extends Controller
{
    public function __construct(private readonly Factory $socialite)
    {
    }

    public function callback(CreateTelegramUserService $createTelegramUserService): Response
    {
        /** @var TelegramUser $telegramUser */
        $telegramUser = $this->socialite->driver('telegram')->user();
        /** @var array{id: string, first_name: string, last_name: string|null, username: string|null, photo_url: string|null } $rawData */
        $rawData = $telegramUser->getRaw();

        $telegramData = new TelegramUserData(
            telegramId: $rawData['id'],
            firstName: $rawData['first_name'],
            lastName: $rawData['last_name'] ?? null,
            username: $rawData['username'] ?? null,
            photoUrl: $rawData['photo_url'] ?? null,
        );

        $user = $createTelegramUserService->handle($telegramData);
        Auth::guard('web')->login($user, remember: true);

        return Inertia::location(route('home'));
    }
}
