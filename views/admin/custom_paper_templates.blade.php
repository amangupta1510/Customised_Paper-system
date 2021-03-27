@extends('layout/admin_dashboard')
@extends('layout/details')
@section('analysis')
<div class="d-sm-flex align-items-center mb-4 pt-2">
    <h4 class="text-dark mb-0">Custom Paper Templates&nbsp;<a class="btn btn-success" href="{{ route('admin-create_custom_paper_templates') }}" style="padding: 6px 8px;font-size: 13px;">Add Template&nbsp;</a></h4>
</div>
<div class="row">
    @foreach($users as $user)
    <div class="col-md-4 mt-1 mb-1" id="div_{{$user->id}}">
        <div class="card shadow mb-1">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2 pl-2">
                        <div class="text-dark font-weight-bold mb-0 edit_title" style="font-size: 14px;"><span></span><a>Title : {{$user->name}}</a></div>
                        <div class="mb-3 edit_body" style="font-size: 13px;"><span></span><a></a></div>
                    </div>
                    <div style="border-top: 1px solid grey;width: 100%; padding-top: 2px;" class="text-dark font-weight-bold mb-1 text-xs" style="font-size:12px;"><span></span>
                        <a class="btn btn-success btn-outline-danger create_btn" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="{{$user->id}}" data-name="{{$user->name}}" data-subject="{{json_decode($user->structure)[0]->subject}}" data-question="{{json_decode($user->structure)[0]->question}}" data-marks="{{json_decode($user->structure)[0]->marks}}" data-pattern="{{urlencode(json_encode($user->structure))}}">Paper Create</a>&nbsp;
                        <a class="btn btn-default btn-outline-danger pattern_btn" style="font-size: 11px; padding: 3px 6px; color: #fff;background: #f6c23e!important;" data-name="{{json_decode($user->structure)[0]->template}}" data-questions="{{json_decode($user->structure)[0]->question}}" data-pattern="{{urlencode(json_encode(json_decode($user->structure)[0]->pattern))}}">Pattern</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-info list_btn" data-id="{{$user->id}}">Paper <i>({{$user->count}})</i></a>&nbsp;
                        <a class="btn btn-primary" style="font-size: 11px; padding: 3px 6px; color: #fff;" href="{{ route('admin-edit_custom_paper_templates',['id'=>$user->id]) }}">Edit</a>&nbsp;
                        <a style="font-size: 11px; padding: 3px 6px; color: #fff;" class="btn btn-danger delete_btn" data-id="{{$user->id}}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
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

::-webkit-scrollbar {
    width: 5px;
    /* Remove scrollbar space */
    background: transparent;
    /* Optional: just make scrollbar invisible */
}

/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #1cc88a;
}

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
@section('js')
<script type="text/javascript">
$("body").delegate(".delete_btn", "click", function() {
    var id = $(this).data('id');
    $(".spinner").hide();
    $('.socket_body').empty().html('');
    $('.socket_title').text('Delete Template');
    $('.socket_body').empty().html('@csrf <a>Are You Sure! Want to delete this Template</a><br><a class="btn btn-success delete_template_confirm" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="' + id + '">Delete</a>&nbsp;<a  class="btn btn-danger" style="font-size: 11px; padding: 3px 6px; color: #fff;" onclick="hider1()">Cancel</a>');
    $("#socket").show("closed");
});

function hider1() {
    $("#socket").hide();
}
$("body").delegate(".delete_template_confirm", "click", function() {
    var id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - delete_custom_paper_templates ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
        },
        success: function(data) {
            $("#socket").hide();
            $('.socket_body').empty().html('');
            location.reload();
        },
    });
});

$("body").delegate(".list_btn", "click", function() {
    $(".spinner").hide();
    $(".btn-cancel").show();
    var img = "{{ route('admin-custom_paper_list') }}?id=" + $(this).data('id');
    $('.socket_title').text('Created Paper List');
    $('.socket_body').empty().html("<b>No Paper Created</b>");
    $.get(img, function(data) {
        $('.socket_body').empty().html('');
        for (var i = 0; i < data.length; i++) {
            var j = parseInt(i) + parseInt(1);
            var j = j > 9 ? j : '0' + j;
            var send = data[i].send_to;
            var status = data[i].status;
            $('.socket_body').append('<table style="width:100%;min-width:100%"><tr><td style="padding-right:5px;font-size: 15px;" colspan="6"><span class="font-weight-bold">' + j + ' : ' + data[i].pname + '</span></td><tr style=" font-size:12px;"><td colspan="6"><span class="font-weight-bold">Published : </span><i>' + data[i].created_at + '</i></td></tr><tr><td colspan="6"><li style="min-height:1px;max-height:1px; background:grey; list-style:none;margin:1px 0px;"></li></td></tr></table>');

        }
        $("#socket").show("closed");
    })
});

