<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Modules\UserManagement\User\Models\Model as User;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| oAuth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth/redirect', function () {

    return Socialite::driver('google')->redirect();
});


Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    // Create or update the user
    $user = User::updateOrCreate(
        ['google_id' => $googleUser->id],
        [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]
    );

    if ($user) {
        // Generate access token and log in the user
        $accessToken = $user->createToken('accessToken')->accessToken;
        auth()->guard('web')->login($user);

        // Render the Inertia component directly with the necessary props (token & user data)
        return Inertia::render('Auth/GoogleRedirect', [
            'token' => $accessToken,
            'user' => $user->load('role')
        ]);
    } else {
        return messageResponse('Something went wrong', [], 400, 'error');
    }
});

Route::get('/google-redirect', function () {

    return Inertia::render("Auth/GoogleRedirect");
});
