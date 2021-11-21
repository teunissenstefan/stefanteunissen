<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("includes.favicon")

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Stefan Teunissen') }}</title>

        <link href="https://cdn.jsdelivr.net/gh/tonsky/FiraCode@1.207/distr/fira_code.css" rel="stylesheet" />
        <link href="{{asset('css/halfmoon-variables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet" />
        <style>
            :root {
                --primary-color: #ff6724;
                --primary-color-light: #ff8c4b;
            }
            * {
                font-family: "Fira Code", monospace;
            }
            .resume-section{
                padding-top: 5rem !important;
                padding-bottom: 5rem !important;
            }
        </style>
    </head>
    <body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-mode-onload="true">
        <!-- Modals go here -->
        <!-- Reference: https://www.gethalfmoon.com/docs/modal -->

        <!-- Page wrapper start -->
        <div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-all">
            <nav class="navbar">
                <!-- Navbar content (with toggle sidebar button) -->
                <div class="navbar-content d-flex d-md-none">
                    <button class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="sr-only">Toggle sidebar</span> <!-- sr-only = show only on screen readers -->
                    </button>
                </div>
                <ul class="navbar-nav d-none d-md-flex ml-auto mr-auto"> <!-- d-none = display: none, d-md-flex = display: flex on medium screens and up (width > 768px) -->
{{--                    <li class="nav-item active">--}}
{{--                        <a href="#" class="nav-link">Docs</a>--}}
{{--                    </li>--}}
                    @foreach($elements as $element)
                        <li class="nav-item">
                            <a href="#pagelink-{{$element->identifier}}" class="nav-link menu-smooth-scroll" style="padding-right: var(--navbar-link-horizontal-padding)!important;">{{$element->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <!-- Navbar end -->

            <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>

            <!-- Sidebar start -->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <!-- Sidebar brand -->
                    <a href="javascript:void(0);" class="sidebar-brand">
                        {{ config('app.name', 'Stefan Teunissen') }}
                    </a>
                    @foreach($elements as $element)
                        <a href="#pagelink-{{$element->identifier}}" class="sidebar-link menu-smooth-scroll">{{$element->title}}</a>
                    @endforeach
                </div>
            </div>
            <!-- Sidebar end -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">
                <div class="container">
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
                </div>
            </div>
        </div>
        <script src="{{asset('js/halfmoon.min.js')}}"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                halfmoon.clickHandler = function(event) {
                    var target = event.target;
                    if (target.matches(".menu-smooth-scroll")) {
                        event.preventDefault();
                        const href = target.getAttribute("href");
                        const offsetTop = document.querySelector(href).offsetTop;

                        document.querySelector(".content-wrapper").scroll({
                            top: offsetTop,
                            behavior: "smooth"
                        })
                    }
                }
            });
        </script>
    </body>
</html>
