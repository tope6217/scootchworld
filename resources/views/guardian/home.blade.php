@extends('layouts.general')
@section('tltle', 'news')
<link rel="stylesheet" href="{{ asset('assets/guardian/home.css') }}">
@section('content')
    {{-- <div class="roll">
        <div class="roll-container">
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
            <div class="roll-container-content">
                <img src="{{ asset('image/guardian.png') }}" alt="" class="roll-image" srcset=""><span
                    class="ml-3">jhjj</span>
            </div>
        </div>
    </div> --}}
    <section class="first p-5">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        @if ($showfirst != null)
                        <div class="col-lg-8 col-md-12">
                            <img src="{{ $showfirst->pics }}" class="w-100" style="height:18em"  alt="" srcset="">
                        </div>
                        <div class="col-lg-4 col-md-12" style="">
                            <a href="#" class="text-uppercase">{!! $showfirst->sections['section_name'] !!}</a>
                            <h1  class="py-2" style="line-height: 24px;font-weight:10px;font-size:30px;line-spacing:9px">{!! $showfirst->topic !!}</h1>
                            <p >{!! $showfirst->text !!}</p>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="col-2">

                </div>
            </div>
            <div class="row mt-1 pb-3">
                <div class="col-10">
                        <div class="row">
                        @foreach ($news as $new)
                            <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                                <div class="card w-100 h-100" style="height:50px">

                                    <div class="card-body row">
                                        <div class="card-img col-lg-12 col-sm-6" style="height: 100px">
                                            <img src="{{ $new->ne->pics }}" height="100%" width="100%" alt="" srcset="">
                                        </div>
                                        <div class="card-text col-lg-12 col-sm-6 w-100 ">
                                            <a href="http://" class="card-link text-capitalize w-100" >{!! $new->section_name !!}</a>
                                            <h3 style="line-height: 20px; font-size:20px">{!! $new->ne->topic !!}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                </div>
                <div class="col-2 mt-3">jjj</div>
            </div>
        </div>
    </section>

    <section class="">
        <h3 class="m-3">News</h3>
        <div class="container-md">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    @for ($i=0;$i<count($world);$i++)
                        @php
                            $class = 'margin-top:0em';
                            if($i>0){
                                $class = "margin-top:1em";
                            }
                        @endphp
                          <div class="row" style="{{ $class }}">
                            <div class="col-lg-12 col-md-6 col-sm-4">
                                <img class=" " src="{{ $world[$i]->pics }}" width="100%" height="78%" alt="">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-8">
                                <p class="card-text  w-100">{!! $world[$i]->topic !!}</p>
                            </div>
                        </div>
                        @if($i>=1)
                        @break
                        @endif
                    @endfor
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="w-100">
                    <a href="">
                        <img src="{{ $showfirst->pics }}" class="w-100" style="height: 70%" alt="" sizes="" srcset="">
                    </a>
                    <p class="p-2">{!! $new->ne->topic !!}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    @for ($i=0;$i<count($world);$i++)
                        @php
                            $class = 'margin-top:0em';
                            if($i>0){
                                $class = "margin-top:1em";
                            }
                        @endphp
                          <div class="row" style="{{ $class }}">
                            <div class="col-lg-12 col-md-6 col-sm-4">
                                <img class=" " src="{{ $world[$i]->pics }}" width="100%" height="78%" alt="">
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-8">
                                <p class="card-text  w-100">{!! $world[$i]->topic !!}</p>
                            </div>
                        </div>
                        @if($i>=1)
                        @break
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-md">
            <div class="row">
                <div class="col-lg-9 col-md-6 col-sm-8">
                    <div class="row">
                        @foreach ($third as $new)
                            <div class="col-lg-4 col-md-6">
                                <div class="card mt-4">
                                    <div class="card-body row">
                                        <div class="card-img col-lg-12 col-md-12 col-sm-6" style="height: 130px">
                                            <img src="{{ $new->pics }}" height="100%" width="100%" alt=""
                                                srcset="">
                                        </div>
                                        <div class="card-text  col-lg-12 col-md-12 col-sm-6 mt-3">
                                            <a href="http://" class="card-link text-Capitalize">{!! $new->sections->section_name !!}</a>
                                            <h3 style="line-height: 20px; font-size:20px">{!! $new->topic !!}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-4">
                    @include('layouts.latest')
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-xm">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card border-white">
                      <div class="card-body">
                        <h4 class="card-title">1 Title</h4>
                        <hr>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="ml-3">Business</h3>
                    <div class="card border-white">
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <img width="100%" src="http://127.0.0.1:8000/section/1646240003.png" alt="" srcset="">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="card-title">text</h4>
                            </div>
                          <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="ml-3">Business</h3>
                    <div class="card border-white">
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <img width="100%" src="http://127.0.0.1:8000/section/1646240003.png" alt="" srcset="">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="card-title">text</h4>
                            </div>
                          <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
