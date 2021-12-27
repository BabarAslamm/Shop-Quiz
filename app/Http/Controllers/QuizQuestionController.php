<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\Quiz;
use DataTables;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quiz.quiz_question');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function data(Request $request){




        if ($request->ajax()) {
            $data = QuizQuestion::all();
            return Datatables::of($data)



            ->editColumn('quiz_id', function($row){
                if($row->quiz_id) {
                    // return $row->tutorial_id;
                    return $row->Quiz->title;
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




                            $btn = '<a href="'.route('question.edit', $row->id).'" class="edit btn mr-2 btn-primary btn-sm">Edit</a>';
                            $btn .= '<a href="javascript:" data-id="'.$row->id.'" class="view mr-2 btn btn-danger btn-sm delete">Delete</a>';
                            // $btn .= '<a href="'.route('quiz-question', $row->id).'" class="edit btn mr-2 btn-success btn-sm">Quiz</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }













    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Quiz = Quiz::all();
        $Question  = QuizQuestion::where('id' , $id)->first();
        return view('admin.quiz.question',compact('Question','Quiz'));

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
        $QuizQuestion = QuizQuestion::where('id', $id)->delete();
    }
}
