<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Subcategories;
use App\Http\Models\Categories;

class SubCategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$subCategories = Subcategories::with('Categories')->get()->toArray();
		return view('backend.SubCategoriesManagement.sub_categories_list',compact('subCategories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$Categories = Categories::where('status','1')->get()->toArray();
		return view('backend.SubCategoriesManagement.add_sub_categories',compact('Categories'));
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
			'categories_name' => 'required',
			'sub_categories_name' => 'required',
			'sub_categories_desc' => 'required',
			'sub_categories_image' => 'required',
			'workout_time' => 'required',
			'what_wiil_do' => 'required',
			'equipment' => 'required',
			'workout_from' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'categories_name.required' => 'Please select categories name.',
			'sub_categories_name.required' => 'Please enter sub categories name.',
			'sub_categories_desc.required' => 'Please enter sub categories description.',
			'sub_categories_image.required' => 'Please select image.',
			'workout_time.required' => 'Please enter workout time.',
			'what_wiil_do.required' => 'Please enter what we will do.',
			'equipment.required' => 'Please enter equipment.',
			'workout_from.required' => 'Please enter workout from.',
			'status.required' => 'Please enter status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}

		$public_path = 'backend/images/SubCategoriesImage';
		$fullImagePath = null;
		if($request->hasfile('sub_categories_image')){
			$image = $request->file('sub_categories_image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$fullvideoPath = null;
		if($request->hasfile('video')){
			$video = $request->file('video');
			$videoname =  time().$video->getClientOriginalName();
			$video->move(public_path($public_path),$videoname);
			$fullvideoPath = $public_path.'/'.$videoname;
		}
		$insertSubCategories = new Subcategories;
		$insertSubCategories->cat_id = $request->categories_name;
		$insertSubCategories->Sub_cat_name = $request->sub_categories_name;
		$insertSubCategories->Sub_cat_description = $request->sub_categories_desc;
		$insertSubCategories->Sub_cat_image = isset($request->sub_categories_image) ? $fullImagePath : '';
		$insertSubCategories->workout_time = $request->workout_time;
		$insertSubCategories->what_will_do = $request->what_wiil_do;
		$insertSubCategories->equipment     = $request->equipment;
		$insertSubCategories->workout_from = $request->workout_from;
		$insertSubCategories->package = $request->package;
		$insertSubCategories->video = isset($request->video) ? $fullvideoPath : '';
		$insertSubCategories->status = isset($request->status) ? ($request->status ) : '0';
		$result = $insertSubCategories->save();
		if($result){
			return redirect('admin/subcategoriesManagement')->with('success_msg', 'Sub Categories Insert successfully.');
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
		$subcategories = Subcategories::find($id);
		$Categories = Categories::where('status','1')->get()->toArray();
		return view('backend.SubCategoriesManagement.edit_sub_categories',compact('subcategories','Categories'));
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
			'categories_name' => 'required',
			'sub_categories_name' => 'required',
			'sub_categories_desc' => 'required',
			'sub_categories_image' => 'image|mimes:jpeg,png,jpg',
			'workout_time' => 'required',
			'what_wiil_do' => 'required',
			'equipment' => 'required',
			'workout_from' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'categories_name.required' => 'Please select categories name.',
			'sub_categories_name.required' => 'Please enter sub categories name.',
			'sub_categories_desc.required' => 'Please enter sub categories description.',
			'sub_categories_image' => 'Allowed only JPG|JPEG|PNG files extension.',
			'workout_time.required' => 'Please enter workout time.',
			'what_wiil_do.required' => 'Please enter what we will do.',
			'equipment.required' => 'Please enter equipment.',
			'workout_from.required' => 'Please enter workout from.',
			'status.required' => 'Please enter status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}

		$public_path = 'backend/images/SubCategoriesImage';
		$fullImagePath = null;
		if($request->hasfile('sub_categories_image')){
			$image = $request->file('sub_categories_image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$fullvideoPath = null;
		if($request->hasfile('video')){
			$video = $request->file('video');
			$videoname =  time().$video->getClientOriginalName();
			$video->move(public_path($public_path),$videoname);
			$fullvideoPath = $public_path.'/'.$videoname;
		}
		$updateSubCategories = Subcategories::find($id);
		$updateSubCategories->cat_id = $request->categories_name;
		$updateSubCategories->Sub_cat_name = $request->sub_categories_name;
		$updateSubCategories->Sub_cat_description = $request->sub_categories_desc;
		if(isset($request->sub_categories_image) && !empty($fullImagePath)){
			$updateSubCategories->Sub_cat_image        = $fullImagePath;
		}
		$updateSubCategories->workout_time = $request->workout_time;
		$updateSubCategories->what_will_do = $request->what_wiil_do;
		$updateSubCategories->equipment     = $request->equipment;
		$updateSubCategories->workout_from = $request->workout_from;
		$updateSubCategories->package = $request->package;
		if(isset($request->video) && !empty($fullImagePath)){
			$updateSubCategories->video        = $fullImagePath;
		}
		$updateSubCategories->status = isset($request->status) ? ($request->status ) : '0';
		$result = $updateSubCategories->save();
		if($result){
			return redirect('admin/subcategoriesManagement')->with('success_msg', 'Sub Categories update successfully.');
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
		$SubCategories = Subcategories::find($id)->delete();
		if($SubCategories){
			$message = 'Sub Categories deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
