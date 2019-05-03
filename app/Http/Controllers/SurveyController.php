<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Objek;
use App\Member;
class SurveyController extends Controller
{
    public function index()
    {
        $array = [];
        $old = Survey::latest()->get();
        foreach ($old as $field) {
            $member = Member::where('id',$field->member_id)->first();
            $objek  = Objek::where('survey_id',$field->id)->count();
            array_push($array, [
                'id'=>$field->id,
                'name'=>$member->name,
                'photo'=>$member->photo,
                'objek'=>$objek,
                'latitude'=>$field->latitude,
                'longtitude'=>$field->longtitude,
                'temperature'=>$field->temperature,
                'place_name'=>$field->place_name,
                'state'=>$field->state,
                'address'=>$field->address,
                'created_at'=>$field->created_at
            ]);
        }

        return view('survey.index',compact('array'));
    }

    public function objek_list($id)
    {
        $survey = Survey::where('id',$id)->first(); 
        $data   = Objek::where('survey_id',$id)->latest()->get();
        $member = Member::where('id',$survey->member_id)->first();

        return view('survey.survey_detail',compact('survey','data','member'));
    }

    public function store(Request $request)
    {
    	$id = Survey::create([
    		'member_id'=>$request->member_id,
    		'longtitude'=>$request->longtitude,
    		'latitude'=>$request->latitude,
    		'temperature'=>$request->temperature,
    		'sea_level'=>$request->sea_level,
    		'place_name'=>$request->place_name,
    		'address'=>$request->address,
    		'state'=>$request->state,
    		'city'=>$request->city,
    	])->id;

    	Objek::where('member_id',$request->member_id)->whereNull('survey_id')->update(['survey_id'=>$id]);

    	return ['status'=>'success','code'=>200];
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

    public function list_api($id)
    {
    	$array = [];
    	$data = Survey::where('member_id',$id)->latest()->get();
    	foreach ($data as $field) {
    		$objek_count = Objek::where('survey_id',$field->id)->count();
    		if ($field->place_name == null) {
    			$place = "Daerah";
    		}else{
    			$place = $field->place_name;
    		}
    		array_push($array,[
    			'id'=>$field->id,
    			'longtitude'=>$field->longtitude,
    			'latitude'=>$field->latitude,
    			'temperature'=>$field->temperature,
    			'sea_level'=>$field->sea_level,
    			'place_name'=>$place,
    			'address'=>$field->address,
    			'objek_count'=>$objek_count,
    			'created_at'=>$this->custom_date($field->created_at),
    		]);
    	}

    	return ['list'=>$array];
    }

    public function list_maps_user($as,$string_data)
    {
    	$array = [];
    	if ($as == "all") {
    		$data = Survey::latest()->get();
    	}elseif ($as == "province") {
    		$data = Survey::where('state',$string_data)->latest()->get();
    	}elseif ($as == "around") {
    		$data = Survey::where('place_name',$string_data)->latest()->get();
    	}else{
            $data = Survey::latest()->get();
        }

    	foreach ($data as $field) {
    		$member = Member::where('id',$field->member_id)->first();
    		if ($field->place_name == null) {
    			$place = "Tidak diketahui";
    		}else{
    			$place = $field->place_name;
    		}
    		array_push($array,[
    			'id'=>$field->id,
    			'longtitude'=>$field->longtitude,
    			'latitude'=>$field->latitude,
    			'name'=>$member->name,
    			'email'=>$member->email,
    			'photo'=>$member->photo,
    			'member_id'=>$member->id,
    			'city'=>$field->city,
    			'place_name'=>$place,
    			'address'=>$field->address,
    			'created_at'=>$this->custom_date($field->created_at),
    		]);
    	}

    	return ['list'=>$array];
    }
}
