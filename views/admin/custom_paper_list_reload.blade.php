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
                    <i class="fa fa-book" style="color: #ff9933"></i></a>&nbsp;&nbsp;&nbsp;<a title="Paper Pdf Download" class="pdf_download" data-id="{{$user->id}}" data-pname="{{$user->pname}}" data-type="{{$user->type}}"><i class="fa fa-file-pdf-o" style="color: #e91e63"></i></a>&nbsp;&nbsp;&nbsp;<a class="edit_paper" title="Edit Paper Details" data-id="{{$user->id}}" data-name="{{$user->pname}}" data-TT="{{$user->TT}}"><i class="fa fa-edit" style="color: #ff9933"></i></a></td>
            <td class="column7"><a title="Paper Preview" id="show-button" data-toggle="modal" data-target="#show" data-id="{{$user->id}}" data-name="{{$user->pname}}">
                    <i class="fa fa-eye" style="color: #5b84d7"></i></a>&nbsp;
                <a title="Current Student List Inside The Paper" id="notification-button" data-toggle="modal" data-target="#notification" data-id="{{$user->id}}" data-name="{{$user->pname}}">
                    <i class="fa fa-bell" style="color: #ff9933"></i></a></td>
            <td class="column8"><a title="Rank List PDF" href="{{ route('admin-custom_paper_summary',['id'=>$user->id]) }}"><i style="color: #fd6e70" class="glyphicon glyphicon-download"></i></a>&nbsp;&nbsp;<a title="Move Paper To Test Series" class="btn btn-secondary move_paper" style="font-size: 12px;color:#fff;padding: 3px 4px;" data-id="{{$user->id}}" data-name="{{$user->pname}}" data-type="normal">move</a></td>
            <td class="column9"> <a title="Move To Recycle Bin" id="delete-button" data-toggle="modal" data-target="#delete" data-name="{{$user->pname}}" data-id="{{$user->id}}">
                    <i class="glyphicon glyphicon-trash" style="color: #ff5c33"> </i> </a>{{-- @if(Auth::user()->admin=='yes')&nbsp; <a title="Download Paper Pattern + Data" href="{{ route('admin-cm_paper_download',['id'=>$user->id]) }}"> <i class="glyphicon glyphicon-download" style="color: #4CAF50"></i> </a>@endif --}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<p>{{$users->onEachSide(1)->links()}}</p>
