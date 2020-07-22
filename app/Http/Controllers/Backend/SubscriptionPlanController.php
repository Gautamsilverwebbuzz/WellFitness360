<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\SubscriptionPlan;
use App\Http\Models\Durations;

class SubscriptionPlanController extends Controller
{
    public function __construct(){
        $this->SubscriptionPlan = new SubscriptionPlan;
        $this->Durations = new Durations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionPlan = SubscriptionPlan::with('Duration')->get()->toArray();
        return view('backend.SubscriptionPlan.list',compact('subscriptionPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PlanDurations = Durations::where('status',1)->get();
        return view('backend.SubscriptionPlan.add',compact('PlanDurations'));
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
            'Title' => 'required',
            'Amount' => 'required|nullable',
            'Duration' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'naTitleme.required' => 'Title is required.',
            'Amount.required' => "Plan amount is required",
            'Duration.required' => 'Please select duration plan',
            'status.required' => 'Please select status',
        );
         if($this->validate($request, $rules, $messages) === FALSE){
            return redirect()->back()->withInput();
        }
        $this->SubscriptionPlan->Title      = trim($request->Title);
        $this->SubscriptionPlan->Amount     = trim($request->Amount);
        $this->SubscriptionPlan->Duration_id   = trim($request->Duration);
        $this->SubscriptionPlan->status     = $request->status;
        $Save = $this->SubscriptionPlan->save();  // save data
        if($Save){
            return redirect('admin/SubscriptionPlanManagement')->with('success_msg', 'Subscription Plan added successfully.');
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
        $plan = SubscriptionPlan::find($id);
        $PlanDurations = Durations::where('status',1)->get();
        return view('backend.SubscriptionPlan.edit',compact('plan','PlanDurations'));
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
            'Title' => 'required',
            'Amount' => 'required|nullable',
            'Duration' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'naTitleme.required' => 'Title is required.',
            'Amount.required' => "Plan amount is required",
            'Duration.required' => 'Please select duration plan',
            'status.required' => 'Please select status',
        );
         if($this->validate($request, $rules, $messages) === FALSE){
            return redirect()->back()->withInput();
        }

        // Find id record
        $Plan = SubscriptionPlan::find($id);
        $Plan->Title        = trim($request->Title);
        $Plan->Amount       = trim($request->Amount);
        $Plan->Duration_id  = trim($request->Duration);
        $Plan->status       = $request->status;
        $Update = $Plan->save();  // save data
        if($Update){
            return redirect('admin/SubscriptionPlanManagement')->with('success_msg', 'Subscription Plan Updated successfully.');
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
        $SubscriptionPlan = SubscriptionPlan::find($id)->delete();
        if($SubscriptionPlan){
            Session::flash('success_msg', 'Subscription Plan delete successfully!');
            $status = true;
        }else{
            Session::flash('error_msg', 'Problem was occured.Please try again.....');
            $status = false;
        }
        return response()->json(['status' => $status]);
    }
}
