<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Models\TrainerCategories;

class TrainerController extends Controller
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
		$trainers = [];
		$roleId = 3;
		$trainers = $this->User->getData($roleId);
		return view('backend.TrainerManagement.list',compact('trainers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.TrainerManagement.add');
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
			'name' => 'required',
			'surname' => 'required',
			'email' => 'required|email',
			'contact_no' => 'nullable|numeric|min:10',
			'gender' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'name.required' => 'Name is required.',
			'surname.required' => 'Please Enter surname',
			'email.required' => 'Please Enter Email',
			'email.email' => "Please Enter Valid Email",
			'contact_no.numeric' => "Please enter valid contact number",
			'status.required' => 'Please select status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$this->User->role_id        = 3;
		$this->User->name           = trim($request->name);
		$this->User->sur_name       = trim($request->surname);
		$this->User->email          = trim($request->email);
		$this->User->contact_no     = trim($request->contact_no);
		$this->User->password       = bcrypt($request->name);
		$this->User->gender         = $request->gender;
		$this->User->status         = $request->status;
		$result = $this->User->save();  // save data

		if($result){
			return redirect('admin/trainerManagement')->with('success_msg', 'Trainer added successfully.');
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
		$trainer_view = User::find($id)->toArray();
		$skils = json_decode($trainer_view['trainer_skils']);
		$trainer_categories = array();
		if(!empty($skils)){
			foreach($skils as $val){
				$trainer_categories[] = TrainerCategories::where('trainer_cat_id',$val)->get()->toArray();
			}
		}
		return view('backend.TrainerManagement.trainer_view',compact('trainer_view','trainer_categories'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$trainer= User::find($id);
		return view('backend.trainerManagement.edit')->with('trainer', $trainer);
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
			'name' => 'required',
			'surname' => 'required',
			'contact_no' => 'nullable|numeric|min:10',
			'gender' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'name.required' => 'Name is required.',
			'surname.required' => 'Please Enter surname',
			'contact_no.numeric' => "Please enter valid contact number",
			'status.required' => 'Please select status',
		);
		 if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$updatetrainer = User::find($id);        
		$updatetrainer->name           = trim($request->name);
		$updatetrainer->sur_name       = trim($request->surname);
		$updatetrainer->contact_no     = trim($request->contact_no);
		$updatetrainer->gender         = $request->gender;
		$updatetrainer->status         = $request->status;
		$result = $updatetrainer->save();  // Update data

		if($result){
			return redirect('admin/trainerManagement')->with('success_msg', 'Trainer Update successfully.');
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
		$Trainer = User::find($id)->delete();
		if($Trainer){
			Session::flash('success_msg', 'Trainer delete successfully!');
			$status = true;
		}else{
			Session::flash('error_msg', 'Problem was occured.Please try again.....');
			$status = false;
		}
		return response()->json(['status' => $status]);
	}

	public function apporved($id)
	{
		$updatetrainer = User::find($id);        
		$updatetrainer->tranier_approved = "1";
		$result = $updatetrainer->save(); 
		if($result){
			return redirect('admin/trainerManagement')->with('success_msg', 'Trainer Approved successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}
}
