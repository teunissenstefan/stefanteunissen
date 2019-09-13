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
                    <img src="https://stefanteunissen.nl/images/profile.png" class="img-fluid img-profile st-border--orange">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto text-center">
                        @foreach($pages as $page)
                            <li class="nav-item active">
                                <a class="nav-link" href="#">{{$page->title}}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="navbar-brand d-block d-md-none" href="#">
                                <img src="https://stefanteunissen.nl/images/profile.png" class="img-fluid img-profile st-border--orange">
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
                    <div class="text-center resume-section">
                        <h1>Stefan-><span class="st-fg--dark-orange">{{$page->title}}</span></h1>
                        {!! ($page->content) !!}
                    </div>
                    @if($i !== ($len))
                        <hr class="st-border--dark-orange">
                    @endif
                @endforeach
                {{--<div class="text-center resume-section">--}}
                    {{--<h1>Stefan-><span class="st-fg--dark-orange">Teunissen</span></h1>--}}
                    {{--<p class="lead">Stefan Teunissen is 21 jaar oud en woont in Beuningen, Gelderland. Sinds 2017 volgt hij de opleiding Applicatieontwikkelaar (MBO Niveau 4) aan het Rijn IJssel te Arnhem locatie Zijpendaalseweg. Zijn passie is programmeren. Hierbij focust hij zich vooral op webapplicaties maar maakt hij ook Android en Windows apps.</p>--}}
                    {{--<p class="followed">(+31) 6 - 22 171 004</p>--}}
                    {{--<p class="followed"><a href="mailto:stefan@teunissen.xyz" class="st-fg--orange">stefan@teunissen.xyz</a></p>--}}
                    {{--<div class="social-icons">--}}
                        {{--<a href="https://www.linkedin.com/in/teunissenstefan/" target="_blank">--}}
                            {{--<i class="fab fa-linkedin-in"></i>--}}
                        {{--</a>--}}
                        {{--<a href="https://github.com/teunissenstefan" target="_blank">--}}
                            {{--<i class="fab fa-github"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<hr class="st-border--dark-orange">--}}

                {{--<div class="text-center resume-section">--}}
                    {{--<h1>Stefan-><span class="st-fg--dark-orange">ervaring</span></h1>--}}
                    {{--<div class="resume-item d-flex flex-column flex-md-row mb-5">--}}
                        {{--<div class="resume-content mr-auto text-left">--}}
                            {{--<h3 class="mb-0">Stagiair Applicatieontwikkelaar</h3>--}}
                            {{--<p>Apprentice XM<br/>Arnhem</p>--}}
                        {{--</div>--}}
                        {{--<div class="resume-date text-md-right">--}}
                            {{--<span class="text-primary">Januari 2019 - Mei 2019</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="resume-item d-flex flex-column flex-md-row mb-5">--}}
                        {{--<div class="resume-content mr-auto text-left">--}}
                            {{--<h3 class="mb-0">Reclame bezorger</h3>--}}
                            {{--<p>Axender BV<br/>Beuningen</p>--}}
                        {{--</div>--}}
                        {{--<div class="resume-date text-md-right">--}}
                            {{--<span class="text-primary">Januari 2016 - Augustus 2017</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="resume-item d-flex flex-column flex-md-row mb-5">--}}
                        {{--<div class="resume-content mr-auto text-left">--}}
                            {{--<h3 class="mb-0">Stagiair IT</h3>--}}
                            {{--<p>ROC Nijmegen<br/>Nijimegen</p>--}}
                        {{--</div>--}}
                        {{--<div class="resume-date text-md-right">--}}
                            {{--<span class="text-primary">Februari 2016 - Juli 2016</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<hr class="st-border--dark-orange">--}}

                {{--<div class="text-center resume-section">--}}
                    {{--<h1>Stefan-><span class="st-fg--dark-orange">ervaring</span></h1>--}}
                    {{--<p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>--}}
                    {{--<a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>--}}
                {{--</div>--}}
            </main>
        </div>


        <!-- JavaScript -->
        <script src="https://kit.fontawesome.com/fb0423ea11.js"></script>
        <script src="{{asset("js/app.js")}}"></script>
    </body>
</html>
