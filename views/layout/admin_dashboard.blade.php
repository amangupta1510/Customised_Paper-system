@extends('layout/details')
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Pragma-directive: no-cache">
    <meta http-equiv="Cache-directive: no-cache">
    <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{asset('adminsa/css/search.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/index.css') }}">
    <link href="{{asset('web1/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/event-source-polyfill@1.0.8/src/eventsource.min.js"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
    <link href="{{asset('css/swipereload_new.css')}}" rel="stylesheet" type="text/css" media="all">
    <style type="text/css">
    #page-top {
        overscroll-behavior: none
    }

    #inner-block {
        -ms-touch-action: pan-y;
        touch-action: pan-y;
    }

    .container-table100 {
        border: none;
        box-shadow: 0 1px 2px 1px rgba(154, 154, 204, .22);
        margin: 1rem 1.5rem 1rem 1.5rem;
        width: calc(100% - 3rem) !important;
        border-radius: 10px;
    }

    #searchField {
        background: #eee;
        margin: 0;
    }

    #sidebar::-webkit-scrollbar {
        width: 0 !important
    }

    #sidebar {
        overflow: -moz-scrollbars-none;
    }

    #sidebar {
        -ms-overflow-style: none;
    }

    .socket::-webkit-scrollbar {
        width: 0 !important
    }

    .socket {
        overflow: -moz-scrollbars-none;
    }

    .socket {
        -ms-overflow-style: none;
    }

    </style>
    @yield('head')
</head>

