<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Location;
use App\Model\User;

class AjaxController extends Controller
{


     public function getUpazila(Request $request){
        $disrict = $request->input('district');
        $upazilas = Location::select('id','district_name','upazila_name')->where('district_name',$disrict)->get();

        $response = array(
            'status' => 'success',
            'location' => $disrict,
        );
        return response()->json($upazilas); 
    }
     public function getUnion(Request $request){
        $disrict = $request->input('district');
        $upazila = $request->input('upazila');
        $unions = Location::select('id','district_name','union_name','upazila_name')
                            ->where('district_name',$disrict)
                            ->where('upazila_name',$upazila)
                            ->get();

        $response = array(
            'status' => 'success',
            'location' => $disrict,
        );
        return response()->json($unions); 
    }

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $userData = User::where('username',$email)->first();
        if($userData){
            $response = array(
                'status' => 'Already Exist!',
                'email' => $email,
            );
        }
        else{
            $response = array(
                'status' => '&#10004;',
                'email' => $email,
            );
        }
        return response()->json($response); 

    }

    public function oldImageRemove(Request $request)
    {
        $userId = $request->input('userid');
        // dd($userId);
        $user = User::Where('id',$userId)->first();
        $oldImage = $user->user_slide_image;
        unlink($oldImage);
        $user->user_slide_image = null;
        $user->save();
        return ;


    }
}
