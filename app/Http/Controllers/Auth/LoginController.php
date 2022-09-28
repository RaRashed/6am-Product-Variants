<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Str;
use Socialite;
use Auth;
use App\Models\User;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)

    {

        $input = $request->all();



        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);



        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))

        {

            if (auth()->user()->type == 1) {

                return redirect()->route('admin.home');

            }else{

                return redirect()->route('frontend');

            }

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }



    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();        // Find existing user.
        $existingUser = User::whereEmail($user->getEmail())->first();

        if ($existingUser)
        {
            Auth::login($existingUser);
        } else {
            // Create new user.
            $getName = $user->name;
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'social_id' =>$user->id,
                'email_verified_at' => now(),
                'password' => Hash::make(12345678),
            ]);

                      Auth::login($newUser);
        }
      //  Toastr::success('You have successfully logged in with '.ucfirst($provider).'!','Success');
        return redirect(route('frontend'));
    }





}
