<style type="text/css">
html {
    margin: 15px;
    padding: 15px;
    zoom: 50%;
}

</style>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@if(file_exists('img/delta.png'))<img style="margin-left: 200px; margin-top: 20px;" src="{{ asset('img/delta.png') }}" width="350">@endif
<br>
<div style="background-color: #d9534f;max-height:65px;">
    <h2 style="text-align: center;font:bold;font-size: 25px;color:#fff;">{{$pname}}</h2>
</div>
<br>
<ul style="list-style:none;margin-left: 150px; max-width:400px;width:400px;">
    <?php $n=1;?>
    @foreach($users as $user)
    <div class="div">
        <li><b style="color: rgba(244,132,83,0.8);font-size: 18px;">Question {{$user->qid}}</b></li>
        @if($user->quesimg!='')
        <li>
            <div class="{{'hide'.$n++}}"><img src="{{base_path().'/public_html/'.$user->quesimg}}" style="width:100%;">
                <?php $name = explode(".", $user->quesimg);
$img_1 = $name[0].'_1.'.$name[1]; $img_2 = $name[0].'_2.'.$name[1];?>
                @if(file_exists($img_1))<div class="{{'hide'.$n++}}"><img src="{{base_path().'/public_html/'.$img_1}}" style="width:100%;"></div>@endif
                @if(file_exists($img_2))<div class="{{'hide'.$n++}}"><img src="{{base_path().'/public_html/'.$img_2}}" style="width:100%;"></div>@endif
        </li>
        @else
        <li style="color: #d9d9d9">Question Not Available</li>
        @endif
        <li style=" height: 2px;background-color: rgba(244,132,83,0.8);"></li>
    </div>
    @endforeach
</ul>
<style type="text/css">
.div {
    page-break-before: auto;
}

</style>
