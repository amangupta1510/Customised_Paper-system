@extends('layout/admin_dashboard')
@extends('layout/details')
@section('head')
<style type="text/css">
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

</style>
@endsection
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
                <button style="background-color: #fd6e70" class="btn btn-warning" data-plid="{{app('request')->input('id')}}" data-pid="{{app('request')->input('pid')}}" type="submit" id="update_result_submit">
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
@endsection
@section('analysis')
<div class="d-sm-flex justify-content-between align-items-center mb-4 pt-2">
    @csrf
    <h3 class="text-dark mb-0">
        <div class="boxed">
            <input type="radio" id="type1" name="type" class="type" value="Pending" onclick="handleClick(this.value);" checked="">
            <label for="type1" style="width: auto;background: #fd6e70;color: #fff;">Pending&nbsp;Responses</label>
            <input type="radio" id="type2" name="type" class="type" value="All" onclick="handleClick(this.value);">
            <label for="type2" style="width: auto;background: #fd6e70;color: #fff;">All&nbsp;Responses</label>
            &nbsp;<button style="color: #fff; padding: 3px 6px; font-size: 14px;" class="btn btn-success btn-outline-danger mt-1" data-toggle="modal" data-target="#update_result_modal" id="update_result">Result&nbsp;Update</button>
        </div>
    </h3>
</div>
<div class="container">
    <table class="table table-bordered table_all">
        <?php $no=0;?>
        @foreach(json_decode($questions[0]->questions) as $q)
        @if($q->type =="text"||$q->type =="scan"||$q->type =="upload")
        <tr class="header ques_{{$q->qid}}">
            <td colspan="4">Question {{$q->qid}} Resopnses <i><b class="ques_i ques_i_{{$q->qid}}" style="font-size: 13px;color:#fd6e70;" data-id="{{$q->qid}}" data-count="0">(0 pending)</b></i></td>
        </tr>
        @endif
        @endforeach
        @foreach($answers as $ans)
        @foreach(json_decode($ans->answers) as $a)
        @if($a->ans_type=="save"||$a->ans_type=="save_mark")
        <?php $no++?>
        @if($a->qtype == "text")
        <tr class="ans" data-id="{{$a->qid}}" @if($a->answer=="Pending")data-type="pending"@else data-type="done" @endif>
            <td colspan="2" @if($a->answer=="Pending") class="div_{{$no}} div_Pending" @else class="div_{{$no}} div_all" @endif style="max-width: 60%;min-width: 60%;width: 60%;"><textarea disabled="">{{$a->a1}}</textarea></td>
            <td @if($a->answer=="Pending") class="div_{{$no}} div_Pending" @else class="div_{{$no}} div_all" @endif>
                <span>Student&nbsp;:&nbsp;{{$ans->s_name}}</span>
                <br>
                <li class="error_warning error_warning_{{$no}} hidden">There in an error</li>
                <div class="boxed">
                    <input type="radio" id="correct_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->positive}}" value="Correct" @if($a->answer=="Correct") checked="" @endif>
                    <label for="correct_{{$no}}">Mark&nbsp;Correct</label>
                    <input type="radio" id="incorrect_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->negative}}" value="Incorrect" @if($a->answer=="Incorrect") checked="" @endif >
                    <label for="incorrect_{{$no}}">Mark&nbsp;Incorrect</label>
                    <input type="radio" id="partial_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->marks}}" value="Partially Correct" @if($a->answer=="Partially Correct") checked="" @endif>
                    <label for="partial_{{$no}}">Partial&nbsp;Mark</label>
                </div>
                <br>
                <label for="input_{{$no}}">Marks&nbsp;:&nbsp;</label>
                <input type="number" class="marks_input" id="input_{{$no}}" name="answer_{{$no}}" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" value="{{$a->marks}}" onKeyUp="if(this.value>{{intval($a->positive)}}){this.value='{{$a->positive}}';}else if(this.value<{{intval($a->negative)}}){this.value='{{$a->negative}}';}" onkeydown="javascript: return event.keyCode == 69 ? false : true" readonly="">
                &nbsp;&nbsp;<a class="btn btn-danger update_marks update_marks_{{$no}}" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" style="color: #fff;display: none;">Update Marks</a>
                <br>
                <span class="status_{{$no}}">Status : {{$a->answer}}</span>
            </td>
        </tr>
        @endif
        @if($a->qtype == "scan"||$a->qtype == "upload")
        <tr class="ans" data-id="{{$a->qid}}" @if($a->answer=="Pending")data-type="pending"@else data-type="done" @endif>
            <td colspan="2" @if($a->answer=="Pending") class="div_{{$no}} div_Pending" @else class="div_{{$no}} div_all" @endif style="max-width: 60%;min-width: 60%;width: 60%;"><img src="{{ asset("$a->a1") }}" style="width: 99%;"></td>
            <td @if($a->answer=="Pending") class="div_{{$no}} div_Pending" @else class="div_{{$no}} div_all" @endif>
                <span>Student&nbsp;:&nbsp;{{$ans->s_name}}</span>
                <br>
                <li class="error_warning error_warning_{{$no}} hidden">There in an error</li>
                <div class="boxed">
                    <input type="radio" id="correct_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->positive}}" value="Correct" @if($a->answer=="Correct") checked="" @endif>
                    <label for="correct_{{$no}}">Mark&nbsp;Correct</label>
                    <input type="radio" id="incorrect_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->negative}}" value="Incorrect" @if($a->answer=="Incorrect") checked="" @endif >
                    <label for="incorrect_{{$no}}">Mark&nbsp;Incorrect</label>
                    <input type="radio" id="partial_{{$no}}" name="answer_{{$no}}" class="answer" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" data-marks="{{$a->marks}}" value="Partially Correct" @if($a->answer=="Partially Correct") checked="" @endif>
                    <label for="partial_{{$no}}">Partial&nbsp;Mark</label>
                </div>
                <br>
                <label for="input_{{$no}}">Marks&nbsp;:&nbsp;</label>
                <input type="number" class="marks_input" id="input_{{$no}}" name="answer_{{$no}}" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" value="{{$a->marks}}" onKeyUp="if(this.value>{{intval($a->positive)}}){this.value='{{$a->positive}}';}else if(this.value<{{intval($a->negative)}}){this.value='{{$a->negative}}';}" onkeydown="javascript: return event.keyCode == 69 ? false : true" readonly="">
                &nbsp;&nbsp;<a class="btn btn-danger update_marks update_marks_{{$no}}" data-id="{{$ans->id}}" data-box="{{$no}}" data-qid="{{$a->qid}}" style="color: #fff;display: none;">Update Marks</a>
                <br>
                <span class="status_{{$no}}">Status : {{$a->answer}}</span>
            </td>
        </tr>
        @endif
        @endif
        @endforeach
        @endforeach
    </table>
