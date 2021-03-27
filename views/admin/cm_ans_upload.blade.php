@extends('layout/admin_dashboard')
@extends('layout/details')
@section('popup')
<div id="update_result_modal" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Results</h4>
            </div>
            <div class="modal-body">
                <h4>Are You sure want to Update Results?</h4>
                <br>
                <div class="checkboxes">
                    <label for="notify_checkbox"><input type="checkbox" id="notify_checkbox" /><span>Send Notifications</span></label>
                </div>
                <style type="text/css">
                .checkboxes label {
                    display: inline-block;
                    padding-right: 10px;
                    white-space: nowrap;
                    background: #ff66558c;
                    border: 2px solid #ff6655;
                    border-radius: 3px;
                }

                .checkboxes input {
                    vertical-align: middle;
                    display: inline-block;
                    margin-bottom: -13px;
                    height: 15px !important;
                    width: 30px;
                    height: 10px;
                }

                .checkboxes label span {
                    vertical-align: middle;
                }

                </style>
            </div>
            <div class="modal-footer">
                <button style="background-color: #fd6e70" class="btn btn-warning" data-pid="{{app('request')->input('id')}}" type="submit" id="update_result_submit">
                    Update
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remobe"></span>Close
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div id="bonus" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bonus</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="modal">
                    @csrf
                    <h4 id="bonus-name"></h4>
                    <p id="bonus-id" class="hidden"></p>
                    <p id="bonus-type" class="hidden"></p>
                    <p id="bonus-bonus" class="hidden"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button style="background-color: #fd6e70" class="btn btn-warning" type="submit" id="bonus-student">
                    Bonus
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remobe"></span>Close
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('inner_block')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainadv_ans_upload.css')}}">
<div class="limiter">
    <div class="title">
        <div class="searchBox">
            <h4><b>Upload Answer</b>&nbsp;<button id="update_answer" class="btn btn-success">Update</button>&nbsp;<button style="background-color: #fd6e70;color: #fff;" class="btn" data-toggle="modal" data-target="#update_result_modal" id="update_result">Result&nbsp;Update</button></h4>
        </div>
    </div>
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">S.No</th>
                            <th class="column2">Q.Name</th>
                            <th class="column3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <style type="text/css">
                        input[type="radio"] {
                            margin-top: -14px;
                        }

                        input[type="checkbox"] {
                            margin-top: -14px;
                        }

                        </style>
                        @csrf
                        <?php  $no=1; ?>
                        @foreach($users as $user)
                        @if($user->type=='single')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>@if($user->q1==''||$user->q1=='0')
                            <td class="column3">
                                <lable>A <input type='radio' name='{{$user->qpqtypeid}}' value='A'></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='radio' name='{{$user->qpqtypeid}}' value='B'></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='radio' name='{{$user->qpqtypeid}}' value='C'></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='radio' name='{{$user->qpqtypeid}}' value='D'></lable>
                            </td>
                            @endif
                            @if($user->q1=='A')
                            <td class="column3">
                                <lable>A <input type='radio' name='{{$user->qpqtypeid}}' value='A' checked></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='radio' name='{{$user->qpqtypeid}}' value='B'></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='radio' name='{{$user->qpqtypeid}}' value='C'></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='radio' name='{{$user->qpqtypeid}}' value='D'></lable>
                            </td>
                            @endif
                            @if($user->q1=='B')
                            <td class="column3">
                                <lable>A <input type='radio' name='{{$user->qpqtypeid}}' value='A'></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='radio' name='{{$user->qpqtypeid}}' value='B' checked></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='radio' name='{{$user->qpqtypeid}}' value='C'></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='radio' name='{{$user->qpqtypeid}}' value='D'></lable>
                            </td>
                            @endif
                            @if($user->q1=='C')
                            <td class="column3">
                                <lable>A <input type='radio' name='{{$user->qpqtypeid}}' value='A'></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='radio' name='{{$user->qpqtypeid}}' value='B'></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='radio' name='{{$user->qpqtypeid}}' value='C' checked></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='radio' name='{{$user->qpqtypeid}}' value='D'></lable>
                            </td>
                            @endif
                            @if($user->q1=='D')
                            <td class="column3">
                                <lable>A <input type='radio' name='{{$user->qpqtypeid}}' value='A'></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='radio' name='{{$user->qpqtypeid}}' value='B'></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='radio' name='{{$user->qpqtypeid}}' value='C'></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='radio' name='{{$user->qpqtypeid}}' value='D' checked></lable>
                            </td>
                            @endif
                            <td class="column7"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="single" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                        </tr>
                        @elseif($user->type=='multiple')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3">
                                <lable>A <input type='checkbox' name='{{$user->qpqtypeid}}' value='A' @if($user->q1=='A') checked @endif></lable>
                            </td>
                            <td class="column4">
                                <lable>B <input type='checkbox' name='{{$user->qpqtypeid}}' value='B' @if($user->q2=='B') checked @endif></lable>
                            </td>
                            <td class="column5">
                                <lable>C <input type='checkbox' name='{{$user->qpqtypeid}}' value='C' @if($user->q3=='C') checked @endif></lable>
                            </td>
                            <td class="column6">
                                <lable>D <input type='checkbox' name='{{$user->qpqtypeid}}' value='D' @if($user->q4=='D') checked @endif></lable>
                            </td>
                            <td class="column7"><button type='submit' class="btn btn-warning" id='{{$user->qpqtypeid}}'>OK</button>
                                &nbsp;&nbsp;<button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="multiple" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                        </tr>
                        </tr>
                        @elseif($user->type=='integer')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3"><input type='number' id="in1put{{$user->qpqtypeid}}" min="0" max="9" placeholder="0" value="{{$user->q1}}" name='{{$user->qpqtypeid}}'></td>
                            <td class="column4"><button type='submit' class="btn btn-info" id='{{$user->qpqtypeid}}'>OK</button></td>
                            <td class="column5"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background:@if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="integer" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                            <td class="column6"></td>
                            <td class="column7"></td>
                        </tr>
                        @elseif($user->type=='numerical')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3"><input type='number' id="in2put{{$user->qpqtypeid}}" step="0.001" placeholder="0.000" name='{{$user->qpqtypeid}}' value="{{$user->q1}}"></td>
                            <td class="column4"><input type='number' id="in3put{{$user->qpqtypeid}}" step="0.001" placeholder="0.000" name='{{$user->qpqtypeid}}' value="{{$user->q2}}"></td>
                            <td class="column5"><button type='submit' class="btn btn-primary" id='{{$user->qpqtypeid}}'>OK</button></td>
                            <td class="column6"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="numerical" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                            <td class="column7"></td>
                        </tr>
                        @elseif($user->type=='text')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3" colspan="4"><b>Text Box Type Question</b></td>
                            <td class="column7"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="text" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                        </tr>
                        @elseif($user->type=='scan')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3" colspan="4"><b>Scan Answer Type Question</b></td>
                            <td class="column7"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="scan" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                        </tr>
                        @elseif($user->type=='upload')
                        <tr class="user{{$user->qid}}">
                            <td class="column1">{{$no++}}</td>
                            <td class="column2">{{$user->qid}}</td>
                            <td class="column3" colspan="4"><b>Image File of Answer Upload Type Question</b></td>
                            <td class="column7"><button type='submit' class="btn bonus-button_{{$user->qpqtypeid}}" style="background: @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') #1CC88A @else #f6c23e @endif" id="bonus-button" data-name="{{$user->qid}}" @if($user->q1=='0'&&$user->q2=='0'&&$user->q3=='0'&&$user->q4=='0') data-bonus='yes' @else data-bonus='no' @endif data-type="upload" data-id="{{$user->qpqtypeid}}">Bonus</button></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
