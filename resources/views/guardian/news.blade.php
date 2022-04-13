@extends('layouts.general')
<link rel="stylesheet" href="{{ asset('assets/guardian/home.css') }}">
@section('content')
@section('content')
<div class="container">
            @if (($news) != null)
            <a href="{{ url('/category/news/'.$news->sections->category->category_name) }}">{!! $news->sections->category->category_name !!}</a>
            <div class="card text-left border-white">
              <img class="card-img-top" width="100%" height="400px" src="{{ $news->pics }}" alt="">
              <div class="card-body">
                <h4 class="card-title">{!! $news->topic !!}</h4>
              </div>
            </div>
             <div class="new-text">
                 <p>
                     {!! $news->text !!}
                 </p>
             </div>
            @endif

    </div>
@endsection
