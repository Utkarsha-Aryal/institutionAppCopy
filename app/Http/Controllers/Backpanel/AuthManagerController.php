<?php

namespace App\Http\Controllers\Backpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\User_role;
use Illuminate\Support\Facades\Validator;
use Exception;


class AuthManagerController extends Controller
{

    public function index(){

        return view('welcome');
        }


        function resetPasswordForm()
        {
            return view('backend.auth.reset_password');
        }
    

    
    public function login(){
        if(Auth::check()){
            
            return redirect(route('admin.dashboard')) ;

        }
        return view('backend.auth.login');

    }

    
    public function loginPost(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email|max:50',
                'password' => 'required|max:50',
            ];
            $messages = [
                'email.required' => 'Email field is required',
                'email.email' => 'Email format does not match',
                'password.required' => 'Password field is required',
            ];
            // Validate input
            $validate = Validator::make($request->all(), $rules, $messages);
            if ($validate->fails()) {
                throw new Exception($validate->errors()->first(), 1);
            }
            $post = $request->all();
            $type = 'success';
            $message = 'Login success';
            $credentials = [
                'email' => $post['email'],
                'password' => $post['password'], // Ensure this is the plain text password
            ];
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->first_time_login === null) {
                    $message = "Reset password";
                    return view("backend.auth.chnagepassword");
                } else {
                    //session(['email' => $user['email']]);
                    // need to watch
                    return view("backend.user.index");
                }
            } else {
                throw new Exception('Invalid user or password');
            }
        } catch (QueryException $qe) {
            $type = 'error';
            $message = $this->queryMessage;
        } catch (Exception $e) {
            $type = 'error';
            $message = $e->getMessage();
        }
        return json_encode(['type' => $type, 'message' => $message]);
    }
    public function changepassword(Request $request)
    {
        // try {
            $rules = [
                'current_password' => 'required|max:250',
                'password' => 'required|max:250',
                'confirm_password' => 'required|max:250',
            ];
            $message = [
                'current_password.required' => 'Please enter current password',
                'password.required' => 'Please enter new password',
                'confirm_password.required' => 'Please enter confirm password',
            ];
            $validation = Validator::make($request->all(), $rules, $message);
            if ($validation->fails()) {
                throw new Exception($validation->errors()->first(), 1);
            }
            $post = $request->all();
            $type = 'success';
            $message = 'Password is updated successfully.';
            DB::beginTransaction();
            if (!User::updatepassword($post)) {
                throw new Exception('Could not save record', 1);
            }
            DB::commit();
    
        return view('backend.auth.login');
    }


    public function registrationPost(Request $request){
       

    try {
        $post = $request->all();
        $type = 'success';
        $message = 'Record saved successfully';

        DB::beginTransaction();
        $user = User::saveRegistration($post);

        if (!$user) {
            throw new Exception('Could not save user record');
        }
        $post['id'] = $user->id; 
        $userRole = User_role::saveData($post);
    
        if (!$userRole) {
            throw new Exception('Could not save user role record');
        }

        DB::commit();
    } catch (QueryException $e) {
        DB::rollBack();
        $type = 'error';
        $message = 'Database query error: ' . $e->getMessage();
    } catch (Exception $e) {
        DB::rollBack();
        $type = 'error';
        $message = $e->getMessage();
    }

    return json_encode(['type' => $type, 'message' => $message]);
}
    


    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    



}
