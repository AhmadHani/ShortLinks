<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Short;
use DB;
class ShortController extends Controller
{
    public function index(Request $request){
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

			// generate a pin based on 2 * 7 digits + a random character
		$pin = mt_rand(1,10)
    	. mt_rand(1, 10)
    	. $characters[rand(0, strlen($characters) - 1)];

	// shuffle the result
	$string = str_shuffle($pin);

    	
    		if($request->isMethod("post")){
	$this->validate($request,[
		'link'=>"required"
		]);
    		$short = new Short;
    		$short->link = $request->input('link');
    		$short->short = $string;
    		$short->save();
	
    }
$id = DB::table('shorts')->insertGetId(["link"=>$request->input("link")]);
$s = Short::find($id);
    	return view("index",compact("s"));
    
}


	public function redi($shorts){
		$select = Short::where("short",$shorts)->first();

    return redirect($select->link);	
}
}