<body id="page-top" onload="preloader()" oncontextmenu="return false">
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>
            </div>
        </div>
    </div>
    <div id="noty_main" class="noty-container" style="z-index: 9999999999; position: fixed;right:10px;bottom: 10px; border-radius: 10px;width: 300px;  "></div>
    <div id="socket" class="socket-container" style="display: none;">
        <div class="socket">
            <h4 class="btn-cancel"> &times;</h4>
            <h4 class="socket_title"></h4>
            <div> <svg class="spinner" width="27px" height="27px" viewBox="0 0 68 68" xmlns="http://www.w3.org/2000/svg">
                    <circle class="path" fill="none" stroke-width="9" stroke-linecap="round" cx="34" cy="34" r="27"></circle>
                </svg>
                <p class="socket_body"></p>
                <div class="socket_body_main"></div>
            </div>
        </div>
    </div>
    @yield('popup')
    <div id="wrapper">
        <div class="page-wrapper default-theme  toggled">
            <nav id="sidebar" class="sidebar-wrapper" style="overflow:hidden;  overflow-y: scroll; padding-bottom:20px;">
                <div class="sidebar-content">
                    <div class="profile_mob sidebar-item sidebar-header d-flex flex-nowrap">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src="{{asset('adminsa/images/'.Auth::user()->photo)}}" style="border-radius:50%;" alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::user()->name}}</span>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-item sidebar-search d-flex flex-row-reverse">
                        <button class="btn btn-success p-1 px-2 m-2" style="font-size: 12px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</button>
                        <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" id="fcm_token">
                        </form>
                    </div>
                    <!-- sidebar-menu  -->
                    <div class=" sidebar-item sidebar-menu">
                        <ul style="margin-bottom: 100px;">
                            <li><a href="{{ route('admin-profile') }}"><i class="fa fa-dashboard"></i><span class="menu-text">Dashboard</span></a></li>
                            <li><a href="{{ route('admin-online_student') }}"><i class="fa fa-user"></i><span class="menu-text">Online Students</span></a></li>
                            <li><a href="{{ route('admin-task_board') }}"><i class="fa fa-tasks"></i><span class="menu-text">Task Board</span></a></li>
                            <li><a href="{{ route('admin-teachers') }}"><i class="fa fa-users"></i><span class="menu-text">Teachers</span></a></li>
                            <li class="sidebar-dropdown"><a href="#"><i class="fa fa-users"></i><span class="menu-text">Students</span></a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="{{ route('admin-students') }}">All Students</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'8th']) }}">class 8th</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'9th']) }}">class 9th</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'10th']) }}">class 10th</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'11th']) }}">class 11th</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'12th']) }}">class 12th</a></li>
                                        <li><a href="{{ route('admin-students',['class'=>'Repeater']) }}">class Repeater</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="{{ route('admin-custom_paper_templates') }}"><i class="fa fa-star"></i><span class="menu-text">Paper Structure</span></a></li>
                            <li class="sidebar-dropdown"><a href="#"><i class="fa fa-star"></i><span class="menu-text">Online Test</span></a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="{{ route('admin-create_paper') }}">Create Paper</a></li>
                                        <li><a href="{{ route('admin-custom_papers') }}">Custom Created Papers</a></li>
                                        <li><a href="{{ route('admin-normal_paper') }}">Simple Created Papers</a></li>
                                        <li><a href="{{ route('admin-advanced_paper') }}">Advanced Created Papers</a></li>
                                        <li><a href="{{ route('admin-uploaded_paper') }}">Uploaded Paper</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown"><a href="#"><i class="fa fa-star"></i><span class="menu-text">Online Test Series</span></a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="{{ route('admin-test_series_list',['type'=>'advanced']) }}">JEE Test Series</a></li>
                                        <li><a href="{{ route('admin-test_series_list',['type'=>'normal']) }}">NEET Test Series</a></li>
                                        <li><a href="{{ route('admin-test_series_list',['type'=>'custom']) }}">Custom Test Series</a></li>
                                        <li><a href="{{ route('admin-uploaded_test_series_list') }}">Uploaded series</a></li>
                                        <li><a href="{{ route('admin-test_list_result') }}">Test Series Results</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="{{ route('admin-lectures') }}"><i class="fa fa-film"></i><span class="menu-text">Video Lecture</span></a></li>
                            <li><a href="{{ route('admin-paper_list_result') }}"><i class="fa fa-bar-chart"></i><span class="menu-text">Results</span></a></li>
                            <li><a href="{{ route('admin-notification_templates') }}"><i class="fa fa-star"></i><span class="menu-text">Notifications</span></a></li>
                            <li class="sidebar-dropdown"><a href="#"><i class="fa fa-trash-o"></i><span class="menu-text">Recycle</span></a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li><a href="{{ route('admin-recycle_student') }}">Student</a></li>
                                        <li><a href="{{ route('admin-recycle_teacher') }}">Teacher</a></li>
                                        <li><a href="{{ route('admin-recycle_result') }}">Results</a></li>
                                        <li><a href="{{ route('admin-recycle_normal_paper') }}">Simple Deleted Papers</a></li>
                                        <li><a href="{{ route('admin-recycle_advanced_paper') }}">Advanced Deleted Paper</a></li>
                                        <li><a href="{{ route('admin-recycle_custom_paper') }}">Custom Deleted Paper</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="{{ route('admin-help') }}"><i class="fa fa-handshake"></i><span class="menu-text">Help</span></a></li>
                            <li><a href="{{ route('admin-settings') }}"><i class="fa fa-cog"></i><span class="menu-text">Settings</span></a></li>
                        </ul>
                    </div>
            </nav>
        </div>
        <!-- page-wrapper -->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-0" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                <img src="{{ asset('img/delta.png') }}" width='230'>
                            </a></div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            </li>
                            <!-- <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">0</span><i class="fas fa-bell fa-fw"></i></a>
                                   <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                            </li>-->
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="profile_desktop nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{Auth::user()->name}}</span><img class="border rounded-circle img-profile" src="{{asset('adminsa/images/'.Auth::user()->photo)}}" style="border-radius:50%;"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a href="{{ route('admin-profile') }}" class="dropdown-item" role="presentation"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a href="{{ route('admin-settings') }}" class="dropdown-item" role="presentation"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid inner-block" id="inner-block">
                    @yield('analysis')
                    <div class="row limiter_change">
                        @yield('inner_block')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bs-init.js') }}"></script>
        <script src="{{ asset('js/swipereload_new.js') }}"></script>
        <script type="text/javascript">
        $('#inner-block').mkPullFresh(function(end) {
            var url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
            $.get(url, function(response) {
                var result = $(response).find(".limiter_change").html();
                end();
                if ($(".disabledScroll")[0] && $('.disabledScroll').data('id') == "yes") {
                    var newHTML = document.open("text/html", "replace");
                    newHTML.write(response);
                    newHTML.close();
                } else {
                    $('.limiter_change').empty().html(result);
                }
            })

        });
        if (window.AndroidButton) {
            AndroidButton.disableScroll();
        }
        $(window).bind('beforeunload', function() {
            if (window.AndroidButton) {
                AndroidButton.enableScroll();
            }
        });

        </script>
        @yield('js')
        <script type="text/javascript">
        // Dropdown menu
        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if ($(this).parent().hasClass("active")) {
                $(".sidebar-dropdown").removeClass("active");
                $(this).parent().removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this).next(".sidebar-submenu").slideDown(200);
                $(this).parent().addClass("active");
            }
            //toggle sidebar
            $("#toggle-sidebar").click(function() {
                $(".page-wrapper").toggleClass("toggled");
            });
            //Pin sidebar
            $("#pin-sidebar").click(function() {
                if ($(".page-wrapper").hasClass("pinned")) {
                    // unpin sidebar when hovered
                    $(".page-wrapper").removeClass("pinned");
                    $("#sidebar").unbind("hover");
                } else {
                    $(".page-wrapper").addClass("pinned");
                    $("#sidebar").hover(
                        function() {
                            console.log("mouseenter");
                            $(".page-wrapper").addClass("sidebar-hovered");
                        },
                        function() {
                            console.log("mouseout");
                            $(".page-wrapper").removeClass("sidebar-hovered");
                        }
                    )

                }
            });


            //toggle sidebar overlay
            $("#overlay").click(function() {
                $(".page-wrapper").toggleClass("toggled");
            });

        });

        </script>
        <script type="text/javascript">
        var loading = document.getElementById('loading');

        function preloader() {
            loading.style.display = 'none';
        }

        if ($(window).width() < 776) {
            $('#sidebarToggleTop').trigger('click');
        }
        //$("#loading").delay(2000).fadeOut(500);
        $("#loading-center").click(function() {
            $("#loading").fadeOut(500);
        });

        </script>
        <script type="text/javascript">
        $("#socket").hide();
        $("body").delegate(".btn-cancel", "click", function() {
            $("#socket").hide();
        });

        </script>
        <style type="text/css">
        .spinner {
            width: 35px;
            height: 35px;
            float: left;
            -webkit-animation: rotator 1.4s linear infinite;
            animation: rotator 1.4s linear infinite;
        }

        @-webkit-keyframes rotator {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(270deg);
                transform: rotate(270deg);
            }
        }

        @keyframes rotator {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(270deg);
                transform: rotate(270deg);
            }
        }

        .path {
            stroke-dasharray: 187;
            stroke-dashoffset: 0;
            -webkit-transform-origin: center;
            transform-origin: center;
            -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
            animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
        }

        @-webkit-keyframes colors {
            0% {
                stroke: #4285F4;
            }

            25% {
                stroke: #DE3E35;
            }

            50% {
                stroke: #F7C223;
            }

            75% {
                stroke: #1B9A59;
            }

            100% {
                stroke: #4285F4;
            }
        }

        @keyframes colors {
            0% {
                stroke: #4285F4;
            }

            25% {
                stroke: #DE3E35;
            }

            50% {
                stroke: #F7C223;
            }

            75% {
                stroke: #1B9A59;
            }

            100% {
                stroke: #4285F4;
            }
        }

        @-webkit-keyframes dash {
            0% {
                stroke-dashoffset: 187;
            }

            50% {
                stroke-dashoffset: 46.75;
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg);
            }

            100% {
                stroke-dashoffset: 187;
                -webkit-transform: rotate(450deg);
                transform: rotate(450deg);
            }
        }

        @keyframes dash {
            0% {
                stroke-dashoffset: 187;
            }

            50% {
                stroke-dashoffset: 46.75;
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg);
            }

            100% {
                stroke-dashoffset: 187;
                -webkit-transform: rotate(450deg);
                transform: rotate(450deg);
            }
        }

        .socket-container:before {
            content: "";
            background-color: rgba(0, 0, 0, 0.6);
            display: block;
            position: fixed;
            z-index: 9999999;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        .socket-container:closed {
            display: none;
        }

        .socket {
            position: fixed;
            overflow-y: scroll;
            top: 30%;
            left: 0px;
            right: 0px;
            margin: 0 auto;
            display: block;
            background: white;
            padding: 10px;
            width: 400px;
            max-width: 80%;
            max-height: 68%;
            z-index: 99999999999;
        }

        .socket_title {
            font-size: 17px;
            font-weight: 300;
        }

        .btn-cancel {
            border-radius: 50%;
            width: 32px;
            text-align: center;
            border: 2px solid #e2e2e2;
            color: #a6a6a6;
            height: 32px;
            cursor: pointer;
            outline: none;
            float: right;
        }

        .btn-cancel:hover {
            background-color: #e5e5e5;
        }

        button#btn-cancel {
            color: #e5e5e5;
        }

        button#btn-cancel:hover {
            background-color: transparent;
        }

        #syllabusimg img {
            width: 100%;
        }

        </style>
        <script type="text/javascript">
        const firebaseConfig = {
            apiKey: "AIzaSyAR6Sdh_xfaI5rItU6MSzhuJXOKn__QHpI",
            authDomain: "inspire-academy-2461c.firebaseapp.com",
            databaseURL: "https://inspire-academy-2461c.firebaseio.com",
            projectId: "inspire-academy-2461c",
            storageBucket: "inspire-academy-2461c.appspot.com",
            messagingSenderId: "752489488062",
            appId: "1:752489488062:web:3750e90e37d24ce3ad48ef",
            measurementId: "G-HY6WQBNEQ6"
        };


        if (window.AndroidFunction) {
            $('#fcm_token').val(AndroidFunction.token());
        } else {
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                }).then(function(token) {
                    $('#fcm_token').val(token);
                }).catch(function(err) {
                    console.log("error", err);
                });
        }

        </script>
</body>

</html>
