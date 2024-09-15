<?php

namespace App\Http\Controllers\Backpanel;
use App\Models\User;
use App\Models\Common;
use App\Models\Role;
use Exception;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_role;


class UserController extends Controller
{
    
    public function index(){
        return view('backend.User.index');
    }

    public function form(Request $request)
{
    try {
        $roles = Role::all(); 
        // Get the authenticated user's role
        $role_id = auth()->check() ? auth()->user()->role_id : null;

        // Initialize an empty array for roles
     

         $role_id = auth()->check() ? auth()->user()->role_id : null;
        if ($role_id === 1) {
            $prevPost['role_id'] = 2;
        } elseif ($role_id === 2) {
            $prevPost['role_id'] = 3;
        } else {
            $prevPost['role_id'] = $role_id; 
        }

        $role = Role::find($prevPost['role_id']);
        $prevPost['role_name'] = $role->role_name ; 
        // Initialize variables
        $post = $request->all();
        $prevPost = [];
        $user = '';
        $userEmail = '';
        $password = '';
        $roleName = '';
        $role_id = '';
        $user_id = '';

        if ($role) {
            $prevPost['role'] = $role->role;
        }

        if (!empty($post['id'])) {
            $prevPost = User_role::with('user', 'role')
                ->where('user_id', $post['id'])
                ->where('status', 'y')
                ->first();

            if ($prevPost) {
                $user = $prevPost->user->name;
                $userEmail = $prevPost->user->email;
                $password = $prevPost->user->password;
                $roleName = $prevPost->role->role;
                $role_id = $prevPost->role->id;
                $user_id = $prevPost->user->id;

                // Set the role based on retrieved `prevPost`
                    // $role = Role::find($role_id);
                    
                } else {
                    

                    throw new Exception("Couldn't find details.", 1);
                }
            }else {

                $role_id = auth()->check() ? auth()->user()->role_id : null;
                if ($role_id === 1) {
                        $assignrole = 2;
                        $assignrolename = "Admin";

                } elseif ($role_id === 2) {
                    $assignrole = 3;
                    $assignrolename = "User";
                } else {
                    throw new Exception("Some error");
                }
        
               
                $roleName =$assignrolename;
                $role_id =$assignrole;
               

            }


        $data = [
            'prevPost' => $prevPost,
            'password' => $password,
            'user' => $user,
            'userEmail' => $userEmail,
            'roleName' => $roleName,
            'role_id' => $role_id,
            'user_id' => $user_id,
            'type' => 'success',
            'message' => 'Successfully retrieved data.'
        ];
    } catch (QueryException $e) {
        $data = [
            'type' => 'error',
            'message' => $this->queryMessage,
        ];
    } catch (Exception $e) {
        $data = [
            'type' => 'error',
            'message' => $e->getMessage(),
        ];
    }

    return view('backend.user.form', $data);
}

   

public function save(Request $request)
{
    $post = $request->all();
    $type = 'success';
    $message = 'Record saved successfully';

    DB::beginTransaction();
    try {
    
       
        $user = User::saveData($post);

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


    

    public function data(Request $request)
        {
            try {
                
                $post = $request->all();
                $data = User::list($post); 

                $array = []; 

                foreach ($data as $index => $row) {            
                    $array[$index] = [
                        "id" => $row->id,
                        "name" => $row->name,
                        "email" => $row->email,
                        "address" => $row->address,
                        "role_id" => $row->role_id,
                        "action" => '
                            <button class="edit-btn" 
                                    data-id="' . $row->id . '">
                                <i class="fa-regular fa-pen-to-square"></i>Edit
                            </button> 
                            <button class="delete-btn" data-id="' . $row->id . '"><i class="fa-solid fa-trash"></i>Delete</button>'
                    ];
                }                
                $recordsTotal = count($data);
                $recordsFiltered = $recordsTotal; 
            } catch (QueryException $e) {
                $array = [];
                $recordsTotal = 0;
                $recordsFiltered = 0;
            } catch (Exception $e) {
                $array = [];
                $recordsTotal = 0;
                $recordsFiltered = 0;
            }
            // dd($array);
            return response()->json([
                "draw" => $post['draw'],
                "recordsTotal" => $recordsTotal,
                "recordsFiltered" => $recordsFiltered,
                "data" => $array
            ]);
        }

        public function delete(Request $request)
    {
        try {
         
            $type = 'success';
            $message = "Record deleted successfully";
    
            $class = new User();
            $post = $request->all();

            DB::beginTransaction();
            $result = Common::deleteSingleData($post, $class, 'N');

            if (!$result) {
                throw new Exception("Record could not be deleted");
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $type = 'error';
            $message = 'Database error: ' . $e->getMessage();
        } catch (Exception $e) {
            DB::rollBack();
            $type = 'error';
            $message = $e->getMessage();
        }

        return response()->json(['type' => $type, 'message' => $message,]);
    }
    
}