var changes = 'no';
$(window).bind('beforeunload', function() {
    if (changes == 'yes') {
        return confirm('please update your answer before unload.');
    }
});
var array = JSON.parse('<?php echo json_encode($users); ?>');
var ans_array = new Array();
var result_array = new Array();
var ans = '';
@foreach($users as $user)
$('input:radio[name="{{$user->qpqtypeid}}"]').change(function() {
    var q1 = $(this).val();
    for (var i = 0; i < array.length; i++) {
        if (array[i].qpqtypeid == "{{$user->qpqtypeid}}") {
            array[i].q1 = q1;
            changes = 'yes';
        }
    }
});
@endforeach


@foreach($users as $user)
@if($user - > type == 'single')
$('input:radio[name="{{$user->qpqtypeid}}"]').change(function() {
    var q1 = $(this).val();
    for (var i = 0; i < array.length; i++) {
        if (array[i].qpqtypeid == "{{$user->qpqtypeid}}") {
            array[i].q1 = q1;
            array[i].q2 = '';
            array[i].q3 = '';
            array[i].q4 = '';
            changes = 'yes';
        }
    }
});
@endif
@if($user - > type == 'multiple')
$('#{{$user->qpqtypeid}}').click(function() {
    for (var i = 0; i < array.length; i++) {
        if (array[i].qpqtypeid == "{{$user->qpqtypeid}}") {
            changes = 'yes';
            array[i].q1 = '';
            array[i].q2 = '';
            array[i].q3 = '';
            array[i].q4 = '';
            $("input[name='{{$user->qpqtypeid}}']").each(function() {
                if ($(this).val() == 'A' && $(this).is(':checked')) {
                    array[i].q1 = 'A';
                }
                if ($(this).val() == 'B' && $(this).is(':checked')) {
                    array[i].q2 = 'B';
                }
                if ($(this).val() == 'C' && $(this).is(':checked')) {
                    array[i].q3 = 'C';
                }
                if ($(this).val() == 'D' && $(this).is(':checked')) {
                    array[i].q4 = 'D';
                }
            });
        }
    }

});
@endif
@if($user - > type == 'integer')
$('#{{$user->qpqtypeid}}').click(function() {
    var q1 = $('#in1put{{$user->qpqtypeid}}').val();
    for (var i = 0; i < array.length; i++) {
        if (array[i].qpqtypeid == "{{$user->qpqtypeid}}") {
            array[i].q1 = q1;
            array[i].q2 = '';
            array[i].q3 = '';
            array[i].q4 = '';
            changes = 'yes';
        }
    }
});
@endif
@if($user - > type == 'numerical')
$('#{{$user->qpqtypeid}}').click(function() {
    var q1 = $('#in2put{{$user->qpqtypeid}}').val();
    var q2 = $('#in3put{{$user->qpqtypeid}}').val();
    for (var i = 0; i < array.length; i++) {
        if (array[i].qpqtypeid == "{{$user->qpqtypeid}}") {
            array[i].q1 = q1;
            array[i].q2 = q2;
            array[i].q3 = '';
            array[i].q4 = '';
            changes = 'yes';
        }
    }
});
@endif
@endforeach

