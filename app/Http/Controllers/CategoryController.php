<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
    	$data = Category::latest()->get();
    	return view('category.index',compact('data'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required',
    		'icon_category'=>'required'
    	]);

    	if ($request->hasFile('icon_category')) {
    		$file = $request->file('icon_category');

    		if ($request->hasFile('icon_category')) {
	    		$file   = $request->file('icon_category');
	    		$name   = "icon_".uniqid().".".$file->getClientOriginalExtension();
	    		$folder = public_path('images/icon/');
	    		$file->move($folder,$name);

	    		Category::create([
	    			'title'       =>$request->title,
	    			'icon_category'=>$name,
	    		]);

	    		return redirect()->route('category.index')->with('message','Berhasil Menambahkan Category');
	    	}
    	}
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back()->withMessage('Berhasil Menghapus Category');
    }

    public function edit($id)
    {
        $data = Category::where('id',$id)->first();
        return view('category.edit',compact('data'));
    }

    public function update(Request $req,$id)
    {
        $this->validate($req,[
            'title'=>'required',
            'icon_category'=>'image|max:2048',
        ]);

        $obj = Category::where('id',$id);

        if ($req->hasFile('icon_category')) {
            $file   = $req->file('icon_category');
            $name   = "slider_".uniqid().".".$file->getClientOriginalExtension();
            $folder = public_path('images/icon/');
            $file->move($folder,$name);

            $old_file = $obj->first();
            unlink($folder.$old_file->icon_categoryr);
            $obj->update([
                'title'       =>$req->title,
                'icon_category'=>$name,
            ]);

        }else{
            $obj->update([
                'title'       =>$req->title,
            ]);
        }

        return redirect()->route('category.index')->with('message','Berhasil Mengubah Category');
    }

    public function list_api()
    {
        $array_big = [];
        $data = Category::all();
        foreach ($data as $field) {

            array_push($array_big, [
                'id'=>$field->id,
                'title'=>$field->title,
                'icon_category'=>'http://192.168.43.229:8888/framework/ecodev_final/public/images/icon/'.$field->icon_category,
                // 'image_slider' =>asset('images/slider/'.$field->image_slide),
            ]);
        }
        return ['list'=>$array_big];
    }

}
