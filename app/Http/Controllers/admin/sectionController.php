<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\responses;
use Illuminate\Support\Facades\Auth;

class sectionController extends Controller
{
    use responses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {
        //return $this->files($req->file('pic'), 'section');
        $this->validate($req, [
            'category_id' => 'required|exists:categories,id',
            'section_name' => 'required|unique:sections,section_name',
            'icon' => 'required',
            'pic' => "required",
            'text' => 'required|string',

        ]);
        $section = new section();
        $section->category_id = $req->category_id;
        $section->section_name = $req->section_name;
        $section->icon = $req->icon;
        $section->pic = $this->files($req->file('pic'), 'section')['location'];
        $section->text = $req->text;
        $section->user_id = Auth::user()->id;

        try {
            $section->save();
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'msg' => $th->getMessage()], 500);
        }
        return response()->json(['success' => true, 'msg' => 'updated', 'data' => $section->where('section_name', $req->section_name)->first()], 200);
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
        //
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
        //
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
