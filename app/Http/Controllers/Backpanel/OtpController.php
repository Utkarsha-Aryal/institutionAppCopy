<?php

namespace App\Http\Controllers\Backpanel;
use App\Models\Otp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function index(){
        return view('backend.auth.otp');
    }
    public function indexResetPassword(){
        return view('backend.auth.reset_password');
    }

    public function isValidOtp(Request $request)
    {
        try {

            $rules = [
                'otp' => 'required|min:4|max:4',
            ];
            $message = [
                'otp.required' => 'otp field is required',
            ];

            $validate = Validator::make($request->all(), $rules, $message);
            if ($validate->fails()) {
                throw new Exception($validate->errors()->first(), 1);
            }
            $post = $request->all();
            $type = 'success';
            $message = 'Please reset password';
     

            DB::beginTransaction();
            if (!Otp::checkOtp($post)) {
                throw new Exception('Record does not found', 1);
            }
            DB::commit();
        } catch (QueryException $e) {

            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ')->withInput();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
        return redirect('resetpassword')->with('id', $request->id);
    }



}
