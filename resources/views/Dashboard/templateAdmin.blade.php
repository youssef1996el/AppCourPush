
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <link rel="stylesheet" href="{{asset('css/templateAdmin.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <meta name="msapplication-tap-highlight" content="no">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            .modal-backdrop {
                --bs-backdrop-zindex: unset;
            }
            .btn .badge {
                position: absolute !important;
            }
            .badge {
            --bs-badge-padding-x: -1.35em;
            }
            /* .btn-link {
                --bs-btn-color: transparent;
            } */
        </style>
        <style>
           .AllSrean
           {
                display: block;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 9999;
                background-color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 10px;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            .containerSpinner
            {
                left: 50%;
                margin: auto -50px;
                position: absolute;
                top: 50%;
            }

            .swing div {
            border-radius: 50%;
            float: left;
            height: 1em;
            width: 1em;
            }

            .swing div:nth-of-type(1) {
            background: -webkit-linear-gradient(left, #385c78 0%, #325774 100%);
            background: linear-gradient(to right, #385c78 0%, #325774 100%);
            }

            .swing div:nth-of-type(2) {
            background: -webkit-linear-gradient(left, #325774 0%, #47536a 100%);
            background: linear-gradient(to right, #325774 0%, #47536a 100%);
            }

            .swing div:nth-of-type(3) {
            background: -webkit-linear-gradient(left, #4a5369 0%, #6b4d59 100%);
            background: linear-gradient(to right, #4a5369 0%, #6b4d59 100%);
            }

            .swing div:nth-of-type(4) {
            background: -webkit-linear-gradient(left, #744c55 0%, #954646 100%);
            background: linear-gradient(to right, #744c55 0%, #954646 100%);
            }

            .swing div:nth-of-type(5) {
            background: -webkit-linear-gradient(left, #9c4543 0%, #bb4034 100%);
            background: linear-gradient(to right, #9c4543 0%, #bb4034 100%);
            }

            .swing div:nth-of-type(6) {
            background: -webkit-linear-gradient(left, #c33f31 0%, #d83b27 100%);
            background: linear-gradient(to right, #c33f31 0%, #d83b27 100%);
            }

            .swing div:nth-of-type(7) {
            background: -webkit-linear-gradient(left, #da3b26 0%, #db412c 100%);
            background: linear-gradient(to right, #da3b26 0%, #db412c 100%);
            }

            .shadowSpinner {
            clear: left;
            padding-top: 1.5em;
            }

            .shadowSpinner div {
            -webkit-filter: blur(1px);
            filter: blur(1px);
            float: left;
            width: 1em;
            height: .25em;
            border-radius: 50%;
            background: #e3dbd2;
            }

            .shadowSpinner .shadow-l {
            background: #d5d8d6;
            }

            .shadowSpinner .shadow-r {
            background: #eed3ca;
            }

            @-webkit-keyframes ball-l53 {
            0%, 50% {
                -webkit-transform: rotate(0) translateX(0);
                transform: rotate(0) translateX(0);
            }

            100% {
                -webkit-transform: rotate(50deg) translateX(-2.5em);
                transform: rotate(50deg) translateX(-2.5em);
            }
            }

            @keyframes ball-l53 {
            0%, 50% {
                -webkit-transform: rotate(0) translate(0);
                transform: rotate(0) translateX(0);
            }

            100% {
                -webkit-transform: rotate(50deg) translateX(-2.5em);
                transform: rotate(50deg) translateX(-2.5em);
            }
            }

            @-webkit-keyframes ball-r53 {
            0% {
                -webkit-transform: rotate(-50deg) translateX(2.5em);
                transform: rotate(-50deg) translateX(2.5em);
            }

            50%,
            100% {
                -webkit-transform: rotate(0) translateX(0);
                transform: rotate(0) translateX(0);
            }
            }

            @keyframes ball-r53 {
            0% {
                -webkit-transform: rotate(-50deg) translateX(2.5em);
                transform: rotate(-50deg) translateX(2.5em);
            }

            50%,
            100% {
                -webkit-transform: rotate(0) translateX(0);
                transform: rotate(0) translateX(0)
            }
            }

            @-webkit-keyframes shadow-l-n53 {
            0%, 50% {
                opacity: .5;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            100% {
                opacity: .125;
                -webkit-transform: translateX(-1.57em);
                transform: translateX(-1.75em);
            }
            }

            @keyframes shadow-l-n53 {
            0%, 50% {
                opacity: .5;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }

            100% {
                opacity: .125;
                -webkit-transform: translateX(-1.75);
                transform: translateX(-1.75em);
            }
            }

            @-webkit-keyframes shadow-r-n53 {
            0% {
                opacity: .125;
                -webkit-transform: translateX(1.75em);
                transform: translateX(1.75em);
            }

            50%,
            100% {
                opacity: .5;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            }

            @keyframes shadow-r-n53 {
            0% {
                opacity: .125;
                -webkit-transform: translateX(1.75em);
                transform: translateX(1.75em);
            }

            50%,
            100% {
                opacity: .5;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            }

            .swing-l {
            -webkit-animation: ball-l53 .425s ease-in-out infinite alternate;
            animation: ball-l53 .425s ease-in-out infinite alternate;
            }

            .swing-r {
            -webkit-animation: ball-r53 .425s ease-in-out infinite alternate;
            animation: ball-r53 .425s ease-in-out infinite alternate;
            }

            .shadow-l {
            -webkit-animation: shadow-l-n53 .425s ease-in-out infinite alternate;
            animation: shadow-l-n53 .425s ease-in-out infinite alternate;
            }

            .shadow-r {
            -webkit-animation: shadow-r-n53 .425s ease-in-out infinite alternate;
            animation: shadow-r-n53 .425s ease-in-out infinite alternate;
            }
        </style>
         <script>
            // Function to hide the AllSrean div
            function hideAllSrean() {
            setTimeout(function() {
                document.querySelector('.AllSrean').style.display = 'none';
            }, 1000); // 5000 milliseconds = 5 seconds
        }

        // Add event listener to window load event
        window.addEventListener('load', hideAllSrean);
        </script>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="AllSrean">
            <div aria-busy="true" aria-label="Loading" role="progressbar" class="containerSpinner">
                <div class="swing">
                    <div class="swing-l"></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="swing-r"></div>
                </div>
                <div class="shadowSpinner">
                    <div class="shadow-l"></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="shadow-r"></div>
                </div>
            </div>
        </div>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <div class="logo-src">{{ config('app.name', 'APPSoutien') }}</div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="app-header__content">
                        <div class="app-header-right">
                            <div class="header-dots">
                                <div class="dropdown">
                                    <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn " id="btn-border">
                                        <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                            <span class="icon-wrapper-bg bg-danger"></span>
                                                <i class="fa-regular fa-bell text-danger icon-anim-pulse "></i>
                                                {{-- <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i> --}}
                                            <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                                        </span>
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header mb-0">
                                            <div class="dropdown-menu-header-inner bg-deep-blue">
                                                <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                <div class="menu-header-content text-dark">
                                                    <h5 class="menu-header-title">Notifications</h5>
                                                    <h6 class="menu-header-subtitle">You have <b>{{auth()->user()->unreadNotifications->count()}}</b> unread messages</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header">
                                                    <span>Messages</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header">
                                                    <span>Events</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <div class="p-3">
                                                            <div class="notifications-box">
                                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                                                        @if( $notification->data['condition'] === 'MSG')
                                                                            @php
                                                                                $url = $notification->data['id'];
                                                                                $hashids = new Hashids\Hashids();

                                                                                $url = $hashids->encode($url);

                                                                                $classes = ['dot-warning', 'dot-success', 'dot-primary', 'dot-info', 'dot-danger'];

                                                                                $randomClass = $classes[array_rand($classes)];
                                                                            @endphp
                                                                            <div class="vertical-timeline-item {{$randomClass}} vertical-timeline-element">
                                                                                <div>
                                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                                        <h4 class="timeline-title">
                                                                                            <a href="{{url('ShowUsers/'.$url)}}"> {{$notification->data['title']}}</a>
                                                                                        </h4>
                                                                                        <span class="vertical-timeline-element-date"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    {{-- <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release
                                                                                    <span class="badge badge-danger ml-2">NEW</span>
                                                                                </h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                    {{-- <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Something not important
                                                                                        <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                                <div class="avatar-icon">
                                                                                                    <i>+</i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot has an info state</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span>
                                                                                    </p>
                                                                                        <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Build the production release
                                                                                        <span class="badge badge-danger ml-2">NEW</span>
                                                                                    </h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot has a dark state</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-events-header" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="p-3">
                                                                <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                                    labore et dolore magna elit enim at minim veniam quis nostrud
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                                labore et dolore magna elit enim at minim veniam quis nostrud
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item"></li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View Latest Changes</button>
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="header-btn-lg pr-0">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="btn-group">
                                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn " id="btn-border">
                                                        <img  class="rounded-circle imageAdmin" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('image/default-avatar.png') }}" alt>
                                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                                    </a>
                                                    <div tabindex="-1" role="menu" aria-hidden="true" id="nameImage" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right ">
                                                        <div class="dropdown-menu-header">
                                                            <div class="dropdown-menu-header-inner bg-info">
                                                                <div class="menu-header-image " ></div>
                                                                <div class="menu-header-content text-left">
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left mr-3">
                                                                                <img  class="rounded-circle imageAdmin" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('image/default-avatar.png') }}" alt>
                                                                            </div>
                                                                            <div class="widget-content-left">
                                                                                <div class="widget-heading">{{ Auth::user()->name}}</div>
                                                                                <div class="widget-subheading opacity-8">{{ Auth::user()->title}}</div>
                                                                            </div>
                                                                            <div class="widget-content-right mr-2">
                                                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="btn-logout" class=" btn-pill  btn-shine btn btn-focus" >Se déconnecter</a>
                                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                                    @csrf
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left  ml-3 header-user-info">
                                                <div class="widget-heading"> {{ Auth::user()->name}}</div>
                                                <div class="widget-subheading"> {{ Auth::user()->title}} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="app-main">
                        <div class="app-sidebar sidebar-shadow">
                            <div class="app-header__logo">
                                <div class="logo-src"></div>
                                <div class="header__pane ml-auto">
                                    <div>
                                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="app-header__mobile-menu">
                                <div>
                                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                            <div class="scrollbar-sidebar">
                                <div class="app-sidebar__inner">
                                    <ul class="vertical-nav-menu">
                                        <li class="app-sidebar__heading">Menu</li>

                                        <!-- Side bar Admin-->
                                        @if (Auth::user()->role_name === 'Admin')
                                            <li class="mm-active mb-2">
                                                <a href="{{url('Admin/Dashboard')}}" class="mm-active">
                                                    <i class="fa-solid fa-chart-line metismenu-icon"></i>Tableau de bord
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{url('Admin/Profile')}}">
                                                    <i class="fa fa-info-circle metismenu-icon" aria-hidden="true"></i>information personnelle
                                                </a>

                                            </li>
                                            <li class="mb-2">
                                                <a href="#">
                                                    <i class="fa-solid fa-rocket metismenu-icon "></i>Liste des utilisateurs
                                                    <i class="fa-solid fa-angle-down metismenu-state-icon"></i>

                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="{{ url('professeurs') }}">
                                                            <i class="fa-solid fa-user-tie"></i> <span class="iconS">Professeur </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('eleves') }}">
                                                            <i class="fa-solid fa-users "></i> <span class="iconS">Eleves </span>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li class="mb-2">
                                                <a href="{{url('CoursPaiement')}}">
                                                    <i class="fa-solid fa-dollar-sign metismenu-icon"></i> Paiement
                                                </a>

                                            </li>
                                        @endif

                                        <!-- Side bar Eleve-->

                                        @if (Auth::user()->role_name === 'eleve')
                                            <li class="mm-active mb-2">
                                                <a href="{{ url('Reserver') }}" class="mm-active">
                                                    <i class="fa-solid fa-chart-line metismenu-icon"></i>Réserver un cours
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ url('InfosProfile') }}">
                                                    <i class="fa fa-info-circle metismenu-icon" aria-hidden="true"></i>information personnelle
                                                </a>

                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ url('Mescours') }}">
                                                    <i class="fa-solid fa-rocket metismenu-icon "></i>Mes cours

                                                </a>


                                            </li>
                                            
                                        @endif

                                        <!-- Side bar Professeur-->
                                        @if (Auth::user()->role_name === 'professeur')
                                            <li class="mm-active mb-2">
                                                <a href="{{url('Admin/Dashboard')}}" class="mm-active">
                                                    <i class="fa-solid fa-chart-line metismenu-icon"></i>Tableau de bord
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ url('ShowProfileProf') }}">
                                                    <i class="fa fa-info-circle metismenu-icon" aria-hidden="true"></i>Profile
                                                </a>

                                            </li>
                                            <li class="mb-2">
                                                <a href="{{url('MesEleves')}}">
                                                    <i class="fa-solid fa-dollar-sign metismenu-icon"></i> Liste des éleves
                                                </a>

                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ url('Cours&Disponibilite') }}">
                                                    <i class="fa-solid fa-dollar-sign metismenu-icon"></i> Cours & Disponibilté
                                                </a>

                                            </li>
                                            
                                            <li class="mb-2">
                                                <a href="{{route('InfoProfesseur')}}">
                                                    <i class="fa-solid fa-dollar-sign metismenu-icon"></i> Informaion personnelle
                                                </a>

                                            </li>
                                            <li class="mb-2">
                                                <a href="#">
                                                    <i class="fa-solid fa-rocket metismenu-icon "></i> Education & Expérience
                                                    <i class="fa-solid fa-angle-down metismenu-state-icon"></i>

                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="{{ url('professeur/education') }}">
                                                            <i class="fa-solid fa-user-tie"></i> <span class="iconS">Education </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('professeur/experience') }}">
                                                            <i class="fa-solid fa-users "></i> <span class="iconS">Expérience </span>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </li>
                                        @endif


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <main class="py-4" style="width: 100%">

                        <div class="app-main__outer">

                            <div class="app-main__inner">
                                @yield('navsidebar')
                        </main>
                    </div>
                </div>
            </div>
            <script>
                function setActiveItem(index)
                {
                    var a = document.querySelectorAll('.vertical-nav-menu a')
                    a.forEach(function(li,a)
                    {
                        if(a === index)
                        {
                            li.classList.add('mm-active');


                        }
                        else
                        {
                            li.classList.remove('mm-active');
                        }
                    });
                }
                var currentURL = window.location.href;
                var urlPatterns =
                [
                    { pattern: 'index.html', index: 0 },
                    { pattern: 'Admin/Profile', index: 1 },
                    { pattern: 'professeurs', index: 3 },
                    { pattern: 'eleves', index: 4 },
                    { pattern: 'CoursPaiement', index: 5 }
                ];
                var activeIndex = 0; // Default to the first item
                urlPatterns.forEach(function(pattern) {
                    if (currentURL.includes(pattern.pattern)) {
                        activeIndex = pattern.index;
                    }
                });
                setActiveItem(activeIndex);
            </script>
            <script type="text/javascript" src="{{asset('js/templateAdmin.js')}}"></script>
</body>
</html>
