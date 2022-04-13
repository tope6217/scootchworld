<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\sub;
class subController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = sub::all();
        return view('backend.admin.sub')->with(['subs'=>$subs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'sub_name' => 'required|unique:subs,sub_name',
            'isActive' => 'required|boolean',
            'NoOfAds' => 'required|numeric',
            'NofDays' => 'required|numeric',
            'is_infinteNoOfAds' => 'required|boolean',
            'is_infinteNofDays' => 'required|boolean',
            'amount' => 'required|numeric'
        ]);
        $sub = new sub();
        $sub->sub_name = $request->sub_name;
        $sub->isActive = $request->isActive;
        $sub->NoOfAds = $request->NoOfAds;
        $sub->NofDays = $request->NofDays;
        $sub->is_infinteNoOfAds =$request->is_infinteNoOfAds;
        $sub->is_infinteNofDays = $request->is_infinteNofDays;
        $sub->amount = $request->amount;
        try {
            $sub->save();
        } catch (\Throwable $th) {
            return response()->json(['data'=>$request->all(),'message'=>$th->getMessage()],500);
        }
        return response()->json(['data' => sub::where('sub_name', $request->sub_name)->first()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => sub::where('id', $id)->first()], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $this->validate($request, [
            'sub_name' => 'required|unique:subs,sub_name,'.$id.',id',
            'isActive' => 'required|boolean',
            'NoOfAds' => 'required|numeric',
            'NofDays' => 'required|numeric',
            'is_infinteNoOfAds' => 'required|boolean',
            'is_infinteNofDays' => 'required|boolean',
            'amount' => 'required|numeric'
        ]);

        $sub = new sub();
        $sub->where('id',$id)->update([
            'sub_name' => $request->sub_name,
            'isActive' => $request->isActive,
            'NoOfAds' => $request->NoOfAds,
            'NofDays' => $request->NofDays,
            'is_infinteNoOfAds'=> $request->is_infinteNoOfAds,
            'is_infinteNofDays' => $request->is_infinteNofDays,
            'amount' => $request->amount
        ]);
        return response()->json(['message' => 'update','data'=> $sub->where('id', $id)->first()]);
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
