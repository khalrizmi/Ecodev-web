<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Hash;
class MemberController extends Controller
{
    public function index()
    {
        $data = Member::latest()->get();
        return view('member.index',compact('data'));
    }

    public function login(Request $request)
    {
    	$obj = Member::where('email',$request->email);
    	if ($obj->count() > 0) {
    		$data = $obj->first();
    		return [
    			'status'=>'available',
    			'data'=>[
    				'id'    =>$data->id,
    				'email' =>$data->email,
    				'name'  =>$data->name,
    			],
    		];
    	}else{
    		$id = Member::create([
    			'email'=>$request->email,
    			'name' =>$request->name,
    			'password'=>Hash::make($request->password),
    			'photo'=>$request->photo,
    		])->id;

    		return [
    			'status'=>'success',
    			'data'=>[
    				'id'    =>$id,
    				'email' =>$request->email,
    				'name'  =>$request->name,
    			],
    		];
    	}
    }

    public function check($id)
    {
        $check = Survey::where('member_id',$id)->count();
        if ($check > 0) {
            return ['status'=>true];
        }else{
            return ['status'=>false];
        }
    }
}
