<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SocialProfile;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
      /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        $drivers = ['facebook', 'google'];

        if (in_array($driver, $drivers)) {
            return Socialite::driver($driver)->redirect();
        }else {
            return redirect()->route('login')->with('info', $driver . ' no es una aplicacion valida para login');
        }

    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $driver)
    {
        if ($request->get('error')) {
            return redirect()->route('login');
        }
        $userSocialite = Socialite::driver($driver)->stateless()->user();

       

        $social = SocialProfile::where('social_id' ,$userSocialite->getId())
                                ->where('social_name', $driver)->first();
        
        if (!$social) {
            $user = User::where('email', $userSocialite->getEmail())->first();

            if (!$user) {
                $user = User::create([
                            'name' => $userSocialite->getName(),
                            'email' => $userSocialite->getEmail(),
        
                        ]);
            }
            $social = SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar' => $userSocialite->getAvatar(),
            ]);
        }

        auth()->login($social->user);

        return redirect()->route('home');
        // return $user->getEmail();
        // $user->token;
    }
}
