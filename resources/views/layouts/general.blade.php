<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('tltle')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugin/fontawesome/css/fontawesome.css') }}">
    <script src="{{ asset('plugin/fontawesome/js/all.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layouts/general.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/layouts/scroll.css') }}">
    <script src="{{ asset('plugin/jquery.js') }}"></script>
    <link href="{{ asset('/summernote/summernote.min.css') }}" rel="stylesheet" >
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/layouts/guardian.js') }}"></script>
</head>

<body>
    <div class="nav-top shadow shadow-sm  sticky-top" >
        <div class="top d-flex flex-row p-4" id="top">
            <div class="justify-content-start" style="width: 40%">
                <h6>
                    @php
                        $limit = 5;
                        echo date('D M Y');
                    @endphp
                </h6>
            </div>
            <div class="justify-content-center w-50">
                <img src="{{ asset('/image/guardian.png') }}" alt="" srcset="">
            </div>
            <div class="justify-content-end d-flex">
                <a class="mx-2" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a class="mx-2" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a class="mx-2" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a class="mx-2" href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                <a class="mx-2" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="nav-sidebar" >
            <div class="bar">
                <a class="mx-2" href="#">
                    <i class="fa fa-facebook" aria-hidden="true">
                    </i>
                </a>
            </div>
            <div class="nav-content " >
                <div class="content d-flex ml-3">
                    <a href="#" id= "nav-image" rel="noopener noreferrer">
                        <img src="{{ asset('image/guardian.png') }}" style="width: 12em" alt="">
                    </a>
                    @foreach ($data as $category)
                        <a class="dropdown dropdown-toggle cart" id="{{ $category->category_name }}"
                            href="#">{{ $category->category_name}}
                        </a>
                            @if($loop->index >= $limit)
                            @break
                            @endif
                    @endforeach
                </div>
                 @foreach ($data as $category)
                    <div class='nav-show d-off position-absolute w-100' id="{{ $category->category_name }}">
                        <div class="d-flex justify-content-center">
                            @foreach ($category->sections as $section)
                                <a class=""  href="">{{ $section->section_name }}</a>
                            @endforeach
                        </div>
                    </div>
                    @if ($loop->index >= $limit)
                        @break;
                    @endif
                @endforeach
                <div>

                </div>
            </div>
            <div class="search">
                <a class="mx-2" href="#">
                    <i class="fa fa-search" aria-hidden="true">
                    </i>
                </a>
            </div>
            <div class="search-box d-none">
                <a class="mx-2" href="#">
                    search<input type="text" id="search" style="width: 50%">
                </a>
            </div>
        </div>
    </div>

    <main class="py-4" onmouseover="removeshow(event)">
        @yield('content')
        @include('layouts.scroll')
        @include('layouts.footer')
    </main>

</body>

<script>

    $('.cart').click(function(e){
        e.preventDefault()
        id = $(this).attr('id');
        $('.nav-show').slideUp()
        $('.nav-show#'+id).slideDown(100)
    })
    function removeshow(event){
        event.preventDefault();
    }
</script>
</html>
