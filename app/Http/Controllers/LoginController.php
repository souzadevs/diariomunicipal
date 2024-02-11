<?php

namespace App\Http\Controllers;

use App\Events\NewUser;
use App\Exceptions\Repositories\User\CreateUserFailException;
use App\Exceptions\Repositories\Auth\EmailOrPasswordInvalidException;
use App\Exceptions\Services\EmptyParamException;
use App\Exceptions\Services\SignOutFailtException;
use App\Services\Auth\SignIn\ISignIn;
use App\Services\Auth\SignUp\ISignUp;
use App\Helpers\ResponseHelper;
use App\Services\Auth\SignOut\ISignOut;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function viewSignIn(Request $request) 
    {
        if (!Auth::check()) {
            return view('auth.sign-in');
        } else {
            return redirect()->route('index');
        }

    }

    public function viewSignUp(Request $request) 
    {
        return view('auth.sign-up');
    }

    public function signIn(Request $request, ISignIn $signInService) 
    {
        
        $email = $request->input('email');
        $password = $request->input('password');

        try {

            $signInService->signIn($email, $password);
            return ResponseHelper::success(__('auth.success'));

        } catch (EmailOrPasswordInvalidException $e) {
            return ResponseHelper::error(__('auth.failed'), $e->getMessage());
        } catch (Exception $e) {
            return ResponseHelper::error(__('general.error'), $e->getMessage());
        }
    } 

    public function signUp(Request $request, ISignUp $signupService) 
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        
        try {

            $user = $signupService->signUp($email, $password, $firstName, $lastName, 5);
            NewUser::dispatch($user);
            return ResponseHelper::success(__('repositories/user.create_success'));

        } catch (EmptyParamException $e) {
            return ResponseHelper::error(__('repositories/user.create_error'), $e->getMessage());
        } catch (CreateUserFailException $e) {
            return ResponseHelper::error(__('repositories/user.create_error'), $e->getMessage());
        } catch (Exception $e) {
            return ResponseHelper::error(__('general.error'), $e->getMessage());
        }
    } 

    public function signOut(Request $request, ISignOut $signOutService) 
    {
        try {
            $signOutService->signOut();
            return redirect()->route('index');
        } catch (SignOutFailtException $e) {
            return redirect()->route('index');
        }
    }
    
}
