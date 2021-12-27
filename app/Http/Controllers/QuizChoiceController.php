<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizChoice;
use App\Models\QuizQuestion;

class QuizChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
          $Data =  $request->all();

        $QuizChoice = new QuizChoice;
        $QuizChoice->quiz_id          = $request->quiz_id;
        $QuizChoice->quiz_question_id = $request->question;
        $QuizChoice->choice           = $request->choice;
        $QuizChoice->is_right_choice  = $request->right;
        $QuizChoice->save();

        $lastId = $QuizChoice->id;

        $LastRec = QuizChoice::where('id' , $lastId)->first();
        $LastRecSelect = $LastRec->quiz_question_id;
        $LasQuestion   = QuizQuestion::where('id' , $LastRecSelect)->first();
        $AllQuestion   = QuizQuestion::where('is_active' , '1')->get();

        return response()->json(['Data'=>$Data ,'LastRec'=>$LastRec, 'LasQuest'=>$LasQuestion, 'allQuest'=>$AllQuestion]);

    }

    public function storing(){
        return response()->json('hi');
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
        //
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
        $QuizChoice=QuizChoice::where('id', $id)->delete();
        // return response()->json('destroy');

    }
}
