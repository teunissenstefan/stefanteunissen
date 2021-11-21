<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("includes.favicon")

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Stefan Teunissen') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tonsky/FiraCode@1.207/distr/fira_code.css">
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark st-bg--dark-orange" style="margin-bottom: 10px!important;">
                <div class="container">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto text-center ml-auto mr-auto">
                            @foreach($elements as $element)
                                <li class="nav-item active">
                                    <a class="nav-link menu-smooth-scroll" href="#pagelink-{{$element->identifier}}">{{$element->title}}</a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <img src="{{asset('storage/images/profile.png')}}" class="img-fluid img-profile st-border--orange d-block d-md-none ml-auto mr-auto">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main role="main" class="container-fluid">
                @php
                    $i = 0;
                    $len = $elements->count();
                @endphp
                @foreach($elements as $key => $element)
                    @php($i++)
                    @include("includes.element")
                    @if($i !== ($len))
                        <hr class="st-border--dark-orange">
                    @endif
                @endforeach
            </main>

            <a class="back-to-top-btn" id="back-to-top-btn" href="javascript:void(0);"><i class="fa fa-arrow-up"></i></a>
        </div>


        <!-- JavaScript -->
        <script src="https://kit.fontawesome.com/fb0423ea11.js"></script>
        <script src="{{asset("js/app.js")}}"></script>
    </body>
</html>
