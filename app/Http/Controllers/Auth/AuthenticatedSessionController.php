<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class AuthenticatedSessionController
{
    /**
     * Show the login page.
     */
    public function login(Request $request): Response
    {
        return Inertia::render('auth/login', [
            'status' => $request->session()->get('status'),
        ]);
    }
}
