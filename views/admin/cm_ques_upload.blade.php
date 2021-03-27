@extends('layout/admin_dashboard')
@extends('layout/details')
@section('inner_block')
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/main_ques_upload.css')}}">
<div class="a">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>upload failed</li>
        @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="b">
        <b>Question Upload Box</b>
        <form action="{{ route('admin-custom_paper_ques_upload_submit') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input class="btn btn-lg input" type="file" name="filenames[]" multiple="" accept="image/png" />
            <input type="hidden" name="id" value="{{app('request')->input('id')}}">
            <div class="header">
            </div>
            <input class="btn btn-lg submit" type="submit" name="submit" value="Upload All Question" />
        </form>
        <h4>{{$question}} file Uploaded.</h4>
    </div>
    <div class="clearfix"></div>
    <div class="c">
        <b>solution Upload Box</b>
        <form action="{{ route('admin-custom_paper_sol_upload_submit') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input class="btn btn-lg input" type="file" name="filenames[]" multiple="" accept="image/png" />
            <input type="hidden" name="id" value="{{app('request')->input('id')}}">
            <div class="header">
            </div>
            <input class="btn btn-lg submit" type="submit" name="submit" value="Upload All Solution" />
        </form>
        <h4>{{$solution}} file Uploaded.</h4>
    </div>
</div>
@endsection
