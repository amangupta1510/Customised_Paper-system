@extends('layout/admin_dashboard')
@section('popup')
<div id="warning" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 id="warning_line"></h4>
            </div>
            <div class="modal-footer">
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
<link rel="stylesheet" type="text/css" href="{{ asset('table/css/maincreatepaper.css')}}">
<div id="first_page">
    <button class="normal_radio">
        <label>Normal paper</label>
    </button><br>
    <button class="advanced_radio">
        <label>Advance paper</label>
    </button><br>
    <button class="quick_radio">
        <label>Quick Generate</label>
    </button>
</div>
<div id="quick_paper" class="co-md-8 ml-5" style="display: none;">
    <h2>Quick Generate Paper</h2>
    <div class="quick_div1">
        <h3>1. Quick Generate - Jee Main Old Version (90 Questions)</h3>
        <p>* normal paper type</p>
        <div class="quick_div_1">
            <input type="text" name="quick_name_1" placeholder="Paper name">
            <button onclick="quick_paper_1()">Create Paper</button>
        </div>
    </div>
    <div class="quick_div2">
        <h3>2. Quick Generate - Jee Main New Version (75 Questions)</h3>
        <p>* advanced paper type</p>
        <div class="quick_div_1">
            <input style="color:#000;" type="text" name="quick_name_2" placeholder="Paper name">
            <button onclick="quick_paper_2()">Create Paper</button>
        </div>
    </div>
    <div class="quick_div3">
        <h3>3. Quick Generate - NEET (180 Questions)</h3>
        <p>* normal paper type</p>
        <div class="quick_div_1">
            <input type="text" name="quick_name_3" placeholder="Paper name">
            <button onclick="quick_paper_3()">Create Paper</button>
        </div>
    </div>
</div>
<div id="advanced_paper" class="col-md-12" style="display: none; zoom:0.8;">
    <h2>Create Paper</h2>
    <form id="advanced_form">
        {{csrf_field()}}
        <div class="tr1">
            <div class=" col-md-4">
                <label>paper name</label>
                <input class="form-control" type="text" id="advpapername" name="advpapername" placeholder="Paper name">
            </div>
            <div class=" col-md-4">
                <label>Numer of Questions</label>
                <input class="form-control" id="advNOQ" type="number" name="advNOQ" placeholder="Numer of Questions">
            </div>
            <div class="col-md-4">
                <label>Total Time(min)</label>
                <input class="form-control" id="advTT" type="number" name="advTT" placeholder="Total Time(min)">
            </div>
        </div>
</div>
<div class="tr2 col-md-12" style="display: none; zoom:0.8;">
    <div class="physics_row">
        <h3>Physics</h3>
    </div>
    <div class="physics_div" style="display: none; ">
        <div class="col-md-2">
            <label></label>
            <h4>Single Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P1Q" type="number" name="P1Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P1M" type="number" name="P1M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P1N" type="number" name="P1N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Multiple Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P2Q" type="number" name="P2Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P2M" type="number" name="P2M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P2N" type="number" name="P2N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Integer Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P3Q" type="number" name="P3Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P3M" type="number" name="P3M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P3N" type="number" name="P3N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Numerical Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P4Q" type="number" name="P4Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P4M" type="number" name="P4M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P4N" type="number" name="P4N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Passage Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P5Q" type="number" name="P5Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P5M" type="number" name="P5M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P5N" type="number" name="P5N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Match The Column</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="P6Q" type="number" name="P6Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="P6M" type="number" name="P6M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="P6N" type="number" name="P6N" placeholder="Negative marks">
        </div>
    </div>
</div>
<div class="tr3 col-md-12" style="display: none; zoom:0.8;">
    <div class="chemistry_row">
        <h3>&nbsp;&nbsp;&nbsp;Chemistry&nbsp;&nbsp;&nbsp;</h3>
        <a style="font-size: 15px;color: #fff;">same as Physics <input type="checkbox" name="adv_chemistry_check"></a>
    </div>
    <div class="chemistry_div" style="display: none; ">
        <div class="col-md-2">
            <label></label>
            <h4>Single Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C1Q" type="number" name="C1Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C1M" type="number" name="C1M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C1N" type="number" name="C1N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Multiple Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C2Q" type="number" name="C2Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C2M" type="number" name="C2M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C2N" type="number" name="C2N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Integer Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C3Q" type="number" name="C3Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C3M" type="number" name="C3M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C3N" type="number" name="C3N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Numerical Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C4Q" type="number" name="C4Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C4M" type="number" name="C4M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C4N" type="number" name="C4N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Passage Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C5Q" type="number" name="C5Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C5M" type="number" name="C5M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C5N" type="number" name="C5N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Match The Column</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="C6Q" type="number" name="C6Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="C6M" type="number" name="C6M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="C6N" type="number" name="C6N" placeholder="Negative marks">
        </div>
    </div>
