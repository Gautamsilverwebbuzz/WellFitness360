<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\TrainerCategories;
use App\Http\Models\frontend\TrainerPrice;
use Illuminate\Support\Facades\Validator;
use Session;

class PriceController extends Controller
{

	public function __construct()
	{
		$this->Categories = new TrainerCategories;
		//$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$trainer_prices = TrainerPrice::where('user_id',Session::get('user')['user_id'])->with('trainer_categories')->get()->toArray();
		return view('trainer.pricemanagement.list_price',compact('trainer_prices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categoryList = $this->Categories->get_category_select_list();
		return view('trainer.pricemanagement.add_price',compact('categoryList'));
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
			'title' => 'required',
			'categoryList' => 'required',
			'price' => 'required',
			'duration' => 'required',
		);
		$messages = array(
			'title.required' => 'Please enter title.',
			'categoryList.required' => 'Please select skils.',
			'price.required' => 'Please enter price.',
			'duration.required' => 'Please enter duration.',
		);
		 if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
		$TrainerPrice = new TrainerPrice;
		$TrainerPrice->user_id = Session::get('user')['user_id'];
		$TrainerPrice->title = $request->title;
		$TrainerPrice->skils = $request->categoryList;
		$TrainerPrice->price = $request->price;
		$TrainerPrice->duration = $request->duration;
		$result = $TrainerPrice->save();
		if($result){
			return redirect('trainer/price')->with('success_msg', 'Price added successfully.');
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
		$edit_price = TrainerPrice::find($id);
		$catid = 0;
		$trainerskils = [$edit_price['skils']];
		$categoryList = $this->Categories->get_trainer_skils($catid,$trainerskils);
		return view('trainer.pricemanagement.edit_price',compact('categoryList','edit_price'));
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
		$TrainerPrice = TrainerPrice::find($id);
		$TrainerPrice->user_id = Session::get('user')['user_id'];
		$TrainerPrice->title = $request->title;
		$TrainerPrice->skils = $request->categoryList;
		$TrainerPrice->price = $request->price;
		$TrainerPrice->duration = $request->duration;
		$result = $TrainerPrice->save();
		if($result){
			return redirect('trainer/price')->with('success_msg', 'Price updated successfully.');
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
		$Trainer_price = TrainerPrice::find($id)->delete();
		if($Trainer_price){
			$message = 'Price deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
