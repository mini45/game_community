<?php

namespace App\Http\Controllers\Auth;

//use App\User;
//use Validator;
//use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class AuthController extends Controller
{
//    /*
//    |--------------------------------------------------------------------------
//    | Registration & Login Controller
//    |--------------------------------------------------------------------------
//    |
//    | This controller handles the registration of new users, as well as the
//    | authentication of existing users. By default, this controller uses
//    | a simple trait to add these behaviors. Why don't you explore it?
//    |
//    */
//
//    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
//
//    /**
//     * Create a new authentication controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest', ['except' => 'getLogout']);
//    }
//
//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array  $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
//        ]);
//    }
//
//    /**
//     * Create a new user instance after a valid registration.
//     *
//     * @param  array  $data
//     * @return User
//     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }



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
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (! is_null($user)) {
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }else{
                    $user = User::create([
                        'username' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64()
                    ]);
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }
            }
        } else {
            return $this->steam->redirect(); // redirect to Steam login page
        }
    }

}
