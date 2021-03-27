@extends('layout/admin_dashboard')
@extends('layout/details')
@section('head')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
    $("#sortable tbody").sortable({
      cursor: "move",
      placeholder: "sortable-placeholder",
      helper: function(e, tr)
      {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index)
        {
        // Set helper cell sizes to match the original sizes
        $(this).width($originals.eq(index).width());
        });
        return $helper;
      }
    })
  });
  </script>
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
<div id="select_question" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Question</h4>
            </div>
            <div class="modal-body responsive-table">
                <span>* You can Rearrange order of question type by dragging up and Down.</span>
                <div style="height: 20px;padding: 5px;"><span>Question Type</span><span style="float: right;">No. of Questions</span></div>
                <table id="sortable" style="width: 100%; min-width: 100%;">
                    <tr class="ui-state-default" id="single_tr">
                        <td><b>Single Correct</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="single_correct" min="0" value="4" oninput="this.value = Math.abs(this.value)" data-type="single"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="single_incorrect" min="0" value="1" oninput="this.value = Math.abs(this.value)" data-type="single"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="single" data-text="Single Correct Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="multiple_tr">
                        <td><b>Multiple Correct</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="multiple_correct" min="4" value="4" oninput="this.value = Math.abs(this.value)" data-type="multiple"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="multiple_incorrect" min="1" value="1" oninput="this.value = Math.abs(this.value)" data-type="multiple"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="multiple" data-text="Multiple Correct Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="integer_tr">
                        <td><b>Integer Type</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="integer_correct" min="4" value="4" oninput="this.value = Math.abs(this.value)" data-type="integer"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="integer_incorrect" min="0" value="1" oninput="this.value = Math.abs(this.value)" data-type="integer"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="integer" data-text="Integer Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="numerical_tr">
                        <td><b>Numerical Type</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="numerical_correct" min="4" value="4" oninput="this.value = Math.abs(this.value)" data-type="numerical"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="numerical_incorrect" min="0" value="1" oninput="this.value = Math.abs(this.value)" data-type="numerical"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="numerical" data-text="Numerical Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="text_tr">
                        <td><b>Text Type</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="text_correct" min="0" value="4" oninput="this.value = Math.abs(this.value)" data-type="text"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="text_incorrect" min="0" value="0" oninput="this.value = Math.abs(this.value)" data-type="text"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="text" data-text="Text Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="scan_tr">
                        <td><b>Scan Image Type</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="scan_correct" min="0" value="4" oninput="this.value = Math.abs(this.value)" data-type="scan"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="scan_incorrect" min="0" value="0" oninput="this.value = Math.abs(this.value)" data-type="scan"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="scan" data-text="Scan Image Type"></td>
                    </tr>
                    <tr class="ui-state-default" id="upload_tr">
                        <td><b>Upload Image Type</b></td>
                        <td>+ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="upload_correct" min="0" value="4" oninput="this.value = Math.abs(this.value)" data-type="upload"></td>
                        <td>-ve&nbsp;<input style="padding: 0;width: 50px;border: 2px solid #000;" type="number" class="upload_incorrect" min="0" value="0" oninput="this.value = Math.abs(this.value)" data-type="upload"></td>
                        <td style="margin-right: 5px;"><input style="float:right;padding: 0;width: 50px;border: 2px solid #000;" type="number" class="input" min="0" oninput="this.value = Math.abs(this.value)" data-type="upload" data-text="Upload Image Type"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button style="background-color: #fd6e70" class="btn btn-warning" data-id="" id="add-question-btn">
                    Add Questions
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
@csrf
<div class="d-sm-flex justify-content-between align-items-center mb-4 pt-2">
    <h3 class="text-dark mb-0"><a class="temp_name" data-temp=""></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary add-subject" style="padding: 6px 8px;font-size: 13px;color:#fff;">Add subject</a>&nbsp;&nbsp;<a class="btn btn-danger create-paper" style="padding: 6px 8px;font-size: 13px;color:#fff;">Create Template</a></h3>
