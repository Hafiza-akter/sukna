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
            $user = $superadmin;
            $is_admin = 1;
            session(['user' => $user,'is_admin'=>$is_admin]);
            return redirect()->route('home')->with('message','Login Success!');

        }else{
            $is_admin = 0;
            $user = User::where('username',$email)
                        ->first();
            if(!$user || (!Hash::check($password,$user->secret))){
                return redirect()->back()->with('message','Incorrect username or password!');
            }
            else{
                session(['user' => $user,'is_admin'=>$is_admin,'message'=>'Login Success']);
                // return view('admin/home',compact('user'));
                return redirect()->route('home')->with('message','Login Success!');
            }
               
        }
    }

    public function message(Request $request){
        // $rules = array(
        //     'custom_message' => 'required_without:user_slide_image',
        //     'user_slide_image' => 'required_without:custom_message',
        // );
        // $validateData = $request->validate([
        //     'custom_message' => 'required_without:user_slide_image',
        //     'user_slide_image' => 'required_without:custom_message',
        // ]);
        $id = $request->input('id');
        $customMessage = $request->input('custom_message');
        $user = User::Where('id',$id)->first();
        $user->user_slide_description = $customMessage;
        $oldImage = $user->user_slide_image;
        if($request->hasFile('user_slide_image')){
            if($oldImage){
                $oldImage = $oldImage;
                unlink($oldImage);
            }
            $file = $request->file('user_slide_image');
            $filename = rand(1,9000);
            $file->move(public_path().'/images/',$filename.'_slideimg'.'.'.$file->getClientOriginalExtension());
            $path = $filename.'_slideimg'.'.'.$file->getClientOriginalExtension();
            $imgfullPath = 'images/'.$path; 
            $user->user_slide_image = $imgfullPath;
        }
        $user->save();
        return back();

    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }

    public function home(){
        $userId = Session()->get('user.id');
        $user = User::where('id',$userId)->first();
        return view('admin/home',compact('user'));
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
