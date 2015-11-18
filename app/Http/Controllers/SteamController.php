<?php

namespace App\Http\Controllers;

//use App\User;
//use Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class SteamController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (! is_null($info)) {
                $user = User::where('steam_id', $info->getSteamID64())->first();
                if (! is_null($user)) {
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }else{
                    $user = User::create([
                        'username' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steam_id'  => $info->getSteamID64()
                    ]);
                    dd($info);
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }
            }
        } else {
            return $this->steam->redirect(); // redirect to Steam login page
        }
    }

}
