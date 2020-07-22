<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Models\UserTrainerActivity;

class DashboardController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		return view('trainer.dashboard');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	public function UserandTrainerActivity(Request $request){

		$users = User::where('role_id','!=',"1")->get()->toArray();
		$usertrainer = UserTrainerActivity::find(1)->toArray();
		return view('backend.usertraineractivity',compact('users','usertrainer'));
	}

	public function saveUserandTrainerActivity(Request $request){
		$id = json_encode($request->id);
		$UserTrainerActivity = UserTrainerActivity::find(1);
		$UserTrainerActivity->user_id = $id;
		$UserTrainerActivity->save();
		if($UserTrainerActivity){
            $message = 'UserAndTrainerActivity updated successfully!';
            $status = true;
        }else{
            $message = 'Please try again';
            $status = false;
        }
       return response()->json(['status' => $status,'message' => $message]);
	}
}