$('#update_answer').click(function() {
    var loading = document.getElementById('loading');
    loading.style.display = '';
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - advanced_paper_ans_upload_submit ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'data': JSON.stringify(array),
            'pqtypeid': '{{$id}}'
        },
        success: function(data) {
            $("#loading").fadeOut();
            changes = 'no';
        },
    });
});


$(document).on('click', '#bonus-button', function() {
    $('#bonus').modal({ backdrop: 'false' });
    $('#bonus').modal('show');
    $('#bonus-id').text($(this).data('id'));
    $('#bonus-type').text($(this).data('type'));
    $('#bonus-bonus').text($(this).data('bonus'));
    if ($(this).data('bonus') == 'yes') {
        $('#bonus-name').text('Are You sure want to Remove Bonus on Question (' + $(this).data('name') + ')....');
        $('#bonus-student').text('Remove');
    }
    if ($(this).data('bonus') == 'no') {
        $('#bonus-name').text('Are You sure want to Give Bonus on Question (' + $(this).data('name') + ')....');
        $('#bonus-student').text('Bonus');
    }

});
$('#bonus-student').click(function() {
    var id = $('#bonus-id').text();
    var type = $('#bonus-type').text();
    var bonus = $('#bonus-bonus').text();
    if ($('#bonus-bonus').text() == 'yes') {
        for (var i = 0; i < array.length; i++) {
            if (array[i].qpqtypeid == $('#bonus-id').text()) {
                array[i].q1 = '';
                array[i].q2 = '';
                array[i].q3 = '';
                array[i].q4 = '';
                changes = 'yes';
                $('#bonus').modal('hide');
            }
        }
        if (type == 'single') {
            $('input:radio[name="' + id + '"]').each(function() {
                $(this).attr('checked', false);
            });
        } else if (type == 'multiple') {
            $('input:checkbox[name="' + id + '"]').each(function() {
                $(this).attr('checked', false);
            });
        } else if (type == 'integer') {
            $('#in1put' + id).val('0');
        } else if (type == 'numerical') {
            $('#in2put' + id).val('0');
            $('#in3put' + id).val('0');
        }
        $('.bonus-button_' + id).css("background-color", '#f6c23e');
        $('.bonus-button_' + id).data('bonus', 'no');
    } else if ($('#bonus-bonus').text() == 'no') {
        for (var i = 0; i < array.length; i++) {
            if (array[i].qpqtypeid == $('#bonus-id').text()) {
                array[i].q1 = '0';
                array[i].q2 = '0';
                array[i].q3 = '0';
                array[i].q4 = '0';
                changes = 'yes';
                $('#bonus').modal('hide');

            }
        }
        if (type == 'single') {
            $('input:radio[name="' + id + '"]').each(function() {
                $(this).attr('checked', false);
            });
        } else if (type == 'multiple') {
            $('input:checkbox[name="' + id + '"]').each(function() {
                $(this).attr('checked', false);
            });
        } else if (type == 'integer') {
            $('#in1put' + id).val('0');
        } else if (type == 'numerical') {
            $('#in2put' + id).val('0');
            $('#in3put' + id).val('0');
        }
        $('.bonus-button_' + id).css("background", '#1CC88A');
        $('.bonus-button_' + id).data('bonus', 'yes');
    }
});



