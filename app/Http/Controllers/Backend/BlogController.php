<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Blog;

class BlogController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$blogs = Blog::all();
		return view('backend.BlogManagement.blog_list',compact('blogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.BlogManagement.add_blog');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$public_path = 'backend/images/BlogImages';
		$fullImagePath = null;
		if($request->hasfile('image')){
			$image = $request->file('image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$blog_insert = new Blog;
		$blog_insert->title	 = $request->title;
		$blog_insert->tag = $request->blogtag;
		$blog_insert->blogimage = isset($request->image) ? $fullImagePath : '';
		$blog_insert->description = $request->blog_desc;
		$blog_insert->url_alias = $request->url_alias;
		$blog_insert->status = isset($request->status) ? ($request->status ) : '0';
		$result = $blog_insert->save();
		if($result){
			return redirect('admin/blogManagement')->with('success_msg', 'Blog Insert successfully.');
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
		$blog = Blog::find($id);
		return view('backend.BlogManagement.edit_blog',compact('blog'));
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
		$public_path = 'backend/images/BlogImages';
		$fullImagePath = null;
		if($request->hasfile('image')){
			$image = $request->file('image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}
		$blog_update = Blog::find($id);
		$blog_update->title	 = $request->title;
		$blog_update->tag = $request->blogtag;
		if(isset($request->image) && !empty($fullImagePath)){
			$blog_update->blogimage = $fullImagePath;
		}
		$blog_update->description = $request->blog_desc;
		$blog_update->url_alias = $request->url_alias;
		$blog_update->status = isset($request->status) ? ($request->status ) : '0';
		$result = $blog_update->save();
		if($result){
			return redirect('admin/blogManagement')->with('success_msg', 'Blog Update successfully.');
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
		$Blog = Blog::find($id)->delete();
		if($Blog){
			$message = 'Blog deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
