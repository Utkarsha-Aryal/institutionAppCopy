<?php

namespace App\Http\Controllers\Backpanel;

use App\Models\backend\dashbord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function signin(){
        return view('backend.signin.signin');
    }
    public function index(){
        return view('backend.dashboard.index');
    }
    
    public function about() {
        $data = dashbord::getData();
        return view('backend.about.about', ['data' => $data]);
    }
    
    
    // public function page1(){
    //     return view('backend.pages.page1');
    // }
    // public function page2(){
    //     return view('backend.pages.page2');
    // }
    // public function page3(){
    //     return view('backend.pages.page3');
    // }
    public function savaAboutus(Request $request){
        try {
            $type = 'success';
            $message = 'Records saved successfully';
            $post = $request->all();
            DB::beginTransaction();
            $result = dashbord::savaAboutus($post);
            if (!$result) {
                throw new Exception('Could not save record', 1);
            }
            DB::commit();
            } catch (QueryException $e) {
            DB::rollBack();
            $type = 'error';
            $message = $this->queryMessage;
            } catch (Exception $e) {
            DB::rollBack();
            $type = 'error';
            $message = $e->getMessage();
            }
            return redirect()->route('admin.about');
        }
}
