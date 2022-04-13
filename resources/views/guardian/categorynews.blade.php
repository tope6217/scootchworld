@extends('layouts.general')
<link rel="stylesheet" href="{{ asset('assets/guardian/home.css') }}">

@section('content')
<div class="container-md">
    <div class="row">
        <div class="col-lg-9 mt-4">
            @if (count($news) > 0)

            <div class="card text-left border-white">
              <img class="card-img-top" width="100%" height="350px" src="{{ $news[0]->pics }}" alt="">
              <div class="card-body">
                <h4 class="card-title">{!! $news[0]->topic !!}</h4>
              </div>
            </div>
            @endif

        <div class="row">
            @for ($i = 1; $i < count($news); $i++)
                <div class="col-lg-4">
                    <div class="card border-white">
                        <div class="card-body row">
                            <div class="col-lg-12">
                                <img width="100%" height="100px" src="{{ $news[$i]->pics }}" alt="" srcset="">
                            </div>
                            <div class="col-lg-12">
                                <h4 class="card-title">{!! $news[$i]->topic !!}</h4>
                            </div>
                          <hr>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
        <div class="col-lg-3">
            @include('layouts.latest')
        </div>
    </div>
</div>
@endsection
