@extends('layout/admin_dashboard')
@extends('layout/details')
@section('popup')
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
{{-- Form show --}}
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainshow_paper.css')}}">
<div id="show" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div id="table" class="modal-body">
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
<div id="syllabus" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Syllabus</h4>
            </div>
            <link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainstudent_show_syllabus.css')}}">
            <div class="modal-body" id="syllabusimg">
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
{{-- Form notification --}}
<div id="notification" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="msg_done" style="border: 2px solid #ebecef; padding:5px 5px; background: #1cc88a42;border-radius: 5px;text-align: center;margin-bottom: 5px;">Done</p>
                <div style="border: 2px solid #e9e9e9; padding:5px 5px; background: #ebecef;border-radius: 10px;"><a class="notification_name" style="font-weight: 400; font-size: 20px;"></a>
                    <div style="float: right;"><a class="msg-button" data-channel="" data-title="Message to all users" data-event="message_all"><i class="fa fa-comment-o" style="color: #ff5c33; font-size: 20px;"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="msg-button" data-channel="" data-title="Relaod paper of all users" data-event="reload_all"><i class="fa fa-refresh" style="color: #ff5c33; font-size: 20px;"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="msg-button" data-channel="" data-title="Submit paper of all users" data-event="submit_all"><i class="fa fa-check-square-o" style="color: #ff5c33; font-size: 20px;"></i></a></div>
                </div>
                <p class="participants" data-count="0">Participants (0)</p>
                <ul id="notification_table">Participants</ul>
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
{{-- Form Delete Post --}}
<div id="delete" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">delete</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="modal">
                    @csrf
                    <h4 id="delete-name"></h4>
                    <p id="delete-id" class="hidden"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button style="background-color: #fd6e70" class="btn btn-warning" type="submit" id="delete-student">
                    Delete
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
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/mainnormal_paper_list_admin.css')}}">
<div class="limiter">
    <div class="title">
        <div class="searchBox">
            <h4><b>Custom Papers</b>{{-- @if(Auth::user()->admin=='yes') <a href="{{ route('admin-cm_paper_upload') }}"> <i class="glyphicon glyphicon-2x glyphicon-upload" style="color: skyblue"></i></a>@endif --}}
                <div class="searchForm">
                    <form action="{{route('admin-custom_papers')}}" method="get">
                        <input id="searchField" type="text" name="s" value="{{ app('request')->input('s')}}" placeholder="Search here" />
                        <div class="close">
                            <span class="front"></span>
                            <span class="back"></span>
                        </div>
                    </form>
                </div>
            </h4>
        </div>
    </div>
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100" id="tbody">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">S.No</th>
                            <th class="column2">Paper Name</th>
                            <th class="column3">Upload File</th>
                            <th class="column4">Answer</th>
                            {{-- <th class="column5">Result Update</th> --}}
                            <th class="column5">Publish</th>
                            <th class="column6">Syllabus</th>
                            <th class="column7">Preview</th>
                            <th class="column8">Summary</th>
                            <th class="column9">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $n = app('request')->input('page'); if($n>1||$n!=""){$no=$n*10-9;}else{$no=1;} ?>
                        @foreach($users as $user)
                        <tr class="user{{$user->id}}">
                            <td class="column1"><strong>{{ $no++ }}</strong></td>
                            <td class="column2"><strong>{{ $user->pname }}</strong></td>
                            <td class="column3"><a style="color: #fff" class="btn btn-primary" href="{{ route('admin-custom_paper_ques_upload',['id'=>$user->id]) }}">Upload paper</a></td>
                            <td class="column4"><a style="color: #fff" class="btn btn-danger" href="{{ route('admin-custom_paper_ans_upload',['id'=>$user->id]) }}">Upload Ans.</a></td>
                            {{-- <td class="column5"><a style="color: #fff" class="btn btn-info" href="{{ route('admin-custom_paper_update_result_page',['id'=>$user->id]) }}">Update</a></td> --}}
                            <td class="column5"><a style="color: #fff" class="btn btn-warning" href="{{ route('admin-custom_paper_publish',['id'=>$user->id]) }}">Publish</a></td>
                            <td class="column6"><a title="Syllabus View" id="syllabus-button" data-toggle="modal" data-target="#syllabus" data-id="{{$user->pname}}">
                                    <i class="fa fa-book" style="color: #ff9933"></i></a>&nbsp;&nbsp;&nbsp;<a title="Paper Pdf Download" class="pdf_download" data-id="{{$user->id}}" data-pname="{{$user->pname}}" data-type="{{$user->type}}"><i class="fa fa-file-pdf-o" style="color: #e91e63"></i></a>&nbsp;&nbsp;&nbsp;<a class="edit_paper" title="Edit Paper Details" data-id="{{$user->id}}" data-name="{{$user->pname}}" data-tt="{{$user->TT}}"><i class="fa fa-edit" style="color: #ff9933"></i></a></td>
                            <td class="column7"><a title="Paper Preview" id="show-button" data-toggle="modal" data-target="#show" data-id="{{$user->id}}" data-name="{{$user->pname}}">
                                    <i class="fa fa-eye" style="color: #5b84d7"></i></a>&nbsp;
                                <a title="Current Student List Inside The Paper" id="notification-button" data-toggle="modal" data-target="#notification" data-id="{{$user->id}}" data-name="{{$user->pname}}">
                                    <i class="fa fa-bell" style="color: #ff9933"></i></a></td>
                            <td class="column8"><a title="Rank List PDF" href="{{ route('admin-custom_paper_summary',['id'=>$user->id]) }}"><i style="color: #fd6e70" class="glyphicon glyphicon-download"></i></a>&nbsp;&nbsp;<a title="Move Paper To Test Series" class="btn btn-secondary move_paper" style="font-size: 12px;color:#fff;padding: 3px 4px;" data-id="{{$user->id}}" data-name="{{$user->pname}}" data-type="custom">move</a></td>
                            <td class="column9"> <a title="Move To Recycle Bin" id="delete-button" data-toggle="modal" data-target="#delete" data-name="{{$user->pname}}" data-id="{{$user->id}}">
                                    <i class="glyphicon glyphicon-trash" style="color: #ff5c33"> </i> </a>{{-- @if(Auth::user()->admin=='yes')&nbsp; <a title="Download Paper Pattern + Data" href="{{ route('admin-cm_paper_download',['id'=>$user->id]) }}"> <i class="glyphicon glyphicon-download" style="color: #4CAF50"></i> </a>@endif --}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$users->onEachSide(1)->links()}}</p>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script type="text/javascript">
    $(".search-btn").click(function() {
        $(".search-input").toggleClass("active").focus;
        $(this).toggleClass("animate");
        $(".input").val("");
    });

    </script>
    <script type="text/javascript">
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var loading = document.getElementById('loading');
        loading.style.display = '';
        var url = $(this).attr('href').split('page=')[1];
        var year = $('input[name=s]').val();
        var img = "{{ route('admin-custom_paper_page',['s'=>':year','page'=>':page']) }}";
        var img = img.replace('%3Ayear', year);
        var img = img.replace('%3Apage', url);
        var img = img.replace('&amp;', '&');
        $.get(img, function(data) {
            $('#tbody').empty().html(data);
        })
        $("#loading").fadeOut(500);

    });

    function hider1() {
        $("#socket").hide();
    }


    $("body").delegate(".edit_paper", "click", function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var tt = $(this).data('tt');
        $(".spinner").hide();
        $('.socket_body').empty().html('');
        $('.socket_title').text('Update Paper (' + name + ')  Duration');
        $('.socket_body').empty().html('@csrf <input type="number" name="TT" id="TT" value="' + tt + '" oninput="this.value = Math.abs(this.value)" placeholder="Paper Duration (Minutes)"><br><a class="btn btn-success create_confirm" style="font-size: 11px; padding: 3px 6px; color: #fff;" data-id="' + id + '">Update</a>&nbsp;<a  class="btn btn-danger" style="font-size: 11px; padding: 3px 6px; color: #fff;" onclick="hider1()">Cancel</a>');
        $("#socket").show("closed");
    });

    $("body").delegate(".edit_confirm", "click", function() {
        var id = $(this).data('id');
        if ($('#TT').val() == '' || $('#TT').val() == 0) {
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - edit_custom_papers ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $(this).data('id'),
                'TT': $('#TT').val(),
            },
            success: function(data) {
                $("#socket").hide();
                $('.socket_body').empty().html('');
                window.location.href = "{{ route('admin-custom_papers') }}";
            },
        });
    });


    $(document).on('click', '#delete-button', function() {
        $('#delete').modal({ backdrop: 'false' });
        $('#delete-name').text('Are You sure want to delete (' + $(this).data('name') + ')....');
        $('#delete-id').text($(this).data('id'));

    });
    $('#delete-student').click(function() {
        var loading = document.getElementById('loading');
        loading.style.display = '';
        $.ajax({
            type: 'POST',
            url: '{{ route('
            admin - delete_custom_papers ') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#delete-id').text(),
            },
            success: function(data) {
                $('.user' + $('#delete-id').text()).hide();
                $('#delete').modal('hide');
                $("#loading").fadeOut(500);
            }
        });
    });

    </script>
    <script type="text/javascript">
    $('.msg_done').hide();
    $(document).on('click', '#show-button', function() {
        var loading = document.getElementById('loading');
        loading.style.display = '';
        var id = $(this).data('id');
        var img = "{{ route('admin-cm_image',['id'=>':id']) }}";
        var img = img.replace('%3Aid', id);
        $.get(img, function(data) {
            $('#table').empty().html(data);
        })
    });
    $(document).on('click', '#syllabus-button', function() {
        var a = "{{ asset('Quiz/custom_paper') }}/" + $(this).data('id') + "/question/syllabus.png";
        $.get(a)
            .done(function() {
                $('#syllabusimg').html('<img src="' + a + '">');

            }).fail(function() {
                $('#syllabusimg').html('Syllabus not available...');

            })
    });
    $("body").delegate(".move_paper", "click", function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var type = $(this).data('type');
        var link = "{{ route('admin-move_to_test_series') }}";

        $(".spinner").hide();
        $('.socket_title').text('Move Paper to test Series ( ' + $(this).data('name') + ' )');
        var img = "{{ route('admin-list_of_folder',['type'=>':id']) }}";
        var img = img.replace('%3Aid', type);
        $('.socket_body_main').empty().html('');
        $('.socket_body').empty().html('');
        $.get(img, function(data) {
            for (var i = 0; i < data.length; i++) {
                var j = i + 1;
                $('.socket_body_main').append('</tr><tr><td style="height:1px;background:#858796;"></td><td style="height:1px;background:#858796;"></td><td style="height:1px;background:#858796;"></td></tr><tr><td style="width:15%;padding-bottom:5px;">' + j + '</td><td style="width:70%;padding-bottom:5px;">' + data[i].name + '</td><td style="width:35%;"><a class="btn btn-danger" style="font-size: 12px;color:#fff;padding: 5px 8px; margin-top:5px;" href="' + link + '?pid=' + id + '&fid=' + data[i].id + '&type=' + type + '">move</a></td>');
            }
        })
        $("#socket").show("closed");
    });



    $("body").delegate(".pdf_download", "click", function() {
        var img = "{{ route('admin-paper_pdf_download',['id'=>':id','pname'=>':pname','type'=>':type']) }}";
        var img = img.replace('%3Aid', $(this).data('id'));
        var img = img.replace('%3Apname', $(this).data('pname'));
        var img = img.replace('%3Atype', $(this).data('type'));
        var img = img.replace('&amp;', '&');
        var img = img.replace('&amp;', '&');
        $('.socket_body_main').empty().html('');
        $(".spinner").hide();
        $('.socket_title').text('Download Paper ( ' + $(this).data('pname') + ' )');
        $('.socket_body').empty().html('<a href="' + img + '&ans=no" class="btn btn-success" style="margin:10px;" >Ques Paper</a><br><a href="' + img + '&ans=yes" class="btn btn-danger" style="margin:10px;" >Answer Key</a>');
        $("#socket").show("closed");
    });

    $(document).on('click', '#notification-button', function() {
        var loading = document.getElementById('loading');
        loading.style.display = '';
        socket($(this).data('id'));
        $('#notification_table').empty().html('');
        $('.participants').text('Participants (0)');
        $('.participants').data('count', 0);
        $('.notification_name').text($(this).data('name'));
        $('.msg-button').data('channel', 'custom_paper_' + $(this).data('id'));
        var img = "{{ route('admin-paper_sockets',['channel'=>':channel','event'=>'online']) }}";
        var img = img.replace('%3Achannel', 'custom_paper_' + $(this).data('id'));
        var img = img.replace('&amp;', '&');
        $.get(img, function(data) {
            $("#loading").fadeOut(500);
        })
    });

    function socket(i) {
        var channel = Echo.leave('admin_custom_paper_' + i);
        var channel = Echo.channel('admin_custom_paper_' + i);
        channel.listen('.online', function(data) {
            var count = $('.participants').data('count');
            var count = parseInt(count) + parseInt(1);
            $('.participants').data('count', count);
            $('.participants').text('Participants (' + count + ')');
            $('#notification_table').append('<li><div><a style="display:inline-block; white-space: nowrap; width: 140px; overflow: hidden;text-overflow: ellipsis;">' + data.channel.message.sname + '</a><div style="float:right;"><a style="font-size:14px; border:1px;">remain ' + parseInt(data.channel.message.timeleft / 60) + ' mins</a>&nbsp;&nbsp;<a class="msg-button" data-channel="custom_paper_' + i + '" data-title="Message to ' + data.channel.message.sname + '" data-event="message_student_' + data.channel.message.sid + '"><i class="fa fa-comment-o" style="color: #ff5c33; font-size: 16px;"></i></a>&nbsp;&nbsp;<a class="msg-button" data-channel="custom_paper_' + i + '"  data-title="Relaod paper of user (' + data.channel.message.sname + ')" data-event="reload_student_' + data.channel.message.sid + '"><i class="fa fa-refresh" style="color: #ff5c33; font-size: 16px;"></i></a>&nbsp;&nbsp;<a class="msg-button" data-channel="custom_paper_' + i + '" data-title="Submit paper of user (' + data.channel.message.sname + ')" data-event="submit_student_' + data.channel.message.sid + '"><i class="fa fa-check-square-o" style="color: #ff5c33; font-size: 16px;"></i></a></div></li><li style="height:1px;background:#858796;"></li>');
        });
    }


    $("body").delegate(".msg-button", "click", function() {
        $(".spinner").hide();
        $('.socket_title').text($(this).data('title'));
        $('.socket_body').empty().html('<p class="msg_error"></p><input type="text" class="msg_title" placeholder="title" required><input input type="text" class="msg_body"  placeholder="body" required><br><a class="btn btn-warning submit_event" data-channel="' + $(this).data('channel') + '" data-event="' + $(this).data('event') + '" >submit</a>');
        $("#socket").show("closed");
    });

    $("body").delegate(".submit_event", "click", function(e) {
        e.preventDefault();
        if ($('.msg_title').val() != '' && $('.msg_body').val() != '') {
            $("#socket").hide();
            var img = "{{ route('admin-paper_sockets',['channel'=>':channel','event'=>':event','title'=>':title','body'=>':body']) }}";
            var img = img.replace('%3Achannel', $(this).data('channel'));
            var img = img.replace('%3Aevent', $(this).data('event'));
            var img = img.replace('%3Atitle', $('.msg_title').val());
            var img = img.replace('%3Abody', $('.msg_body').val());
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            var img = img.replace('&amp;', '&');
            $.get(img, function(data) {
                $('.msg_done').toggle('slideDown');
                setTimeout(function() { $('.msg_done').toggle('slideUp'); }, 4000);
            })
        } else {
            $('.msg_error').text('**Please fill title and Body');
        }
    })

    </script>
    @endsection
