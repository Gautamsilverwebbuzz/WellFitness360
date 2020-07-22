<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Models\TrainerCategories;

class TrainerCategoriesController extends Controller
{
	public function __construct(){
		$this->Categories = new TrainerCategories;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$showcat = $this->Categories->get_categories();
		return view('backend.TrainercategoriesManagement.list',compact('showcat'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categoryList = $this->Categories->get_category_select_list();
		return view('backend.TrainercategoriesManagement.add',compact('categoryList'));
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
			'categoryList' => 'required',
			'trainer_cat_name' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'categoryList.required' => 'Please select paranet categories.',
			'trainer_cat_name.required' => 'Please enter categories name',
			'status.required' => 'Please select status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$this->Categories->trainer_cat_name        = trim($request->trainer_cat_name);
		$this->Categories->par_cat_id      = $request->categoryList;
		$this->Categories->status          = $request->status;
		$saveCategories= $this->Categories->save();  // save data
		if($saveCategories){
			return redirect('trainercategoriesManagement')->with('success_msg', 'Trainer categories added successfully.');
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
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$RowData = $this->Categories->get_edit_row_data($id);
		$categoryList = $this->Categories->get_category_select_list();
		return view('backend.TrainercategoriesManagement.edit',compact('RowData','categoryList'));
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
			'categoryList' => 'required',
			'trainer_cat_name' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'categoryList.required' => 'Please select paranet categories.',
			'trainer_cat_name.required' => 'Please enter categories name',
			'status.required' => 'Please select status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$update = TrainerCategories::where('trainer_cat_id', $id)
				->update(
					[
						'trainer_cat_name' => trim($request->trainer_cat_name),
						'par_cat_id' => $request->categoryList,
						'status' => $request->status
					]
				);
		if($update){
			return redirect('trainercategoriesManagement')->with('success_msg', 'Trainer Categories Update successfully.');
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
	public function destroy($id){
		$checkcategory = $this->Categories->checkparentcategory($id);
		if(!$checkcategory){
			$delete = TrainerCategories::where('trainer_cat_id',$id)->delete();
			if($delete){
				return redirect('trainercategoriesManagement')->with('success_msg', 'Trainer Categories Delete Successfully');
			}else{
				return redirect('trainercategoriesManagement')->with('error_msg', 'Something wrong Please try again.');
			}
		}else{
			return redirect('trainercategoriesManagement')->with('error_msg', 'This is a Parent Categories do not Direct Delete. Please delete first Child Categories..');
		}
	}
}
