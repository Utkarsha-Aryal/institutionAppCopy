<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreatedMail;




class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

     
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function updatepassword($post)
    {
        // dd($post);
        try {
            $user = User::where('id', auth()->id())->first();
          //  dd($user);
            if (!Hash::check($post['current_password'], $user->password)) {
                throw new Exception('The current password is incorrect.');
            }
            // dd($post['current_password']);
            if ($post['password'] !== $post['confirm_password']) {
                throw new Exception('The new password and confirm password do not match.');
            }
            $user->password = Hash::make($post['password']);
            $user->first_time_login = 1;
            if (!$user->save()) {
                throw new Exception('Password is not updated.');
            }
            // dd($user);
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    
     public static function list($post)
    {
        try {
            $role_id = auth()->check() ? auth()->user()->role_id : null;
    
            if ($role_id == 1) {
                // Fetch users with role_id 2 and status 'y'
                $query = User::where('role_id', 2)
                             ->where('status', 'y')
                             ->get();
            } elseif ($role_id == 2) {
                // Fetch users with role_id 3 and status 'y'
                $query = User::where('role_id', 3)
                             ->where('status', 'y')
                             ->get();
            } else {
                $query = collect(); // Return an empty collection if no matching role_id
            }
    
            return $query;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
     
    
        public static function saveRegistration($post)
        {
          
        try {
            $password = Str::random(8);
    
            // Prepare data array
            $create = [
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => Hash::make($password),
                'role_id' => $post['role'],
            ];
            $update = [
                'name' => $post['name'],
                'email' => $post['email'],
                'role_id' => $post['role'],
            ];
    
            if (!empty($post['id'])) {
                
                $dataArray['updated_at'] = Carbon::now();
                $user = User::where('id', $post['id'])->first();
                if ($user) {
                    $user->update($update);
                
                } else {
                    throw new Exception("User not found", 1);
                }
            } else {
                
                
                $dataArray['created_at'] = Carbon::now();
                $user = User::create($create);
                if (!Mail::to($post['email'])->send(new AccountCreatedMail($password, $post))) {
                    throw new Exception("Could't send mail", 1);
                } 
            }
    
            return $user;




        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function saveData($post)
    {
       
        try {
            $password = Str::random(8);
    
            // Prepare data array
            $dataArray = [
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => Hash::make($password),
                'role_id' => $post['role'],
            ];
    
            if (!empty($post['id'])) {
                $dataArray['updated_at'] = Carbon::now();
                $user = User::where('id', $post['id'])->first();
                if ($user) {
                    $user->update($dataArray);
                
                } else {
                    throw new Exception("User not found", 1);
                }
            } else {
                
                $dataArray['created_at'] = Carbon::now();
               
                $user = User::create($dataArray);
                
            }
    
            return $user;




        } catch (Exception $e) {
            throw $e;
        }
    }
}



