<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;
use App\Member;
class WebsiteController extends Controller
{
	public function add(Request $request)
	{
		$explode    = explode("-", $request->title);
		$page_title = $explode[0];

		$array = [
			'title'=>$page_title,
			'url'  =>$request->url,
			'member_id'=>$request->member_id,
		];

		Website::create($array);

		return ['status'=>'success','code'=>200];
	}

	public function list_api($id)
	{
    	$array = [];
    	$data = Website::where('member_id',$id)->latest()->get();
    	foreach ($data as $field) {
    		$member = Member::where('id',$id)->first();
    		array_push($array, [
    			'id'=>$field->id,
    			'title'=>$field->title,
    			'url'=>$field->url,
    			'created_at'=>$this->custom_date($field->created_at),
    		]);
    	}

    	return ['list'=>$array];
    }  

    public function custom_date($created_at)
    {
    	$day        = $created_at->format("D");
        $date_first = $created_at->format("d");
        $month      = $created_at->format("M");
        $year       = $created_at->format("Y");
        $time       = $created_at->format("H:i");
        return $day.",".$date_first." ".$month." ".$year.",".$time." WIB";
    }

    public function delete($id)
    {
        Website::destroy($id);

        return ['status'=>'success','code'=>200];
    }  
}
