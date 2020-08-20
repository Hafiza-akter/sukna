<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\FfwcStation;
use App\Model\UserStation;
use App\Model\Location;
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
        $userList = User::orderBy('id','DESC')->paginate(5);
        return view('admin/user/list',compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $locations = Location::all();
        $ffwcStations = FfwcStation::all();
        return view('admin/user/create',compact('roles','locations','ffwcStations'));
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
            'role_id' => 'required',
            'location_id' => 'required',
            'email' => 'required',
            'ffwc_sations' => 'required',
            'zoom_level' => 'required',

        ]);
        $user = new User();
        $user->username = $request->input('email');
        $password = $request->input('password');
        $user->secret = Hash::make($password);
        $user->user_loc_level = $request->input('user_loc_level');
        $user->role_id = $request->input('role_id');
        $user->location_id = $request->input('location_id');
        $user->zoom_level = $request->input('zoom_level');
        $user->user_slide_description = $request->input('user_slide_description');
        $user->save();
        $userId = $user->id;
        $ffwc_sations = $request->input('ffwc_sations');
        foreach($ffwc_sations as $ffwc_sation){
            $userStation = new UserStation();
            $userStation->user_id = $userId;
            $userStation->ffwc_stations_id = $ffwc_sation;
            $userStation->save();
        }
        
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
        $roles = Role::all();
        $locations = Location::all();
        $ffwcStations = FfwcStation::all();
        $userStations = UserStation::where('user_id',$id)->pluck('ffwc_stations_id')->toArray();
        // dd((array)$userStations);
        $user = User::Where('id',$id)->first();
        return view('admin/user/edit', compact('user','roles','locations','ffwcStations','userStations'));
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
            'role_id' => 'required',
            'location_id' => 'required',
            'email' => 'required',
            'ffwc_sations' => 'required',
            'zoom_level' => 'required',
        ]);
        $id = $request->input('id');
        $user =  User::where('id',$id)->first();
        $user->username = $request->input('email');
        $password = $request->input('password');
        $user->secret = Hash::make($password);
        $user->user_loc_level = $request->input('user_loc_level');
        $user->role_id = $request->input('role_id');
        $user->location_id = $request->input('location_id');
        $user->zoom_level = $request->input('zoom_level');
        $user->user_slide_description = $request->input('user_slide_description');
        $user->save();

        $ffwc_sations = $request->input('ffwc_sations');
        $userStation = UserStation::where('user_id',$id)->delete();
        foreach($ffwc_sations as $ffwc_sation){
            $userStation = new UserStation();
            $userStation->user_id = $id;
            $userStation->ffwc_stations_id = $ffwc_sation;
            $userStation->save();
        }

         return redirect()->route('userlist')->with('message','User Updated Successfully!'); 

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
