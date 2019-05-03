<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function index()
    {
    	$data = Slide::latest()->get();
    	return view('slides.index',compact('data'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required',
    		'description'=>'required',
    		'image_slide'=>'required'
    	]);

    	if ($request->hasFile('image_slide')) {
    		$file = $request->file('image_slide');

    		if ($request->hasFile('image_slide')) {
	    		$file   = $request->file('image_slide');
	    		$name   = "slider_".uniqid().".".$file->getClientOriginalExtension();
	    		$folder = public_path('images/slides/');
	    		$file->move($folder,$name);

	    		Slide::create([
	    			'title'       =>$request->title,
	    			'description' =>$request->description,
	    			'image_slide'=>$name,
	    		]);

	    		return redirect()->route('slide.index')->with('message','Berhasil Menambahkan Slide');
	    	}
    	}
	}

	public function delete($id)
	{
		Slide::destroy($id);
		return back()->withMessage('Berhasil Menghapus Slide');
	}

	public function edit($id)
	{
		$data = Slide::where('id',$id)->first();
		return view('slides.edit',compact('data'));
	}

	public function update(Request $req,$id)
	{
		$this->validate($req,[
    		'title'=>'required',
    		'description'=>'required',
    		'image_slide'=>'image|max:2048',
    	]);

    	$obj = Slide::where('id',$id);

    	if ($req->hasFile('image_slide')) {
    		$file   = $req->file('image_slide');
    		$name   = "slider_".uniqid().".".$file->getClientOriginalExtension();
    		$folder = public_path('images/slides/');
    		$file->move($folder,$name);

    		$old_file = $obj->first();
    		// unlink($folder.$old_file->image_slider);
    		$obj->update([
    			'title'       =>$req->title,
    			'description' =>$req->description,
    			'image_slide'=>$name,
    		]);

    	}else{
    		$obj->update([
    			'title'       =>$req->title,
    			'description' =>$req->description,
    		]);
    	}

    	return redirect()->route('slide.index')->with('message','Success Mengubah Slide');
	}

    public function list_api()
    {
        $array_big = [];
        $data = Slide::all();
        foreach ($data as $field) {

            array_push($array_big, [
                'id'=>$field->id,
                'title'=>$field->title,
                'image_slide'=>'http://192.168.43.229:8888/framework/ecodev_final/public/images/slides/'.$field->image_slide,
                // 'image_slider'=>public_path('images/slider/'.$field->image_slider),
                // 'image_slider' =>asset('images/slider/'.$field->image_slide),
                'description'=>$field->description,
            ]);
        }
        return ['list'=>$array_big];
    }
}