$(document).on('click', '#update_result_submit', function() {
    var loading = document.getElementById('loading');
    loading.style.display = '';
    $('#update_result_modal').modal('hide');
    $.get("{{ route('admin-get_results_json',['id'=>app('request')->input('id')]) }}&type=custom", function(data) {
        var paper = data.paper;
        var answers = data.answers;
        var questions = data.questions;
        for (var a = 0; a < answers.length; a++) {
            var id = answers[a].id;
            var pid = answers[a].pid;
            var plid = answers[a].plid;
            var sid = answers[a].sid;
            var ans = JSON.parse(answers[a].answers);
            // console.log(ans[0].qid);
            for (var a1 = 0; a1 < ans.length; a1++) {
                var q_no = parseInt(ans[a1].qid) - parseInt(1);
                ans[a1].a5 = questions[q_no].q1;
                ans[a1].a6 = questions[q_no].q2;
                ans[a1].a7 = questions[q_no].q3;
                ans[a1].a8 = questions[q_no].q4;

                if (questions[q_no].type == 'single' || questions[q_no].type == 'integer') {
                    if (ans[a1].a1 == ans[a1].a5) {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].positive;
                    } else if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    } else {
                        var correct = 'Incorrect';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].negative;
                    }
                } else if (questions[q_no].type == 'multiple') {
                    if (ans[a1].a1 == ans[a1].a5 && ans[a1].a2 == ans[a1].a6 && ans[a1].a3 == ans[a1].a7 && ans[a1].a4 == ans[a1].a8) {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].positive;
                    } else if ((ans[a1].a1 != ans[a1].a5 && ans[a1].a1 != '') || (ans[a1].a2 != ans[a1].a6 && ans[a1].a2 != '') || (ans[a1].a3 != ans[a1].a7 && ans[a1].a3 != '') || (ans[a1].a4 != ans[a1].a8 && ans[a1].a4 != '')) {
                        var correct = 'Incorrect';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].negative;
                    } else {
                        var marks = 0;
                        if (ans[a1].a1 == ans[a1].a5 && ans[a1].a1 != '') { marks++; }
                        if (ans[a1].a2 == ans[a1].a6 && ans[a1].a2 != '') { marks++; }
                        if (ans[a1].a3 == ans[a1].a7 && ans[a1].a3 != '') { marks++; }
                        if (ans[a1].a4 == ans[a1].a8 && ans[a1].a4 != '') { marks++; }
                        var correct = 'Partially Correct';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].positive > marks ? marks : ans[a1].positive;
                    }
                    if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    }
                } else if (questions[q_no].type == 'numerical') {
                    if (Number(ans[a1].a1) >= Number(ans[a1].a5) && Number(ans[a1].a1) <= Number(ans[a1].a6)) {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].positive;
                    } else if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    } else {
                        var correct = 'Incorrect';
                        ans[a1].answer = correct;
                        ans[a1].marks = ans[a1].negative;
                    }
                } else if (questions[q_no].type == 'text') {
                    if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    }
                } else if (questions[q_no].type == 'scan') {
                    if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    }
                } else if (questions[q_no].type == 'upload') {
                    if (questions[q_no].q1 == '0' && questions[q_no].q2 == '0' && questions[q_no].q3 == '0' && questions[q_no].q4 == '0') {
                        var correct = 'Correct';
                        ans[a1].answer = correct;
                        ans[a1].ans_type = 'save';
                        ans[a1].marks = ans[a1].positive;
                    }
                }

            }
            ans_array.push({ 'id': id, 'pid': pid, 'plid': plid, 'sid': sid, 'answers': ans });
            GetResult(ans, pid, plid, sid, paper);
        }
        if ($('#notify_checkbox').is(':checked')) {
            var noti = 'yes';
        } else {
            var noti = 'no';
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - update_results_submit ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'answers': JSON.stringify(ans_array),
                'results': JSON.stringify(result_array),
                'notification': noti
            },
            success: function(data) {
                $("#loading").fadeOut();
            },
        });
    });
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


