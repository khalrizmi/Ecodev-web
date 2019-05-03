<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Words;
class WordsController extends Controller
{
    public function index()
    {
    	$data = Words::latest()->get();
    	return view('words.index',compact('data'));
    }

    public function store(Request $req)
    {
    	$this->validate($req,['words'=>'required']);

    	Words::create($req->all());
    	return redirect()->route('words.index')->withMessage('Berhasil menambahkan Kata');
    }

    public function delete($id)
    {
    	Words::destroy($id);
    	return back()->withMessage('Berhasil menghapus Kata');
    }
}
