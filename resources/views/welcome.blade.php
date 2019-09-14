<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{env("APP_NAME")}}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tonsky/FiraCode@1.207/distr/fira_code.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body> 
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark st-bg--dark-orange" style="margin-bottom: 10px!important;">
                <a class="navbar-brand d-none d-md-block" href="#">
                    <img src="{{asset('images/profile.png')}}" class="img-fluid img-profile st-border--orange">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto text-center">
                        @foreach($pages as $page)
                            <li class="nav-item active">
                                <a class="nav-link" href="#pagelink-{{$page->identifier}}">{{$page->title}}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="navbar-brand d-block d-md-none" href="#">
                                <img src="{{asset('images/profile.png')}}" class="img-fluid img-profile st-border--orange">
                            </a>
                        </li>
                    </ul>
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
{{--                    @if($i !== ($len))--}}
                        <hr class="st-border--dark-orange">
                    {{--@endif--}}
                @endforeach

                <div class="text-center resume-section">
                    <h1>Stefan-><span class="st-fg--dark-orange">Contact</span></h1>
                    <p class="followed">(+31) 6 - 22 171 004</p>
                    <p class="followed"><a href="mailto:stefan@teunissen.xyz" class="st-fg--orange">stefan@teunissen.xyz</a></p>
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/in/teunissenstefan/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://github.com/teunissenstefan" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>

            </main>
        </div>


        <!-- JavaScript -->
        <script src="https://kit.fontawesome.com/fb0423ea11.js"></script>
        <script src="{{asset("js/app.js")}}"></script>
    </body>
</html>
