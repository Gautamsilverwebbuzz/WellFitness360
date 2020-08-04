<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Eshop;

class EshopController extends Controller
{
	public function __construct(){
		$this->Eshop = new Eshop;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		$ShopList = Eshop::all();
		return view('backend.E-ShopManagement.list',compact('ShopList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('backend.E-ShopManagement.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'Name' => 'required',
			'Image' => 'required',
			'Shop_URL' => 'required',
		];

		$message = [
			'Name.required' => 'required',
			'Image.required' => 'Please select shop image',
			'Shop_URL.required' => 'required',
		];

		if($this->validate($request, $rules, $message) === FALSE){
			return redirect()->back()->withInput();
		}

		// Shop Image upload
		$public_path = 'backend/images/ShopImages';
			$fullImagePath = null;
			if($request->hasfile('Image')){
				$image = $request->file('Image');
				$name =  time().$image->getClientOriginalName();
				$image->move(public_path($public_path),$name);
				$fullImagePath = $public_path.'/'.$name;
			}

		$save = Eshop::create([
			'Name'          => trim($request->Name),
			'Description'   => isset($request->Description) ? trim($request->Description) : '',
			'Image'         => isset($request->Image) ? $fullImagePath : '',
			'Shop_URL'      => trim($request->Shop_URL),
			'Status'        => isset($request->Status) ? 1 : 0
		]);

		if($save){
			return redirect('admin/E_shopManagement')->with('success_msg', 'E-Shop Added successfully!');
		}else{
			return redirect()->back()->withInput();
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
		$shopData = Eshop::find($id);
		return view('backend.E-ShopManagement.edit',compact('shopData'));
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
		$rules = [
			'Name' => 'required',
			'Shop_URL' => 'required',
		];

		$message = [
			'Name.required' => 'required',
			'Shop_URL.required' => 'required',
		];

		if($this->validate($request, $rules, $message) === FALSE){
			return redirect()->back()->withInput();
		}

		// Shop Image upload
		$public_path = 'backend/images/ShopImages';
		$fullImagePath = null;
		if($request->hasfile('Image')){
			$image = $request->file('Image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}

		// Create object of model class / Update record
		$shopData = Eshop::find($id);
		$shopData->Name         = trim($request->Name);
		$shopData->Description  = isset($request->Description) ? trim($request->Description) : '';
		if(isset($request->Image) && !empty($fullImagePath)){
			$shopData->Image        = $fullImagePath;
		}
		$shopData->Shop_URL     = trim($request->Shop_URL);
		$shopData->Status       = isset($request->Status) ? 1 : 0;
		$update                 = $shopData->save();
		if($update){
			return redirect('admin/E_shopManagement')->with('success_msg', 'E-Shop detail updated successfully!');
		}else{
			return redirect()->back()->withInput();
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
		$Eshop = Eshop::find($id)->delete();
		if($Eshop){
			$message = 'Shop deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