</div>
</div>
<style type="text/css">
.table>tbody>tr.active>td,
.table>tbody>tr.active>th,
.table>tbody>tr>td.active,
.table>tbody>tr>th.active,
.table>tfoot>tr.active>td,
.table>tfoot>tr.active>th,
.table>tfoot>tr>td.active,
.table>tfoot>tr>th.active,
.table>thead>tr.active>td,
.table>thead>tr.active>th,
.table>thead>tr>td.active,
.table>thead>tr>th.active {
    background-color: #fff;
}

.table-bordered>tbody>tr>td,
.table-bordered>tbody>tr>th,
.table-bordered>tfoot>tr>td,
.table-bordered>tfoot>tr>th,
.table-bordered>thead>tr>td,
.table-bordered>thead>tr>th {
    border-color: #45e5e7;
}

.table tr.header {
    font-weight: bold;
    background-color: #fff;
    cursor: pointer;
    -webkit-user-select: none;
    /* Chrome all / Safari all */
    -moz-user-select: none;
    /* Firefox all */
    -ms-user-select: none;
    /* IE 10+ */
    user-select: none;
    /* Likely future */
}

.table tr:not(.header) {
    display: none;
}

.table .header td:after {
    content: "\002b";
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    float: right;
    color: #45e5e7;
    text-align: center;
    padding: 3px;
    transition: transform .25s linear;
    -webkit-transition: -webkit-transform .25s linear;
}

