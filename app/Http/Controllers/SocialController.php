<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @param Request $request
     * @param $provider
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        $user = Socialite::driver($provider)->user();
        return $this->checkUser($user, $provider);
    }

    public function logout()
    {
        return $this->userLogout();
    }
}