</div>
<div class="tr4 col-md-12" style="display: none; zoom:0.8;">
    <div class="mathematics_row">
        <h3>Mathematics</h3>
        <a style="font-size: 15px;color: #fff;">same as Physics <input type="checkbox" name="adv_math_check"></a>
    </div>
    <div class="mathematics_div" style="display: none; ">
        <div class="col-md-2">
            <label></label>
            <h4>Single Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M1Q" type="number" name="M1Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M1M" type="number" name="M1M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M1N" type="number" name="M1N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Multiple Correct</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M2Q" type="number" name="M2Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M2M" type="number" name="M2M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M2N" type="number" name="M2N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Integer Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M3Q" type="number" name="M3Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M3M" type="number" name="M3M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M3N" type="number" name="M3N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Numerical Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M4Q" type="number" name="M4Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M4M" type="number" name="M4M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M4N" type="number" name="M4N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Passage Type</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M5Q" type="number" name="M5Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M5M" type="number" name="M5M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M5N" type="number" name="M5N" placeholder="Negative marks">
        </div>
        <div class="col-md-2">
            <label></label>
            <h4>Match The Column</h4>
        </div>
        <div class="form-group col-md-3">
            <label>Questions</label>
            <input class="form-control" id="M6Q" type="number" name="M6Q" placeholder="Questions">
        </div>
        <div class="form-group col-md-3">
            <label>Question Mark</label>
            <input class="form-control" id="M6M" type="number" name="M6M" placeholder="Marks">
        </div>
        <div class="form-group col-md-3">
            <label>Negative Mark</label>
            <input class="form-control" id="M6N" type="number" name="M6N" placeholder="Negative marks">
        </div>
    </div>
    <div class="col-md-12 adv_sub">
        <a id="adv_submit" name="adv_submit" class="btn btn-block ">SUBMIT</a>
    </div>
</div>
</form>
</div>
<div id="normal_paper" class="p-5 mb-4" style="display: none;">
    <h2>Create Paper</h2>
    <form id="normal_form">
        {{csrf_field()}}
        <div class="col-md-12 subject_div">
            <div class="col-md-2"></div>
            <div class="form-group col-md-3">
                <label>paper name</label>
                <input class="form-control" type="text" id="papername" name="papername" placeholder="Paper name">
            </div>
            <div class="form-group col-md-3">
                <label>Numer of Questions</label>
                <input class="form-control" id="NOQ" type="number" name="NOQ" placeholder="Numer of Questions">
            </div>
            <div class="form-group col-md-3">
                <label>Total Time(min)</label>
                <input class="form-control" id="TT" type="number" name="TT" placeholder="Total Time(min)">
            </div>
        </div>
        <div class="col-md-12 subject_div1">
            <div class="col-md-2 subject"><b>Physics</b></div>
            <div class="form-group col-md-3">
                <label>Questions</label>
                <input class="form-control" id="PQ" type="number" name="PQ" placeholder="Physics Questions">
            </div>
            <div class="form-group col-md-3">
                <label>Question Mark</label>
                <input class="form-control" id="PM" type="number" name="PM" placeholder="Physics Q. Marks">
            </div>
            <div class="form-group col-md-3">
                <label>Negative Mark</label>
                <input class="form-control" id="PN" type="number" name="PN" placeholder="Negative marks">
            </div>
        </div>
        <div class="col-md-12 subject_div2">
            <div class="col-md-2 subject"><b>Chemistry</b><br><a style="font-size: 15px;color: #000;">same as Physics <input type="checkbox" name="nr_chemistry_check"></a></div>
            <div class="form-group col-md-3">
                <label>Questions</label>
                <input class="form-control" id="CQ" type="number" name="CQ" placeholder="Chemistry Questions">
            </div>
            <div class="form-group col-md-3">
                <label>Question Mark</label>
                <input class="form-control" id="CM" type="number" name="CM" placeholder="Chemistry Q. Marks">
            </div>
            <div class="form-group col-md-3">
                <label>Negative Mark</label>
                <input class="form-control" id="CN" type="number" name="CN" placeholder="Negative marks">
            </div>
        </div>
        <div class="col-md-12 subject_div3">
            <div class="col-md-2 subject"><b>Mathematic</b><br><a style="font-size: 15px;color: #000;">same as Physics <input type="checkbox" name="nr_math_check"></a></div>
            <div class="form-group col-md-3">
                <label>Questions</label>
                <input class="form-control" id="MQ" type="number" name="MQ" placeholder="Mathematic Questions">
            </div>
            <div class="form-group col-md-3">
                <label>Question Mark</label>
                <input class="form-control" id="MM" type="number" name="MM" placeholder="Mathematic Q. Marks">
            </div>
            <div class="form-group col-md-3">
                <label>Negative Mark</label>
                <input class="form-control" id="MN" type="number" name="MN" placeholder="Negative marks">
            </div>
        </div>
        <div class="col-md-12 subject_div4">
            <div class="col-md-2 subject"><b>Biology</b><br><a style="font-size: 15px;color: #000;">same as Physics <input type="checkbox" name="nr_bio_check"></a></div>
            <div class="form-group col-md-3">
                <label>Questions</label>
                <input class="form-control" id="BQ" type="number" name="BQ" placeholder="Biology Questions">
            </div>
            <div class="form-group col-md-3">
                <label>Question Mark</label>
                <input class="form-control" id="BM" type="number" name="BM" placeholder="Biology Q. Marks">
            </div>
            <div class="form-group col-md-3">
                <label>Negative Mark</label>
                <input class="form-control" id="BN" type="number" name="BN" placeholder="Negative marks">
            </div>
        </div>
        <div class="col-md-11" style="margin-top: 30px;">
            <a id="normal_submit" name="normal_submit" style="background-color: #fd6e70" class="btn btn-block  mb-4">SUBMIT</a>
        </div>
    </form>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/cpaper.js') }}"></script>
@endsection
