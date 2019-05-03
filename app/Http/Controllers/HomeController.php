<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Survey;
use App\Member;
use App\Words;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::count();
        $sur = Survey::count();
        $mem = Member::count();
        $wor = Words::count();

        $array = [];
        $survey = Survey::latest()->paginate(5);
        foreach ($survey as $field) {
            $member = Member::where('id',$field->member_id)->first();
            array_push($array, [
                'id'=>$field->id,
                'name'=>$member->name,
                'email'=>$member->email,
                'photo'=>$member->photo,
            ]);
        }
        
        return view('example.dashboard',compact('cat','sur','mem','wor','array'));
    }
}
