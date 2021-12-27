<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use DataTables;

class TutorialController extends Controller
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
        return view('admin.tutorial.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutorial.create');
    }












    public function data(Request $request){




        if ($request->ajax()) {
            $data = Tutorial::all();
            return Datatables::of($data)




                    ->addColumn('action', function($row){

                           // $btn = '<a href="'.route('years.show', $row->id).'" class="view mr-2 btn btn-success btn-sm">View</a>';

                            $btn = '<a href="'.route('tutorial.edit', $row->id).'" class="edit btn mr-2 btn-primary btn-sm">Edit</a>';
                            $btn .= '<a href="javascript:" data-id="'.$row->id.'" class="view mr-2 btn btn-danger btn-sm delete">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

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

            'name' => 'required',
            'description' => 'required',

        ]);

        if($request->tut_id != ''){
            $Tutorial = Tutorial::where('id', $request->tut_id)->first();
            $Tutorial->name = $request->name;
            $Tutorial->description = $request->description;
            $Tutorial->save();
        }

        else{



            $Tutorial = new Tutorial;
            $Tutorial->name = $request->name;
            $Tutorial->description = $request->description;
            $Tutorial->save();
        }


        return redirect(route('tutorial.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json('show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tutorial = Tutorial::where('id' , $id)->first();
        return view('admin.tutorial.create',compact('Tutorial'));
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

        $Tutorial=Tutorial::where('id', $id)->delete();
    }
}
