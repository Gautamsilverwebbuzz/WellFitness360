<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Categories;

class CategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$Categories = Categories::all();
		return view('backend.categoriesManagement.categories_list',compact('Categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.categoriesManagement.add_categories');
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
			'categories_image' => 'required',
			'status' => 'required',
		);
		$messages = array(
			'categories_name.required' => 'Please enter categories name.',
			'categories_image.required' => 'Please enter categories image',
			'status.required' => 'Please select status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}

		$public_path = 'backend/images/CategoriesImage';
		$fullImagePath = null;
		if($request->hasfile('categories_image')){
			$image = $request->file('categories_image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$insertCategories = new Categories;
		$insertCategories->cat_Name = $request->categories_name;
		$insertCategories->cat_description = $request->categories_desc;
		$insertCategories->cat_image = isset($request->categories_image) ? $fullImagePath : '';
		$insertCategories->status = isset($request->status) ? ($request->status ) : '0';
		$result = $insertCategories->save();
		if($result){
			return redirect('admin/categoriesManagement')->with('success_msg', 'Categories Insert successfully.');
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
		$categories = Categories::find($id);
		return view('backend.categoriesManagement.edit_categories',compact('categories'));
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
			'categories_image' => 'image|mimes:jpeg,png,jpg',
			'status' => 'required',
		);
		$messages = array(
			'categories_name.required' => 'Please enter categories name.',
			'categories_image' => 'Allowed only JPG|JPEG|PNG files extension.',
			'status.required' => 'Please select status',
		);

		if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}

		$public_path = 'backend/images/CategoriesImage';
		$fullImagePath = null;
		if($request->hasfile('categories_image')){
			$image = $request->file('categories_image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$updateCategories = Categories:: find($id);
		$updateCategories->cat_Name = $request->categories_name;
		$updateCategories->cat_description = $request->categories_desc;
		if(isset($request->categories_image) && !empty($fullImagePath)){
            $updateCategories->cat_image        = $fullImagePath;
        }
		$updateCategories->status = isset($request->status) ? ($request->status ) : '0';
		$result = $updateCategories->save();
		if($result){
			return redirect('admin/categoriesManagement')->with('success_msg', 'Categories Update successfully.');
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
		$Categories = Categories::find($id)->delete();
        if($Categories){
            $message = 'Categories deleted successfully..';
            $status = true;
        }else{
            $message = 'Please try again';
            $status = false;
        }
        return response()->json(['status' => $status,'message' => $message]);
	}
}
