<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objek;
use App\Words;
class ObjekController extends Controller
{
	public function verified($id)
	{
		Objek::where('id',$id)->update(['verified'=>"1"]);
		return ['status'=>'success','code'=>"200"];
	}

    public function store(Request $req)
    {
    	if ($_FILES['photo_objek'] != null) {
    		$new_name = uniqid()."."."jpg";
			$folder   = public_path("images/objek/");
            
            $words    = Words::latest()->get();

            if (count($words) > 0) {
                $explode_obj = explode(" ", $req->name);
                if (count($explode_obj) > 0) {
                    for ($i = 0; $i < count($explode_obj); $i++) { 
                        foreach ($words as $value) {
                            if (strtolower($value->words) == strtolower($explode_obj[$i])) {
                                return ['status'=>'bad_name','code'=>'201'];
                            }
                        }
                    }
                }else{
                    foreach ($words as $value) {
                        if (strtolower($value->words) == strtolower($req->name)) {
                            return ['status'=>'bad_name','code'=>'201'];
                        }
                    }
                }

                $exlode_desc = explode(" ", $req->description);
                if (count($exlode_desc) > 0) {
                    for ($i = 0; $i < count($exlode_desc); $i++) { 
                        foreach ($words as $value) {
                            if (strtolower($value->words) == strtolower($exlode_desc[$i])) {
                                return ['status'=>'bad_desc','code'=>'201'];
                            }
                        }
                    }
                }else{
                    foreach ($words as $value) {
                        if (strtolower($value->words) == strtolower($req->description)) {
                            return ['status'=>'bad_desc','code'=>'201'];
                        }
                    }
                }

                foreach ($words as $field) {
                    $new = str_replace($field->words, "*****", $req->name);   
                    if ($new != $req->name) {
                        return ['status'=>'bad_name','code'=>'201'];
                    }

                    $new = str_replace($field->words, "*****", $req->description);   
                    if ($new != $req->description) {
                        return ['status'=>'bad_desc','code'=>'201'];
                    }
                }

                $sending = Objek::create([
                    'category_id'=>$req->category_id,
                    'member_id'  =>$req->member_id,
                    'name'       =>$req->name,
                    'description'=>$req->description,
                    'photo'      =>$new_name,
                ]);
            }else{
                $sending = Objek::create([
                    'category_id'=>$req->category_id,
                    'member_id'  =>$req->member_id,
                    'name'       =>$req->name,
                    'description'=>$req->description,
                    'photo'      =>$new_name,
                ]);
            }

			if ($sending) {
				move_uploaded_file($_FILES['photo_objek']['tmp_name'], $folder.$new_name);
				return ['status'=>'success','code'=>'200'];
			}else{
				return ['status'=>'error','code'=>'404'];
			}
    	}
    }

    public function list($id)
    {
    	$array = [];
    	$old =  Objek::where('member_id',$id)->whereNull('survey_id')->latest()->get();
    	foreach ($old as $field) {
    		array_push($array, [
    			'id'=>$field->id,
    			'category_id'=>$field->category_id,
    			'survey_id'=>$field->survey_id,
    			'member_id'=>$field->member_id,
    			'name'     =>$field->name,
    			'description'=>$field->description,
    			'photo'=>'http://192.168.43.229:8888/framework/ecodev_final/public/images/objek/'.$field->photo,
    			'verified'=>$field->verified,
    			'created_at'=>$this->custom_date($field->created_at),
    		]);
    	}

    	return ['list'=>$array];
    }

    public function list_survey($id)
    {
        $array = [];
        $old =  Objek::where('survey_id',$id)->latest()->get();
        foreach ($old as $field) {
            array_push($array, [
                'id'=>$field->id,
                'category_id'=>$field->category_id,
                'survey_id'=>$field->survey_id,
                'member_id'=>$field->member_id,
                'name'     =>$field->name,
                'description'=>$field->description,
                'photo'=>'http://192.168.43.229:8888/framework/ecodev_final/public/images/objek/'.$field->photo,
                'verified'=>$field->verified,
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

    public function delete_api($id)
    {
        $objek = Objek::where('id',$id);
        $data  = $objek->first();
        unlink(public_path('images/objek/'.$data->photo));
        $objek->delete();

        return ['status'=>'success','code'=>"200"];
    }
}
