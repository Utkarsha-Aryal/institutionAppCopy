<?php

namespace App\Models;
use Exception;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;
    public static function checkOtp($post)
    {
        try {
            $otp = Otp::where('user_id', $post['id'])->first(['otp']);
            if ($otp && $otp->otp === $post['otp']) { 
        
                return true;
            } else {
                throw new Exception("OTP does not matched");
            }

            return false;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
