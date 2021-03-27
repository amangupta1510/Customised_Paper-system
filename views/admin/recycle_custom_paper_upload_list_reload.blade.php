<table>
    <thead>
        <tr class="table100-head">
            <th class="column1">S.No</th>
            <th class="column2">Paper Name</th>
            <th class="colum3"></th>
            <th class="column4"></th>
            <th class="column5">total_marks</th>
            <th class="column6">Created_at</th>
            <th class="column7">Recycle</th>
            <th class="column8">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php  $n = app('request')->input('page'); if($n>1||$n!=""){$no=$n*10-9;}else{$no=1;} ?>
        @foreach($users as $user)
        @if($user->active == 0)
        <tr class="user{{$user->id}}">
            <td class="column1"><strong>{{ $no++ }}</strong></td>
            <td class="column2"><strong>{{ $user->pname }}</strong></td>
            <td class="column3"></td>
            <td class="column4"></td>
            <td class="column5">{{ $user->total_marks }}</td>
            <td class="column6">{{ $user->created_at }}</td>
            <td class="column7"> <a id="delete-button" data-toggle="modal" data-target="#delete" data-name="{{$user->pname}}" data-id="{{$user->id}}">
                    <i class="fa fa-recycle fa-2x" style="color: #30dd8a"></i></a></td>
            <td class="column8"> <a id="p_delete-button" data-toggle="modal" data-target="#p_delete" data-name="{{$user->pname}}" data-id="{{$user->id}}">
                    <i class="glyphicon glyphicon-trash" style="color: #ff5c33"></i></a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<p>{{$users->onEachSide(1)->links()}}</p>