function GetResult(datas, p_id, pl_id, s_id, paper) {
    var data = datas.sort(sortByProperty("qid"));
    var total_marks = paper[0].total_marks;
    var totalS = 0;
    var totalQ = paper[0].NOQ;
    var totalC = 0;
    var totalW = 0;
    var totalA = 0;
    var totalP = 0;

    var qn = 0;
    var k = 0;
    var ans = new Array();
    for (var i = 0; i < JSON.parse(paper[0].structure)[0].pattern.length; i++) {
        var subject = JSON.parse(paper[0].structure)[0].pattern[i];
        var correct = 0;
        var incorrect = 0;
        var score = 0;
        var attempt = 0;
        var pending = 0;
        var time_usedC = 0;
        var time_usedW = 0;
        var time_usedU = 0;
        var time_usedP = 0;
        if (subject.question > 0) {
            var qnl = subject.question;
            for (var i = qn + 1; i <= (qn + qnl); i++) {
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
            ans.push({ 'subject': subject.subject, 'question': subject.question, 'total_marks': subject.marks, 'totalS': score, 'totalA': attempt, 'totalC': correct, 'totalW': incorrect, 'totalP': pending, 'time_usedC': time_usedC, 'time_usedW': time_usedW, 'time_usedP': time_usedP, 'time_usedU': time_usedU });
            qn += subject.question;
        }
    }
    result_array.push({ 'plid': pl_id, 'pid': p_id, 'sid': s_id, 'totalQ': totalQ, 'totalA': totalA, 'totalC': totalC, 'totalW': totalW, 'totalP': totalP, 'totalS': totalS, 'CinP': 0, 'WinP': 0, 'MinP': 0, 'CinC': 0, 'WinC': 0, 'MinC': 0, 'CinM': 0, 'WinM': 0, 'MinM': 0, 'CinB': 0, 'WinB': 0, 'MinB': 0, 'custom_structure': ans });
};

</script>
@endsection
