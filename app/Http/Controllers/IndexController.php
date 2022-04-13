<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\news;
use App\section;
use App\session;

class IndexController extends Controller
{
    private function latest($quantity){
        $latests = news::orderBy('id', 'DESC')->limit($quantity)->with('sections')->get();
        return $latests;
    }

    private function data(){
        return $data = category::with('sections')->get();
    }

    public function index()
    {
        $data = $this->data();
        $news = section::inRandomOrder()->limit(4)->with('ne')->get();
        $worlds = section::where('isSecond',true)->first();
        if($worlds == null){
            $world = news::orderBy('id', 'DESC')->with('sections')->limit(4)->get();
        }else{
            $world = news::where('section_id', $worlds->id)->orderBy('id', 'DESC')->limit(4)->get();
        }
        $thirds = section::where('isthird',true)->first();
        if($thirds == null){
            $thirds = section::inRandomOrder()->first();
        }
         $third = news::where('section_id', $thirds->id)->orderBy('id', 'DESC')->limit(6)->with('sections')->get();
        //$latests = news::orderBy('id', 'DESC')->limit(6)->with('sections')->get();
        $showfirst = news::where('showfirst',true)->with('sections')->first();
        return view('guardian.home')->with(
            [
                'data' => $data,
                'showfirst'=> $showfirst,
                'news'=>$news,
                'world'=>$world,
                'third' => $third,
                'latests' => $this->latest(6)
            ]);
    }

    public function categorynews($category){
        //if()
      //  if(is_int($category)){
            $category = category::where('category_name',$category)->first();

       $sections =  section::where('category_id',$category->id)->select('id')->get();
       $sects = [];
       foreach ($sections as $section) {
           $sects[] = $section->id;
       }
       //return $sects;
       $news = news::whereIn('section_id',$sects)->limit(9)->orderBy('id','DESC')->with('sections')->get();
       $latests = $this->latest(9);
       $data = $this->data();
       return view('guardian.categorynews')->with(['news'=>$news , 'latests' => $latests,'data'=>$data]);
    }


    public function news($topic){
        $news = news::where('topic',$topic)->with('sections')->first();
        return view('guardian.news')->with(['news' => $news ,'data' => $this->data(), 'latests' => $this->latest(5)])->render();
    }


}

//category world
