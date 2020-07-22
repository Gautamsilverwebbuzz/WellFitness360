<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
        $users = [];
        $roleId = 2;
        $users = $this->User->getData($roleId);
        return view('backend.UserManagement.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.UserManagement.add');
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
        $this->User->role_id        = 2;
        $this->User->name           = trim($request->name);
        $this->User->sur_name       = trim($request->surname);
        $this->User->email          = trim($request->email);
        $this->User->contact_no     = trim($request->contact_no);
        $this->User->password       = bcrypt($request->name);
        $this->User->gender         = $request->gender;
        $this->User->status         = $request->status;
        $result = $this->User->save();  // save data

        if($result){
            return redirect('/admin/UserManagement')->with('success_msg', 'User added successfully.');
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
        $user = User::find($id);
        return view('backend.UserManagement.edit')->with('user', $user);
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
        $updateuser = User::find($id);        
        $updateuser->name           = trim($request->name);
        $updateuser->sur_name       = trim($request->surname);
        $updateuser->contact_no     = trim($request->contact_no);
        $updateuser->gender         = $request->gender;
        $updateuser->status         = $request->status;
        $result = $updateuser->save();  // save data

        if($result){
            return redirect('/admin/UserManagement')->with('success_msg', 'User Update successfully.');
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
        $User = User::find($id)->delete();
        if($User){
            Session::flash('success_msg', 'User delete successfully!');
            $status = true;
        }else{
            Session::flash('error_msg', 'Problem was occured.Please try again.....');
            $status = false;
        }
        return response()->json(['status' => $status]);
    }

    public function EmailCheckRegister(Request $r){
        $email = !empty($r->email) ? $r->email : '';
        $user = User::where('Email',$email)->orWhere('deleted_at','!=',NULL)->count();
        if($user){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}
