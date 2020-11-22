<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
     public function index()
    {
		return view('feedback.feedbackForm');
	}
	public function insert(Request $req)
	{
		if($req->phno){
			$req->validate([
			'name' => 'required',
			'phno' => 'numeric',
			'rate' => 'required',
			'feedback' => 'required',
			'star'=>'required',

			]);
		}
		else
		{
			$req->validate([
			'name' => 'required',
			'rate' => 'required',
			'feedback' => 'required',
			'star'=>'required',
			]);
		}
		
		
		
		
		$fback=new Feedback();
		$fback->name=$req->name;
		$fback->ph_no=$req->phno;
		$fback->rating=$req->rate;
		$fback->star=$req->star;
		$fback->feedback=$req->feedback;
		$fback->save();
		$req->session()->flash('status', 'Thank You For Your Feedback');
        return(redirect('/viewfeedback'));
	}
	public function showfeedback()
	{
		$fback = Feedback::paginate(3);
		//$fback=Feedback::all();
		return view('/feedback/showFeedback')->with('fback',$fback);
	}
}
