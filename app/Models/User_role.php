<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;

class User_role extends Model
{
    use HasFactory;
    protected $fillable = ['role_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public static function saveData($post)
    {


        try {
            $password = Str::random(8);
    
           
            $dataArray = [
                'user_id' => $post['id'],
                'role_id' => $post['role'],
                'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
               
            ];
            
    
            if (!empty($post['id'])) {
                $dataArray['updated_at'] = Carbon::now();
                $user = User_role::where('id', $post['id'])->first();
                if ($user) {
                    // updates
                    $user->update($dataArray);
                    return $user;
                } else {
                    // new user 
                $dataArray['created_at'] = Carbon::now();
                $user = User_role::create($dataArray);
                return $user;
                }
            } else {
                throw new Exception("User ID is required for creating a user role", 1);
                
            }
    

        } catch (Exception $e) {
            throw $e;
        }
    }
}

