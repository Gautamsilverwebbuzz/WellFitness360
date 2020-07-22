<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\About_Us;
use App\Http\Models\Contact_Us;
use Illuminate\Support\Facades\DB;

class CMSPagesController extends Controller
{
    public function __construct(){
        $this->About_Us = new About_Us;
        $this->Contact_Us = new Contact_Us;
    }

    /**
     * USE : About-us Pages Contetnt
     */
    public function aboutUs(Request $request){
        if($request->isMethod('get')) {
            $about_us = About_Us::find(1);
            return view('backend.cmsPages.about_us',compact('about_us'));
        }
        
        if($request->isMethod('post')) {
            $public_path = 'backend/images/CMSPages';
            $fullImagePath = null;
            if($request->hasfile('image')){
                $image = $request->file('image');
                $name =  time().$image->getClientOriginalName();
                $image->move($public_path,$name);
                $fullImagePath = $public_path.'/'.$name;
            }
            $count = $this->About_Us->where('id',1)->first(); // Count existing record
            if(empty($count)){
                if($fullImagePath){
                    $this->About_Us->Title              = trim($request->Title);
                    $this->About_Us->ShortDescription  = $request->ShortDescription;
                    $this->About_Us->LongDescription   = $request->LongDescription;
                    $this->About_Us->Image              = ($fullImagePath) ? $fullImagePath : Null;
                    $result                             = $this->About_Us->save();
                }else{
                    $this->About_Us->Title              = trim($request->title);
                    $this->About_Us->ShortDescription  = $request->ShortDescription;
                    $this->About_Us->LongDescription   = $request->LongDescription;
                    $result                             = $this->About_Us->save();
                }
            }else{
                $data = About_Us::find(1);
                if($fullImagePath){
                    $data->Title                = trim($request->Title);
                    $data->ShortDescription    = $request->ShortDescription;
                    $data->LongDescription     = $request->long_description;
                    $data->Image                = ($fullImagePath) ? $fullImagePath : Null;
                    $result                     = $data->save();
                }else{
                    $data->Title                = trim($request->Title);
                    $data->ShortDescription    = $request->ShortDescription;
                    $data->LongDescription     = $request->LongDescription;
                    $result                     = $data->save();
                }
            }
            if($result){
                return redirect('admin/cms_aboutus')->with('success_msg', 'Detail updated successfully!');
            }else{
                return redirect('admin/cms_aboutus')->with('error_msg', 'Problem was occured.. Please try again!!!!');
            }
        }
    }

    /**
     * USE : Contact-us Pages Contetnt
     */
    public function contactus(Request $request){
        if($request->isMethod('get')) {
            $contact_us = Contact_Us::find(1);
            return view('backend.cmsPages.contact_us',compact('contact_us'));
        }

        if($request->isMethod('post')) {
            $count = $this->Contact_Us->where('id',1)->first(); // Count existing record
            if(empty($count)){
                $this->Contact_Us->Email            = trim($request->Email);
                $this->Contact_Us->ContactNumber   = trim($request->ContactNumber);
                $this->Contact_Us->Telephone        = $request->Telephone;
                $this->Contact_Us->Address          = trim($request->Address);
                $this->Contact_Us->Website          = trim($request->Website);
                $this->Contact_Us->Description      = trim($request->Description);

                $result = $this->Contact_Us->save();
            }else{
                $data                   = Contact_Us::find(1);
                $data->Email            = trim($request->Email);
                $data->ContactNumber   = trim($request->ContactNumber);
                $data->Telephone        = $request->Telephone;
                $data->Address          = trim($request->Address);
                $data->Website          = trim($request->Website);
                $data->Description      = trim($request->Description);
                $result = $data->save();
            }

            if($result){
                return redirect('admin/cms_contactus')->with('success_msg', 'Detail updated successfully!');
            }else{
                return redirect('admin/cms_contactus')->with('error_msg', 'Problem was occured.. Please try again!!!!');
            }
        }
    }
}
