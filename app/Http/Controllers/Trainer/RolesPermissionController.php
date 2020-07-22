<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\RolePermission;
use App\Http\Models\Module;
use Illuminate\Support\Facades\Auth;

class RolesPermissionController extends Controller
{
    public function __construct(){
        $this->RolePermission = new RolePermission;
        $this->Module = new Module;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleList = $this->RolePermission->getRoles();
	    return view('backend.rolesPermission.list',compact('roleList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moduleList = $this->Module->getModule();
        return view('backend.rolesPermission.add',compact('moduleList'));
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
            'name' => 'required',
            //'permission' => 'required',
        ];

        $message = [
            'name' => 'Name is required',
            //'permission' => 'Select atleast one permission',
        ];

        if($this->validate($request, $rules, $message) === FALSE){
            return redirect()->back()->withInput();
        }

        $RolePermission = RolePermission::create([
            'created_by' => Auth::user()->id,
            'role_name'  => trim(strtolower($request->name)),
            'description'  => isset($request->description) ? $request->description : null,
            'permission'  => isset($request->permission) ? json_encode($request->permission) : null,
        ]);
        if($RolePermission){
            return redirect('rolepermission')->with('success_msg', 'Roles & Permission added successfully!');
        }else{
            return redirect('rolepermission')->with('error_msg', 'Problem was occured.. Please try again!!!!');
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
        $roleList = $this->RolePermission->getRoles($id);
        $moduleList = $this->Module->getModule();
    	return view('backend.rolesPermission.edit',compact('roleList','moduleList'));
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
    		'name' => 'required',
    		//'permission' => 'required',
    	];

    	$message = [
    		'name' => 'Name is required',
    		//'permission' => 'Select atleast one permission',
    	];

    	if($this->validate($request, $rules, $message) === FALSE){
    		return back();
    	}

    	$RolePermission = RolePermission::find($id);
    	$RolePermission->role_name = trim(strtolower($request->name));
    	$RolePermission->description  = isset($request->description) ? $request->description : null;
    	$RolePermission->permission      = isset($request->permission) ? json_encode($request->permission) : null;
    	$RolePermission = $RolePermission->save();

    	return redirect('rolepermission')->with('success_msg', 'Roles & Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
