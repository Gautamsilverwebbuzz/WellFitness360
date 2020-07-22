<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Module;
use Validator;
use Illuminate\Support\Facades\Session;

class ModulesController extends Controller
{

    public function __construct(){
		$this->Module = new Module;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $moduleList = $this->Module->getModule();
	    return view('backend.modules.list',compact('moduleList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.add');
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
            'display_name' => 'required',
        ];

        $message = [
            'name' => 'Name is required',
            'display_name' => 'Display name is required',
        ];

        if($this->validate($request, $rules, $message) === FALSE){
            return redirect()->back()->withInput();
        }

        $module = Module::create([
            'name'  => trim(strtolower($request->name)),
            'display_name'  => trim(strtolower($request->display_name)),
        ]);

        if($module){
            return redirect('module')->with('success_msg', 'Module Created successfully!');
        }else{
            return redirect('module')->with('error_msg', 'Problem was occured.. Please try again!!!!');
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
        $module = Module::find($id);
        return view('backend.modules.edit',compact('module'));
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
            'display_name' => 'required',
        ];

        $message = [
            'name' => 'Name is required',
            'display_name' => 'Display name is required',
        ];

        if($this->validate($request, $rules, $message) === FALSE){
            return redirect()->back()->withInput();
        }

        $module = Module::find($id);
        $module->name = trim(strtolower($request->name));
        $module->display_name  = trim(strtolower($request->display_name));
        $update = $module->save();

        return redirect('module')->with('success_msg', 'Module updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id)->delete();
    	if($module){
    		Session::flash('success_msg', 'Module delete successfully!');
    		$status = true;
    	}else{
    		Session::flash('error_msg', 'Problem was occured.Please try again.....');
    		$status = false;
    	}
    	return response()->json(['status' => $status]);
    }
}
