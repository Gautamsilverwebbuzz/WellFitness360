<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Categories;
use App\Http\Models\Subcategories;
use App\Http\Models\UserTrainerActivity;
use App\Http\Models\frontend\TrainerAvailability;
use App\Http\Models\TrainerCategories;

class UserController extends Controller
{
	public function getProfile($id){
		$user = User::selectRaw('id,name,sur_name,profile_image,social_profile_image,age,height,weight,level,gender')->where('id',$id)->first()->toArray();
		if(!empty($user)){
			return response()->json(array('status' => 1,'message'=>'Profile Get Successfully','data'=>$user));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function profile(Request $request){
		$id = $request->id;
		$public_path = 'profile';
		$profile_image = null;
		if($request->hasfile('image')){
			$image = $request->file('image');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$profile_image = $public_path.'/'.$name;
		}
		$user = User::find($id);
		$user->age = $request->age;
		$user->height = $request->height;
		$user->weight = $request->weight;
		$user->level = $request->level;
		$user->gender = $request->gender;
		$user->profile_image = isset($request->image) ? $profile_image : '';
		$result = $user->save();
		if($result){
			return response()->json(array('status' => 1,'message'=>'Profile updated Successfully','data'=>$user));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function categoeries(){
		$Categories = Categories::all();
		if(!empty($Categories)){
			return response()->json(array('status' => 1,'message'=>'Categoeries get Successfully','categoeries'=>$Categories));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function subcategoeries($id){
		$subCategories = Subcategories::where('cat_id',$id)->get();
		if(!empty($subCategories)){
			return response()->json(array('status' => 1,'message'=>'SubCategoeries get Successfully','subcategoeries'=>$subCategories));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function subCategoriesDetails($id){
		$subCategoriesDetails = Subcategories::where('ID',$id)->first();
		if(!empty($subCategoriesDetails)){
			return response()->json(array('status' => 1,'message'=>'SubCategoeries Details get Successfully','SubcategoeriesDetails'=>$subCategoriesDetails));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function trainerList(){
		$trainerList = User::selectRaw('id,name,sur_name,profile_image,social_profile_image,trainer_skils,tranier_approved,role_id')->where('tranier_approved','1')->where('role_id','3')->get()->toArray();
		if($trainerList){
			return response()->json(array('status' => 1,'message'=>'Trainer List get Successfully','trainerList'=>$trainerList));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function userandtraineractivity(){
		$usertraineractivity = UserTrainerActivity::find(1)->get();
		$user_id = $usertraineractivity[0]['user_id'];
		foreach(json_decode($user_id) as $val){
			$user[] = User::selectRaw('id,name,sur_name,profile_image,social_profile_image')->where('id',$val)->get();
		}
		if(!empty($user)){
			return response()->json(array('status' => 1,'message'=>'User and Trainer activity get Successfully','userandtrainer'=>$user));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function addtraineravailbilty(Request $request){
		$trainerAvailability = new TrainerAvailability;
		$start_time = $request->start_time;
		$user_id = $request->trainer_id;
		$duration = $request->duration;
		if($duration == "15"){
			$durationtime = date("H:i", strtotime($start_time." + 15 minutes"));
		}else if($duration == "30"){
			$durationtime = date("H:i", strtotime($start_time." + 30 minutes"));
		}else if($duration == "45"){
			$durationtime = date("H:i", strtotime($start_time." + 45 minutes"));
		}else{
			$durationtime = date("H:i", strtotime($start_time." + 1 hour"));
		}
		$end_time = $request->durationtime;
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $start_time;
		$trainerAvailability->end_time = $durationtime;
		$trainerAvailability->cat_id = $request->category;
		$trainerAvailability->duration = $request->duration;
		$trainerAvailability->price = $request->price;
		$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
		$result = $trainerAvailability->save();
		if($result){
			return response()->json(array('status' => 1,'message'=>'Trainer availability  add successfully.','availability'=>$trainerAvailability));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function trainercategory(Request $request){
		$trainer_id = $request->trainer_id;
		$getCategory = User::selectRaw('id,trainer_skils')->where('id',$trainer_id)->first();
		$trainercat_id = json_decode($getCategory['trainer_skils']);
		if(!empty($trainercat_id)){
			foreach($trainercat_id as $val){
				$trainerCategoeries[] = TrainerCategories::where('trainer_cat_id',$val)->get();
			}
			if(!empty($trainerCategoeries)){
				return response()->json(array('status' => 1,'message'=>'Trainer Categoeries  get successfully.','trainerCategoeries'=>$trainerCategoeries));
			}else{
				return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
			}
		}else{
			return response()->json(array('status' => 0,'message'=>'No Categoeries found.'),401);
		}
	}

	public function serachTrainer(Request $request){
		$level = $request->level;
		$category = $request->category;
		$duration = $request->duration;
		$levelserach = array();
		$categoryserach = array();
		$durationserach = array();
		if(!empty($level) && !empty($category) && !empty($duration)){
			$serach = User::selectRaw('level,trainer_skils,id')->where('level', 'LIKE', '%' . $level . '%')->whereJsonContains('trainer_skils',[$category])->get()->toArray();
			if(!empty($serach)){
				$seracharr = array_merge($levelserach,$categoryserach,$durationserach);
				return response()->json(array('status' => 1,'message'=>'Trainer Serach Successfully.','serachTrainer'=>$serach));
			}else{
				return response()->json(array('status' => 0,'message'=>'No trainer found.'),401);
			}
		}else{
			if(!empty($level)){
				$levelserach = User::selectRaw('level')->where('level', 'LIKE', '%' . $level . '%')->get()->toArray();
			}
			if(!empty($category)){
				$categoryserach = User::selectRaw('trainer_skils')->whereJsonContains('trainer_skils',[$category])->get()->toArray();
			}
			if(!empty($duration)){
				$durationserach = TrainerAvailability::selectRaw('duration')->where('duration', 'LIKE', '%' . $duration . '%')->get()->toArray();
			}
			if(!empty($levelserach) || !empty($categoryserach) || !empty($durationserach)){
				$seracharr = array_merge($levelserach,$categoryserach,$durationserach);
				return response()->json(array('status' => 1,'message'=>'Trainer Serach Successfully.','serachTrainer'=>$seracharr));
			}else{
				return response()->json(array('status' => 0,'message'=>'No trainer found.'),401);
			}
		}
	}
}