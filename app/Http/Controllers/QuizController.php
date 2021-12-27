<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.quiz.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tutorial = Tutorial::all();
        return view('admin.quiz.create' , compact('Tutorial'));
    }





    public function data(Request $request){




        if ($request->ajax()) {
            $data = Quiz::all();
            return Datatables::of($data)



            ->editColumn('tutorial_id', function($row){
                if($row->tutorial_id ) {
                    // return $row->tutorial_id;
                    return $row->Tutorial->name;
                }
                else {
                    return '';
                }

            })
            ->editColumn('is_active', function ($row) {
                if($row->is_active == 1){
                  return "Actived";
                }else{
                    return "Not Active";
                }
            })

                    ->addColumn('action', function($row){



                           // $btn = '<a href="'.route('years.show', $row->id).'" class="view mr-2 btn btn-success btn-sm">View</a>';

                            $btn = '<a href="'.route('quiz.edit', $row->id).'" class="edit btn mr-2 btn-primary btn-sm">Edit</a>';
                            $btn .= '<a href="javascript:" data-id="'.$row->id.'" class="view mr-2 btn btn-danger btn-sm delete">Delete</a>';
                            $btn .= '<a href="'.route('quiz-question', $row->id).'" class="edit btn mr-2 btn-success btn-sm">Quiz</a>';
                            // $btn .= '<a href="'.url('quiz/question/list', $row->id).'" class="edit btn mr-2 btn-warning btn-sm">View Quiz</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }

    public function Quiz_Question($id){

        return view('admin.quiz.quiz_question');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->tut_id != ''){
            // echo '<pre>'; print_r('here'); exit;

            $Quiz = Quiz::where('id', $request->tut_id)->first();
            $Quiz->tutorial_id = $request->tutorial_id;
            $Quiz->title = $request->title;
            $Quiz->marks_per_question = $request->marks_per_question;
            $Quiz->is_active = $request->is_active;
            $Quiz->save();
        }

        else{


            $validated = $request->validate([

                'tutorial_id' => 'required',
                'title' => 'required',
                'marks_per_question' => 'required|numeric',
                'is_active' => 'required',

            ]);



            $Quiz = new Quiz;
            $Quiz->tutorial_id = $request->tutorial_id;
            $Quiz->title = $request->title;
            $Quiz->marks_per_question = $request->marks_per_question;
            $Quiz->is_active = $request->is_active;
            $Quiz->save();
        }


        return redirect(route('quiz.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return response()->json('showw');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tutorial = Tutorial::all();
        $Quiz     = Quiz::where('id' , $id)->first();
        return view('admin.quiz.create',compact('Tutorial' , 'Quiz'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return response()->json('destroy');
        // return response()->json($array);
        $Quiz = Quiz::where('id', $id)->delete();
    }


    public function question($id){
// echo '<pre>'; print_r($id); exit;

        $Question = QuizQuestion::where('is_active' , '1')->get();
        // echo '<pre>'; print_r($Question); exit;

        return view('admin.quiz.question',compact('id','Question'));

    }

    public function question_store(Request $request){
        $validated = $request->validate([

            'question' => 'required',
            // 'is_active' => 'required',

        ]);

        if($request->question_id != ''){
            // echo '<pre>'; print_r($request->all()); exit;

            $Question = QuizQuestion::where('id', $request->question_id)->first();

            $Question->quiz_id  = $request->quiz_id;
            $Question->question  = $request->question;
            $Question->is_active = $request->is_active;
            $Question->save();

            return redirect(route('question.index'));

        }else{


            $Question = new QuizQuestion;
            $Question->quiz_id   = $request->quiz_id;
            $Question->question  = $request->question;
            $Question->is_active = $request->is_active;
            $Question->save();

            return redirect(route('quiz.index'));
        }





    }




  public function addQuestion(Request  $request){

    $Question = new QuizQuestion;
    $Question->quiz_id   = $request->quiz_id;
    $Question->question  = $request->question;
    $Question->is_active = $request->is_active;
    $Question->save();

    $Questions = QuizQuestion::where('is_active' , '1')->get();
     return response()->json($Questions);

  }





}
