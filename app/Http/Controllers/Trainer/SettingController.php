<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Settings;

class SettingController extends Controller {

	public function siteSetting(){
		$Setting = Settings::first();
		return view('backend.setting')->with("Setting",$Setting);
	}

	public function update(Request $request){
		$rules = array(
			'email' => 'required',
			'contact_no' => 'nullable|numeric|min:10',
			//'Sitelogo' => 'required|image|mimes:jpeg,png,jpg',
			//'Favicon' => 'required|image|mimes:jpeg,png,jpg',
			'SiteName' => 'required',
			'StripApiKey' => 'required',
			'StripSercetKey' => 'required',
			'PaypalApiKey' => 'required',
			'PaypalSercetKey' => 'required',
			'Copyright' => 'required',
		);
		$messages = array(
			'email.required' => 'Email is required.',
			'contact_no.numeric' => "Please enter valid contact number",
			//'SiteName.required' => 'Please Enter SiteName.',
			//'Sitelogo'=>'Please Select logo image.',
			'Favicon'=>'Please Select favicon image.',
			'StripApiKey.required' => 'Please Enter StripApiKey.',
			'StripSercetKey.required' => 'Please Enter StripSercetKey.',
			'PaypalApiKey.required' => 'Please Enter PaypalApiKey.',
			'PaypalSercetKey.required' => 'Please Enter PaypalSercetKey.',
			'Copyright.required' => 'Please Enter Copyright.',
		);
		 if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}
        $public_path = 'backend/images/siteImages';
		$fullImagePath = null;
		if($request->hasfile('Sitelogo')){
			$image = $request->file('Sitelogo');
			$name =  time().$image->getClientOriginalName();
			$image->move(public_path($public_path),$name);
			$fullImagePath = $public_path.'/'.$name;
		}

		$fullFaviconPath = null;
		if($request->hasfile('Favicon')){
			$favicon = $request->file('Favicon');
			$faviconname =  time().$favicon->getClientOriginalName();
			$favicon->move(public_path($public_path),$faviconname);
			$fullFaviconPath = $public_path.'/'.$faviconname;
		}
		$Setting = Settings::first();
		$Setting->Email           = trim($request->email);
		$Setting->PhoneNumber       = trim($request->contact_no);
		$Setting->SiteName     = trim($request->SiteName);
		if(isset($request->Sitelogo) && !empty($fullImagePath)){
			$Setting->SiteLogo        = $fullImagePath;
		}
		if(isset($request->Favicon) && !empty($fullFaviconPath)){
			$Setting->Favicon        = $fullFaviconPath;
		}
		$Setting->StripApiKey         = $request->StripApiKey;
		$Setting->StripSercetKey         = $request->StripSercetKey;
		$Setting->PaypalApiKey         = $request->PaypalApiKey;
		$Setting->PaypalSercetKey         = $request->PaypalSercetKey;
		$Setting->Copyright        = $request->Copyright;
		$result = $Setting->save();  // save data

		if($result){
			return redirect('setting')->with('success_msg', 'Setting Update successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}
}
?>
