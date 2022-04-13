<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advert;
use App\usersub;
use App\responses;
class advertController extends Controller
{
    use responses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = new advert();
        return response()->json(['message' => 'Advert Details', 'data' => $advert->orderBy('user_id',auth()->user()->id)->orderBy('id','DESC')->get()],200);
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
        $this->validate($request,[
            'video' => 'file|video',
            'text' => 'required',
            'topic' => 'required',
            'pics'=> 'file',
            'usersub_id' => 'required|exists:usersubs,id'
        ]);
        $advert = new advert();
        $usersub = usersub::where('id',$request->usersub_id)->first();
        $totaladvert = $advert->where('id',$usersub->id)->count();
        //return $usersub->expiring_date;
        if($usersub->expiring_date <= time() || $totaladvert >= $usersub->NoOfAds ){
            return response()->json(['error' => 'exhasted number of advert for the subscribtion','message'=>'exhasted number of advert for the subscribtion'],419);
        }
        $video = isset($request->video) ? $this->files($request->file('file'),'files/video')['location'] : null;
        $pics = isset($request->pics) ? $this->files($request->file('pics'),'files/pics')['location'] : null;

        $advert->video = $video;
        $advert->pic = $pics;
        $advert->usersub_id = $usersub->id;
        $advert->text = $request->text;
        $advert->topic = $request->topic;
        $advert->user_id =auth()-> user()->id;
        $advert->links = $request->link;
        //return $advert;
        try {
            $advert->save();
        } catch (\Throwable $th) {
          return  response()->json(['error' => $th->getMessage(), 'message' => $th->getMessage()],500);
        }
          return response()->json(['message' => 'Advert Details', 'data' => $advert->where('usersub_id' , $request->usersub_id)->orderBy('id','DESC')->first()],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = advert::where('id',$id)->first();
        return response()->json(['message' => 'Advert Details', 'data' => $advert],200);
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
        $advert = new advert();
        $advert = $advert->where('id', $id)->where('user_id',auth()->user()->id);
        try {
            $advert->delete();
        } catch (\Throwable $th) {
            return  response()->json(['error' => $th->getMessage(), 'message' => $th->getMessage()],500);
        }
    }
}
