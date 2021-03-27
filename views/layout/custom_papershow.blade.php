@extends('layout/details')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <link href="{{asset('web1/css/style4.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/event-source-polyfill@1.0.8/src/eventsource.min.js"></script>
    <link href="{{asset('css/swipereload_new.css')}}" rel="stylesheet" type="text/css" media="all">
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

    </style>
</head>

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
    <div id="noty_main" class="noty-container" style="z-index: 9999999999; position: fixed;right:10px;bottom: 10px; border-radius: 10px;width: 300px;  "></div>
    <link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainstudent_show_paper.css')}}">
    <div id="show" class="modal fade " role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainstudent_show_paper.css')}}">
                <div id="table" class="modal-body">
                    @foreach($questions as $ques)
                    @if($ques->quesimg!="" && file_exists($ques->quesimg))
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;">Question {{$ques->qid}}</li>
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;"><img src="{{ asset("$ques->quesimg")}}" />
                        <?php $names = pathinfo($ques->quesimg);
    $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                        @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                        @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif</li>
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;">Solution {{$ques->qid}}</li>
                    @if($ques->solimg!='' && file_exists($ques->solimg))
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;"><img src="{{ asset("$ques->solimg")}}" />
                        <?php $names = pathinfo($ques->solimg);
    $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                        @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                        @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif</li>
                    @else
                    <li class="hidden ques-all ques-img{{$ques->qid}}" style="list-style: none;color: #d9d9d9;">Solution Not Available</li>
                    @endif
                    @else
                    <p>Question : {{$ques->qid}} not available. Please Contact to Instructor.</p>
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
                                                <td style="padding: 5px 15px;"><img style="float: left;" src="{{asset('student/images/'.Auth::user()->photo)}}" width="100">
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
                                                                : <span class="timer-title time-started">00:00:00</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                                <input type="hidden" id="hdfTestDuration" value="{{$timeleft->timeleft}}" />
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
                                                    <?php $allquestion++ ?>
                                                    @if ($ques->qid==1)
                                                    <div style="" class="tab-content div-question mb0" id="page1">
                                                        <input type="hidden" value="1" class="hdfQuestionID">
                                                        <input type="hidden" value="1" class="hdfPaperSetID">
                                                        <input type="hidden" value="{{$ques->type}}" class="hdfCurrectAns">
                                                        <div class="question-height">
                                                            <span class="btn-info timeof-1" data-time="0">00:00</span>
                                                            <h4 class="question-title"> Question 1:</h4>
                                                            @if($ques->quesimg!="" && file_exists($ques->quesimg))
                                                            <img id="img1" alt="Question" src="{{ asset("$ques->quesimg") }}" class="img-responsive">
                                                            <?php $names = pathinfo($ques->quesimg);
                                                                $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif
                                                            <br>
                                                            @if(file_exists($ques->solimg)) <h4>Solution:-</h4>
                                                            <?php $names = pathinfo($ques->solimg);
                                                                $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            <img alt="Question" src="{{ asset("$ques->solimg") }}" class="img-responsive">
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif
                                                            @else<h4>Solution Not Available...</h4>@endif
                                                            @else
                                                            <p>Question : 1 not available. Please Contact to Instructor.</p>
                                                            @endif<br>
                                                            <table class="table table-borderless mb0">
                                                                <tbody> @if($ques->type=='single')
                                                                    <tr>
                                                                        <td> <input type="radio" value="A" name="radiospage1" id="rOption1_1" disabled> a ) </td>
                                                                        <td> <input type="radio" value="B" name="radiospage1" id="rOption1_1" disabled> b ) </td>
                                                                        <td> <input type="radio" value="C" name="radiospage1" id="rOption1_1" disabled> c ) </td>
                                                                        <td> <input type="radio" value="D" name="radiospage1" id="rOption1_1" disabled> d ) </td>
                                                                    </tr>
                                                                    @elseif($ques->type=='multiple')
                                                                    <tr>
                                                                        <td class="column1"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='A' disabled> a )</td>
                                                                        <td class="column2"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='B' disabled> b )</td>
                                                                        <td class="column3"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='C' disabled> c )</td>
                                                                        <td class="column4"><input type='checkbox' name='checkboxpage1' id="cOption1_1" value='D' disabled> d )</td>
                                                                    </tr>
                                                                    @elseif($ques->type=='integer')
                                                                    <tr>
                                                                        <td class="column3"><input style="max-width:140px; border: 2px solid var(--main-blue);border-radius: 5px; background:#fff;" type='text' id="iOption1_1" min="0" max="9" placeholder="0" name='integerpage1' disabled></td>
                                                                    </tr>
                                                                    @elseif($ques->type=='numerical')
                                                                    <tr>
                                                                        <td class="column3"><input style="max-width:140px; border: 2px solid var(--main-blue);border-radius: 5px; background:#fff;" type='text' id="nOption1_1" step="0.001" placeholder="0.000" name='numericalpage1' disabled></td>
                                                                    </tr>
                                                                    @elseif($ques->type=='scan')
                                                                    <tr>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <td class="column1"><input type="hidden" name='scanpage1' id="cOption1_1"></td>
                                                                        <div id="Preview_1" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                    </tr>
                                                                    @elseif($ques->type=='upload')
                                                                    <tr>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <td class="column1"><input type="hidden" name='uploadpage1' id="cOption1_1"></td>
                                                                        <div id="Preview_1" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                    </tr>
                                                                    @elseif($ques->type=='text')
                                                                    <textarea class="textarea" name='textpage1' id="cOption1_1" disabled=""></textarea>
                                                                    <div><span><b>Your Response</b></span></div>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div style="display: none;" class="tab-content div-question mb0" id="page{{$ques->qid}}">
                                                        <input type="hidden" value="1" class="hdfQuestionID">
                                                        <input type="hidden" value="1" class="hdfPaperSetID">
                                                        <input type="hidden" value="{{$ques->type}}" class="hdfCurrectAns">
                                                        <div class="question-height">
                                                            <span class="btn-info timeof-{{$ques->qid}}" data-time="0">00:00</span>
                                                            <h4 class="question-title"> Question&nbsp;{{$ques->qid}}:</h4>
                                                            @if($ques->quesimg!="" && file_exists($ques->quesimg))
                                                            <img alt="Question" src="{{ asset("$ques->quesimg") }}" class="img-responsive">
                                                            <?php $names = pathinfo($ques->quesimg);
                                                                $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif
                                                            <br>
                                                            @if(file_exists($ques->solimg))<h4>Solution:-</h4>
                                                            <?php $names = pathinfo($ques->solimg);
                                                                $img_1 = $names['dirname'].'/'.$names['filename'].'_1.'.$names['extension']; $img_2 = $names['dirname'].'/'.$names['filename'].'_2.'.$names['extension'];?>
                                                            <img alt="Question" src="{{ asset("$ques->solimg") }}" class="img-responsive">
                                                            @if(file_exists($img_1))<img src="{{ asset("$img_1") }}" class="img-responsive">@endif
                                                            @if(file_exists($img_2))<img src="{{ asset("$img_2") }}" class="img-responsive">@endif
                                                            @else<h4>Solution Not Available...</h4>@endif
                                                            @else
                                                            <p>Question : {{$ques->qid}} not available. Please Contact to Instructor.</p>
                                                            @endif<br>
                                                            <table class="table table-borderless mb0">
                                                                <tbody>
                                                                    @if($ques->type=='single')
                                                                    <tr>
                                                                        <td> <input type="radio" value="A" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1" disabled> a ) </td>
                                                                        <td> <input type="radio" value="B" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1" disabled> b ) </td>
                                                                        <td> <input type="radio" value="C" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1" disabled> c ) </td>
                                                                        <td> <input type="radio" value="D" name="radiospage{{$ques->qid}}" id="rOption{{$ques->qid}}_1" disabled> d ) </td>
                                                                    </tr>
                                                                    @elseif($ques->type=='multiple')
                                                                    <tr>
                                                                        <td class="column1"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='A' disabled> a )</td>
                                                                        <td class="column2"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='B' disabled> b )</td>
                                                                        <td class="column3"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='C' disabled> c )</td>
                                                                        <td class="column4"><input type='checkbox' name='checkboxpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" value='D' disabled> d )</td>
                                                                    </tr>
                                                                    @elseif($ques->type=='integer')
                                                                    <tr>
                                                                        <td class="column3"><input style="max-width:140px; border: 2px solid var(--main-blue);border-radius: 5px; background:#fff;" type='text' id="iOption{{$ques->qid}}_1" min="0" max="9" placeholder="0" name='integerpage{{$ques->qid}}' disabled></td>
                                                                    </tr>
                                                                    @elseif($ques->type=='numerical')
                                                                    <tr>
                                                                        <td class="column3"><input style="max-width:140px; border: 2px solid var(--main-blue);border-radius: 5px; background:#fff;" type='text' id="nOption{{$ques->qid}}_1" step="0.001" placeholder="0.000" name='numericalpage{{$ques->qid}}' disabled></td>
                                                                    </tr>
                                                                    @elseif($ques->type=='scan')
                                                                    <tr>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <td class="column1"><input type="hidden" name='scanpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1"></td>
                                                                        <div id="Preview_{{$ques->qid}}" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                    </tr>
                                                                    @elseif($ques->type=='upload')
                                                                    <tr>
                                                                        <div><span><b>Your Response</b></span></div>
                                                                        <td class="column1"><input type="hidden" name='uploadpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1"></td>
                                                                        <div id="Preview_{{$ques->qid}}" style="padding-top: 5px; width: 100%; display: none;"></div>
                                                                    </tr>
                                                                    @elseif($ques->type=='text')
                                                                    <div><span><b>Your Response</b></span></div>
                                                                    <textarea class="textarea" name='textpage{{$ques->qid}}' id="cOption{{$ques->qid}}_1" disabled=""></textarea>
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
                                        </div>
                                    </div>
                                    <div class="panel-footer card" style="margin: 0px 3px;">
                                        <div class="row">
                                            <div class="col-md-12">
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
                                    <li class="active" data-seq="1" id="1"><a class="test-ques que-not-answered" href="javascript:void(0);" data-href="page1">01</a></li>
                                    @foreach($questions as $ques)
                                    @if ($ques->qid>1)
                                    <li data-seq="1" class="" id="{{$ques->qid}}">
                                        <a class="test-ques que-not-attempted" href="javascript:void(0);" data-href="page{{$ques->qid}}">@if($ques->qid<10) {{'0'.$ques->qid}} @else{{$ques->qid}}@endif</a></li>
                                    @endif
                                    @endforeach
                                </ul>
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
    $(document).ready(function() {
        //Disable full page
    });
    var btn1p = 0;
    var btn2p = 0;
    var btn3p = 0;
    $('#btnViewResult').on('click', function(e) {
        e.preventDefault();
        $('.exam-result').show();
        $(".exam-thankyou").hide();
    });

    </script>
    <script type="text/javascript">
    var myInterval, AttemptedAns = [],
        TotalTime = 0;

    function NextQuestion(e) {
        var t = $(".test-questions").find("li.active");
        if (CheckNextPrevButtons(), t.is(":last-child")) return !1;
        $(".test-questions").find("li").removeClass("active"), t.next().addClass("active"), OpenCurrentQue(t.next().find("a"));
        var a = t.attr("data-seq");
        $(".nav-tab-sections").find("li").removeClass("active"), $(".nav-tab-sections").find("li[data-id=" + a + "]").addClass("active"), CheckQueAttemptStatus()
    }

    function PrevQuestion(e) {
        var t = $(".test-questions").find("li.active");
        if (CheckNextPrevButtons(), t.is(":first-child")) return !1;
        $(".test-questions").find("li").removeClass("active"), t.prev().addClass("active"), OpenCurrentQue(t.prev().find("a"));
        var a = t.attr("data-seq");
        $(".nav-tab-sections").find("li").removeClass("active"), $(".nav-tab-sections").find("li[data-id=" + a + "]").addClass("active"), CheckQueAttemptStatus()
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


    }


    function CheckQueExists(e) {
        $.each(AttemptedAns, function(t, a) {
            void 0 !== a && a[1] == e && AttemptedAns.splice(t, 1)
        })
    }

    function CheckQueAttemptStatus() {

    }



    $(document).ready(function() {
        $("#page01").show();
        $(".exam-paper").show();
        CoundownTimer(parseInt($("#hdfTestDuration").val()));
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
                OpenCurrentQue($(this))
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

    </script>
    <script type="text/javascript">
    $(window).load(function() {
        $('.hover_bkgr_fricc').click(function() {
            $('.hover_bkgr_fricc').hide();
        });
        $('.popupCloseButton').click(function() {
            $('.hover_bkgr_fricc').hide();
        });
    });

    </script>
    <?php $plid = $plink->id;
    $pid = $paper->id;
    $sid= Auth::user()->id; ?>
    @endforeach
    @endforeach
    @endforeach
    <script type="text/javascript">
    window.onload = function() {
        <?php  $s =0; $sm=0; $m=0;  $v=0; ?>
        @foreach($answers as $answer)
        var s = parseInt('{{$answer->time_used}}' % 60);
        var m = parseInt('{{$answer->time_used}}' / 60);
        $(".timeof-{{$answer->qid}}").html((m = m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s));
        var w = $(".test-questions").find("li.active");
        w.removeClass("active");
        var nowQ = $(".test-questions").find("li#{{$answer->qid}}");
        if (!nowQ.hasClass("active")) {
            nowQ.addClass("active");
        }
        @if($answer - > qtype == 'single')
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
        @endforeach

        var w = $(".test-questions").find("li.active");
        w.removeClass("active");
        var nowQ = $(".test-questions").find("li#1");
        if (!nowQ.hasClass("active")) {
            nowQ.addClass("active");
        }
        $('.lblTotalSaved').text('{{ intval($s)}}');
        $('.lblTotalSaveMarkForReview').text('{{ intval($sm)}}');
        $('.lblTotalMarkForReview').text('{{ intval($m)}}');
        $('.lblNotAttempted').text('{{ intval($v)}}');
        $('.lblNotVisited').text('{{ intval(json_decode($paper->structure)[0]->question)- intval($v)- intval($s)- intval($m)- intval($sm)}}');

        $("#loading").fadeOut(500);
    };

    </script>
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

    </style>
</body>

</html>
