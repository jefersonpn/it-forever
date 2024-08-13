<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        /** @var \Spatie\Permission\Traits\HasRoles|\App\Models\User $user */
        $user = Auth::user();

        // Log the user information
        Log::info('User authenticated', ['user_id' => $user->id, 'roles' => $user->getRoleNames()->toArray()]);

        // Check if the user has the 'admin' role
        if ($user->hasRole('admin')) {
            Log::info('Redirecting to admin dashboard', ['user_id' => $user->id]);
            return Redirect::route('admin.dashboard');
        }

        // Check if the user has the 'client' role
        if ($user->hasRole('client')) {
            Log::info('Redirecting to client backoffice', ['user_id' => $user->id]);
            return Redirect::route('client.backoffice');
        }

        // If no role matched, regenerate session and redirect to the default page
        Log::info('No matching role found, redirecting to default fallback', ['user_id' => $user->id]);

        $request->session()->regenerate();

        return redirect()->intended('/'); // Default fallback
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
