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
                        <ul class="navbar-nav mr-auto text-center">
                            @foreach($pages as $page)
                                <li class="nav-item active">
                                    <a class="nav-link menu-smooth-scroll" href="#pagelink-{{$page->identifier}}">{{$page->title}}</a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="navbar-brand d-block d-md-none" href="javascript:void(0);">
                                    <img src="{{asset('images/profile.png')}}" class="img-fluid img-profile st-border--orange">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main role="main" class="container-fluid">
                @php
                    $i = 0;
                    $len = $pages->count();
                @endphp
                @foreach($pages as $key => $page)
                    @php($i++)
                    <div class="text-center resume-section" id="pagelink-{{$page->identifier}}">
                        <h1>Stefan-><span class="st-fg--dark-orange">{{$page->title}}</span></h1>
                        {!! ($page->content) !!}
                    </div>
                    @if($i !== ($len))
                        <hr class="st-border--dark-orange">
                    @endif
                @endforeach
            </main>
        </div>


        <!-- JavaScript -->
        <script src="https://kit.fontawesome.com/fb0423ea11.js"></script>
        <script src="{{asset("js/app.js")}}"></script>
    </body>
</html>
