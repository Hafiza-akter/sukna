<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Hash;
use Session;
use Carbon\Carbon;
use App\Model\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/auth/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/auth/registration');
    }
    public function registrationSubmit(Request $request){
        dd('hvgh v');
    }
    public function registration(){
        return view('admin/auth/registration');

    }

    public function loginsubmit(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $superadmin = config('constants.superadmin');
        $sadmin_password = config('constants.superadmin_password');
        // dd('hjbhg');
        if($email == $superadmin && $sadmin_password == $password){
            $user = $superadmin;
            $is_admin = 2;
            session(['user' => $user,'is_admin'=>$is_admin]);
            return redirect()->route('home')->with('message','Login Success!');

        }else{
            // dd('2');
            $user = User::where('email',$email)
                        ->first();
            if(!$user || (!Hash::check($password,$user->password))){
                return redirect()->back()->with('message','Incorrect username or password!');
            }
            else{
                
                $userType = $user->is_admin;
                if($userType == 1){
                    $is_admin = 1;
                }
                else{
                    $is_admin = 0;
                }
                session(['user' => $user,'is_admin'=>$is_admin,'message'=>'Login Success']);
                // return view('admin/home',compact('user'));
                return redirect()->route('home')->with('message','Login Success!');
            }
               
        }
    }



    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }

    public function home(){
        if(Session()->get('is_admin') !=2 ){
            $userId = Session()->get('user.id');
            $user = User::where('id',$userId)->first();
            return view('admin/home',compact('user'));
        }else{
            return view('admin/home');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
