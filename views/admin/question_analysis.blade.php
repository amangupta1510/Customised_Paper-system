<script type="text/javascript">
var ans = new Array();
@foreach($answers as $ans)
@foreach(json_decode($ans - > answers) as $a)
@if($a - > qid == $qid && (($a - > a8 == "save" || $a - > a8 == "save_mark") || ($a - > ans_type == "save" || $a - > ans_type == "save_mark")))
ans.push({ 'name': '{{$ans->s_name}}', 'qid': '{{$a->qid}}', 'answer': '{{$a->answer}}', 'response': '{{$a->a1.$a->a2.$a->a3.$a->a4}}', 'time_used': { { $a - > time_used } } });
@endif
@endforeach
@endforeach

function check1() {
    var checkBox = document.getElementById("checkbox_correct");
    if (checkBox.checked == true) {
        $('.Correct').css('display', 'block');
    } else {
        $('.Correct').css('display', 'none');
    }
}

function check2() {
    var checkBox = document.getElementById("checkbox_incorrect");
    if (checkBox.checked == true) {
        $('.Incorrect').css('display', 'block');
    } else {
        $('.Incorrect').css('display', 'none');
    }
}

function sortByProperty(property) {
    return function(a, b) {
        if (a[property] > b[property])
            return 1;
        else if (a[property] < b[property])
            return -1;

        return 0;
    }
}
var data = ans.sort(sortByProperty("time_used"));
for (var i = 0; i < data.length; i++) {
    var j = parseInt(i) + parseInt(1);
    $('.xl').append('<li class="' + data[i].answer + ' text-capitalize font-weight-bold text-xs" style="color: #555555;">' + j + ' : ' + data[i].name + ' &nbsp;&nbsp;<span> ( ' + data[i].response + ' ) </span>&nbsp;&nbsp;<span>[time Use : ' + data[i].time_used + ' sec.]</span></li>');
}

</script>
<div style="display: inline-flex;" class="text-capitalize font-weight-bold text-xs">
    <label>Correct<input type="checkbox" id="checkbox_correct" onclick="check1()" checked=""></label>&nbsp;&nbsp;
    <label>Inorrect<input type="checkbox" id="checkbox_incorrect" onclick="check2()" checked=""></label>
</div>
<ul class="xl"></ul>
<style type="text/css">
.Correct {
    margin-top: 4px;
    color: #555555;
    opacity: 0.8;
    border-radius: 5px;
    border: 2px solid rgb(6, 217, 149, 0.8);
    padding: 0px 0px 5px 5px;
    background-color: rgb(6, 220, 149, 0.4);
}

.Incorrect {
    margin-top: 4px;
    color: #555555;
    opacity: 0.8;
    border-radius: 5px;
    border: 2px solid rgba(253, 92, 99, 0.8);
    padding: 0px 0px 5px 5px;
    background-color: rgba(253, 92, 99, 0.4);
}

</style>
