<?php
namespace App\Http\Controllers;
use Validator;
use Response;
use File;
use Storage;
use disk;
use Auth;
use PDF;
use Zip;
use Session;
use newImage;
use ZanySoft\Zip\ZipManager;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\http\Requests;
use Illuminate\Http\Request;
use App\paper_link;
use App\student;
use App\result;
use App\teacher;
use App\time_left;
use App\admin;
use App\dpp;
use App\enquiry;
use App\dpp_link;
use App\advance_paper;
use App\answer;
use App\new_answer;
use App\normal_paper;
use App\online;
use App\question;
use App\new_question;
use App\chatbox;
use App\ts_folder;
use App\ts_folder_link;
use App\task_board;
use App\lecture;
use App\lecture_folder;
use App\lecture_link;
use App\lecture_subfolder;
use App\message;
use App\message_template;
use App\notification;
use App\notification_template;
use App\custom_paper;
use App\custom_paper_template;
use App\image;
use App\token;
use DB;
use Carbon\Carbon;

class AdminCustomPaperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //--------------------------------------------Template Section----------------------------------------------------
    public function custom_paper_templates(Request $request)
    {
        $users = custom_paper_template::where(['active' => '1'])->paginate(20);
        return view('admin.custom_paper_templates', compact('users'));
    }

    public function create_custom_paper_templates(Request $request)
    {
        return view('admin.create_custom_paper_templates');
    }

    public function create_custom_paper_templates_submit(Request $request)
    {
        $template = new custom_paper_template();
        $template->acd_id = Auth::user()->acd_id;
        $template->acd_name = Auth::user()->acd_name;
        $template->t_id = Auth::user()->id;
        $template->t_name = Auth::user()->name;
        $template->user_type = 'admin';
        $template->name = $request->name;
        $template->structure = $request->structure;
        $template->count = 0;
        $template->active = '1';
        $template->save();
        return response()
            ->json($template->id);
    }

    public function edit_custom_paper_templates(Request $request)
    {
        $users = custom_paper_template::where(['id' => $request->get('id') , 'active' => '1'])
            ->get();
        return view('admin.edit_custom_paper_templates', compact('users'));
    }

    public function edit_custom_paper_templates_submit(Request $request)
    {
        $template = custom_paper::where('template_id', $request->id)
            ->update(['template_name' => $request->name]);
        $template = custom_paper_template::find($request->id);
        $template->name = $request->name;
        $template->structure = $request->structure;
        $template->save();

        return response()
            ->json($template->id);
    }

    public function delete_custom_paper_templates(Request $request)
    {
        $template = custom_paper_template::find($request->id);
        $template->active = '0';
        $template->save();
        return response()
            ->json($template->id);
    }
    public function custom_paper_list(Request $request)
    {
        $users = custom_paper::where(['template_id' => $request->get('id') , 'active' => '1'])
            ->get();
        return response()
            ->json($users);
    }
    //------------------------------------Paper Section---------------------------------------------------------------
    public function create_custom_papers(Request $request)
    {

        if (custom_paper::Where(['pname' => $request->name, 'active' => '1'])
            ->count() > 0)
        {
            $validator = Validator::make(Input::all() , ['name' => 'email']);
            return Response::json(['error' => $validator->errors()
                ->all() ]);
        }
        else
        {
            File::makeDirectory('Quiz/custom_paper/' . $request->name);
            File::makeDirectory('Quiz/custom_paper/' . $request->name . '/question');
            File::makeDirectory('Quiz/custom_paper/' . $request->name . '/solution');
            File::makeDirectory('Quiz/custom_paper/' . $request->name . '/response');
            $uniquename = time() . uniqid(rand());
            $File = $uniquename . '.blade.php';
            $results = '$results';
            $contents = "@extends($results==0 ? 'layout/custom_paper' : 'layout/custom_papershow')
      @extends('layout/details')";
            Storage::disk('normal_paper')->put($File, $contents);

            $paper = new custom_paper();
            $paper->acd_id = Auth::user()->acd_id;
            $paper->acd_name = Auth::user()->acd_name;
            $paper->t_id = Auth::user()->id;
            $paper->t_name = Auth::user()->name;
            $paper->user_type = 'admin';
            $paper->template_id = $request->id;
            $paper->pname = $request->name;
            $paper->plink = $File;
            $paper->template_name = $request->template_name;
            $paper->structure = json_decode($request->structure);
            $paper->type = 'custom';
            $paper->subject = $request->subject;
            $paper->NOQ = $request->NOQ;
            $paper->TT = $request->TT;
            $paper->total_marks = $request->total_marks;
            $paper->count = 0;
            $paper->active = '1';
            $paper->save();
            $template = custom_paper_template::find($request->id);
            $template->count = $template->count + 1;
            $template->save();

            $question = array();
            $i = 1;
            foreach (json_decode(json_decode($request->structure)) [0]->pattern as $subject)
            {
                foreach ($subject->pattern as $ques)
                {
                    for ($a = 0;$a < $ques->question;$a++)
                    {
                        $type = $ques->question_type;
                        $question[$i - 1] = array(
                            "qid" => $i,
                            "pid" => $paper->id,
                            "qtype" => "custom",
                            "qpid" => $i . 'X' . $paper->id,
                            "qpqtypeid" => $i . 'X' . $paper->id . 'Xcustom',
                            "subject_name" => $subject->subject,
                            "positive" => $ques->positive,
                            "negative" => $ques->negative,
                            "type" => $type,
                            "quesimg" => null,
                            "solimg" => null,
                            "q1" => null,
                            "q2" => null,
                            "q3" => null,
                            "q4" => null,
                            "q5" => null,
                            "q6" => null,
                            "q7" => null,
                            "q8" => null,
                            "remember_token" => null
                        );
                        $i++;
                    }
                }
            }
            $filea = new new_question();
            $filea->pid = $paper->id;
            $filea->qtype = 'custom';
            $filea->pqtypeid = $paper->id . "X" . 'custom';
            $filea->questions = json_encode($question);
            $filea->active = 1;
            $filea->save();
            return Response::json($paper);
        }
    }

    public function custom_papers(Request $request)
    {
        if ($request->has('s') && $request->get('s') != '')
        {
            $studentsearch = $request->get('s');
            $users = custom_paper::where('pname', 'like', '%' . $studentsearch . '%')->orWhere('created_at', 'like', '%' . $studentsearch . '%');
            $users = $users->where(['active' => '1', 'test_series' => NULL])
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.custom_paper_list', compact('users'));
        }
        else
        {
            $users = custom_paper::where(['active' => '1', 'test_series' => NULL])->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.custom_paper_list', compact('users'));
        }
    }

    public function custom_papers_page(Request $request)
    {
        if ($request->has('s') && $request->get('s') != '')
        {
            $studentsearch = $request->get('s');
            $users = custom_paper::where('pname', 'like', '%' . $studentsearch . '%')->orWhere('created_at', 'like', '%' . $studentsearch . '%');
            $users = $users->where(['active' => '1', 'test_series' => NULL])
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.custom_paper_list_reload', compact('users'));
        }
        else
        {
            $users = custom_paper::where(['active' => '1', 'test_series' => NULL])->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.custom_paper_list_reload', compact('users'));
        }
    }

    public function edit_custom_papers(Request $request)
    {
        $template = custom_paper::find($request->id);
        $template->pname = $request->name;
        $template->TT = $request->TT;
        $template->save();
        return response()
            ->json($template->id);
    }
    public function delete_custom_papers(Request $request)
    {
        $template = custom_paper::find($request->id);
        $template->active = '0';
        $templates = custom_paper_template::find($template->template_id);
        $templates->count = $templates->count - 1;
        $templates->save();
        $template->save();
        $teacher = paper_link::where(['pid' => $request->id, 'type' => 'custom'])
            ->update(['active' => '2']);
        return response()
            ->json($teacher);
    }

    public function custompaperquesupload(Request $request)
    {
        $where = ['pqtypeid' => $request->get('id') . 'Xcustom', 'active' => '1'];
        $question = 0;
        $solution = 0;
        $ques = array();
        $quest = new_question::where($where)->get();
        foreach ($quest as $q)
        {
            $ques = json_decode($q->questions);
        }
        foreach ($ques as $q)
        {
            if ($q->quesimg != NULL || $q->quesimg != "")
            {
                $question = $question + 1;
            }
            if ($q->solimg != NULL || $q->solimg != "")
            {
                $solution = $solution + 1;
            }
        }
        return view('admin.cm_ques_upload', compact('question', 'solution'));
    }

    public function custompaperquesuploadsubmit(Request $request)
    {
        $where = ['id' => $request->id, 'active' => '1'];
        $where1 = ['pqtypeid' => $request->id . 'Xcustom', 'active' => '1'];
        $users = custom_paper::where($where)->select('pname')
            ->get();
        $questions = new_question::where($where1)->get();
        $question = array();
        $id = '';
        foreach ($users as $user)
        {
            $pname = $user->pname;
        }
        foreach ($questions as $user)
        {
            $question = json_decode($user->questions);
            $id = $user->id;
        }
        $this->validate($request, ['filenames' => 'required']);
        if ($request->hasfile('filenames'))
        {
            foreach ($request->file('filenames') as $file)
            {
                $name = $file->getClientOriginalName();
                $file_name = pathinfo($name, PATHINFO_FILENAME);
                $path = base_path() . '/public_html/Quiz/custom_paper/' . $pname . '/question';
                $file->move($path, $name);
                $qpqtypeid = $file_name . "X" . $request->id . "X" . 'custom';
                $img = 'Quiz/custom_paper/' . $pname . '/question/' . $name;
                foreach ($question as $q)
                {
                    if ($q->qpqtypeid == $qpqtypeid)
                    {
                        $q->quesimg = $img;
                        $q->remember_token = time();
                    }
                }
            }
            $filea = new_question::where(['id' => $id])->update(['questions' => json_encode($question) ]);
        }
        return back()->with('success', 'uploaded Successfully');
    }

    public function custompapersoluploadsubmit(Request $request)
    {
        $where = ['id' => $request->id, 'active' => '1'];
        $where1 = ['pqtypeid' => $request->id . 'Xcustom', 'active' => '1'];
        $users = custom_paper::where($where)->select('pname')
            ->get();
        $questions = new_question::where($where1)->get();
        $question = array();
        $id = '';
        foreach ($users as $user)
        {
            $pname = $user->pname;
        }
        foreach ($questions as $user)
        {
            $question = json_decode($user->questions);
            $id = $user->id;
        }
        $this->validate($request, ['filenames' => 'required']);
        if ($request->hasfile('filenames'))
        {
            foreach ($request->file('filenames') as $file)
            {
                $name = $file->getClientOriginalName();
                $file_name = pathinfo($name, PATHINFO_FILENAME);
                $path = base_path() . '/public_html/Quiz/custom_paper/' . $pname . '/solution';
                $file->move($path, $name);
                $qpqtypeid = $file_name . "X" . $request->id . "X" . 'custom';
                $img = 'Quiz/custom_paper/' . $pname . '/solution/' . $name;
                foreach ($question as $q)
                {
                    if ($q->qpqtypeid == $qpqtypeid)
                    {
                        $q->solimg = $img;
                        $q->remember_token = time();
                    }
                }
            }
            $filea = new_question::where(['id' => $id])->update(['questions' => json_encode($question) ]);
        }
        return back()->with('success', 'uploaded Successfully');
    }

    public function custompaperansupload(Request $request)
    {
        $where = ['pqtypeid' => $request->get('id') . 'Xcustom', 'active' => '1'];
        $users = array();
        $user = new_question::where($where)->get();
        foreach ($user as $q)
        {
            $users = json_decode($q->questions);
            $id = $q->pqtypeid;
        }
        return view('admin.cm_ans_upload', compact('users', 'id'));
    }

    public function custompaperansuploadsubmit(Request $request)
    {
        $where = ['pqtypeid' => $request->pqtypeid, 'active' => '1'];
        $users = new_question::where($where)->update(['questions' => $request->data]);
        return response()
            ->json($users);
    }

    public function get_results_json(Request $request)
    {
        if ($request->get('type') == 'custom')
        {
            if ($request->has('plid') && $request->get('plid') != '')
            {
                $cond = ['pid' => $request->get('id') , 'plid' => $request->get('plid') , 'p_type' => 'custom', 'active' => '1'];
            }
            else
            {
                $cond = ['pid' => $request->get('id') , 'p_type' => 'custom', 'active' => '1'];
            }
            $paper = custom_paper::where(['id' => $request->get('id') , 'active' => '1'])
                ->get();
            $answers = new_answer::where($cond)->get();
            $where = ['pqtypeid' => $request->get('id') . 'Xcustom', 'active' => '1'];
            $questions = array();
            $user = new_question::where($where)->get();
            foreach ($user as $q)
            {
                $questions = json_decode($q->questions);
            }
            return response()
                ->json(['paper' => $paper, 'answers' => $answers, 'questions' => $questions]);
        }
        else if ($request->get('type') == 'normal')
        {
            $paper = normal_paper::where(['id' => $request->get('id') , 'active' => '1'])
                ->get();
            $answers = new_answer::where(['pid' => $request->get('id') , 'p_type' => 'normal', 'active' => '1'])
                ->get();
            $where = ['pqtypeid' => $request->get('id') . 'Xnormal', 'active' => '1'];
            $questions = array();
            $user = new_question::where($where)->get();
            foreach ($user as $q)
            {
                $questions = json_decode($q->questions);
            }
            return response()
                ->json(['paper' => $paper, 'answers' => $answers, 'questions' => $questions]);
        }
        else
        {
            $paper = advance_paper::where(['id' => $request->get('id') , 'active' => '1'])
                ->get();
            $answers = new_answer::where(['pid' => $request->get('id') , 'p_type' => 'advanced', 'active' => '1'])
                ->get();
            $where = ['pqtypeid' => $request->get('id') . 'Xadvanced', 'active' => '1'];
            $questions = array();
            $user = new_question::where($where)->get();
            foreach ($user as $q)
            {
                $questions = json_decode($q->questions);
            }
            return response()
                ->json(['paper' => $paper, 'answers' => $answers, 'questions' => $questions]);
        }
    }

    public function update_results_submit(Request $request)
    {
        foreach (json_decode($request->answers) as $data)
        {
            $users = new_answer::where('id', $data->id)
                ->update(['answers' => json_encode($data->answers) ]);
        }
        foreach (json_decode($request->results) as $data)
        {
            $users = result::where(['pid' => $data->pid, 'plid' => $data->plid, 'sid' => $data->sid, 'active' => '1'])
                ->update(['totalQ' => $data->totalQ, 'totalA' => $data->totalA, 'totalC' => $data->totalC, 'totalW' => $data->totalW, 'totalP' => $data->totalP, 'totalS' => $data->totalS, 'custom_structure' => json_encode($data->custom_structure) , 'totalCinP' => $data->CinP, 'totalWinP' => $data->WinP, 'totalSinP' => $data->MinP, 'totalCinC' => $data->CinC, 'totalWinC' => $data->WinC, 'totalSinC' => $data->MinC, 'totalCinM' => $data->CinM, 'totalWinM' => $data->WinM, 'totalSinM' => $data->MinM, 'totalCinB' => $data->CinB, 'totalWinB' => $data->WinB, 'totalSinB' => $data->MinB]);
            //---------------------------------------------------------------------Notification section--------------------------------------------
            if ($request->notification == "yes")
            {
                $student = result::where(['pid' => $data->pid, 'plid' => $data->plid, 'sid' => $data->sid, 'active' => '1'])
                    ->get();
                foreach ($student as $s)
                {
                    $body = "Results for " . $s->paper . " have been updated.
Your Score is : " . $s->totalS . "/" . $s->total_marks;
                    if ($s->type != "custom")
                    {
                        if ($s->PQ != 0)
                        {
                            $body = $body . "
Physics         :  " . $s->totalSinP . "   Marks";
                        }
                        if ($s->CQ != 0)
                        {
                            $body = $body . "
Chemistry     :  " . $s->totalSinC . "   Marks";
                        }
                        if ($s->MQ != 0)
                        {
                            $body = $body . "
Mathmatics :  " . $s->totalSinM . "   Marks";
                        }
                        if ($s->BQ != 0)
                        {
                            $body = $body . "
Biology          :  " . $s->totalSinB . "   Marks";
                        }
                    }
                    else
                    {
                        foreach (json_decode($s->custom_structure) as $p)
                        {
                            if ($p->question > 0)
                            {
                                $body = $body . "
" . $p->subject . "  :  " . $p->totalS . "/" . $p->total_marks;
                            }
                        }
                    }

                    $acd_id = Auth::user()->acd_id;
                    $acd_name = Auth::user()->acd_name;
                    $notification_type = 'right_icon_long';
                    $title = 'Updated Result.';
                    $body = $body;
                    $title_long = 'Updated Result.';
                    $body_long = $body;
                    $title_line = null;
                    $body_line1 = null;
                    $body_line2 = null;
                    $body_line3 = null;
                    $body_line4 = null;
                    $body_line5 = null;
                    $body_line6 = null;
                    $body_line7 = null;
                    $body_line8 = null;
                    $body_line9 = null;
                    $body_line10 = null;
                    $summary = "Result Update";
                    $icon = asset('') . env('NOTI_ICON');
                    $image = asset('') . env('NOTI_ICON');

                    $browser_token = array();
                    $br_tk = 0;
                    $app_tk = 0;
                    $app_token = array();
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $use = token::where(['user_id' => $s->sid, 'user_type' => 'student', 'active' => '1'])
                        ->get();
                    foreach ($use as $user)
                    {
                        if ($user->token_type == "Application")
                        {
                            $app_token[$app_tk] = $user->token;
                            $app_tk++;
                        }
                        else
                        {
                            $browser_token[$br_tk] = $user->token;
                            $br_tk++;
                        }
                    }

                    $headers = array(
                        "Authorization: key=" . env('FCM_SERVER_KEY') ,
                        'Content-Type: application/json'
                    );
                    $app_tokens = array_chunk($app_token, 999, true);
                    foreach ($app_tokens as $token)
                    {
                        $app_fields = array(
                            'registration_ids' => $token,
                            'data' => array(
                                "title" => $title,
                                "body" => $body,
                                "title_long" => $title_long,
                                "body_long" => $body_long,
                                "title_line" => $title_line,
                                "body_line1" => $body_line1,
                                "body_line2" => $body_line2,
                                "body_line3" => $body_line3,
                                "body_line4" => $body_line4,
                                "body_line5" => $body_line5,
                                "body_line6" => $body_line6,
                                "body_line7" => $body_line7,
                                "body_line8" => $body_line8,
                                "body_line9" => $body_line9,
                                "body_line10" => $body_line10,
                                "summary" => $summary,
                                "icon" => $icon,
                                "sound" => "notification",
                                "noti_id" => rand(1, 1000) ,
                                "channel_id" => "Notification",
                                "image" => $image,
                                "type" => $notification_type,
                                "click_action" => "https://deltatrek.in/user/login"
                            )
                        );

                        $fields = json_encode($app_fields);
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                        $results = curl_exec($ch);
                        curl_close($ch);
                    }
                    $browser_tokens = array_chunk($browser_token, 999, true);
                    foreach ($browser_tokens as $token)
                    {
                        if ($notification_type == 'no_icon')
                        {
                            $title = $title;
                            $body = $body;
                            $image = '';
                            $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                        }
                        elseif ($notification_type == 'right_icon' || $notification_type == 'left_icon')
                        {
                            $title = $title;
                            $body = $body;
                            $image = '';
                            $icon = $icon;
                        }
                        elseif ($notification_type == 'right_icon_long')
                        {
                            $title = $title_long;
                            $body = $body_long;
                            $image = '';
                            $icon = $icon;
                        }
                        elseif ($notification_type == 'no_icon_long')
                        {
                            $title = $title_long;
                            $body = $body_long;
                            $image = '';
                            $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                        }
                        elseif ($notification_type == 'no_icon_image')
                        {
                            $title = $title;
                            $body = $body;
                            $image = $image;
                            $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                        }
                        elseif ($notification_type == 'right_icon_image_hide' || $notification_type == 'right_icon_image_show')
                        {
                            $title = $title;
                            $body = $body;
                            $image = $image;
                            $icon = $icon;
                        }
                        elseif ($notification_type == 'no_icon_lines')
                        {
                            $title = $title_line;
                            $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                            $image = '';
                            $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                        }
                        elseif ($notification_type == 'right_icon_lines')
                        {
                            $title = $title_line;
                            $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                            $image = '';
                            $icon = $icon;
                        }
                        $browser_fields = array(
                            'registration_ids' => $token,
                            'notification' => array(
                                "title" => $title,
                                "body" => $body,
                                "icon" => $icon,
                                "sound" => "notification",
                                "noti_id" => rand(1, 1000) ,
                                "image" => $image,
                                "click_action" => "https://deltatrek.in/user/login"
                            )
                        );

                        $fields = json_encode($browser_fields);
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                        $results = curl_exec($ch);
                        curl_close($ch);
                    }
                }
            }
        }
        return response()->json('Results And Answers Updated Successfully');
    }

    public function custompaperpublish(Request $request)
    {
        $where = ['id' => $request->get('id') , 'active' => '1'];
        $users = custom_paper::where($where)->get();
        return view('admin.cm_publish', compact('users'));
    }

    public function custompaperupdateresultpage(Request $request)
    {
        $where = ['pqtypeid' => $request->get('id') . 'Xcustom', 'active' => '1'];
        $users = array();
        $user = new_question::where($where)->get();
        foreach ($user as $use)
        {
            $users = json_decode($use->questions);
        }
        return view('admin.cm_ans_upload_updates', compact('users'));
    }

    public function custompaperpublishsubmit(Request $request)
    {
        $this->validate($request, ['class' => 'required', 'course' => 'required', 'coursetype' => 'required', 'publishtime' => 'required', 'radio' => 'required', 'radio1' => 'required', 'view' => 'required', 'pname' => 'required', 'plink' => 'required', 'pid' => 'required', 'hardness' => 'required']);
        $folder_notification = "no";
        $folder_paper_notification = "no";
        $paper_notification = "yes";
        $id = NULL;
        if ($request->folder_id != NULL)
        {
            $folder_paper_notification = "yes";
            $paper_notification = "no";
            $n = 0;
            $fx = ts_folder::find($request->folder_id);
            $n = ts_folder_link::where(['folder_id' => $fx->id, 'cccgid' => $request->class . $request->course . $request->coursetype . $request->radio, 'active' => '1'])
                ->count();
            if ($n == 0)
            {
                $files = new ts_folder_link();
                $files->acd_id = $fx->acd_id;
                $files->acd_name = $fx->acd_name;
                $files->folder_id = $fx->id;
                $files->name = $fx->name;
                $files->folder_type = $fx->folder_type;
                $files->classid = $request->class;
                $files->courseid = $request->course;
                $files->coursetypeid = $request->coursetype;
                $files->groupid = $request->radio;
                $files->cccgid = $request->class . $request->course . $request->coursetype . $request->radio;
                $files->count = 1;
                $files->active = 1;
                $files->save();
                $id = $files->id;
                $folder_notification = "yes";

            }
            else
            {
                $count = 0;
                $users = ts_folder_link::where(['folder_id' => $fx->id, 'cccgid' => $request->class . $request->course . $request->coursetype . $request->radio, 'active' => '1'])
                    ->get();
                foreach ($users as $use)
                {
                    $count = $use->count + 1;
                    $id = $use->id;
                }
                $users = ts_folder_link::where(['folder_id' => $fx->id, 'cccgid' => $request->class . $request->course . $request->coursetype . $request->radio, 'active' => '1'])
                    ->update(['count' => $count]);
            }
        }
        $file = new paper_link();
        $file->pid = $request->pid;
        $file->classid = $request->class;
        $file->courseid = $request->course;
        $file->coursetypeid = $request->coursetype;
        $file->groupid = $request->radio;
        $file->cccgid = $request->class . $request->course . $request->coursetype . $request->radio;
        $file->paper = $request->pname;
        $file->plink = $request->plink;
        $file->hardness = $request->hardness;
        $file->view = $request->view;
        $file->rank = $request->radio1;
        $file->test_series = $request->test_series;
        $file->folder_link_id = $id;
        $file->publishtime = $request->publishtime;
        $file->type = 'custom';
        $file->active = 1;
        $file->save();
        //---------------------------------------------------------------------Notification section--------------------------------------------
        

        if ($folder_notification == "yes")
        {
            $title = "New Folder Published";
            $body = $fx->name . " has been published in online test series section.
Kindly attempt it as per the time allotted.";
            $summary = "Folder Publish";

            $acd_id = Auth::user()->acd_id;
            $acd_name = Auth::user()->acd_name;
            $notification_type = 'right_icon_long';
            $title = $title;
            $body = $body;
            $title_long = $title;
            $body_long = $body;
            $title_line = null;
            $body_line1 = null;
            $body_line2 = null;
            $body_line3 = null;
            $body_line4 = null;
            $body_line5 = null;
            $body_line6 = null;
            $body_line7 = null;
            $body_line8 = null;
            $body_line9 = null;
            $body_line10 = null;
            $summary = $summary;
            $icon = asset('') . env('NOTI_ICON');
            $image = asset('') . env('NOTI_ICON');
            $class = $request->class;
            $course = $request->course;
            $coursetype = $request->coursetype;
            $group = $request->radio;
            $cccgid = $request->class . $request->course . $request->coursetype . $request->radio;
            $publishtime = $request->publishtime;

            $browser_token = array();
            $br_tk = 0;
            $app_tk = 0;
            $app_token = array();
            $url = 'https://fcm.googleapis.com/fcm/send';

            $userss = student::where(['class' => $class, 'course' => $course, 'coursetype' => $coursetype, 'groupid' => $group, 'active' => '1'])->select('id')
                ->get();
            foreach ($userss as $users)
            {
                $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                    ->get();
                foreach ($use as $user)
                {
                    if ($user->token_type == "Application")
                    {
                        $app_token[$app_tk] = $user->token;
                        $app_tk++;
                    }
                    else
                    {
                        $browser_token[$br_tk] = $user->token;
                        $br_tk++;
                    }
                }
            }

            $headers = array(
                "Authorization: key=" . env('FCM_SERVER_KEY') ,
                'Content-Type: application/json'
            );
            $app_tokens = array_chunk($app_token, 999, true);
            foreach ($app_tokens as $token)
            {
                $app_fields = array(
                    'registration_ids' => $token,
                    'data' => array(
                        "title" => $title,
                        "body" => $body,
                        "title_long" => $title_long,
                        "body_long" => $body_long,
                        "title_line" => $title_line,
                        "body_line1" => $body_line1,
                        "body_line2" => $body_line2,
                        "body_line3" => $body_line3,
                        "body_line4" => $body_line4,
                        "body_line5" => $body_line5,
                        "body_line6" => $body_line6,
                        "body_line7" => $body_line7,
                        "body_line8" => $body_line8,
                        "body_line9" => $body_line9,
                        "body_line10" => $body_line10,
                        "summary" => $summary,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(1, 1000) ,
                        "channel_id" => "Paper Publish",
                        "image" => $image,
                        "type" => $notification_type,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                $fields = json_encode($app_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
            $browser_tokens = array_chunk($browser_token, 999, true);
            foreach ($browser_tokens as $token)
            {
                if ($notification_type == 'no_icon')
                {
                    $title = $title;
                    $body = $body;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($notification_type == 'right_icon' || $notification_type == 'left_icon')
                {
                    $title = $title;
                    $body = $body;
                    $image = '';
                    $icon = $icon;
                }
                elseif ($notification_type == 'right_icon_long')
                {
                    $title = $title_long;
                    $body = $body_long;
                    $image = '';
                    $icon = $icon;
                }
                elseif ($notification_type == 'no_icon_long')
                {
                    $title = $title_long;
                    $body = $body_long;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($notification_type == 'no_icon_image')
                {
                    $title = $title;
                    $body = $body;
                    $image = $image;
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($notification_type == 'right_icon_image_hide' || $notification_type == 'right_icon_image_show')
                {
                    $title = $title;
                    $body = $body;
                    $image = $image;
                    $icon = $icon;
                }
                elseif ($notification_type == 'no_icon_lines')
                {
                    $title = $title_line;
                    $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                    $image = '';
                    $icon = 'https://deltatrek.in/img/mobile%20ins.png';
                }
                elseif ($notification_type == 'right_icon_lines')
                {
                    $title = $title_line;
                    $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                    $image = '';
                    $icon = $icon;
                }
                $browser_fields = array(
                    'registration_ids' => $token,
                    'notification' => array(
                        "title" => $title,
                        "body" => $body,
                        "icon" => $icon,
                        "sound" => "notification",
                        "noti_id" => rand(1, 1000) ,
                        "image" => $image,
                        "click_action" => "https://deltatrek.in/user/login"
                    )
                );

                $fields = json_encode($browser_fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                $result = curl_exec($ch);
                curl_close($ch);
            }
        }
        if ($folder_paper_notification == "yes")
        {
            $title = "New Paper Published";
            $dateTimestamp1 = strtotime($request->publishtime);
            $dateTimestamp2 = time();
            if ($dateTimestamp2 < $dateTimestamp1)
            {
                $body = $request->pname . " has been scheduled for " . date_format(date_create($request->publishtime) , "jS M, h:i a") . " under the folder " . $fx->name . " in online test series section.
Kindly attempt it as per the schedule.";
            }
            else
            {
                $body = $request->pname . " has been published under the folder " . $fx->name . " in online test series section.
Kindly attempt it as per the schedule.";
            }
            $summary = "Test Series Publish";

        }
        else
        {
            $title = "New Paper Published";
            $dateTimestamp1 = strtotime($request->publishtime);
            $dateTimestamp2 = time();
            if ($dateTimestamp2 < $dateTimestamp1)
            {
                $body = $request->pname . " has been scheduled for " . date_format(date_create($request->publishtime) , "jS M, h:i a") . ".
Kindly attempt it as per the schedule.";
            }
            else
            {
                $body = $request->pname . " is active Now.
Kindly attempt it at the earliest.";
            }
            $summary = "Paper Publish";
        }

        $acd_id = Auth::user()->acd_id;
        $acd_name = Auth::user()->acd_name;
        $notification_type = 'right_icon_long';
        $title = $title;
        $body = $body;
        $title_long = $title;
        $body_long = $body;
        $title_line = null;
        $body_line1 = null;
        $body_line2 = null;
        $body_line3 = null;
        $body_line4 = null;
        $body_line5 = null;
        $body_line6 = null;
        $body_line7 = null;
        $body_line8 = null;
        $body_line9 = null;
        $body_line10 = null;
        $summary = $summary;
        $icon = asset('') . env('NOTI_ICON');
        $image = asset('') . env('NOTI_ICON');
        $class = $request->class;
        $course = $request->course;
        $coursetype = $request->coursetype;
        $group = $request->radio;
        $cccgid = $request->class . $request->course . $request->coursetype . $request->radio;
        $publishtime = $request->publishtime;

        $browser_token = array();
        $br_tk = 0;
        $app_tk = 0;
        $app_token = array();
        $url = 'https://fcm.googleapis.com/fcm/send';

        $userss = student::where(['class' => $class, 'course' => $course, 'coursetype' => $coursetype, 'groupid' => $group, 'active' => '1'])->select('id')
            ->get();
        foreach ($userss as $users)
        {
            $use = token::where(['user_id' => $users->id, 'user_type' => 'student', 'active' => '1'])
                ->get();
            foreach ($use as $user)
            {
                if ($user->token_type == "Application")
                {
                    $app_token[$app_tk] = $user->token;
                    $app_tk++;
                }
                else
                {
                    $browser_token[$br_tk] = $user->token;
                    $br_tk++;
                }
            }
        }

        $headers = array(
            "Authorization: key=" . env('FCM_SERVER_KEY') ,
            'Content-Type: application/json'
        );
        $app_tokens = array_chunk($app_token, 999, true);
        foreach ($app_tokens as $token)
        {
            $app_fields = array(
                'registration_ids' => $token,
                'data' => array(
                    "title" => $title,
                    "body" => $body,
                    "title_long" => $title_long,
                    "body_long" => $body_long,
                    "title_line" => $title_line,
                    "body_line1" => $body_line1,
                    "body_line2" => $body_line2,
                    "body_line3" => $body_line3,
                    "body_line4" => $body_line4,
                    "body_line5" => $body_line5,
                    "body_line6" => $body_line6,
                    "body_line7" => $body_line7,
                    "body_line8" => $body_line8,
                    "body_line9" => $body_line9,
                    "body_line10" => $body_line10,
                    "summary" => $summary,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(1, 1000) ,
                    "channel_id" => "Paper Publish",
                    "image" => $image,
                    "type" => $notification_type,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            $fields = json_encode($app_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        $browser_tokens = array_chunk($browser_token, 999, true);
        foreach ($browser_tokens as $token)
        {
            if ($notification_type == 'no_icon')
            {
                $title = $title;
                $body = $body;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($notification_type == 'right_icon' || $notification_type == 'left_icon')
            {
                $title = $title;
                $body = $body;
                $image = '';
                $icon = $icon;
            }
            elseif ($notification_type == 'right_icon_long')
            {
                $title = $title_long;
                $body = $body_long;
                $image = '';
                $icon = $icon;
            }
            elseif ($notification_type == 'no_icon_long')
            {
                $title = $title_long;
                $body = $body_long;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($notification_type == 'no_icon_image')
            {
                $title = $title;
                $body = $body;
                $image = $image;
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($notification_type == 'right_icon_image_hide' || $notification_type == 'right_icon_image_show')
            {
                $title = $title;
                $body = $body;
                $image = $image;
                $icon = $icon;
            }
            elseif ($notification_type == 'no_icon_lines')
            {
                $title = $title_line;
                $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                $image = '';
                $icon = 'https://deltatrek.in/img/mobile%20ins.png';
            }
            elseif ($notification_type == 'right_icon_lines')
            {
                $title = $title_line;
                $body = $body_line1 . ' ' . $body_line2 . ' ' . $body_line3 . ' ' . $body_line4 . ' ' . $body_line5 . ' ' . $body_line6 . ' ' . $body_line7 . ' ' . $body_line8 . ' ' . $body_line9 . ' ' . $body_line10;
                $image = '';
                $icon = $icon;
            }
            $browser_fields = array(
                'registration_ids' => $token,
                'notification' => array(
                    "title" => $title,
                    "body" => $body,
                    "icon" => $icon,
                    "sound" => "notification",
                    "noti_id" => rand(1, 1000) ,
                    "image" => $image,
                    "click_action" => "https://deltatrek.in/user/login"
                )
            );

            $fields = json_encode($browser_fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
            curl_close($ch);
        }

        return back()->with('success', 'uploaded Successfully');
    }

    public function customimage(Request $request)
    {
        $where = ['pqtypeid' => $request->get('id') . 'Xcustom', 'active' => '1'];
        $users = array();
        $pid = $request->get('id');
        $type = 'custom';
        if ($request->has('plid'))
        {
            $plid = $request->get('plid');
        }
        else
        {
            $plid = '';
        }
        $user = new_question::where($where)->orderBy('id', 'asc')
            ->get();
        foreach ($user as $use)
        {
            $users = json_decode($use->questions);
        }
        return view('layout.paperview', compact('users', 'pid', 'plid', 'type'));
    }

    public function delete_image(Request $request)
    {
        $name = explode("/", $request->img);
        $pname = $name[count($name) - 3];
        $type = $name[count($name) - 4];
        if ($type == 'normal_paper')
        {
            $paper = normal_paper::where(['pname' => $pname, 'active' => '1'])->get();
        }
        else if ($type == 'custom_paper')
        {
            $paper = custom_paper::where(['pname' => $pname, 'active' => '1'])->get();
        }
        else
        {
            $paper = advance_paper::where(['pname' => $pname, 'active' => '1'])->get();
        }
        foreach ($paper as $p)
        {
            $id = $p->id;
            $ptype = $p->type;
        }
        $user = new_question::where(['pqtypeid' => $id . 'X' . $ptype, 'active' => '1'])->get();
        foreach ($user as $use)
        {
            $question = json_decode($use->questions);
            $q_id = $use->id;
        }

        if ($request->img_type == 'ques')
        {
            foreach ($question as $q)
            {
                if ($q->quesimg == $request->img)
                {
                    $q->quesimg = NULL;
                    $teachers = new_question::where('id', $q_id)->update(['questions' => json_encode($question) ]);
                }
            }
        }
        else if ($request->img_type == 'sol')
        {
            foreach ($question as $q)
            {
                if ($q->solimg == $request->img)
                {
                    $q->solimg = NULL;
                    $teachers = new_question::where('id', $q_id)->update(['questions' => json_encode($question) ]);
                }
            }
        }
        File::delete($request->img);
        return response()
            ->json($teachers);
    }

    public function cm_p_summary(Request $request)
    {
        $id = $request->get('id');
        $no = 0;
        $no = result::where(['pid' => $id, 'type' => 'custom', 'active' => '1'])->count();
        if ($no > 0)
        {
            $users = result::where(['pid' => $id, 'type' => 'custom', 'active' => '1'])->orderBy('totalS', 'desc')
                ->get();
            $users = $users->sortByDesc('totalS');
            foreach ($users as $user)
            {
                $name = $user->paper;
            }

            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadview('admin.result_summary', compact('users', 'name'));
            return $pdf->download($name . ' full result summary.pdf');
        }
        return back();
    }

    public function move_to_test_series(Request $request)
    {
        if ($request->type == "normal")
        {
            $file = normal_paper::find($request->get('pid'));
            $file->test_series = "true";
            $file->folder_id = $request->get('fid');
            $file->save();
            $files = ts_folder::find($request->get('fid'));
            $files->count = $files->count + 1;
            $files->save();
            return back()
                ->with('success', 'uploaded Successfully');
        }
        else if ($request->type == "custom")
        {
            $file = custom_paper::find($request->get('pid'));
            $file->test_series = "true";
            $file->folder_id = $request->get('fid');
            $file->save();
            $files = ts_folder::find($request->get('fid'));
            $files->count = $files->count + 1;
            $files->save();
            return back()
                ->with('success', 'uploaded Successfully');
        }
        else
        {
            $file = advance_paper::find($request->get('pid'));
            $file->test_series = "true";
            $file->folder_id = $request->get('fid');
            $file->save();
            $files = ts_folder::find($request->get('fid'));
            $files->count = $files->count + 1;
            $files->save();
            return back()
                ->with('success', 'uploaded Successfully');
        }
    }

    public function list_of_folder(Request $request)
    {
        $users = ts_folder::where(['active' => '1', 'folder_type' => $request->get("type") ])
            ->orderBy('name', 'asc')
            ->get();
        return Response::json($users);
    }

    public function deletenrpaper(Request $request)
    {
        $teacher = normal_paper::find($request->id);
        $teacher->active = '0';
        $teacher->save();
        $teacher = paper_link::where(['pid' => $request->id, 'type' => 'normal'])
            ->update(['active' => '2']);
        return response()
            ->json($teacher);
    }

}

