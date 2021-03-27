@extends('layout/details')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <link href="{{asset('web1/css/style4.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css" media="all">
    {{--
    <link href="{{asset('css/virtual_keyboard.css')}}" rel="stylesheet" type="text/css" media="all"> --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <script src="{{ asset('js/2_2_4_jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <link href="{{asset('css/swipereload_new.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/numpad.js') }}" charset="utf-8"></script>
    <style type="text/css">
    #page-top {
        overscroll-behavior: none
    }

    #all {
        -ms-touch-action: pan-y;
        touch-action: pan-y;
    }

    </style>
    <script type="text/javascript">
    document.onkeydown = function(e) {
        return false;
    }

    function preventBack() { window.history.forward(); }
    setTimeout("preventBack()", 0);
    window.onunload = function() { null };

    function blurFunction() {
        document.onkeydown = function(e) {
            return false;
        }
    }

    function focusFunction() {
        document.onkeydown = function(e) {
            return true;
        }
    }

    </script>
    @yield('head')
    <style type="text/css">
    .nmpd-wrapper {
        display: none;
    }

    .nmpd-target {
        cursor: pointer;
    }

    .nmpd-grid {
        position: absolute;
        left: 50px;
        top: 50px;
        z-index: 5000;
        -khtml-user-select: none;
        padding: 10px;
        width: initial;
    }

    .nmpd-overlay {
        z-index: 4999;
    }

    input.nmpd-display {
        text-align: right;
    }

    </style>
    <script type="text/javascript">
    // Set NumPad defaults for jQuery mobile. 
    // These defaults will be applied to all NumPads within this document!
    $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
    $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
    $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
    $.fn.numpad.defaults.buttonNumberTpl = '<button type="button" class="btn btn-default"></button>';
    $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
    $.fn.numpad.defaults.onKeypadCreate = function() { $(this).find('.done').addClass('btn-primary'); };

    // Instantiate NumPad once the page is ready to be shown

    </script>
    <style type="text/css">
    .nmpd-grid {
        border: none;
        padding: 20px;
    }

    .nmpd-grid>tbody>tr>td {
        border: none;
    }

    /* Some custom styling for Bootstrap */
    .qtyInput {
        display: block;
        width: 100%;
        padding: 6px 12px;
        color: #555;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    </style>
    <style type="text/css">
    /*! CSS Used from: https://a.kabachnik.info/assets/templates/lacroie/assets/plugins/bootstrap/css/bootstrap.min.css */
    .nmpd-wrapper button,
    .nmpd-wrapper input {
        color: inherit;
        font: inherit;
        margin: 0;
    }

    .nmpd-wrapper button {
        overflow: visible;
    }

    .nmpd-wrapper button {
        text-transform: none;
    }

    .nmpd-wrapper button {
        -webkit-appearance: button;
        cursor: pointer;
    }

    .nmpd-wrapper button::-moz-focus-inner,
    .nmpd-wrapper input::-moz-focus-inner {
        border: 0;
        padding: 0;
    }

    .nmpd-wrapper input {
        line-height: normal;
    }

    .nmpd-wrapper table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .nmpd-wrapper td {
        padding: 8px;
    }

    .nmpd-wrapper .table {
        max-width: 100%;
        background-color: transparent;
    }

    .nmpd-wrapper .table {
        width: 100%;
        margin-bottom: 20px;
    }

    .nmpd-wrapper .table>tbody>tr>td {
        padding: 8px;
        line-height: 1.428571429;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

    .nmpd-wrapper .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    .nmpd-wrapper .form-control:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
    }

    .nmpd-wrapper .form-control:-moz-placeholder {
        color: #999;
    }

    .nmpd-wrapper .form-control::-moz-placeholder {
        color: #999;
        opacity: 1;
    }

    .nmpd-wrapper .form-control:-ms-input-placeholder {
        color: #999;
    }

    .nmpd-wrapper .form-control::-webkit-input-placeholder {
        color: #999;
    }

    .nmpd-wrapper .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .nmpd-wrapper .btn:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .nmpd-wrapper .btn:hover,
    .nmpd-wrapper .btn:focus {
        color: #333;
        text-decoration: none;
    }

    .nmpd-wrapper .btn:active {
        outline: 0;
        background-image: none;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    }

    .nmpd-wrapper .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .nmpd-wrapper .btn-default:hover,
    .nmpd-wrapper .btn-default:focus,
    .nmpd-wrapper .btn-default:active {
        color: #333;
        background-color: #ebebeb;
        border-color: #adadad;
    }

    .nmpd-wrapper .btn-default:active {
        background-image: none;
    }

    .nmpd-wrapper .btn-primary {
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd;
    }

    .nmpd-wrapper .btn-primary:hover,
    .nmpd-wrapper .btn-primary:focus,
    .nmpd-wrapper .btn-primary:active {
        color: #fff;
        background-color: #3276b1;
        border-color: #285e8e;
    }

    .nmpd-wrapper .btn-primary:active {
        background-image: none;
    }

    .nmpd-wrapper .btn-lg {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }

    .nmpd-wrapper .modal-content {
        position: relative;
        background-color: #fff;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        background-clip: padding-box;
        outline: 0;
    }

    @media (min-width:768px) {
        .nmpd-wrapper .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }
    }

    /*! CSS Used from: https://a.kabachnik.info/assets/templates/lacroie/assets/css/theme.css */
    .nmpd-wrapper input,
    .nmpd-wrapper input:hover,
    .nmpd-wrapper input:focus {
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .nmpd-wrapper .btn {
        border-radius: 3px;
    }

    .nmpd-wrapper .btn-default {
        color: #ffffff;
        background-color: #E0AF62;
        border-color: #d99f56;
    }

    .nmpd-wrapper .btn-default:hover,
    .nmpd-wrapper .btn-default:focus,
    .nmpd-wrapper .btn-default:active {
        color: #ffffff;
        background-color: #d99f56;
        border-color: #d99f56;
    }

    .nmpd-wrapper .btn-default:active {
        background-image: none;
    }

    .nmpd-wrapper .form-control {
        -webkit-border-radius: 4px;
        border-radius: 4px;
        border: 1px solid #dbdbdb;
        -webkit-appearance: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .nmpd-wrapper .form-control:focus {
        border-color: #000000;
        -webkit-appearance: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .nmpd-wrapper .clear {
        clear: both;
    }

    .nmpd-wrapper input,
    .nmpd-wrapper input:active,
    .nmpd-wrapper input:focus,
    .nmpd-wrapper button,
    .nmpd-wrapper button:active,
    .nmpd-wrapper button:focus {
        outline: 0 !important;
    }

    /*! CSS Used from: https://a.kabachnik.info/style.css */
    .nmpd-wrapper .table td {
        text-align: left;
    }

    /*! CSS Used from: https://a.kabachnik.info/assets/js/jQuery.NumPad/jquery.numpad.css */
    .nmpd-wrapper .nmpd-grid {
        position: absolute;
        left: 50px;
        top: 50px;
        z-index: 5000;
        -khtml-user-select: none;
        border-radius: 10px;
        padding: 10px;
        width: initial;
    }

    .nmpd-wrapper input.nmpd-display {
        text-align: right;
    }

    /*! CSS Used from: Embedded */
    .nmpd-wrapper .nmpd-grid {
        border: none;
        padding: 20px;
        width: 249px;
    }

    .nmpd-wrapper .nmpd-grid>tbody>tr>td {
        border: none;
    }

    </style>
</head>
@if($method=='supported')
@if($results==0)

<body class="cbp-spmenu-push" id="page-top" onload="preloader()" oncontextmenu="return false">
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
    <div id="socket" class="socket-container">
        <div class="socket">
            <h4 class="btn-cancel"> &times;</h4>
            <h4 class="socket_title"></h4>
            <div>
                <svg class="spinner" width="27px" height="27px" viewBox="0 0 68 68" xmlns="http://www.w3.org/2000/svg">
                    <circle class="path" fill="none" stroke-width="9" stroke-linecap="round" cx="34" cy="34" r="27"></circle>
                </svg>
                <p class="socket_body"></p>
                <p class="socket_body_main"></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $("#socket").hide();

    $(".open-socket").on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $("#socket").show("closed");
    });

    $("body").delegate(".btn-cancel", "click", function() {
        $("#socket").fadeOut(500);
    });

    </script>
    <style type="text/css">
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        background: #fff;
        border-radius: .35rem;
        border: 1px solid #fd6e70;
        margin-top: 5px;
    }


    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
    }

    .card_btn {
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }


    .card_btn:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
    }

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
        top: 30%;
        left: 0px;
        right: 0px;
        margin: 0 auto;
        display: block;
        background: white;
        padding: 10px;
        width: 400px;
        max-width: 80%;
        z-index: 99999999999;
    }

    .btn-cancel {
        border-radius: 50%;
        width: 26px;
        text-align: center;
        border: 2px solid #e2e2e2;
        color: #a6a6a6;
        height: 26px;
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

    </style>
    <div id="noty_main" class="noty-container" style="z-index: 9999999999; position: fixed;right:10px;bottom: 10px; border-radius: 10px;width: 300px;  "></div>
    <link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainstudent_show_paper.css')}}">
    <div id="show" class="modal fade " role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="table" class="modal-body">
                    @foreach($questions as $ques)
                    @if($ques->quesimg!="" && file_exists($ques->quesimg))
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;">Question {{$ques->qid}}</li>
                    <div class="ques-img_div ques-img_div{{$ques->qid}}" data-id="{{$ques->qid}}">
                        <a class="ques-img_text ques-img_text{{$ques->qid}}" data-id="{{$ques->qid}}" style="position:absolute;text-decoration: none;color: #3c3a3a;z-index: 9; text-align: center;font-weight: 800;width: 90%;cursor: pointer;"><br><br>Click to view..</a>
                        <li class="hidden ques-all ques-img ques-img{{$ques->qid}}" style="list-style: none;filter: blur(5px);"><img src="{{ asset("$ques->quesimg").'?'.$ques->remember_token}}" />
                            <?php $names = pathinfo($ques->quesimg);
                $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                            @if(file_exists($img_1))<img src="{{ asset("$img_1").'?'.$ques->remember_token}}" class="img-responsive">@endif
                            @if(file_exists($img_2))<img src="{{ asset("$img_2").'?'.$ques->remember_token}}" class="img-responsive">@endif
                        </li>
                    </div>
                    @else
                    <div class="ques-img_div ques-img_div{{$ques->qid}}" data-id="{{$ques->qid}}">
                        <a class="ques-img_text ques-img_text{{$ques->qid}}" data-id="{{$ques->qid}}" style="position:absolute;text-decoration: none;color: #3c3a3a;z-index: 9; text-align: center;font-weight: 800;width: 90%;cursor: pointer;"><br><br>Click to view..</a>
                        <p>Question : {{$ques->qid}} not available. Please Contact to Instructor.</p>
                    </div>
                    @endif
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none; height: 1px;background-color: rgba(244,132,83,0.8);"></li>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remobe"></span>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
    var loading = document.getElementById('loading');

    function preloader() {
        loading.style.display = 'none';
    }
    $(".ques-img_div").on("click", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $(".ques-img_text").show();
        $(".ques-img").css('filter', 'blur(5px)');
        $(".ques-img_text" + id).hide();
        $(".ques-img" + id).css('filter', 'none');
        $(".pageno" + id).click();
    });

    </script>
    @foreach ($papers as $paper)
    @foreach ($plinks as $plink)
    @foreach ($timelefts as $timeleft)
    <?php $CQ1 = $paper->PQ + 1;
      $PQN = $paper->PQ;  $CQN = $paper->PQ + $paper->CQ; $MQN = $paper->PQ + $paper->CQ + $paper->MQ;
       $BQN=$paper->PQ + $paper->CQ + $paper->MQ + $paper->BQ;  
      $MQ1=$paper->PQ + $paper->CQ + 1;
      $BQ1=$paper->PQ + $paper->CQ + $paper->MQ + 1;  ?>
    <div class="hover_bkgr_fricc" style="display: none;">
        <span class="helper"></span>
        <div style="margin: 0px;padding: 0px;">
            <div class="popupCloseButton">X</div>
            <h4 style="color: #f7931e;margin-top: 7%;font-size: 20px; ">You Are Not Connected to the Internet</h4>
        </div>
    </div>
    <div id="all">
        <div class="top-bar">
            <div class="container">
                <div class="col-md-12">
                    <div class="top-links"> </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <header class="main-header">
            <div class="navbar" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand home">
                                <img src="{{asset('img/delta.png')}}" width="300" alt="inspirekolhapur logo" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-5 pull-right">
                            <div class="navbar-collapse">
                                <ul class="nav navbar-nav pull-right">
                                    <li class="user-profile">
                                        <table>
                                            <tr>
                                                <td style="padding: 5px 15px;">
                                                    <img style="float: left;" src="{{asset('student/images/'.Auth::user()->photo)}}" width="100">
                                                    <table>
                                                        <tr>
                                                            <td style="padding: 0px 5px;">Candidate Name</td>
                                                            <td> : <span style="color: #fd6e70; font-weight: bold">{{Auth::user()->name}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 0px 5px;">Subject Name</td>
                                                            <td> : <span style="color: #fd6e70; font-weight: bold">{{$paper->pname}}</span></td>
                                                        </tr>
                                                        <tr id="time1">
                                                            <td style="padding: 0px 5px;">Remaining Time</td>
                                                            <td>
                                                                : <span class="timer-title time-started">00:00</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                                <input type="hidden" id="hdfTestDuration" data-entry='{{$timeleft->created_at}}' value="{{$timeleft->timeleft}}" />
                                <input type="hidden" class="blur-time" data-time="0" value="0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clear"></div>
        <div>
            <div id="heading-breadcrumbs" style="background-color:#5a5c69;">
                <div class="container">
                    <img class="portrait_rotate" src="{{ asset('img/portrait rotate.png') }}" height="40" style="display: none;border-radius: 5px;">
                    <img class="landscape_rotate" src="{{ asset('img/landscape rotate.png') }}" height="40" style="border-radius: 5px;">
                    <div id="arrwrapper" class="row">
                        <span id="arrows" class="arrows"></span>
                    </div>
                    <div class="row" id="heading-breadcru">
                        <div class="col-md-7 pull-left">
                            <table class="stream">
                                <tr class="full-width">
                                    <td class="full-width">
                                        <h1> {{$paper->pname}} </h1>
                                    </td>
                                    <?php $QN = 1;?>
                                    @foreach(json_decode($paper->structure)[0]->pattern as $sub)
                                    @if($sub->question>0)
                                    <td class="full-width"><a style="background: #fd6e70;color: #fff;border-radius: 5px" class="mb5 btn stream_1 full-width" href="javascript:void(0);" data-href="page{{$QN}}">{{$sub->subject}}</a>
                                    </td>
                                    <?php $QN = $QN + $sub->question;?>
                                    @endif
                                    @endforeach
                                </tr>
                                </tr>
                            </table>
                        </div>
                        <div class="clear-xs"></div>
                        <div class="col-md-2 col-sm-12" id="divdrplngcng" @*style="margin: 15px 0 0 0" *@>
                            <text style="color:white; font-weight:bold">Paper View:</text>
                            <select class="form-control paperview">
                                <option selected value="">Select</option>
                                <option value="all">Full Paper</option>
                                @foreach(json_decode($paper->structure)[0]->pattern as $sub) @if ($sub->question>0)
                                <option value="{{$sub->subject}}">{{$sub->subject}}</option>
                                <?php $QN = $QN + $sub->question;?>
                                @endif @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" style="background: #eeeeee;">
            <div class="container">
                <div class="row exam-paper">
                    <div class="col-md-8" id="quest" style="padding: 0">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <div class="panel panel-default card" style="padding:0;margin-left: 3px; margin-right: 3px; margin-top: 10px;">
                                        <div class="panel-body mb0" style="padding-top:0;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php $allquestion=0; ?>
                                                    @foreach($questions as $ques)
                                                    <?php $allquestion++; ?>
                                                    @if ($ques->qid==1)
                                                    <div style="" class="tab-content div-question mb0" id="page1">
                                                        <input type="hidden" value="1" class="hdfQuestionID">
                                                        <input type="hidden" data-type="{{$ques->type}}" data-q1="{{$ques->q1}}" data-q2="{{$ques->q2}}" data-q3="{{$ques->q3}}" data-q4="{{$ques->q4}}" data-positive="{{$ques->positive}}" data-negative="{{$ques->negative}}" class="Question_data_{{$ques->qid}}">
                                                        <input type="hidden" value="1" class="hdfPaperSetID">
                                                        <input type="hidden" value="{{$ques->type}}" class="hdfCurrectAns">
                                                        <div class="question-height">
                                                            <span class="btn-info timeof-1" data-time="0">00:00</span>
                                                            <h4 class="question-title" id="Qinfo1"></h4>
                                                            <h4 class="question-title"> Question 1:</h4>
                                                            @if($ques->quesimg!="" && file_exists($ques->quesimg))
                                                            <img id="img1" alt="Question" src="{{ asset("$ques->quesimg").'?'.$ques->remember_token}}" class="img-responsive ">
                                                            <?php $names = pathinfo($ques->quesimg);
                                         $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1").'?'.$ques->remember_token}}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2").'?'.$ques->remember_token}}" class="img-responsive">@endif
                                                            @else
                                                            <p>Question : 1 not available. Please Contact to Instructor.</p>
                                                            @endif<br>
                                                            <table class="table table-borderless mb0">
                                                                <tbody>
                                                                    @if($ques->type=='single')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html(' Single Option Correct Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td> <input type="radio" value="A" name="radiospage1" id="rOption1_1"> a ) </td>
                                                                        <td> <input type="radio" value="B" name="radiospage1" id="rOption1_1"> b ) </td>
                                                                        <td> <input type="radio" value="C" name="radiospage1" id="rOption1_1"> c ) </td>
                                                                        <td> <input type="radio" value="D" name="radiospage1" id="rOption1_1"> d ) </td>
                                                                    </tr>
                                                                    @elseif($ques->type=='multiple')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html(' Multiple Option Correct type [ +{{$ques->positive}} , -{{$ques->negative}} Marks , Partial +1 Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='A'> a )</td>
                                                                        <td class="column2"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='B'> b )</td>
                                                                        <td class="column3"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='C'> c )</td>
                                                                        <td class="column4"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='D'> d )</td>
                                                                    </tr>
                                                                    @elseif($ques->type=='integer')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html('Single Digit Integer Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column3">
                                                                            <input type='text' class="vir_input" id="iOption1_1" min="0" max="9" name='integerpage1'></td>
                                                                        <script type="text/javascript">
                                                                        $('#iOption1_1').numpad({
                                                                            appendKeypadTo: false,
                                                                            hidePlusMinusButton: true,
                                                                            hideDecimalButton: true,
                                                                            decimalSeparator: '.',
                                                                            onChange: function(event, value) {
                                                                                var val = value.toString().slice(-1);
                                                                                $(this).find('.nmpd-display').val(val);
                                                                            }
                                                                        });

                                                                        </script>
                                                                    </tr>
                                                                    @elseif($ques->type=='numerical')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html('Numerical Value input Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column3">
                                                                            <input class="vir_input" type='text' id="nOption1_1" step="0.001" placeholder="0.000" name='numericalpage1'></td>
                                                                        <script type="text/javascript">
                                                                        $('#nOption1_1').numpad({ appendKeypadTo: false, hideDecimalButton: false, decimalSeparator: '.' });

                                                                        </script>
                                                                    </tr>
                                                                    @elseif($ques->type=='text')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html('Written Answer Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <div><span><b>Write Your Answere Below In The Box.</b></span></div>
                                                                    <textarea class="textarea" name='textpage1' id="cOption1_1" onfocus="focusFunction()" onblur="blurFunction()"></textarea>
                                                                    @elseif($ques->type=='scan')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html('Scan Answer Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type="hidden" name='scanpage1' id="cOption1_1"></td>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <form class="uploadImage uploadImage_1" data-id="1" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="pname" value="{{$plink->paper}}">
                                                                            <input type="hidden" name="qid" value="1">
                                                                            <input type="hidden" name="plid" value="{{$plink->id}}">
                                                                            <div class="cameraBtn" id="fileLoadBtn">
                                                                                <div class="file-input"> <input type="file" name="image_file" class="file-input__input" accept="image/*" id="image_1" onchange="return fileValidation(this.id)" capture="capture"> <label class="file-input__label" for="image_1"> <img src="/img/camera.svg?token=1" alt="Camera"> <span>Upload&nbsp;Answer</span> </label></div>
                                                                            </div>
                                                                            <br>
                                                                            <div><span id="status_1"></span></div>
                                                                            <div class="progress progress_1" style="display:none;">
                                                                                <div class="progress-bar progress-bar_1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                            </div>
                                                                            <div id="Preview_1" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                            <input type="submit" name="submit" id="image_submit_1" data-id="1" style="display: none;">
                                                                        </form>
                                                                        <div id="loader-icon_1" style="display:none;"><img src="/img/loader.gif?token=2" height="100" /></div>
                                                                        <br>
                                                                    </tr>
                                                                    @elseif($ques->type=='upload')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html('Upload Answer Image Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type="hidden" name='uploadpage1' id="cOption1_1"></td>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <form class="uploadImage uploadImage_1" data-id="1" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="pname" value="{{$plink->paper}}">
                                                                            <input type="hidden" name="qid" value="1">
                                                                            <input type="hidden" name="plid" value="{{$plink->id}}">
                                                                            <div class="cameraBtn" id="fileLoadBtn">
                                                                                <div title="Upload Answer Image" class="file-input"> <input title="Gallery" type="file" name="image_file" class="file-input__input" accept="image/*" id="image_1" data-max-file-size="2M" onchange="return fileValidation(this.id)"> <label class="file-input__label" for="image_1"> <img src="/img/gallery.svg?token=1" alt="Gallery"> <span>Upload&nbsp;Answer</span> </label></div>
                                                                            </div>
                                                                            <br>
                                                                            <div><span id="status_1"></span></div>
                                                                            <div class="progress progress_1" style="display:none;">
                                                                                <div class="progress-bar progress-bar_1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                            </div>
                                                                            <div id="Preview_1" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                            <input type="submit" name="submit" id="image_submit_1" data-id="1" style="display: none;">
                                                                        </form>
                                                                        <div id="loader-icon_1" style="display:none;"><img src="/img/loader.gif?token=2" height="100" /></div>
                                                                        <br>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div style="display: none;" class="tab-content div-question mb0" id="page{{$ques->qid}}">
                                                        <input type="hidden" value="1" class="hdfQuestionID">
                                                        <input type="hidden" data-type="{{$ques->type}}" data-q1="{{$ques->q1}}" data-q2="{{$ques->q2}}" data-q3="{{$ques->q3}}" data-q4="{{$ques->q4}}" data-positive="{{$ques->positive}}" data-negative="{{$ques->negative}}" class="Question_data_{{$ques->qid}}">
                                                        <input type="hidden" value="1" class="hdfPaperSetID">
                                                        <input type="hidden" value="{{$ques->type}}" class="hdfCurrectAns">
                                                        <div class="question-height">
                                                            <span class="btn-info timeof-{{$ques->qid}}" data-time="0">00:00</span>
                                                            <h4 class="question-title" id="Qinfo{{$ques->qid}}"></h4>
                                                            <h4 class="question-title"> Question&nbsp;{{$ques->qid}}:</h4>
                                                            @if($ques->quesimg!="" && file_exists($ques->quesimg))
                                                            <img alt="Question" src="{{ asset("$ques->quesimg").'?'.$ques->remember_token}}" class="img-responsive">
                                                            <?php $names = pathinfo($ques->quesimg);
                                        $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1").'?'.$ques->remember_token}}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2").'?'.$ques->remember_token}}" class="img-responsive">@endif
                                                            @else
                                                            <p>Question : {{$ques->qid}} not available. Please Contact to Instructor.</p>
                                                            @endif<br>
                                                            <table class="table table-borderless mb0">
                                                                <tbody>
                                                                    @if($ques->type=='single')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo1').empty().html(' Single Option Correct Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td> <input type="radio" value="A" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1"> a ) </td>
                                                                        <td> <input type="radio" value="B" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1"> b ) </td>
                                                                        <td> <input type="radio" value="C" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1"> c ) </td>
                                                                        <td> <input type="radio" value="D" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1"> d ) </td>
                                                                    </tr>
                                                                    @elseif($ques->type=='multiple')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html(' Multiple Option Correct type [ +{{$ques->positive}} , -{{$ques->negative}} Marks , Partial +1 Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='A'> a )</td>
                                                                        <td class="column2"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='B'> b )</td>
                                                                        <td class="column3"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='C'> c )</td>
                                                                        <td class="column4"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='D'> d )</td>
                                                                    </tr>
                                                                    @elseif($ques->type=='integer')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html('Single Digit Integer Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column3">
                                                                            <input class="vir_input" type='text' id="iOption{{$ques->qid}}_1" min="0" max="9" name='integerpage{{$ques->qid}}'></td>
                                                                        <script type="text/javascript">
                                                                        $('#iOption{{$ques->qid}}_1').numpad({
                                                                            appendKeypadTo: false,
                                                                            hidePlusMinusButton: true,
                                                                            hideDecimalButton: true,
                                                                            decimalSeparator: '.',
                                                                            onChange: function(event, value) {
                                                                                var val = value.toString().slice(-1);
                                                                                $(this).find('.nmpd-display').val(val);
                                                                            }
                                                                        });

                                                                        </script>
                                                                    </tr>
                                                                    @elseif($ques->type=='numerical')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html('Numerical Value input Type [ +{{$ques->positive}} , -{{$ques->negative}} Marks] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column3">
                                                                            <input class="vir_input" type='text' id="nOption{{$ques->qid}}_1" step="0.001" placeholder="0.000" name='numericalpage{{$ques->qid}}'></td>
                                                                        <script type="text/javascript">
                                                                        $('#nOption{{$ques->qid}}_1').numpad({ appendKeypadTo: false, hideDecimalButton: false, decimalSeparator: '.' });

                                                                        </script>
                                                                    </tr>
                                                                    @elseif($ques->type=='text')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html('Written Answer Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <div><span><b>Write Your Answere Below In The Box.</b></span></div>
                                                                    <textarea class="textarea" name='textpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" onfocus="focusFunction()" onblur="blurFunction()"></textarea>
                                                                    @elseif($ques->type=='scan')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html('Scan Answer Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type="hidden" name='scanpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1"></td>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <form class="uploadImage uploadImage_{{$ques->qid}}" data-id="{{$ques->qid}}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="pname" value="{{$plink->paper}}">
                                                                            <input type="hidden" name="qid" value="{{$ques->qid}}">
                                                                            <input type="hidden" name="plid" value="{{$plink->id}}">
                                                                            <div class="cameraBtn" id="fileLoadBtn">
                                                                                <div class="file-input"> <input type="file" name="image_file" class="file-input__input" accept="image/*" id="image_{{$ques->qid}}" data-max-file-size="2M" onchange="return fileValidation(this.id)" capture="capture"> <label class="file-input__label" for="image_{{$ques->qid}}"> <img src="/img/camera.svg?token=1" alt="Camera"> <span>Upload&nbsp;Answer</span> </label></div>
                                                                            </div>
                                                                            <br>
                                                                            <div><span id="status_{{$ques->qid}}"></span></div>
                                                                            <div class="progress progress_{{$ques->qid}}" style="display:none;">
                                                                                <div class="progress-bar progress-bar_{{$ques->qid}}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                            </div>
                                                                            <div id="Preview_{{$ques->qid}}" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                            <input type="submit" name="submit" id="image_submit_{{$ques->qid}}" data-id="{{$ques->qid}}" style="display: none;">
                                                                        </form>
                                                                        <div id="loader-icon_{{$ques->qid}}" style="display:none;"><img src="/img/loader.gif?token=2" height="100" /></div>
                                                                        <br>
                                                                    </tr>
                                                                    @elseif($ques->type=='upload')
                                                                    <script type="text/javascript">
                                                                    $('#Qinfo{{$ques->qid}}').empty().html('Upload Answer Image Type [ Max Marks : {{$ques->positive}} , Min Marks : -{{$ques->negative}}] ')

                                                                    </script>
                                                                    <tr>
                                                                        <td class="column1"><input type="hidden" name='uploadpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1"></td>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <form class="uploadImage uploadImage_{{$ques->qid}}" data-id="{{$ques->qid}}" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="pname" value="{{$plink->paper}}">
                                                                            <input type="hidden" name="qid" value="{{$ques->qid}}">
                                                                            <input type="hidden" name="plid" value="{{$plink->id}}">
                                                                            <div class="cameraBtn" id="fileLoadBtn">
                                                                                <div title="Upload Answer Image" class="file-input"> <input title="Gallery" type="file" name="image_file" class="file-input__input" accept="image/*" id="image_{{$ques->qid}}" data-max-file-size="2M" onchange="return fileValidation(this.id)"> <label class="file-input__label" for="image_{{$ques->qid}}"> <img src="/img/gallery.svg?token=1" alt="Gallery"> <span>Upload&nbsp;Answer</span> </label></div>
                                                                            </div>
                                                                            <br>
                                                                            <div><span id="status_{{$ques->qid}}"></span></div>
                                                                            <div class="progress progress_{{$ques->qid}}" style="display:none;">
                                                                                <div class="progress-bar progress-bar_{{$ques->qid}}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                            </div>
                                                                            <div id="Preview_{{$ques->qid}}" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                            <input type="submit" name="submit" id="image_submit_{{$ques->qid}}" data-id="{{$ques->qid}}" style="display: none;">
                                                                        </form>
                                                                        <div id="loader-icon_{{$ques->qid}}" style="display:none;"><img src="/img/loader.gif?token=2" height="100" /></div>
                                                                        <br>
                                                                    </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button class="mb5 card_btn full-width btn btn-success btn-block btn-save-answer">Save &amp; Next</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="mb5 card_btn full-width btn btn-warning btn-block btn-save-mark-answer">Save &amp; Mark For Review</button>
                                                </div>
                                                <div class="col-md-4" style="margin-bottom: 5px;">
                                                    <button class="mb5 card_btn full-width btn btn-default btn-block btn-reset-answer">Clear Response</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="mb5 card_btn full-width btn btn-primary btn-block btn-mark-answer">Mark For Review &amp; Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer card" style="margin: 0px 3px;">
                                        <div class="row">
                                            <div class="col-md-12"> <button id="hhh" class="btn btn-success btn-submit-all-answers pull-right card_btn">Submit</button>&nbsp;&nbsp;
                                                <a href="javascript:void(0);" class="btn btn-default pull-left card_btn" id="btnPrevQue">
                                                    << Back </a>&nbsp;&nbsp; <a href="javascript:void(0);" class="btn btn-default pull-left card_btn" id="btnNextQue">Next >>
                                                </a>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="full_scn_btn">
                                    <div class="full_screen pull-right" style="cursor: pointer; background-color: #000; color: #fff; padding: 5px;">
                                        <i class="fa fa-angle-right fa-2x"></i>
                                    </div>
                                    <div class="collapse_screen hidden pull-right" style="cursor: pointer; background-color: #000; color: #fff; padding: 5px;">
                                        <i class="fa fa-angle-left fa-2x"></i>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" id="pallette" style="background: #eeeeee;">
                        <div class="panel panel-default mb0 " style="background: #eeeeee;">
                            <div class="panel-body card" style="background: #fff;">
                                <table class="table table-borderless mb0" style="font-size: 13px;">
                                    <tr>
                                        <td class="full-width"> <a class="test-ques-stats que-not-attempted lblNotVisited">0</a>&nbsp;Not&nbsp;Visited</td>
                                        <td class="full-width"> <a class="test-ques-stats que-not-answered lblNotAttempted">0</a>&nbsp;Not&nbsp;Answered</td>
                                    </tr>
                                    <tr>
                                        <td class="full-width"> <a class="test-ques-stats que-save lblTotalSaved">0</a> Answered </td>
                                        <td class="full-width"> <a class="test-ques-stats que-mark lblTotalMarkForReview">0</a>&nbsp;Marked&nbsp;for&nbsp;Review</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <a class="test-ques-stats que-save-mark lblTotalSaveMarkForReview">0</a> Answered &amp; Marked for Review (will be considered for evaluation) </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-default" style="background: #eeeeee;">
                            <div class="panel-body  card" style="height:320px;overflow-y:scroll; background: #fff; color: #d8d8d8;">
                                <ul class="pagination test-questions" style="background: #fff; color: #d8d8d8;">
                                    <li class="active" data-seq="1" id="1"><a class="test-ques que-not-answered pageno1" href="javascript:void(0);" data-href="page1">01</a></li>
                                    @foreach($questions as $ques)
                                    @if ($ques->qid>1)
                                    <li data-seq="1" class="" id="{{$ques->qid}}">
                                        <a class="test-ques que-not-attempted pageno{{$ques->qid}}" href="javascript:void(0);" data-href="page{{$ques->qid}}">@if($ques->qid<10) {{'0'.$ques->qid}} @else{{$ques->qid}}@endif</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 exam-summery" style="display:none;">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="text-center">Exam Summary</h3>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Answered</th>
                                            <th>Not Answered</th>
                                            <th>Marked for Review</th>
                                            <th>Save & Marked for Review(will be considered for evaluation)</th>
                                            <th>Not Visited</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="lblTotalSaved"></td>
                                            <td class="lblNotAttempted"></td>
                                            <td class="lblTotalMarkForReview"></td>
                                            <td class="lblTotalSaveMarkForReview"></td>
                                            <td class="lblNotVisited"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr />
                                <div class="col-md-12 text-center">
                                    <h4> Are you sure you want to submit for final marking?<br />No changes will be allowed after submission. <br /></h4>
                                    <a class="btn btn-success" style="padding: 10px 40px;" id="btnYesSubmit">Yes</a> <a class="btn btn-default btn-lg" id="btnNoSubmit">No</a>
                                    <br>
                                    <h5>Auto Submit in </h5>
                                    <a class="btn-danger btn auto-submit-clock" disabled>00:00</a><br>
                                </div>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Question No.</th>
                                            <th>Your Responses</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody class="final_response">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 exam-confirm" style="display:none;">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12 text-center">
                                    <h4> Thank You, your responses will be submitted for final marking - click OK to complete final submission. <br /> </h4>
                                    <a class="btn btn-default btn-lg" id="btnYesSubmitConfirm">Ok</a> <a class="btn btn-default btn-lg" id="btnNoSubmitConfirm">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                @yield('footer')
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('student-logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="token" id="fcm_token">
    </form>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/swipereload_new.js') }}"></script>
    <script type="text/javascript">
    $('.full_screen').click(function() {
        $('#quest').removeClass('col-md-8');
        $('#quest').addClass('col-md-12');
        $('#pallette').addClass('hidden');
        $('.full_screen').addClass('hidden');
        $('.collapse_screen').removeClass('hidden');
    });

    $('.collapse_screen').click(function() {
        $('#quest').removeClass('col-md-12');
        $('#quest').addClass('col-md-8');
        $('#pallette').removeClass('hidden');
        $('.full_screen').removeClass('hidden');
        $('.collapse_screen').addClass('hidden');

    });
    if ($(window).width() < 777) {
        $('.full_scn_btn').hide();
    }
    if ($(window).width() > 776 || !window.AndroidFunction) {
        $('.landscape_rotate').hide();
        $('.portrait_rotate').hide();
    }

    $(document).ready(function() {
        //Disable full page
        $("body").on("contextmenu", function(e) {
            return true;
        });
    });

    $('#all').mkPullFresh(function(end) {
        var url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
        $.get(url, function(response) {
            //var result = $(response).find(".limiter_change").html();
            end();
            window.location.reload();
            // var newHTML = document.open("text/html", "replace"); 
            // newHTML.write(response); 
            // newHTML.close(); 
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
    document.getElementById('arrwrapper').onclick = function() {
        $('#heading-breadcru').toggle();
        $(this).toggleClass('active');
        $('#heading-breadcrumbs').toggleClass('active');
    };

    </script>
    <script type="text/javascript">
    if (window.indexedDB !== undefined) {
        window.sttype = 'indexedDB';
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onerror = function(event) {
            console.log('[onerror]', request.error);
        };
        request.onupgradeneeded = function(event) {
            var db = event.target.result;
            var productsStore = db.createObjectStore('responses', { keyPath: 'qid' });
            var productsStore = db.createObjectStore('timer', { keyPath: 'qid' });
            var productsStore = db.createObjectStore('submit', { keyPath: 'id' });
        };
    }
    $("#btnYesSubmitConfirm").on('click', function(event) {
        event.preventDefault();
        var el = $(this);
        el.prop('disabled', true);
        setTimeout(function() { el.prop('disabled', false); }, 3000);
    });

    $('.keyboard .row-keyboard div').on('click', function(e) {
        e.preventDefault();
        var inputtext = $('#username').val();

        if (e.target.id == 'del') {
            var temp = inputtext.substring(0, inputtext.length - 1);
            $('#username').val(temp);
        } else {
            var temp = $(this).data('value');
            temp = inputtext + temp;
            $('#username').val(temp);
        }

    });

    </script>
    <script type="text/javascript">
    $(".textarea").keydown(function(e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            // prevent default behavior
            e.preventDefault();
            //alert("ok");
            return false;
        }
    });

    function fileValidation(id) {
        var str = id;
        var str = str.split("_");
        str[1]
        var fileInput = document.getElementById(id);
        if ($('#' + id).val()) {
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert("Only jpg/jpeg and png files are allowed!");
                document.getElementById('Preview_' + str[1]).innerHTML = '';
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    document.getElementById('image_submit_' + str[1]).click();
                }
            }
        }
    }

    function uploadProgressHandler(event) {
        var percent = (event.loaded / event.total) * 100;
        var progress = Math.round(percent);
        var id = $(".test-questions").find("li.active").attr("id");
        $('.progress-bar_' + id).animate({ width: progress + '%' }, { duration: 1000 });
        $("#status_" + id).show();
        $("#status_" + id).html(progress + "% uploaded... please wait");
    }

    function loadHandler(event) {
        var id = $(".test-questions").find("li.active").attr("id");
        $('#loader-icon_' + id).hide();
        $('.progress_' + id).hide();
        $("#status_" + id).hide();
        $('#Preview_' + id).show();
        $('#cOption' + id + '_1').val(event.target.responseText);
        document.getElementById('Preview_' + id).innerHTML = '<img src="' + event.target.responseText + '" style="width:100%"/>';
    }

    function errorHandler(event) {
        $(".spinner").hide();
        $(".btn-cancel").show();
        $('.socket_title').text('Upload Error');
        $('.socket_body').text('Upload Answer Failed... Please Check Internet Connection And Try Again');
        $("#socket").show();
        var id = $(".test-questions").find("li.active").attr("id");
        $('#cOption' + id + '_1').val("");
    }

    function abortHandler(event) {
        $(".spinner").hide();
        $(".btn-cancel").show();
        $('.socket_title').text('Upload Error');
        $('.socket_body').text('Upload Answer Aborted... Please Try Again.');
        $("#socket").show();
        var id = $(".test-questions").find("li.active").attr("id");
        $('#cOption' + id + '_1').val("");
    }

    $('.uploadImage').submit('submit', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('#loader-icon_' + id).show();
        $("#status_" + id).show();
        $("#status_" + id).html("uploading... please wait");
        $('.progress_' + id).show();
        $('#Preview_' + id).hide();
        $.ajax({
            url: "{{ route('student-custom_ans_img_upload') }}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",
                    uploadProgressHandler,
                    false
                );
                xhr.addEventListener("load", loadHandler, false);
                xhr.addEventListener("error", errorHandler, false);
                xhr.addEventListener("abort", abortHandler, false);

                return xhr;
            }
        });
    });

    </script>
    <script type="text/javascript">
    var channel = Echo.channel('custom_paper_{{$paper->id}}');
    channel.listen('.online', function(data) {
        var img = "{{ route('student-paper_sockets',['channel'=>'admin_custom_paper_'.$paper->id,'event'=>'online','plid'=>$plink->id,'sid'=>Auth::user()->id,'sname'=>Auth::user()->name,'timeleft'=>':timeleft','entry'=>':entry']) }}";
        var img = img.replace('%3Atimeleft', $("#hdfTestDuration").val());
        var img = img.replace('%3Aentry', $("#hdfTestDuration").data('entry'));
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        $.get(img, function(data) {})
    });
    channel.listen('.online_{{$plink->id}}', function(data) {
        var img = "{{ route('student-paper_sockets',['channel'=>'admin_custom_paper_'.$paper->id,'event'=>'online_'.$plink->id,'plid'=>$plink->id,'sid'=>Auth::user()->id,'sname'=>Auth::user()->name,'timeleft'=>':timeleft','entry'=>':entry']) }}";
        var img = img.replace('%3Atimeleft', $("#hdfTestDuration").val());
        var img = img.replace('%3Aentry', $("#hdfTestDuration").data('entry'));
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        $.get(img, function(data) {})
    });
    channel.listen('.message_all', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_message(title, body);
    });
    channel.listen('.reload_all', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_reload(title, body);
    });
    channel.listen('.submit_all', function(data) {
        socket_submit();
    });
    channel.listen('.message_plink_{{$plink->id}}', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_message(title, body);
    });
    channel.listen('.reload_plink_{{$plink->id}}', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_reload(title, body);
    });
    channel.listen('.submit_plink_{{$plink->id}}', function(data) {
        socket_submit();
    });
    channel.listen('.message_student_{{Auth::user()->id}}', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_message(title, body);
    });
    channel.listen('.reload_student_{{Auth::user()->id}}', function(data) {
        var title = data.channel.message.title;
        var body = data.channel.message.body;
        socket_reload(title, body);
    });
    channel.listen('.submit_student_{{Auth::user()->id}}', function(data) {
        socket_submit();
    });
    channel.listen('.message_{{$plink->id.'
        _ '.Auth::user()->id}}',
        function(data) {
            var title = data.channel.message.title;
            var body = data.channel.message.body;
            socket_message(title, body);
        });
    channel.listen('.reload_{{$plink->id.'
        _ '.Auth::user()->id}}',
        function(data) {
            var title = data.channel.message.title;
            var body = data.channel.message.body;
            socket_reload(title, body);
        });
    channel.listen('.submit_{{$plink->id.'
        _ '.Auth::user()->id}}',
        function(data) {
            socket_submit();
        });
    channel.listen('.logout_{{$plink->id.'
        _ '.Auth::user()->id}}',
        function(data) {
            var val = parseInt(data.channel.message.plid);
            var val2 = parseInt({ { $random } });
            if (val != val2) {
                document.getElementById('logout-form').submit();
            }
        });
    $(document).ready(function() {
        var Interval_time = Math.floor(Math.random() * 90000) + 80000;
        setInterval(function() {
            var img = "{{ route('student-paper_sockets',['channel'=>'custom_paper_'.$paper->id,'event'=>'logout_'.$plink->id.'_'.Auth::user()->id,'plid'=>$random,'sid'=>'x','sname'=>'x','timeleft'=>'x','entry'=>'x']) }}";
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            $.get(img, function(data) {});
        }, Interval_time);
        setTimeout(function() {
            var img = "{{ route('student-paper_sockets',['channel'=>'custom_paper_'.$paper->id,'event'=>'logout_'.$plink->id.'_'.Auth::user()->id,'plid'=>$random,'sid'=>'x','sname'=>'x','timeleft'=>'x','entry'=>'x']) }}";
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            $.get(img, function(data) {});
        }, 2000);
    });

    </script>
    <script type="text/javascript">
    var num = Math.floor(Math.random() * 300000) + 200000;
    setInterval(
        function(e) {
            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                _ '.$plink->id}}', 2);
            request.onsuccess = function(event) {
                var db = event.target.result;
                var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
                var timeStore = db.transaction("timer", "readwrite").objectStore("timer");
                objectStore.getAll().onsuccess = function(event) {
                    var answer = JSON.stringify(event.target.result);
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('student-custom_saveanswer') }}",
                        data: {
                            data: answer,
                            pid: { { $paper - > id } },
                            plid: { { $plink - > id } },
                            sid: { { Auth::user() - > id } }
                        },
                        success: function(data) {
                            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                                _ '.$plink->id}}', 2);
                            request.onsuccess = function(event) {}
                        },
                    });
                }
                timeStore.getAll().onsuccess = function(event) {
                    var answer = JSON.stringify(event.target.result);
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('student-timeleft') }}",
                        data: {
                            data: answer
                        },
                        success: function(data) {
                            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                                _ '.$plink->id}}', 2);
                            request.onsuccess = function(event) {
                                for (var i = 0; i < data.length; i++) {
                                    event.target.result.transaction("timer", "readwrite").objectStore("timer").delete(data[i]);
                                }
                            }
                        },
                    });
                }
            }
        }, num);

    var btn1p = 0;
    var btn2p = 0;
    var btn3p = 0;
    $('#btnViewResult').on('click', function(e) {
        e.preventDefault();
        $('.exam-result').show();
        $(".exam-thankyou").hide();
    });

    </script>
    <?php $plid = $plink->id;
         $pid = $paper->id;
         $sid= Auth::user()->id; ?>
    <script type="text/javascript">
    var myInterval, submitInterval, blurInterval, AttemptedAns = [],
        question_time = [@foreach($questions as $element) 0, @endforeach 0],
        TotalTime = 0;

    window.onload = function() {
        <?php  $s =0; $sm=0; $m=0;  $v=0; ?>
        @foreach($answers as $answer)

        question_time[{ { $answer - > qid } }] = parseInt({ { $answer - > time_used } });
        var s = parseInt('{{$answer->time_used}}' % 60);
        var m = parseInt('{{$answer->time_used}}' / 60);
        $(".timeof-{{$answer->qid}}").html((m = m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s));

        var w = $(".test-questions").find("li.active");
        w.removeClass("active");
        var nowQ = $(".test-questions").find("li#{{$answer->qid}}");
        if (!nowQ.hasClass("active")) {
            nowQ.addClass("active");
        }
        @if($answer - > qtype == 'single' || $answer - > qtype == 'passage' || $answer - > qtype == 'match_column')
        @if($answer - > a1 == 'A') $('input:radio[name="radiospage{{$answer->qid}}"][value="A"]').prop('checked', true).trigger("click");
        @elseif($answer - > a1 == 'B') $('input:radio[name="radiospage{{$answer->qid}}"][value="B"]').prop('checked', true).trigger("click");
        @elseif($answer - > a1 == 'C') $('input:radio[name="radiospage{{$answer->qid}}"][value="C"]').prop('checked', true).trigger("click");
        @elseif($answer - > a1 == 'D') $('input:radio[name="radiospage{{$answer->qid}}"][value="D"]').prop('checked', true).trigger("click");
        @endif
        @elseif($answer - > qtype == 'multiple')
        @if($answer - > a1 == 'A') $('input:checkbox[name="checkboxpage{{$answer->qid}}"][value="A"]').prop('checked', true);
        @endif
        @if($answer - > a2 == 'B') $('input:checkbox[name="checkboxpage{{$answer->qid}}"][value="B"]').prop('checked', true);
        @endif
        @if($answer - > a3 == 'C') $('input:checkbox[name="checkboxpage{{$answer->qid}}"][value="C"]').prop('checked', true);
        @endif
        @if($answer - > a4 == 'D') $('input:checkbox[name="checkboxpage{{$answer->qid}}"][value="D"]').prop('checked', true);
        @endif
        @elseif($answer - > qtype == 'integer')
        $("#iOption{{$answer->qid}}_1").val('{{$answer->a1}}');
        @elseif($answer - > qtype == 'numerical')
        $("#nOption{{$answer->qid}}_1").val('{{$answer->a1}}');
        @elseif($answer - > qtype == 'text')
        $("#cOption{{$answer->qid}}_1").val('{{$answer->a1}}');
        @elseif($answer - > qtype == 'scan') @if($answer - > a1 != null || $answer - > a1 != '')
        $("#cOption{{$answer->qid}}_1").val('{{$answer->a1}}');
        $('#Preview_{{$answer->qid}}').show();
        document.getElementById('Preview_{{$answer->qid}}').innerHTML = '<img src="{{$answer->a1}}" style="width:100%"/>';
        @endif
        @elseif($answer - > qtype == 'upload') @if($answer - > a1 != null || $answer - > a1 != '')
        $("#cOption{{$answer->qid}}_1").val('{{$answer->a1}}');
        $('#Preview_{{$answer->qid}}').show();
        document.getElementById('Preview_{{$answer->qid}}').innerHTML = '<img src="{{$answer->a1}}" style="width:100%"/>';
        @endif
        @endif
        @if($answer - > ans_type == 'save')
        var t = $(".test-questions").find("li.active");
        t.find("a").addClass("que-save");
        t.find("a").removeClass("que-not-attempted");
        <?php $s++;?>
        @elseif($answer - > ans_type == 'save_mark')
        var t = $(".test-questions").find("li.active");
        t.find("a").addClass("que-save-mark");
        t.find("a").removeClass("que-not-attempted");
        <?php $sm++;?>
        @elseif($answer - > ans_type == 'mark')
        var t = $(".test-questions").find("li.active");
        t.find("a").addClass("que-mark");
        t.find("a").removeClass("que-not-attempted");
        <?php $m++;?>
        @elseif($answer - > ans_type == 'visited')
        var t = $(".test-questions").find("li.active");
        t.find("a").addClass("que-not-answered");
        t.find("a").removeClass("que-not-attempted");
        <?php $v++;?>
        @endif
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
            var req = objectStore.openCursor(parseInt({ { $answer - > qid } }));
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (!cursor) { // key not exist
                    objectStore.add({ sid: parseInt({ { $answer - > sid } }), qid: parseInt({ { $answer - > qid } }), pid: "{{$answer->pid}}", plid: "{{$answer->plid}}", qtype: "{{$answer->qtype}}", qplsid: "{{$answer->qplsid}}", qplsqtypeid: "{{$answer->qplsqtypeid}}", a1: "{{$answer->a1}}", a2: "{{$answer->a2}}", a3: "{{$answer->a3}}", a4: "{{$answer->a4}}", a5: "{{$answer->a5}}", a6: "{{$answer->a6}}", a7: "{{$answer->a7}}", a8: "{{$answer->a8}}", ans_type: "{{$answer->ans_type}}", answer: "{{$answer->answer}}", positive: "{{$answer->positive}}", negative: "{{$answer->negative}}", marks: "{{$answer->marks}}", time_used: { { $answer - > time_used } } });
                }
            };
        };
        @endforeach
        @if($method == 'supported')
        if (window.indexedDB !== undefined) {
            window.sttype = 'indexedDB';
            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                _ '.$plink->id}}', 2);
            request.onerror = function(event) {
                console.log('[onerror]', request.error);
            };
            request.onupgradeneeded = function(event) {
                var db = event.target.result;
                var productsStore = db.createObjectStore('responses', { keyPath: 'qid' });
                var productsStore = db.createObjectStore('timer', { keyPath: 'qid' });
                var productsStore = db.createObjectStore('submit', { keyPath: 'id' });
            };
        }
        var plid = '{{$plid}}';
        var pid = '{{$pid}}';
        var sid = { { Auth::user() - > id } };
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
            objectStore.getAll().onsuccess = function(event) {
                event.target.result.forEach(function(answer) {

                    question_time[answer.qid] = parseInt(answer.time_used);
                    var s = parseInt(answer.time_used % 60);
                    var m = parseInt(answer.time_used / 60);
                    $(".timeof-" + answer.qid).html((m = m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s));
                    var w = $(".test-questions").find("li.active");
                    w.removeClass("active");
                    var nowQ = $(".test-questions").find("li#" + answer.qid);
                    if (!nowQ.hasClass("active")) {
                        nowQ.addClass("active");
                    }
                    if (answer.qtype == 'single') {
                        if (answer.a1 == 'A') { $('input:radio[name="radiospage' + answer.qid + '"][value="A"]').prop('checked', true).trigger("click"); } else if (answer.a1 == 'B') { $('input:radio[name="radiospage' + answer.qid + '"][value="B"]').prop('checked', true).trigger("click"); } else if (answer.a1 == 'C') { $('input:radio[name="radiospage' + answer.qid + '"][value="C"]').prop('checked', true).trigger("click"); } else if (answer.a1 == 'D') { $('input:radio[name="radiospage' + answer.qid + '"][value="D"]').prop('checked', true).trigger("click"); }
                    } else if (answer.qtype == 'multiple') {
                        if (answer.a1 == 'A') { $('input:checkbox[name="checkboxpage' + answer.qid + '"][value="A"]').prop('checked', true); }
                        if (answer.a2 == 'B') { $('input:checkbox[name="checkboxpage' + answer.qid + '"][value="B"]').prop('checked', true); }
                        if (answer.a3 == 'C') { $('input:checkbox[name="checkboxpage' + answer.qid + '"][value="C"]').prop('checked', true); }
                        if (answer.a4 == 'D') { $('input:checkbox[name="checkboxpage' + answer.qid + '"][value="D"]').prop('checked', true); }
                    } else if (answer.qtype == 'integer') {
                        $("#iOption" + answer.qid + "_1").val(answer.a1);
                    } else if (answer.qtype == 'numerical') {
                        $("#nOption" + answer.qid + "_1").val(answer.a1);
                    } else if (answer.qtype == 'text') {
                        $("#cOption" + answer.qid + "_1").val(answer.a1);
                    } else if (answer.qtype == 'scan') {
                        if (answer.a1 != null || answer.a1 != '') {
                            $("#cOption" + answer.qid + "_1").val(answer.a1);
                            $('#Preview_' + answer.qid).show();
                            document.getElementById('Preview_' + answer.qid).innerHTML = '<img src="' + answer.a1 + '" style="width:100%"/>';
                        }
                    } else if (answer.qtype == 'upload') {
                        if (answer.a1 != null || answer.a1 != '') {
                            $("#cOption" + answer.qid + "_1").val(answer.a1);
                            $('#Preview_' + answer.qid).show();
                            document.getElementById('Preview_' + answer.qid).innerHTML = '<img src="' + answer.a1 + '" style="width:100%"/>';
                        }
                    }
                    if (answer.ans_type == 'save') {
                        var t = $(".test-questions").find("li.active");
                        t.find("a").addClass("que-save");
                        t.find("a").removeClass("que-not-attempted");
                        <?php $s++;?>
                    } else if (answer.ans_type == 'save_mark') {
                        var t = $(".test-questions").find("li.active");
                        t.find("a").addClass("que-save-mark");
                        t.find("a").removeClass("que-not-attempted");
                        <?php $sm++;?>
                    } else if (answer.ans_type == 'mark') {
                        var t = $(".test-questions").find("li.active");
                        t.find("a").addClass("que-mark");
                        t.find("a").removeClass("que-not-attempted");
                        <?php $m++;?>
                    } else if (answer.ans_type == 'visited') {
                        var t = $(".test-questions").find("li.active");
                        t.find("a").addClass("que-not-answered");
                        t.find("a").removeClass("que-not-attempted");
                        <?php $v++;?>
                    }
                });
            };
        };
        @endif
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("submit", "readwrite").objectStore("submit");
            var req = objectStore.openCursor('autosubmit');
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    $('.btn-submit-all-answers').attr('disabled', true);
                    setTimeout(function() { socket_submit(); }, 5000);
                }
            };
            var req = objectStore.openCursor('blur_time');
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    $('.blur-time').val(cursor.value.time);
                }
            };
        };
        var w = $(".test-questions").find("li.active");
        w.removeClass("active");
        window.page = '1';
        var nowQ = $(".test-questions").find("li#1");
        if (!nowQ.hasClass("active")) {
            nowQ.addClass("active");
        }
        $('.lblTotalSaved').text('{{ intval($s)}}');
        $('.lblTotalSaveMarkForReview').text('{{ intval($sm)}}');
        $('.lblTotalMarkForReview').text('{{ intval($m)}}');
        $('.lblNotAttempted').text('{{ intval($v)}}');
        $('.lblNotVisited').text('{{ intval($BQN)- intval($v)- intval($s)- intval($m)- intval($sm)}}');

        setTimeout(function() { $(".pageno1").click(); }, 1000);
        //setTimeout(function(){CoundownTimer(parseInt($("#hdfTestDuration").val())); }, 6000);
        CoundownTimer(parseInt($("#hdfTestDuration").val()));
        if ($(window).width() > 776 || !window.AndroidFunction) {
            $('.landscape_rotate').hide();
            $('.portrait_rotate').hide();
        }
        $("#loading").fadeOut(500);
    };
    //------------------------------------------------event listener function------------------------------------------------------   

    function NextQuestion(e) {
        var t = $(".test-questions").find("li.active");
        CheckNextPrevButtons();
        if (!t.is(":last-child")) {
            var id = parseInt(t.attr("id")) + 1;
            $('.pageno' + id).trigger('click');
        }

    }

    function PrevQuestion(e) {
        var t = $(".test-questions").find("li.active");
        CheckNextPrevButtons();
        if (!t.is(":first-child")) {
            var id = parseInt(t.attr("id")) - 1;
            $('.pageno' + id).trigger('click');
        }
    }

    function CheckNextPrevButtons() {
        var e = $(".test-questions").find("li.active");
        $("#btnPrevQue").removeAttr("disabled"), $("#btnNextQue").removeAttr("disabled"), e.is(":first-child") ? $("#btnPrevQue").attr("disabled", "disabled") : e.is(":last-child") && $("#btnNextQue").attr("disabled", "disabled")
    }

    function pad(e, t) {
        for (var a = e + ""; a.length < t;) a = "0" + a;
        return a
    }

    function OpenCurrentQue(e) {
        $(".tab-content").hide(), $("#lblQueNumber").text(e.text()), $("#" + e.attr("data-href")).show();
        var t = e.parent().attr("data-seq");
        $(".nav-tab-sections").find("li").removeClass("active"), $(".nav-tab-sections").find("li[data-id=" + t + "]").addClass("active"), CheckQueAttemptStatus()
    }

    function CoundownTimer(e) {
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var timeStore = db.transaction("timer", "readwrite").objectStore("timer");
            timeStore.get('total_time').onsuccess = function(event) {
                var t = event.target.result.time;
                myInterval = setInterval(function() {
                    myTimeSpan = 1e3 * t, $(".timer-title").text(GetTime(myTimeSpan)), t < 600 ? ($(".timer-title").addClass("time-ending"), $(".timer-title").removeClass("time-started")) : ($(".timer-title").addClass("time-started"), $(".timer-title").removeClass("time-ending")), t > 0 ? t -= 1 : CleartTimer()
                }, 1e3)
            }
            timeStore.get('total_time').onerror = function(event) {
                var t = '{{$timeleft->timeleft}}';
                myInterval = setInterval(function() {
                    myTimeSpan = 1e3 * t, $(".timer-title").text(GetTime(myTimeSpan)), t < 600 ? ($(".timer-title").addClass("time-ending"), $(".timer-title").removeClass("time-started")) : ($(".timer-title").addClass("time-started"), $(".timer-title").removeClass("time-ending")), t > 0 ? t -= 1 : CleartTimer()
                }, 1e3)
            }
        }
    }

    function CoundownTimerNew(t) {
        myInterval = setInterval(function() {
            myTimeSpan = 1e3 * t, $(".timer-title").text(GetTime(myTimeSpan)), t < 600 ? ($(".timer-title").addClass("time-ending"), $(".timer-title").removeClass("time-started")) : ($(".timer-title").addClass("time-started"), $(".timer-title").removeClass("time-ending")), t > 0 ? t -= 1 : CleartTimer()
        }, 1e3)
    }

    function autosubmit(t) {
        submitInterval = setInterval(function() {
            myTimeSpan = 1e3 * t, $(".auto-submit-clock").text(SubmitTime(myTimeSpan)), t > 0 ? t -= 1 : $('#btnYesSubmit').trigger('click')
        }, 1e3);
    }

    function CleartTimer() {
        if (navigator.onLine) {
            clearInterval(myInterval);
            $('#socket').hide();
            $("#btnNoSubmit").hide();
            $(".btn-submit-all-answers").trigger("click");
        } else {
            clearInterval(myInterval);
            $(".btn-cancel").show();
            $('.socket_title').text('Connection Failed');
            $('.socket_body').text('Please Check Internet Connection... Failed Server Connection...');
            $("#socket").show("closed");
            setTimeout(function() { CleartTimer(); }, 2000)
        }
    }

    function blurpage() {
        var t = $('.blur-time').val();
        blurInterval = setInterval(function() {
            t++;
            $('.blur-time').val(t);
        }, 1e3);
    }

    function focuspage() {
        clearInterval(blurInterval);
        var t = $('.blur-time').val();
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("submit", "readwrite").objectStore("submit");
            var req = objectStore.openCursor('blur_time');
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    cursor.update({ id: 'blur_time', time: t });
                } else { // key not exist
                    objectStore.add({ id: 'blur_time', time: t });
                }
            };
        };
    }

    function SubmitTime(e) {
        parseInt(e % 1e3 / 100);
        var t = parseInt(e / 1e3 % 60),
            a = parseInt(e / 6e4 % 60),
            n = parseInt(e / 36e5 % 24),
            tt = (n * 60 * 60) + (a * 60) + t,
            a = n * 60 + a;
        return (a = a < 10 ? "0" + a : a) + ":" + (t < 10 ? "0" + t : t)

    }

    function GetTime(e) {
        $("#hdfTestDuration").val(e / 1e3);
        parseInt(e % 1e3 / 100);
        var t = parseInt(e / 1e3 % 60),
            a = parseInt(e / 6e4 % 60),
            n = parseInt(e / 36e5 % 24),
            tt = (n * 60 * 60) + (a * 60) + t,
            a = n * 60 + a;
        if (window.page == '1') { qq = $(".test-questions").find("li#1");
            window.page = 'active';
            $(".test-questions").find("li#1").addClass('active'); } else { qq = $(".test-questions").find("li.active"); }
        qid = qq.attr("id");
        q = parseInt(question_time[qid]) + parseInt(1);
        question_time[qid] = q;
        s = parseInt(q % 60);
        m = parseInt(q / 60);
        w = $(".timeof-" + qid).html((m = m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s));
        if (t % 2 == 0) {
            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                _ '.$plink->id}}', 2);
            request.onsuccess = function(event) {
                var db = event.target.result;
                var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
                var req = objectStore.openCursor(parseInt(qid));
                req.onsuccess = function(e) {
                    var cursor = e.target.result;
                    if (cursor) { // key already exist
                        const updateData = cursor.value;
                        updateData.time_used = question_time[updateData.qid];
                        cursor.update(updateData);
                    }
                };
            };
        } else {
            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                _ '.$plink->id}}', 2);
            request.onsuccess = function(event) {
                var db = event.target.result;
                var objectStoretime = db.transaction("timer", "readwrite").objectStore("timer");
                var reqs = objectStoretime.openCursor('total_time');
                reqs.onsuccess = function(e) {
                    var cursor = e.target.result;
                    if (cursor) { // key already exist
                        const updateData = cursor.value;
                        updateData.time = tt;
                        cursor.update(updateData);
                    } else { // key not exist
                        objectStoretime.add({ qid: 'total_time', plid: { { $plink - > id } }, time: tt });
                    }
                };
            };
        }
        return (a = a < 10 ? "0" + a : a) + ":" + (t < 10 ? "0" + t : t)

    }

    function pretty_time_string(e) {
        return (e < 10 ? "0" : "") + e
    }


    function CheckQueExists(e) {
        $.each(AttemptedAns, function(t, a) {
            void 0 !== a && a[1] == e && AttemptedAns.splice(t, 1)
        })
    }

    function CheckQueAttemptStatus() {
        var e = 0,
            t = 0,
            a = 0,
            n = 0,
            s = 0,
            i = 0;
        $(".test-questions").find("li").each(function() {
            var r = $(this);
            e += 1, r.children().hasClass("que-save") ? a += 1 : r.children().hasClass("que-save-mark") ? n += 1 : r.children().hasClass("que-mark") ? s += 1 : r.children().hasClass("que-not-answered") ? t += 1 : i += 1
        }), $(".lblTotalQuestion").text(e), $(".lblNotAttempted").text(t), $(".lblTotalSaved").text(a), $(".lblTotalSaveMarkForReview").text(n), $(".lblTotalMarkForReview").text(s), $(".lblNotVisited").text(i)
    }



    $(document).ready(function() {
        $("#page01").show();
        $(".exam-paper").show();
        CheckNextPrevButtons();
        CheckQueAttemptStatus();
        $("#btnPrevQue").click(function() {
            PrevQuestion(!0)
        });
        $("#btnNextQue").click(function() {
            NextQuestion(!0)
        });
        $(".test-ques").click(function() {
            var e = $(".test-questions").find("li.active").find("a");
            $(".test-questions").find("li").removeClass("active"),
                $(this).parent().addClass("active"),
                $(this).hasClass("que-save") || $(this).hasClass("que-save-mark") || $(this).hasClass("que-mark") || ($(this).addClass("que-not-answered"), $(this).removeClass("que-not-attempted")), e.hasClass("que-save") || e.hasClass("que-save-mark") || e.hasClass("que-mark") || (e.addClass("que-not-answered"), e.removeClass("que-not-attempted")), OpenCurrentQue($(this));
            var t = $(".test-questions").find("li.active"),
                qid = t.attr("id"),
                time = question_time[qid];
            a = t.find("a").attr("data-href");
            var a1 = "";
            var a2 = "";
            var a3 = "";
            var a4 = "";
            var na = ($("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), !1);
            var n = $("#" + a).find(".hdfCurrectAns").val();
            if (n == 'single') { if ($("input[name='radios" + a + "']").is(':checked')) { var a1 = $("input[name='radios" + a + "']:checked").val(); } } else if (n == 'multiple') {
                if ($("input[name='checkbox" + a + "'][value='A']").is(':checked')) { var a1 = $("input[name='checkbox" + a + "'][value='A']:checked").val(); }
                if ($("input[name='checkbox" + a + "'][value='B']").is(':checked')) { var a2 = $("input[name='checkbox" + a + "'][value='B']:checked").val(); }
                if ($("input[name='checkbox" + a + "'][value='C']").is(':checked')) { var a3 = $("input[name='checkbox" + a + "'][value='C']:checked").val(); }
                if ($("input[name='checkbox" + a + "'][value='D']").is(':checked')) { var a4 = $("input[name='checkbox" + a + "'][value='D']:checked").val(); }
            } else if (n == 'integer') { var a1 = $("input[name='integer" + a + "']").val(); } else if (n == 'numerical') { var a1 = $("input[name='numerical" + a + "']").val(); } else if (n == 'text' || n == 'scan' || n == 'upload') { var a1 = $("#cOption" + qid + "_1").val(); }
            plid = '{{$plink->id}}';
            pid = '{{$paper->id}}';
            sid = '{{Auth::user()->id}}';
            var q_type = $('.Question_data_' + qid).data('type');
            var q1 = $('.Question_data_' + qid).data('q1');
            var q2 = $('.Question_data_' + qid).data('q2');
            var q3 = $('.Question_data_' + qid).data('q3');
            var q4 = $('.Question_data_' + qid).data('q4');
            var positive = $('.Question_data_' + qid).data('positive');
            var negative = $('.Question_data_' + qid).data('negative');
            var type = 'visited';
            if (n == 'single' || n == 'integer') {
                if (a1 == q1) {
                    var answer = 'Correct';
                    var marks = positive;
                } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                    var answer = 'Correct';
                    var type = 'save';
                    var marks = positive;
                } else {
                    var answer = 'Incorrect';
                    var marks = negative;
                }
            } else if (n == 'multiple') {
                if (a1 == q1 && a2 == q2 && a3 == q3 && a4 == q4) {
                    var answer = 'Correct';
                    var marks = positive;
                } else if ((a1 != q1 && a1 != '') || (a2 != q2 && a2 != '') || (a3 != q3 && a3 != '') || (a4 != q4 && a4 != '')) {
                    var answer = 'Incorrect';
                    var marks = negative;
                } else {
                    var marks = 0;
                    if (a1 == q1 && a1 != '') { marks++; }
                    if (a2 == q2 && a2 != '') { marks++; }
                    if (a3 == q3 && a3 != '') { marks++; }
                    if (a4 == q4 && a4 != '') { marks++; }
                    var answer = 'Partially Correct';
                    marks = positive > marks ? marks : positive;
                }
                if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                    var answer = 'Correct';
                    ans[a1].ans_type = 'save';
                    var marks = positive;
                }
            } else if (n == 'numerical') {
                if (Number(a1) >= Number(q1) && Number(a1) <= Number(q2)) {
                    var answer = 'Correct';
                    var marks = positive;
                } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                    var answer = 'Correct';
                    var type = 'save';
                    var marks = positive;
                } else {
                    var answer = 'Incorrect';
                    var marks = negative;
                }
            } else if (n == 'text' || n == "scan" || n == "upload") {
                if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                    var answer = 'Correct';
                    var type = 'save';
                    var marks = positive;
                } else {
                    var answer = 'Pending';
                    var marks = 0;
                }
            }
            if (a1 == '' && a2 == '' && a3 == '' && a4 == '') {
                var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                    _ '.$plink->id}}', 2);
                request.onsuccess = function(event) {
                    var db = event.target.result;
                    var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
                    var req = objectStore.openCursor(parseInt(qid));
                    req.onsuccess = function(e) {
                        var cursor = e.target.result;
                        if (cursor) { // key already exist
                            cursor.update({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                        } else { // key not exist
                            objectStore.add({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                        }
                    };
                };
            }
        });
        $(".btn-save-answer").click(function(e) {
            e.preventDefault();
            var t = $(".test-questions").find("li.active"),
                a = t.find("a").attr("data-href"),
                qid = t.attr("id"),
                type = 'save',
                na = ($("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), !1);
            n = $("#" + a).find(".hdfCurrectAns").val();
            if (n == 'single') {
                if ($("input[name='radios" + a + "']").each(function() {
                        $(this).is(":checked") && (na = !0)
                    }), 0 == na) { return !1 };
                $("input[name='radios" + a + "']:checked").val();
            } else if (n == 'multiple') {
                if ($("input[name='checkbox" + a + "']").each(function() {
                        $(this).is(":checked") && (na = !0)
                    }), 0 == na) { return !1 };
                $("input[name='checkbox" + a + "']:checked").val();
            } else if (n == 'integer') {
                if ($("input[name='integer" + a + "']").val() == '') { return !1 };
                $("input[name='integer" + a + "']:checked").val();
            } else if (n == 'numerical') {
                if ($("input[name='numerical" + a + "']").val() == '') { return !1 };
                $("input[name='numerical" + a + "']:checked").val();
            } else if (n == 'text' || n == 'scan' || n == 'upload') {
                if ($("#cOption" + qid + "_1").val() == '') { return !1 };
                $("#cOption" + qid + "_1").val();
            }
            btn_save_answer(t, type),
                t.find("a").removeClass("que-save-mark"), t.find("a").removeClass("que-mark"), t.find("a").addClass("que-save"), t.find("a").removeClass("que-not-answered"), t.find("a").removeClass("que-not-attempted"), NextQuestion(!1), CheckQueAttemptStatus()
        });
        $(".btn-save-mark-answer").click(function(e) {
            e.preventDefault();
            var t = $(".test-questions").find("li.active"),
                a = t.find("a").attr("data-href"),
                qid = t.attr("id"),
                type = 'save_mark',
                na = ($("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), !1);
            n = $("#" + a).find(".hdfCurrectAns").val();
            if (n == 'single') {
                if ($("input[name='radios" + a + "']").each(function() {
                        $(this).is(":checked") && (na = !0)
                    }), 0 == na) { return !1 };
                $("input[name='radios" + a + "']:checked").val();
            } else if (n == 'multiple') {
                if ($("input[name='checkbox" + a + "']").each(function() {
                        $(this).is(":checked") && (na = !0)
                    }), 0 == na) { return !1 };
                $("input[name='checkbox" + a + "']:checked").val();
            } else if (n == 'integer') {
                if ($("input[name='integer" + a + "']").val() == '') { return !1 };
                $("input[name='integer" + a + "']:checked").val();
            } else if (n == 'numerical') {
                if ($("input[name='numerical" + a + "']").val() == '') { return !1 };
                $("input[name='numerical" + a + "']:checked").val();
            } else if (n == 'text' || n == 'scan' || n == 'upload') {
                if ($("#cOption" + qid + "_1").val() == '') { return !1 };
                $("#cOption" + qid + "_1").val();
            }
            btn_save_answer(t, type),
                t.find("a").removeClass("que-save"), t.find("a").removeClass("que-mark"), t.find("a").addClass("que-save-mark"), t.find("a").removeClass("que-not-answered"), t.find("a").removeClass("que-not-attempted"), NextQuestion(!1), CheckQueAttemptStatus()
        });
        $(".btn-mark-answer").click(function(e) {
            e.preventDefault();
            var t = $(".test-questions").find("li.active"),
                a = t.find("a").attr("data-href"),
                qid = t.attr("id"),
                type = 'mark';
            btn_mark_answer(t, type),
                $("#" + a).find(".hdfQuestionID").val(),
                $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), $("#" + a).find(".hdfCurrectAns").val(), t.find("a").removeClass("que-save-mark"), t.find("a").removeClass("que-save"), t.find("a").addClass("que-mark"), t.find("a").removeClass("que-not-answered"), t.find("a").removeClass("que-not-attempted"), NextQuestion(!1), CheckQueAttemptStatus()
        });
        $(".btn-reset-answer").click(function(e) {
            e.preventDefault();
            var t = $(".test-questions").find("li.active"),
                a = t.find("a").attr("data-href"),
                qid = t.attr("id"),
                n = $("#" + a).find(".hdfCurrectAns").val();
            $("#" + a).attr("data-queid"), t.find("a").removeClass("saved-que");
            if (n == 'single') {
                $("input[name='radios" + a + "']:checked").each(function() {
                    $(this).prop("checked", !1).change()
                });
            } else if (n == 'multiple') {
                $("input[name='checkbox" + a + "']:checked").each(function() {
                    $(this).prop("checked", !1).change()
                });
            } else if (n == 'integer') { $("input[name='integer" + a + "']").val(''); } else if (n == 'numerical') { $("input[name='numerical" + a + "']").val(''); } else if (n == 'text' || n == 'scan' || n == 'upload') { $("#cOption" + qid + "_1").val('');
                $('#Preview_' + qid).html(''); }
            a = t.find("a").attr("data-href"),
                btn_reset_answer(t),
                $("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(),
                $("#" + a).find(".hdfCurrectAns").val(), $("#" + a).find(".hdfCurrectAns").val(),
                t.find("a").removeClass("que-save-mark"),
                t.find("a").removeClass("que-mark"),
                t.find("a").removeClass("que-save"),
                t.find("a").removeClass("que-not-attempted"),
                t.find("a").addClass("que-not-answered"),
                //NextQuestion(!1),
                CheckQueAttemptStatus()
        });
        $(".btn-submit-all-answers").click(function(e) {
            e.preventDefault();
            if (navigator.onLine) {
                var con = 1;
            } else {
                var con = 0;
            }
            if (con == 1) {
                clearInterval(myInterval);
                $(".btn-cancel").hide();
                $('.socket_title').text('Submiting');
                $('.socket_body').text('Please wait... Connecting to the server...');
                $("#socket").show("closed");
                var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                    _ '.$plink->id}}', 2);
                request.onsuccess = function(event) {
                    var db = event.target.result;
                    var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
                    var timeStore = db.transaction("timer", "readwrite").objectStore("timer");
                    objectStore.getAll().onsuccess = function(event) {
                        var answer = JSON.stringify(event.target.result);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('student-custom_saveanswer') }}",
                            data: {
                                data: answer,
                                pid: { { $paper - > id } },
                                plid: { { $plink - > id } },
                                sid: { { Auth::user() - > id } }
                            },
                            success: function(data) {
                                var num = Math.floor(Math.random() * 1000) + 600;
                                setTimeout(function() { SubmitResult(data); }, num);
                            },
                        });
                    }
                    timeStore.getAll().onsuccess = function(event) {
                        var answer = JSON.stringify(event.target.result);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('student-timeleft') }}",
                            data: {
                                data: answer
                            },
                            success: function(data) {
                                var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                                    _ '.$plink->id}}', 2);
                                request.onsuccess = function(event) {
                                    for (var i = 0; i < data.length; i++) {
                                        event.target.result.transaction("timer", "readwrite").objectStore("timer").delete(data[i]);
                                    }
                                }
                            },
                        });
                    }
                }
                var con = 0;
            } else {
                clearInterval(myInterval);
                $(".btn-cancel").show();
                $('.socket_title').text('Connection Failed');
                $('.socket_body').text('Please Check Internet Connection... Failed Server Connection...');
                $("#socket").show("closed");
            }
        });


        function sortByProperty(property) {
            return function(a, b) {
                if (a[property] > b[property])
                    return 1;
                else if (a[property] < b[property])
                    return -1;

                return 0;
            }
        }


        function SubmitResult(datas) {
            var data = datas.sort(sortByProperty("qid"));
            $('.final_response').empty();
            for (var i = 0; i < data.length; i++) {
                if (data[i].ans_type == 'save') { var ans_type = 'Saved' }
                if (data[i].ans_type == 'save_mark') { var ans_type = 'Save & Mark For Review' }
                if (data[i].ans_type == 'mark') { var ans_type = 'Mark For Review' }
                if (data[i].ans_type == 'visited') { var ans_type = 'Visited' }
                var qqq = data[i].a1 + data[i].a2 + data[i].a3 + data[i].a4;
                if (qqq == "0000") { $('.final_response').append('<tr><th>' + data[i].qid + '</th><td>Bonus</td><td>' + ans_type + '</td></tr>'); } else if ((data[i].qtype == "scan" || data[i].qtype == "upload") && (data[i].ans_type == 'save' || data[i].ans_type == 'save_mark')) { $('.final_response').append('<tr><th>' + data[i].qid + '</th><td>Answer Uploaded</td><td>' + ans_type + '</td></tr>'); } else if ((data[i].qtype == "scan" || data[i].qtype == "upload") && (data[i].ans_type == 'mark' || data[i].ans_type == 'visited')) { $('.final_response').append('<tr><th>' + data[i].qid + '</th><td></td><td>' + ans_type + '</td></tr>'); } else { $('.final_response').append('<tr><th>' + data[i].qid + '</th><td>' + data[i].a1 + data[i].a2 + data[i].a3 + data[i].a4 + '</td><td>' + ans_type + '</td></tr>'); }
            }
            $("#socket").fadeOut(500);
            $(".exam-paper").hide();
            $(".stream_1").hide();
            $("#divdrplngcng").hide();
            $(".exam-summery").show();
            if (submitInterval) { clearInterval(submitInterval); }
            autosubmit(120);


            var total_marks = '{{$paper->total_marks}}';
            var totalS = 0;
            var totalQ = '{{$paper->NOQ}}';
            var totalC = 0;
            var totalW = 0;
            var totalA = 0;
            var totalP = 0;
            var blurtime = $('.blur-time').val();

            <?php $QN = 0;?>
            var k = 0;
            var ans = new Array();
            @foreach(json_decode($paper - > structure)[0] - > pattern as $subject)
            var correct = 0;
            var incorrect = 0;
            var score = 0;
            var attempt = 0;
            var pending = 0;
            var time_usedC = 0;
            var time_usedW = 0;
            var time_usedU = 0;
            var time_usedP = 0;
            @if($subject - > question > 0)
            <?php $max = 0;?>
            @foreach($subject - > pattern as $e)
            <?php $max += intval($e->question) * intval($e->positive);?>
            @endforeach
                <?php $QNL = $subject->question;?>
            for (var i = { { $QN + 1 } }; i <= { { $QN + $QNL } }; i++) {
                for (var j = k; j < data.length; j++) {
                    if (data[j].qid == i) {
                        if ((data[j].answer == "Correct" || data[j].answer == 'Partially Correct') && (data[j].ans_type == "save" || data[j].ans_type == "save_mark")) {
                            totalS += parseInt(data[j].marks);
                            score += parseInt(data[j].marks);
                            totalC++;
                            totalA++;
                            correct++;
                            attempt++;
                            time_usedC += parseInt(data[j].time_used);
                        } else if (data[j].answer == "Incorrect" && (data[j].ans_type == "save" || data[j].ans_type == "save_mark")) {
                            totalS -= parseInt(data[j].marks);
                            score -= parseInt(data[j].marks);
                            totalW++;
                            totalA++;
                            incorrect++;
                            attempt++;
                            time_usedW += parseInt(data[j].time_used);
                        } else if (data[j].answer == "Pending" && (data[j].ans_type == "save" || data[j].ans_type == "save_mark")) {
                            totalP++;
                            pending++;
                            time_usedP += parseInt(data[j].time_used);
                        } else { time_usedU += data[j].time_used; }
                        var k = parseInt(j) + parseInt(1);
                        break;
                    }
                }
            }
            ans.push({ 'subject': '{{$subject->subject}}', 'question': '{{$subject->question}}', 'total_marks': '{{$max}}', 'totalS': score, 'totalA': attempt, 'totalC': correct, 'totalW': incorrect, 'totalP': pending, 'time_usedC': time_usedC, 'time_usedW': time_usedW, 'time_usedP': time_usedP, 'time_usedU': time_usedU });
            <?php $QN = $QN + $subject->question;?>
            @endif
            @endforeach

            var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                _ '.$plink->id}}', 2);
            request.onsuccess = function(event) {
                var db = event.target.result;
                var objectStore = db.transaction("submit", "readwrite").objectStore("submit");
                var req = objectStore.openCursor('result_submit');
                req.onsuccess = function(e) {
                    var cursor = e.target.result;
                    if (cursor) { // key already exist
                        cursor.update({ id: 'result_submit', plid: '{{$plink->id}}', pid: '{{$paper->id}}', pname: '{{$paper->pname}}', TT: '{{$paper->TT}}', blurtime: blurtime, total_marks: total_marks, totalQ: totalQ, totalA: totalA, totalC: totalC, totalW: totalW, totalP: totalP, totalS: totalS, custom_structure: ans });
                    } else { // key not exist
                        objectStore.add({ id: 'result_submit', plid: '{{$plink->id}}', pid: '{{$paper->id}}', pname: '{{$paper->pname}}', TT: '{{$paper->TT}}', blurtime: blurtime, total_marks: total_marks, totalQ: totalQ, totalA: totalA, totalC: totalC, totalW: totalW, totalP: totalP, totalS: totalS, custom_structure: ans });
                    }
                };
            };
        }

        var el = 'yes';
        $("#btnYesSubmit").on("click", function(e) {
            event.preventDefault();
            if (navigator.onLine) {
                if (el == 'no') { return false; }
                clearInterval(submitInterval);
                $(".btn-cancel").hide();
                $('.socket_title').text('Result Submiting');
                $('.socket_body').text('Please wait... Submiting Result...');
                $("#socket").show("closed");
                el = 'no';
                setTimeout(function() { el = "yes";
                    $(".btn-cancel").show(); }, 15000);
                var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                    _ '.$plink->id}}', 2);
                request.onsuccess = function(event) {
                    var db = event.target.result;
                    var objectStore = db.transaction("submit", "readwrite").objectStore("submit");
                    objectStore.get('result_submit').onsuccess = function(event) {
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('student-custom_submit_result') }}",
                            data: event.target.result,
                            success: function(data) {
                                $('.socket_title').text('Redirecting to Results');
                                $('.socket_body').text('Please wait... Sending To Results Section...');
                                var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
                                    _ '.$plink->id}}', 2);
                                request.onsuccess = function(event) {
                                    event.target.result.transaction("submit", "readwrite").objectStore("submit").delete('autosubmit');
                                    event.target.result.transaction("submit", "readwrite").objectStore("submit").delete('result_submit');
                                    event.target.result.transaction("submit", "readwrite").objectStore("submit").delete('blur_time');
                                    event.target.result.transaction("timer", "readwrite").objectStore("timer").delete('total_time');
                                    event.target.result.transaction("responses", "readwrite").objectStore("responses").clear();
                                    window.indexedDB.deleteDatabase('custom_paper_{{Auth::user()->id.'
                                        _ '.$plink->id}}', 2);
                                    var img = '{{ route('
                                    student - result_analysis ',['
                                    id '=>': year ']) }}';
                                    var img = img.replace('%3Ayear', data);
                                    var num = Math.floor(Math.random() * 1000) + 600;
                                    var num1 = Math.floor(Math.random() * 5000) + 3600;
                                    setTimeout(function() { el = "no";
                                        $(".btn-cancel").hide(); }, 15000);
                                    setTimeout(function() { window.location.assign(img); }, num);
                                    setTimeout(function() {
                                        $(".btn-cancel").hide();
                                        $(".spinner").hide();
                                        $('.socket_title').text('Result Submitted successfully');
                                        $('.socket_body').text('');
                                        $('.socket_body_main').html('<p>Click Below to see Your Result..</p><br><a class="btn btn-success btn-outline-danger" href="' + img + '">Open Result</a>');
                                    }, num1);

                                }
                            },
                        });
                    }
                }
            } else {
                clearInterval(myInterval);
                $(".btn-cancel").show();
                $('.socket_title').text('Connection Failed');
                $('.socket_body').text('Please Check Internet Connection... Failed Server Connection...');
                $("#socket").show("closed");
            }

        });
        $("#btnNoSubmit").on("click", function(e) {
            CoundownTimerNew(parseInt($("#hdfTestDuration").val()));
            clearInterval(submitInterval);
            e.preventDefault(), $(".exam-paper").show(), $(".stream_1").show(), $(".exam-summery").hide(), $("#divdrplngcng").show()
        });


        $("#btnNoSubmitConfirm").on("click", function(e) {
            var btn1p = 0;
            var btn2p = 0;
            e.preventDefault(), $(".exam-paper").show(), $(".stream_1").show(), $(".exam-confirm").hide(), $("#divdrplngcng").show()
        });
        $('.paperview').on('change', function(e) {
            e.preventDefault();
            var id = $(".test-questions").find("li.active").attr("id");
            $(".ques-img_text").show();
            $(".ques-img").css('filter', 'blur(5px)');
            $(".ques-img_text" + id).hide();
            $(".ques-img" + id).css('filter', 'none');
            $(".pageno" + id).click();

            if ($(this).val() == 'all') {
                $('#show').modal('show');
                $(".ques-img_div").show();
                $('.ques-all').removeClass('hidden');
            }
            <?php $QN = 0;?>
            @foreach(json_decode($paper - > structure)[0] - > pattern as $sub)
            @if($sub - > question > 0)
            <?php $QNL = $sub->question;?>
            else if ($(this).val() == "{{$sub->subject}}") {
                $('.ques-all').addClass('hidden');
                $('#show').modal('show');
                $(".ques-img_div").hide();
                for (var i = { { $QN + 1 } }; i <= { { $QN + $QNL } }; i++) {
                    $('.ques-img' + i).removeClass('hidden');
                    $(".ques-img_div" + i).show();
                }
            }
            <?php $QN = $QN + $sub->question;?>
            @endif
            @endforeach
        });

        $('.stream_1').on('click', function(e) {
            e.preventDefault();
            var current_herf = $(this).attr('data-href');
            var a = $(".test-questions").find("li").find("a[data-href=" + current_herf + "]");
            a.trigger('click');
        });

        $('#btnRBack').on('click', function(e) {
            e.preventDefault();
            window.location.href = "online_tests";
        });
    });

    function btn_save_answer(t, typed) {
        var a = t.find("a").attr("data-href"),
            qid = t.attr("id");
        time = question_time[qid];
        var a1 = "";
        var a2 = "";
        var a3 = "";
        var a4 = "";
        var na = ($("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), !1);
        var n = $("#" + a).find(".hdfCurrectAns").val();
        if (n == 'single') {
            if ($("input[name='radios" + a + "']").each(function() {
                    $(this).is(":checked") && (na = !0)
                }), 0 == na) { return !1 };
            var a1 = $("input[name='radios" + a + "']:checked").val();
        } else if (n == 'multiple') {
            if ($("input[name='checkbox" + a + "']").each(function() {
                    $(this).is(":checked") && (na = !0)
                }), 0 == na) { return !1 };
            if ($("input[name='checkbox" + a + "'][value='A']").is(':checked')) { var a1 = $("input[name='checkbox" + a + "'][value='A']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='B']").is(':checked')) { var a2 = $("input[name='checkbox" + a + "'][value='B']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='C']").is(':checked')) { var a3 = $("input[name='checkbox" + a + "'][value='C']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='D']").is(':checked')) { var a4 = $("input[name='checkbox" + a + "'][value='D']:checked").val(); }
        } else if (n == 'integer') {
            if ($("input[name='integer" + a + "']").val() == '') { return !1 };
            var a1 = $("input[name='integer" + a + "']").val();
        } else if (n == 'numerical') {
            if ($("input[name='numerical" + a + "']").val() == '') { return !1 };
            var a1 = $("input[name='numerical" + a + "']").val();
        } else if (n == 'text' || n == 'scan' || n == 'upload') {
            if ($("#cOption" + qid + "_1").val() == '') { return !1 };
            var a1 = $("#cOption" + qid + "_1").val();
        }
        plid = '{{$plink->id}}';
        pid = '{{$paper->id}}';
        sid = '{{Auth::user()->id}}';
        var q_type = $('.Question_data_' + qid).data('type');
        var q1 = $('.Question_data_' + qid).data('q1');
        var q2 = $('.Question_data_' + qid).data('q2');
        var q3 = $('.Question_data_' + qid).data('q3');
        var q4 = $('.Question_data_' + qid).data('q4');
        var positive = $('.Question_data_' + qid).data('positive');
        var negative = $('.Question_data_' + qid).data('negative');
        var type = typed;
        if (n == 'single' || n == 'integer') {
            if (a1 == q1) {
                var answer = 'Correct';
                var marks = positive;
            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'multiple') {
            if (a1 == q1 && a2 == q2 && a3 == q3 && a4 == q4) {
                var answer = 'Correct';
                var marks = positive;
            } else if ((a1 != q1 && a1 != '') || (a2 != q2 && a2 != '') || (a3 != q3 && a3 != '') || (a4 != q4 && a4 != '')) {
                var answer = 'Incorrect';
                var marks = negative;
            } else {
                var marks = 0;
                if (a1 == q1 && a1 != '') { marks++; }
                if (a2 == q2 && a2 != '') { marks++; }
                if (a3 == q3 && a3 != '') { marks++; }
                if (a4 == q4 && a4 != '') { marks++; }
                var answer = 'Partially Correct';
            }
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                ans[a1].ans_type = 'save';
                var marks = positive;
            }
        } else if (n == 'numerical') {
            if (Number(a1) >= Number(q1) && Number(a1) <= Number(q2)) {
                var answer = 'Correct';
                var marks = positive;
            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'text' || n == "scan" || n == "upload") {
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Pending';
                var marks = 0;
            }
        }
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
            var req = objectStore.openCursor(parseInt(qid));
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    cursor.update({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                } else { // key not exist
                    objectStore.add({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                }
            };
        };
    };

    function btn_mark_answer(t, typed) {
        var a = t.find("a").attr("data-href"),
            qid = t.attr("id");
        time = question_time[qid];
        var a1 = "";
        var a2 = "";
        var a3 = "";
        var a4 = "";
        var na = ($("#" + a).find(".hdfQuestionID").val(), $("#" + a).find(".hdfPaperSetID").val(), $("#" + a).find(".hdfCurrectAns").val(), !1);
        var n = $("#" + a).find(".hdfCurrectAns").val();
        if (n == 'single') { if ($("input[name='radios" + a + "']").is(':checked')) { var a1 = $("input[name='radios" + a + "']:checked").val(); } } else if (n == 'multiple') {
            if ($("input[name='checkbox" + a + "'][value='A']").is(':checked')) { var a1 = $("input[name='checkbox" + a + "'][value='A']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='B']").is(':checked')) { var a2 = $("input[name='checkbox" + a + "'][value='B']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='C']").is(':checked')) { var a3 = $("input[name='checkbox" + a + "'][value='C']:checked").val(); }
            if ($("input[name='checkbox" + a + "'][value='D']").is(':checked')) { var a4 = $("input[name='checkbox" + a + "'][value='D']:checked").val(); }
        } else if (n == 'integer') { var a1 = $("input[name='integer" + a + "']").val(); } else if (n == 'numerical') { var a1 = $("input[name='numerical" + a + "']").val(); } else if (n == 'text' || n == 'scan' || n == 'upload') { var a1 = $("#cOption" + qid + "_1").val(); }
        plid = '{{$plink->id}}';
        pid = '{{$paper->id}}';
        sid = '{{Auth::user()->id}}';
        var q_type = $('.Question_data_' + qid).data('type');
        var q1 = $('.Question_data_' + qid).data('q1');
        var q2 = $('.Question_data_' + qid).data('q2');
        var q3 = $('.Question_data_' + qid).data('q3');
        var q4 = $('.Question_data_' + qid).data('q4');
        var positive = $('.Question_data_' + qid).data('positive');
        var negative = $('.Question_data_' + qid).data('negative');
        var type = typed;
        if (n == 'single' || n == 'integer') {
            if (a1 == q1) {
                var answer = 'Correct';
                var marks = positive;
            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'multiple') {
            if (a1 == q1 && a2 == q2 && a3 == q3 && a4 == q4) {
                var answer = 'Correct';
                var marks = positive;
            } else if ((a1 != q1 && a1 != '') || (a2 != q2 && a2 != '') || (a3 != q3 && a3 != '') || (a4 != q4 && a4 != '')) {
                var answer = 'Incorrect';
                var marks = negative;
            } else {
                var marks = 0;
                if (a1 == q1 && a1 != '') { marks++; }
                if (a2 == q2 && a2 != '') { marks++; }
                if (a3 == q3 && a3 != '') { marks++; }
                if (a4 == q4 && a4 != '') { marks++; }
                var answer = 'Partially Correct';
            }
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                ans[a1].ans_type = 'save';
                var marks = positive;
            }
        } else if (n == 'numerical') {
            if (Number(a1) >= Number(q1) && Number(a1) <= Number(q2)) {
                var answer = 'Correct';
                var marks = positive;
            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'text' || n == "scan" || n == "upload") {
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Pending';
                var marks = 0;
            }
        }
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
            var req = objectStore.openCursor(parseInt(qid));
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    cursor.update({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                } else { // key not exist
                    objectStore.add({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                }
            };
        };
    };

    function btn_reset_answer(t) {
        var a = t.find("a").attr("data-href"),
            qid = t.attr("id"),
            time = question_time[qid];
        plid = '{{$plink->id}}';
        pid = '{{$paper->id}}';
        sid = '{{Auth::user()->id}}';
        var n = $("#" + a).find(".hdfCurrectAns").val();
        var type = 'visited';
        var a1 = "";
        var a2 = "";
        var a3 = "";
        var a4 = "";
        var q_type = $('.Question_data_' + qid).data('type');
        var q1 = $('.Question_data_' + qid).data('q1');
        var q2 = $('.Question_data_' + qid).data('q2');
        var q3 = $('.Question_data_' + qid).data('q3');
        var q4 = $('.Question_data_' + qid).data('q4');
        var positive = $('.Question_data_' + qid).data('positive');
        var negative = $('.Question_data_' + qid).data('negative');
        if (n == 'single' || n == 'integer') {
            if (a1 == q1) {
                var answer = 'Correct';
                var marks = positive;

            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'multiple') {
            if (a1 == q1 && a2 == q2 && a3 == q3 && a4 == q4) {
                var answer = 'Correct';
                var marks = positive;
            } else if ((a1 != q1 && a1 != '') || (a2 != q2 && a2 != '') || (a3 != q3 && a3 != '') || (a4 != q4 && a4 != '')) {
                var answer = 'Incorrect';
                var marks = negative;
            } else {
                var marks = 0;
                if (a1 == q1 && a1 != '') { marks++; }
                if (a2 == q2 && a2 != '') { marks++; }
                if (a3 == q3 && a3 != '') { marks++; }
                if (a4 == q4 && a4 != '') { marks++; }
                var answer = 'Partially Correct';
            }
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                ans[a1].ans_type = 'save';
                var marks = positive;
            }
        } else if (n == 'numerical') {
            if (Number(a1) >= Number(q1) && Number(a1) <= Number(q2)) {
                var answer = 'Correct';
                var marks = positive;
            } else if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Incorrect';
                var marks = negative;
            }
        } else if (n == 'text' || n == "scan" || n == "upload") {
            if (q1 == '0' && q2 == '0' && q3 == '0' && q4 == '0') {
                var answer = 'Correct';
                var type = 'save';
                var marks = positive;
            } else {
                var answer = 'Pending';
                var marks = 0;
            }
        }
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("responses", "readwrite").objectStore("responses");
            var req = objectStore.openCursor(parseInt(qid));
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    cursor.update({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                } else { // key not exist
                    objectStore.add({ sid: parseInt(sid), qid: parseInt(qid), pid: pid, plid: plid, qtype: n, qplsid: qid + 'X' + plid + 'X' + sid, qplsqtypeid: qid + 'X' + plid + 'X' + sid + 'X' + n, a1: a1, a2: a2, a3: a3, a4: a4, a5: q1, a6: q2, a7: q3, a8: q4, ans_type: type, answer: answer, positive: positive, negative: negative, marks: marks, time_used: time });
                }
            };
        };

    };


    function socket_message(title, body) {
        clearInterval(myInterval);
        $(".spinner").hide();
        $(".btn-cancel").show();
        $('.socket_title').text(title);
        $('.socket_body').text(body);
        $("#socket").show("closed");
    }

    function socket_reload(title, body) {
        $(".btn-cancel").hide();
        $('.socket_title').text("Your Paper Reloading...");
        if (body != null) { $('.socket_body').text(body); } else { $('.socket_body').text("your Paper will reload in 5 sec. by institute"); }

        $("#socket").show("closed");
        clearInterval(myInterval);
        setTimeout(function() { location.reload(); }, 6000);
    }

    function socket_submit() {
        clearInterval(myInterval);
        var request = window.indexedDB.open('custom_paper_{{Auth::user()->id.'
            _ '.$plink->id}}', 2);
        request.onsuccess = function(event) {
            var db = event.target.result;
            var objectStore = db.transaction("submit", "readwrite").objectStore("submit");
            var req = objectStore.openCursor('autosubmit');
            req.onsuccess = function(e) {
                var cursor = e.target.result;
                if (cursor) { // key already exist
                    cursor.update({ id: 'autosubmit' });
                } else { // key not exist
                    objectStore.add({ id: 'autosubmit' });
                }
            };
        };
        $(".btn-cancel").hide();
        $("#btnNoSubmit").hide();
        $('.socket_title').text("Automatic Submiting...");
        $('.socket_body').text("Please wait... Your Paper will Automatic Submit in 5 sec.");
        $("#socket").show("closed");
        $('.btn-submit-all-answers').trigger('click');
    }
    $(".btn-cancel").click(function() {
        if ($('.exam-paper').css('display') != 'none') {
            CoundownTimer(parseInt($("#hdfTestDuration").val()));
        }
    });
    $(window).blur(function() {
        blurpage();
    });
    $(window).focus(function() {
        focuspage();
    });

    $('.portrait_rotate').on('click', function(e) {
        e.preventDefault();
        if (window.AndroidFunction) {
            $('.landscape_rotate').show();
            $('.portrait_rotate').hide();
            AndroidFunction.portrait();
        }
    });
    $('.landscape_rotate').on('click', function(e) {
        e.preventDefault();
        if (window.AndroidFunction) {
            $('.landscape_rotate').hide();
            $('.portrait_rotate').show();
            AndroidFunction.landscape();
        }

    });
    $(window).bind('beforeunload', function() {
        if (window.AndroidFunction) {
            AndroidFunction.portrait();
        }
    });

    </script>
    @endforeach
    @endforeach
    @endforeach
    <style type="text/css">
    #heading-breadcrumbs.active {
        background: transparent;
    }

    #heading-breadcrumbs #arrwrapper {
        min-width: 35px;
        min-height: 35px;
        margin-right: 5px;
        margin-bottom: 5px;
        border-radius: 50%;
        background: rgba(43, 43, 51, 0.8);
        border: 1.5px solid #fff;
        float: right;
        transition: 0.15s ease;
    }

    .arrows:before,
    .arrows:after {
        background-color: #fd6e70;
    }

    #heading-breadcrumbs.active .arrows:before {
        background-color: #fff;
    }

    #heading-breadcrumbs.active .arrows:after {
        background-color: #fff;
    }

    #heading-breadcrumbs.active #arrwrapper {
        border: 1.5px solid #fd6e70;
    }

    #heading-breadcrumbs {
        background: #2b2b33;
        color: #fff;
    }

    .file-input {
        display: inline-block;
    }

    .file-input__input {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .file-input__label {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        font-size: 14px;
        font-weight: 600;
        color: #999;
        font-size: 12px;
        margin-top: 5px;
        padding: 0 12px;
        justify-content: center;
        flex-direction: column;
        height: 110px;
    }

    .cameraBtn {
        width: 100px;
        height: 100px;
        border-radius: 15px;
        margin-left: 35%;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ddeafd;
        box-shadow: -7px 2px 10px 3px rgb(255 255 255 / 60%), 8px 7px 10px 3px rgb(0 0 1 / 15%), inset 2px 2px 10px 0 rgb(255 255 255 / 60%);
    }

    .cameraBtn img {
        width: 36%;
        opacity: .9;
    }

    textarea {
        display: block;
        width: 100%;
        height: 40px;
        padding: 10px;
        font-weight: 400;
        height: 150px;
        font-size: 17px;
        color: #14213d;
        border: 2px solid #8d99ae;
        border-radius: 20px;
        margin: 20px auto;
        outline: none;

    }

    </style>
</body>
@endif
@else
<h1 style=" text-align: center; font-family: sans-serif;font-weight: 400;font-size: 40px; color: #4d4d4d; padding-top: 20%;">Your Browser/Device Not Supporting. Please use Chrome / Firefox letest version</h1>
@endif

</html>
