<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\news;
use App\category;
use App\section;
use App\responses;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class NewController extends Controller
{
    use responses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req)
    {
        $data = news::with('sections')->orderBy('id', 'desc')->paginate(10);
        return view('backend.admin.news')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.storenew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'section_id' => 'required|exists:sections,id',
            //'category_id' => 'required|exists:categories,id',
            'pics' => 'required|file',
            'text' => 'required|unique:news,topic',
            'topic' => 'required'
        ]);

        $news = new news();
        $news->section_id = $request->section_id;
        $news->pics = $this->files($request->file('pics'), 'section')['location'];
        $news->text = $request->text;
        $news->topic = $request->topic;
        $news->user_id = Auth::user()->id;
        try {
            $news->save();
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
        return redirect()->back()->with([
            'success' => true,
            'message' => 'Updated'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.admin.editnew')->with(['news' => news::where('id', $id)->first()]);
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
        // return url();
        //return $request->file('pics');
        $update = [];
        $news = news::where('id', $id);
        if ($request->file('pics') != null) {
            // return $news->first()->pics;
            $this->delecteFile($news->first()->pics);
            $pic = $this->files($request->file('pics'), 'section');
            // array_push($update, ['pics' => $pic['location']]);
            $update['pics'] = $pic['location'];
        }

        $request->section_id == null ? '' : $update['section_id'] = $request->section_id;
        $request->text == null ? '' : $update['text'] = $request->text;
        $request->topic == null ? '' : $update['topic'] = $request->topic;
        //return  $update;
        $news->update($update);
        return redirect()->back()->with([
            'message' => 'updated',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = new news();
        $new =  $new->where('id', $id);
        $news = $new->first();
        try {
            $new->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => true], 500);
        }
        return response()->json(['message' => 'deleted', 'data' => $news, 'success' => true], 200);
    }
}
