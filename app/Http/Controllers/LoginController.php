<?php

namespace App\Http\Controllers;

use App\Events\NewUser;
use App\Exceptions\Repositories\User\CreateUserFailException;
use App\Exceptions\Repositories\Auth\EmailOrPasswordInvalidException;
use App\Exceptions\Services\EmptyParamException;
use App\Services\Auth\SignIn\ISignIn;
use App\Services\Auth\SignUp\ISignUp;
use App\Helpers\ResponseHelper;
use App\Services\Auth\SignOut\ISignOut;
use Illuminate\Http\Request;
use Exception;

class LoginController extends Controller
{

    public function viewSignIn(Request $request) 
    {
        return view('auth.sign-in');
    }

    public function viewSignUp(Request $request) 
    {
        return view('auth.sign-up');
    }

    public function signIn(Request $request, ISignIn $signInService) 
    {
        dd('here', $request->all());
        $email = $request->input('email');
        $password = $request->input('password');
        
        try {
            $signInService->signIn($email, $password);
            return view('index');
        } catch (EmailOrPasswordInvalidException $e) {
            return ResponseHelper::error(__('auth.error'), $e->getMessage());
        } catch (Exception $e) {
            return ResponseHelper::error(__('general.error'), $e->getMessage());
        }
    } 

    public function signUp(Request $request, ISignUp $signupService) 
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $firstName = $request->input('first_ame');
        $lastName = $request->input('last_ame');
        
        try {

            $user = $signupService->signUp($email, $password, $firstName, $lastName, 5);

            NewUser::dispatch($user);

            return view('index');

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
            return view('index');
        } catch (Exception $e) {
            return ResponseHelper::error(__('general.error'), $e->getMessage());
        }
    }
    
}
