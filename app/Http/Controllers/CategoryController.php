<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
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
        $Category = Category::all();
        return view('admin.category.index' , compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }



        public function data(Request $request){




        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)




                    ->addColumn('action', function($row){

                           // $btn = '<a href="'.route('years.show', $row->id).'" class="view mr-2 btn btn-success btn-sm">View</a>';

                            $btn = '<a href="'.route('Category.edit', $row->id).'" class="edit btn mr-2 btn-primary btn-sm">Edit</a>';
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

        ]);

        if($request->cat_id != ''){
            $Category = Category::where('id', $request->cat_id)->first();
            $Category->name = $request->name;
            $Category->save();
        }

        else{



            $Category = new Category;
            $Category->name = $request->name;
            $Category->save();
        }


        return redirect(route('Category.index'));
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
        $Category = Category::where('id' , $id)->first();
        return view('admin.category.create',compact('Category'));


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

         $Category=Category::where('id', $id)->delete();

        return 'true';
    }
}
