<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        if($email == $superadmin && $sadmin_password == $password){
            $user = array("username"=>$superadmin);
            $userType = 'admin';
            Session::put(['user'=>$user,'userType'=>$userType]);
            // session(['user' => $user]);
            return view('admin/home',compact('userType'))->with('message','Login Success!');
        }else{
                $user = User::where('username',$email)
                            ->first();
                if(!$user || (!Hash::check($password,$user->secret))){
                    return redirect()->back()->with('message','Incorrect username or password!');
                }
                else{
                    // dd($user);
                    Session::put('user', $user);
                    $userType = 'normal';
                    return view('admin/home',compact('userType','user'))->with('message','Login Success!');
                }
               
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
    public function update(Request $request, $id)
    {
        //
    }

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
