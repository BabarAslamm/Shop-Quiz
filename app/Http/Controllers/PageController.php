<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use App\Models\Product;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Page($slug,$id){

       $Product = Product::all();
       $PageMeta = PageMeta::where('page_id', '=', $id)->first();

       $page = Page::where('id', '=', $id)->where('slug', '=' , $slug )->first();
       if ( $page) {
        return view('admin.page',compact('page','PageMeta' , 'Product'));

           }
           else{
               abort(404);
           }


        // // $Page = Page::where('id', $id)->first();
        // // $Post_slug =   $Page->slug;
        // // $Post_id = $Page->id;
        // if($Post_id == $id){
        //     abort(500, 'Something went wrong');
        //     // return view('admin.page' ,compact('slug' ,'id','Page'));
        // }
        // else{
        //    echo 'hi'
        // }


    }

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
        //
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
