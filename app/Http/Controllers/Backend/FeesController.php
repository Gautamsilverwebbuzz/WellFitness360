<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Models\FeesManagement;
use Illuminate\Support\Facades\Session;

class FeesController extends Controller
{

	public function __construct(){
		$this->User = new User;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$fees = FeesManagement::with('Trainer')->get();
		return view('backend.FeesManagement.list',compact('fees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$trainers = [];
		$roleId = 3;
		$trainers = $this->User->getData($roleId);
		return view('backend.FeesManagement.add',compact('trainers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = array(
			'trainername' => 'required',
			'trainerfee' => 'required',
			'admidfee' => 'required',
		);
		$messages = array(
			'trainername.required' => 'Please Select TrainerName.',
			'trainerfee.required' => 'Please Enter trainerfee.',
			'admidfee.required' => 'Please Enter admidfee.',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$Fees = new FeesManagement();
		$Fees->TrainerID = $request->trainername;
		$Fees->TrainerFee = $request->trainerfee;
		$Fees->AdminFee = $request->admidfee;
		$Fees->TotalAmount = $request->trainerfee + $request->admidfee;
		$result = $Fees->save();  // save data

		if($result){
			return redirect('admin/FeesManagement')->with('success_msg', 'Fees added successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
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
		$trainers = [];
		$roleId = 3;
		$trainers = $this->User->getData($roleId);
		$fees= FeesManagement::find($id);
		return view('backend.FeesManagement.edit')->with(array('fees'=>$fees,'trainers'=>$trainers));
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
		$rules = array(
			'trainername' => 'required',
			'trainerfee' => 'required',
			'admidfee' => 'required',
		);
		$messages = array(
			'trainername.required' => 'Please Select TrainerName.',
			'trainerfee.required' => 'Please Enter trainerfee.',
			'admidfee.required' => 'Please Enter admidfee.',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$Fees = FeesManagement::find($id);
		$Fees->TrainerID = $request->trainername;
		$Fees->TrainerFee = $request->trainerfee;
		$Fees->AdminFee = $request->admidfee;
		$Fees->TotalAmount = $request->trainerfee + $request->admidfee;
		$result = $Fees->save();  // save data

		if($result){
			return redirect('admin/FeesManagement')->with('success_msg', 'Fees Updated successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$Fees = FeesManagement::find($id)->delete();
		if($Fees){
			Session::flash('success_msg', 'Fees delete successfully!');
			$status = true;
		}else{
			Session::flash('error_msg', 'Problem was occured.Please try again.....');
			$status = false;
		}
		return response()->json(['status' => $status]);
	}
}