$("body").delegate(".pattern_btn", "click", function() {
    $(".spinner").hide();
    $(".btn-cancel").show();
    $('.socket_title').text('Template Structure');
    $('.socket_body').empty().html('<div style="font-size:13px;">Template Name : <b>' + $(this).data('name') + '</b><br>Total Question : <b>' + $(this).data('questions') + '</b><br>');
    var array = JSON.parse(decodeURIComponent($(this).data('pattern')));
    for (var j = 0; j < array.length; j++) {
        var html = $('.socket_body').html();
        $('.socket_body').empty().html(html + '<b>&nbsp;Subject : ' + array[j].subject + '</b><br>');
        for (var i = 0; i < array[j].pattern.length; i++) {
            var html = $('.socket_body').html();
            if (array[j].pattern[i].question != null && array[j].pattern[i].question > 0) {

                if (array[j].pattern[i].question_type == 'single') { type = "Single Correct Type"; } else if (array[j].pattern[i].question_type == 'multiple') { type = "Multiple Correct Type"; } else if (array[j].pattern[i].question_type == 'numerical') { type = "Numerical Type"; } else if (array[j].pattern[i].question_type == 'integer') { type = "Integer Type"; } else if (array[j].pattern[i].question_type == 'text') { type = "Text Type"; } else if (array[j].pattern[i].question_type == 'scan') { type = "Scan Image Type"; } else if (array[j].pattern[i].question_type == 'upload') { type = "Upload Image Type"; }

                $('.socket_body').empty().html(html + '<a style="font-size:13px;">&nbsp;&nbsp;&nbsp;' + type + ' <b>' + array[j].pattern[i].question + '</b> Questions. <b>+ve ' + array[j].pattern[i].positive + ' , -ve ' + array[j].pattern[i].negative + ' marks</b></a><br>');
            }
        }
        $('.socket_body').append('<li style="min-height:1px;max-height:1px; background:grey; list-style:none;margin:1px 0px;"></li>');
    }
    $("#socket").show("closed");
});


$("body").delegate(".create_btn", "click", function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var subject = $(this).data('subject');
    var question = $(this).data('question');
    var marks = $(this).data('marks');
    var pattern = $(this).data('pattern');
    $(".spinner").hide();
    $('.socket_body').empty().html('');
    $('.socket_title').text('Create New Paper');
    $('.socket_body').empty().html('@csrf<input type="text" name="new_paper" id="new_paper" value="" placeholder="Paper Name"><br><input type="number" name="TT" id="TT" value="" oninput="this.value = Math.abs(this.value)" placeholder="Paper Duration (Minutes)"><br><a class="btn btn-success create_confirm" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="' + id + '" data-name="' + name + '" data-subject="' + subject + '" data-question="' + question + '" data-marks="' + marks + '" data-pattern="' + pattern + '">Create</a>&nbsp;<a  class="btn btn-danger" style="font-size: 11px; padding: 3px 6px; color: #fff;" onclick="hider1()">Cancel</a>');
    $("#socket").show("closed");
});

$("body").delegate(".create_confirm", "click", function() {
    var id = $(this).data('id');
    if ($('#new_paper').val() == '' || $('#TT').val() == '' || $('#TT').val() == 0) {
        return false;
    }
    $.ajax({
        type: 'POST',
        url: '{{ route('
        admin - create_custom_papers ') }}',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
            'name': $('#new_paper').val(),
            'TT': $('#TT').val(),
            'template_name': $(this).data('name'),
            'subject': $(this).data('subject'),
            'NOQ': $(this).data('question'),
            'total_marks': $(this).data('marks'),
            'structure': decodeURIComponent($(this).data('pattern'))
        },
        success: function(data) {
            $("#socket").hide();
            $('.socket_body').empty().html('');
            window.location.href = "{{ route('admin-custom_papers') }}";
        },
    });
});

</script>
@endsection
