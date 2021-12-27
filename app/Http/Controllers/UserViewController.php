<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;


class UserViewController extends Controller
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

        $Pages = Page::all();

         return view('user.index',compact('Pages'));

    }

    public function Page($slug,$id){
        // echo '<pre>'; print_r($slug);
        // echo '<pre>'; print_r($id); exit;
        if( $slug == 'shop'){
            $Product = Product::all();
            return view('user.shop' ,compact('Product'));

            // $page = Page::where('id', '=', $id)->where('slug', '=' , $slug )->first();
        }

        $PageMeta = PageMeta::where('page_id', '=', $id)->first();

        $page = Page::where('id', '=', $id)->where('slug', '=' , $slug )->first();
        if ( $page) {
         return view('user.viewPage',compact('page','PageMeta'));

            }

            else{
                abort(404);
            }

    }



 ////////////////////////////////////////////////////////////
//    public function Shop(){

//        $Product = Product::all();
//        return view('user.shop' ,compact('Product'));
//    }



   public function ProductModal($id){

    $Product = Product::where('id' , $id)->first();
    $ProductImage = ProductImage::where('p_id' , $id)->first();
    $Cat_id = $Product->cat_id;
    $Category = Category::where('id' , $Cat_id)->first();
    return response()->json(['success'=> true, 'Product'=> $Product , 'Category'=> $Category , 'ProductImage'=>$ProductImage ]);
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