</div>
<div class="row add_subject_div">
    {{-- <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-'+color[subject_code]+'">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-capitalize text-'+color[subject_code]+' font-weight-bold text-s title" id="title_'+subject_code+'" data-subject="'+subject_code+'"><span>'+$('#new_subject').val()+'</span></div>
                        <div class="text-dark mb-3 text-xs description" id="decription_'+subject_code+'" data-subject="'+subject_code+'"></div>
                        <div class="text-dark mb-0 text-xs font-weight-bold"><a style="float: right; font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-success add_question" id="add_question_'+subject_code+'" data-subject="'+subject_code+'">Add Question&nbsp;<i style="font-size: 11px;" class="fa fa-plus"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
</div>
<form class="hidden submit_form">
    <input type="hidden" id="template_name" name="template_name">
</form>
<style type="text/css">
.card-body {
    padding: .25rem 1.15rem;
}

.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 67%;
    height: 8px;
    padding: 0;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.description {
    font-size: 12px;
}

.description p {
    margin: 0;
}

#sortable tr {
    border-radius: 5px;
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
#sortable tr:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

</style>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('adminsa/bootstrap/js/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript">
$('.input').bind('click', function() {
    $(this).focus();
});

</script>
<script type="text/javascript">
var changes = 'no';
$(window).bind('beforeunload', function() {
    if (changes == 'yes') {
        return confirm('please update your answer before unload.');
    }
});
var final_array = new Array();
var subject_code = 1;
var color = ["nothing", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success", "danger", "warning", "primary", "success"];
$(document).ready(function() {
    $('.socket_title').text('Template');
    $('.socket_body').empty().html("");
    $('.socket_body').append('<input type="text" id="temp_name" name="temp_name" placeholder="Template Name"><br><a class="btn btn-success template_name_button" style="color:#fff;">Proceed</a>&nbsp;&nbsp;<a class="btn btn-danger" onclick="window.history.back()" style="color:#fff;">Go Back</a>');
    $(".spinner").hide();
    $(".btn-cancel").hide();
    $("#socket").show();
})

$("body").delegate(".template_name_button", "click", function() {
    changes = "yes";
    if ($('#temp_name').val() != "") {
        $('#template_name').val($('#temp_name').val());
        $('.temp_name').html($('#temp_name').val() + '&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-pencil edit_temp" data-temp_name="' + $('#temp_name').val() + '" style="color: #ff9933;font-size: 15px;"></i>');
        $('.temp_name').data('temp_name', $('#temp_name').val());
        $("#socket").hide();
    }
});
$("body").delegate(".edit_temp", "click", function() {
    $(".spinner").hide();
    $(".btn-cancel").show();
    $('.socket_title').text('Edit Template Name');
    $('.socket_body').empty().html('<input type="text" name="edit_temp_name" id="edit_temp_name" value="' + $(this).data('temp_name') + '"><br><a style="color:#fff;" class="btn btn-success edit_temp_confirm" style="margin:10px;" >Update Name</a>');
    $("#socket").show("closed");
});

$("body").delegate(".edit_temp_confirm", "click", function() {
    var name = $("#edit_temp_name").val();
    if (name == '') {
        return false;
    }
    $('.temp_name').html(name + '&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-pencil edit_temp" data-temp_name="' + name + '" style="color: #ff9933;font-size: 15px;"></i>');
    $('.temp_name').data('temp_name', name);
    $("#socket").hide();
});


$("body").delegate(".add-subject", "click", function() {
    $('.socket_title').text('New Subject');
    $('.socket_body').empty().html("");
    $('.socket_body').append('<input type="text" id="new_subject" placeholder="Subject Name"><br><a class="btn btn-success new_subject_button" style="color:#fff;">Add&nbsp;Subject</a>');
    $(".spinner").hide();
    $(".btn-cancel").show();
    $("#socket").show();
});
$("body").delegate(".new_subject_button", "click", function() {
    if ($('#new_subject').val() != "") {
        $('.add_subject_div').append('<div class="col-md-6 col-xl-3 mb-4 subject_div" data-subject="' + subject_code + '"><div class="card shadow border-left-' + color[subject_code] + '"><div class="card-body"><div class="row align-items-center no-gutters"><div class="col mr-2"><div class="text-' + color[subject_code] + ' font-weight-bold text-s title"  id="title_' + subject_code + '" data-subject="' + subject_code + '" data-subject_name="' + $('#new_subject').val() + '"><span>Subject : ' + $('#new_subject').val() + '</span></div><div class="text-dark mb-3 text-xs description" id="description_' + subject_code + '" data-subject="' + subject_code + '" data-pattern=""></div><div class="text-dark mb-0 text-xs font-weight-bold"><a style="font-size: 14px; max-width: 70%; float: left;"><i class="glyphicon glyphicon-trash pt-1 delete_subject"  data-subject="' + subject_code + '" data-subject_name="' + $('#new_subject').val() + '" style="color: #ff5c33;font-size: 15px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-pencil edit_subject"  id="edit_subject_' + subject_code + '" data-subject="' + subject_code + '" data-subject_name="' + $('#new_subject').val() + '" style="color: #ff9933;font-size: 15px;"></i></a><a style="float: right; font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-success add_question" id="add_question_' + subject_code + '" data-subject="' + subject_code + '"data-pattern="" data-toggle="modal" data-target="#select_question">Add Question&nbsp;<i style="font-size: 11px;" class="fa fa-plus"></i></a></div></div></div></div></div></div>');
        subject_code = parseInt(subject_code) + parseInt(1);
        $("#socket").hide();
    }
});
$("body").delegate(".edit_subject", "click", function() {
    $(".spinner").hide();
    $(".btn-cancel").show();
    $('.socket_title').text('Edit Subject');
    $('.socket_body').empty().html('<input type="text" name="edit_subject_name" id="edit_subject_name" value="' + $(this).data('subject_name') + '"><br><a style="color:#fff;" class="btn btn-success edit_subject_confirm" data-id="' + $(this).data('subject') + '" style="margin:10px;" >Edit Subject</a>');
    $("#socket").show("closed");
});

$("body").delegate(".edit_subject_confirm", "click", function() {
    var name = $("#edit_subject_name").val();
    var id = $(this).data('id');
    if (name == '') {
        return false;
    }
    $('#title_' + id).data('subject_name', name);
    $('#edit_subject_' + id).data('subject_name', name);
    $('#title_' + id + ' span').text('Subject : ' + name);
    $("#socket").hide();
});

$("body").delegate(".delete_subject", "click", function() {
    var id = $(this).data('subject');
    var name = $(this).data('subject_name');
    $(".spinner").hide();
    $(".btn-cancel").show();
    $('.socket_title').text('Delete Subject');
    $('.socket_body').empty().html('<a>Are You Sure! Want to delete subject</a><i> ( ' + name + ' ) </i><br><a style="color:#fff;" class="btn btn-success mt-1 delete_subject_confirm" style="margin:10px;" data-id="' + id + '" >Delete Subject</a>');
    $("#socket").show("closed");
});
$("body").delegate(".delete_subject_confirm", "click", function() {
    var id = $(this).data('id');
    $('.subject_div').each(function() {
        if ($(this).data('subject') == id) {
            $(this).remove();
        }
    })
    $("#socket").hide();
});


$("body").delegate(".create-paper", "click", function() {
    if ($(".subject_div").length == 0) {
        return false;
    }
    $(".spinner").hide();
    $(".btn-cancel").show();
    $('.socket_title').text('Confirm Create Paper');
    $('.socket_body').empty().html('<div style="font-size:13px;">Template Name : <b>' + $('.temp_name').data('temp_name') + '</b><br>');
    var sub_count = 0;
    var ques_count = 0;
    var marks = 0;
    $('.subject_div').each(function() {
        var ques_count_sub = 0;
        sub_count++;
        var html = $('.socket_body').html();
        var id = $(this).data('subject');
        if ($('#description_' + id).data('pattern') != '') {
            $('.socket_body').empty().html(html + '<b>&nbsp;Subject : ' + $('#title_' + id).data('subject_name') + '</b><br>');
            var array = JSON.parse(decodeURIComponent($('#description_' + id).data('pattern')));
            for (var i = 0; i < array.length; i++) {
                var html = $('.socket_body').html();
                if (array[i].question != null && array[i].question > 0) {
                    ques_count = parseInt(ques_count) + parseInt(array[i].question);
                    ques_count_sub = parseInt(ques_count_sub) + parseInt(array[i].question);
                    if (array[i].question_type == 'single') { type = "Single Correct Type"; } else if (array[i].question_type == 'multiple') { type = "Multiple Correct Type"; } else if (array[i].question_type == 'numerical') { type = "Numerical Type"; } else if (array[i].question_type == 'integer') { type = "Integer Type"; } else if (array[i].question_type == 'text') { type = "Text Type"; } else if (array[i].question_type == 'scan') { type = "Scan Image Type"; } else if (array[i].question_type == 'upload') { type = "Upload Image Type"; }

                    $('.socket_body').empty().html(html + '<a style="font-size:13px;">&nbsp;&nbsp;&nbsp;' + type + ' <b>' + array[i].question + '</b> Questions. <b>+ve ' + array[i].positive + ' , -ve ' + array[i].negative + ' marks</b></a><br>');
                    marks = parseInt(marks) + parseInt(array[i].question * array[i].positive);
                }
            }
            final_array.push({ 'subject': $('#title_' + id).data('subject_name'), 'subject_code': id, 'question': ques_count_sub, 'marks': marks, 'pattern': array });
            $('.socket_body').append('<li style="min-height:1px;max-height:1px; background:grey; list-style:none;margin:1px 0px;"></li>');
        }
    });
    var html = $('.socket_body').html();
    $('.socket_body').empty().html(html + '<br><br><a style="color:#fff;" class="btn btn-danger mt-1 create_paper_confirm" style="margin:10px;" data-sub_count="' + sub_count + '" data-ques_count="' + ques_count + '" data-marks="' + marks + '">Create</a></div>');
    $("#socket").show("closed");
});
$("body").delegate(".create_paper_confirm", "click", function() {
    var temp = new Array();
    temp.push({ 'template': $('.temp_name').data('temp_name'), 'subject': $(this).data('sub_count'), 'question': $(this).data('ques_count'), 'marks': $(this).data('marks'), 'pattern': final_array });
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - create_custom_paper_templates_submit ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('.temp_name').data('temp_name'),
            'structure': JSON.stringify(temp)
        },
        success: function(data) {
            $("#socket").hide();
            changes = "no";
            window.location.href = "{{ route('admin-custom_paper_templates') }}";
        },
    });

});


$("body").delegate(".add_question", "click", function() {
    var sub = $(this).data('subject');
    $('.input').each(function() {
        $(this).val('');
    });
    $('#add-question-btn').data('id', sub);
    if ($('#add_question_' + sub).data('pattern') != '') {
        var array = JSON.parse(decodeURIComponent($('#add_question_' + sub).data('pattern')));
        for (var i = 0; i < array.length; i++) {
            var d = document.getElementById(array[i].question_type + '_tr');
            d.parentNode.appendChild(d);
        }
        var i = 0;
        $('.input').each(function() {
            $(this).val(array[i].question);
            $('.' + $(this).data('type') + '_correct').val(array[i].positive);
            $('.' + $(this).data('type') + '_incorrect').val(array[i].negative);
            i++;
        });
    }
});

$("body").delegate("#add-question-btn", "click", function() {
    var array = new Array();
    var id = $(this).data('id');
    $('#description_' + id).empty().html();
    $('.input').each(function() {
        var desc = $('#description_' + id).html();
        if ($(this).val() != null && $(this).val() > 0) {
            $('#description_' + id).empty().html(desc + '<a>' + $(this).data('text') + ' <b>' + $(this).val() + '</b> Questions. <b>+ve ' + $('.' + $(this).data('type') + '_correct').val() + ' , -ve ' + $('.' + $(this).data('type') + '_incorrect').val() + ' marks</b></a><br>');
        }
        array.push({ 'subject_code': id, 'question_type': $(this).data('type'), 'question': $(this).val(), 'positive': $('.' + $(this).data('type') + '_correct').val(), 'negative': $('.' + $(this).data('type') + '_incorrect').val() });
    });
    $('#add_question_' + id).data('pattern', encodeURIComponent(JSON.stringify(array)));
    $('#description_' + id).data('pattern', encodeURIComponent(JSON.stringify(array)));
    $('#select_question').modal('hide');
    // JSON.parse(decodeURIComponent($('#add_question_'+id).data('pattern')))
});

</script>
@endsection
