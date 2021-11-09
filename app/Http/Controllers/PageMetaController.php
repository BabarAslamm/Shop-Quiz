<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageMeta;

class PageMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        echo 'INDEX';
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

        $validated = $request->validate([

            'editor1' => 'required',


        ]);
        $PageMeta = PageMeta::where('page_id', '=', $request->page_id)->first();

         if($PageMeta){
        //     $State = State::where('id', $request->states_id)->first();
                $PageMeta->page_id = $request->page_id;
                $PageMeta->content = $request->editor1;
                $PageMeta->save();
         }

         else{

            $PageMeta = new PageMeta;
            $PageMeta->page_id = $request->page_id;
            $PageMeta->content = $request->editor1;
            $PageMeta->save();
         }

         return redirect()->back()->with('message','Operation Successful !');
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
        //
    }
}