.table .header.active td:after {
    content: "\2212";
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

.boxed label {
    display: inline-block;
    width: 100px;
    padding: 5px;
    font-size: 13px;
    background: #fff;
    border: solid 2px #ccc;
    transition: all 0.3s;
}

.boxed input[type="radio"] {
    display: none;
}

.boxed input[type="radio"]:checked+label {
    border: solid 2px green;
    color: green;
}

.marks_input {
    padding: 0;
    width: 50px;
    max-width: 50px;
    height: 30px;
    max-height: 30px;
    background: #fff;
    border: 2px solid #ccc;
}

.update_marks {
    color: #fff;
    padding: 4px 6px;
    font-size: 14px;
}

.error_warning {
    margin-bottom: 8px;
    color: #555555;
    opacity: 0.8;
    font-size: 12px;
    max-width: 250px;
    list-style: none;
    border-radius: 3px;
    border: 2px solid rgba(253, 92, 99, 0.8);
    padding: 0px 0px 0px 5px;
    height: 20px;
    background-color: rgba(253, 92, 99, 0.5);
}

</style>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
    //Fixing jQuery Click Events for the iPad
    var ua = navigator.userAgent,
        event = (ua.match(/iPad/i)) ? "touchstart" : "click";
    if ($('.table').length > 0) {
        $('.table .header').on(event, function() {
            $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
                return this.style.display === 'table-row' ? 'none' : 'table-row';
            });
        });
    }
});

function up() {
    $('.ans').each(function() {
        var id = $(this).data('id');
        $(this).insertAfter('.ques_' + id);
        if ($(this).data('type') == "pending") {
            var i = $('.ques_i_' + id).data('count');
            $('.ques_i_' + id).data('count', i + 1);
        }
    })
    $('.ques_i').each(function() {
        var count = $(this).data('count');
        $(this).text('(' + count + ' pending)');
    })
    $('.div_all').hide();
}
up();

function handleClick(val) {
    if (val == "Pending") {
        $('.div_all').hide();
    }
    if (val == "All") {
        $('.div_all').show();
    }
}
$("body").delegate(".answer", "click", function() {
    var id = $(this).data('id');
    var qid = $(this).data('qid');
    var box = $(this).data('box');
    var marks = $(this).data('marks');
    var value = $(this).val();
    if (value != "Partially Correct") {
        $('#input_' + box).val(marks);
        $('#input_' + box).attr('readonly', true);
        $('.update_marks_' + box).show();
    } else {
        $('#input_' + box).attr('readonly', false);
        $('.update_marks_' + box).show();
    }
});
$("body").delegate(".update_marks", "click", function() {
    var id = $(this).data('id');
    var qid = $(this).data('qid');
    var box = $(this).data('box');
    var marks = $('#input_' + box).val();
    var answer = $("input:radio[name=answer_" + box + "]:checked").val();
    $(this).text('Updating...');
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - update_response ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
            'qid': qid,
            'answer': answer,
            'marks': marks
        },
        success: function(data) {
            $('.update_marks_' + box).text('Update Marks');
            $('.status_' + box).html('Status&nbsp;:&nbsp;' + answer);
            $('.update_marks_' + box).hide(200);
            if ($('.div_' + box).hasClass('div_Pending')) {
                $('.div_' + box).removeClass('div_Pending');
                $('.div_' + box).addClass('div_all');
                var count = $('.ques_i_' + box).data('count');
                var count = parseInt(count) - 1;
                $('.ques_i_' + box).data('count', count);
                $('.ques_i_' + box).text('(' + count + ' pending)');
                if ($("input:radio[name=type]:checked").val() == "Pending") {
                    $('.div_' + box).hide();
                }
            }
        }
    });
});

</script>
<script type="text/javascript">
var ans_array = new Array();
var result_array = new Array();
var ans = '';
$(document).on('click', '#update_result_submit', function() {
    var loading = document.getElementById('loading');
    loading.style.display = '';
    $('#update_result_modal').modal('hide');
    $.get("{{ route('admin-get_results_json',['id'=>app('request')->input('pid'),'plid'=>app('request')->input('id')]) }}&type=custom", function(data) {
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
