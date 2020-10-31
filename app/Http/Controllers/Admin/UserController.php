<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = User::orderBy('id','DESC')->paginate(3);
        return view('admin/user/list',compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'is_admin' => 'required',
          

        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->is_admin = $request->input('is_admin');
        $user->status = $request->input('status');
        $password = $request->input('password');
        $user->password = Hash::make($password);
        if($request->hasFile('img')){
            $filename = rand(1,9999).rand(1,5555);
            $file = $request->file('img');
            $file->move(public_path().'/images/', $filename.'_img'.'.'.$file->getClientOriginalExtension());
            $img_path = $filename.'_img'.'.'.$file->getClientOriginalExtension();
        }
        $user->img = $img_path;
        $user->save();
         return redirect()->route('userlist')->with('message','User Created Successfully!'); 
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
        
        $user = User::Where('id',$id)->first();
        return view('admin/user/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'is_admin' => 'required',
          

        ]);
        $id = $request->input('id');
        $user = User::Where('id',$id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->is_admin = $request->input('is_admin');
        $user->status = $request->input('status');
        if($request->input('password')){
            $password = $request->input('password');
            $user->password = Hash::make($password);
        }
        if($request->hasFile('img')){
            $image = $file = $request->file('img');
            $imageName = $image->getClientOriginalName();
            $fileName = $this->generateUid(10).$this->generateUid(10);
            $directory = public_path().'/images/';
            $imageUrl = $directory.$fileName.'.'.$image->getClientOriginalExtension();
            // unlink($imageUrl);
            $oldimg = $user->img;
            $oldimgFullPath = $directory.$oldimg;
            // dd($oldimgFullPath);
            unlink($oldimgFullPath);
            $file->move(public_path().'/images/', $fileName.'_img'.'.'.$file->getClientOriginalExtension());
            $img_path = $fileName.'_img'.'.'.$file->getClientOriginalExtension();
            $user->img = $img_path;

        }
        $user->save();
         return redirect()->route('userlist')->with('message','User Updated Successfully!'); 
    }

    function generateUid($length){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
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
