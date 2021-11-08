<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::all();
        return view('admin.product.index' , compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category= Category::all();
        return view('admin.product.create' , compact('Category'));
    }








    public function data(Request $request){




        if ($request->ajax()) {
            $data = Product::all();
            return Datatables::of($data)

            ->editColumn('cat_name', function($row){
                if($row->cat_id) {
                    return $row->Category->name;
                }
                else {
                    return '';
                }

            })

            ->editColumn('logo', function ($row) {
                $image = '<img src="'.asset('images/shop/'.$row->feature_image).'"  width="200" height="75">';
                return $image;
            })


                    ->addColumn('action', function($row){

                            $btn = '<a href="javascript:" data-id="'.$row->id.'" class="btn btn-sm btn-warning mr-1 show"  data-toggle="modal" data-target="#note_popup">Quick View</a>';
                            $btn .= '<a href="'.route('Product.edit', $row->id).'" class="edit btn mr-2 btn-primary btn-sm">Edit</a>';
                            $btn .= '<a href="javascript:" data-id="'.$row->id.'" class="view mr-2 btn btn-danger btn-sm delete">Delete</a>';

                            return $btn;
                    })


                    ->rawColumns(['action' , 'logo' , 'cat_name'])
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



        // $validated = $request->validate([

        //     'image_1' => 'required',
        //     'image_2' => 'required',
        //     'image_3' => 'required',

        // ]);

        if($request->p_id != ''){


            $Product = Product::where('id', $request->p_id)->first();

            $image = $request->file('feature_image');

            if($image){

                $validated = $request->validate([
                    'title' => 'required',
                    'feature_image' => 'required',
                    'price' => 'required',
                    'cat_id' => 'required',
                    'sku' => 'required',
                    'image_1' => 'required',


               ]);


            $imageName = $image->getClientOriginalName();


            $image->move(public_path('images/Shop'), $imageName);
           // unlink($old_img);
           \File::delete(public_path('images/Shop/'.$Product->feature_image));


           $Product->title = $request->title;
           $Product->feature_image = $imageName;
           $Product->price = $request->price;
           $Product->cat_id = $request->cat_id;
           $Product->sku = $request->sku;

           $Product->save();


            return redirect(route('Product.index'));

            }
            $image_1 = $request->file('image_1');
            if($image_1){
                $ProductImage = ProductImage::where('p_id', $request->p_id)->first();
                $image_name1 = $image_1->getClientOriginalName();
                $image_1->move(public_path('images/shop/carosuel'), $image_name1);
                \File::delete(public_path('images/shop/carosuel/'.$ProductImage->image_1));



                 $ProductImage->image_1 = $image_name1;
                 $ProductImage->save();

            }

            $image_2 = $request->file('image_2');
            if($image_2){
                $ProductImage = ProductImage::where('p_id', $request->p_id)->first();
                $image_name2 = $image_2->getClientOriginalName();
                $image_2->move(public_path('images/shop/carosuel'), $image_name2);

                \File::delete(public_path('images/shop/carosuel/'.$ProductImage->image_2));

                 $ProductImage->image_2 = $image_name2;
                 $ProductImage->save();

            }

            $image_3 = $request->file('image_3');
            if($image_3){

                $ProductImage = ProductImage::where('p_id', $request->p_id)->first();
                $image_name3 = $image_3->getClientOriginalName();
                $image_3->move(public_path('images/shop/carosuel'), $image_name3);

                \File::delete(public_path('images/shop/carosuel/'.$ProductImage->image_3));

                 $ProductImage->image_3 = $image_name3;
                 $ProductImage->save();

            }








            else{


                $Product->title = $request->title;
                $Product->price = $request->price;
                $Product->cat_id = $request->cat_id;
                $Product->sku = $request->sku;

                $Product->save();

            return redirect(route('Product.index'));
            }












           }

        else{

             $validated = $request->validate([
                'title' => 'required',
                'feature_image' => 'required',
                'price' => 'required',
                'cat_id' => 'required',
                'sku' => 'required',
                'image_1' => 'required',
                'image_2' => 'required',
                'image_3' => 'required',


        ]);



            $file = $request->file('feature_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/Shop'), $fileName);


            $Product = new Product;
            $Product->title = $request->title;
            $Product->feature_image = $fileName;
            $Product->price = $request->price;
            $Product->cat_id = $request->cat_id;
            $Product->sku = $request->sku;

            $Product->save();
            $LastID = $Product->id;
//////////////////////////////////////////////////////////////////////////////////////

            $file = $request->file('image_1');
            $extension = $file->getClientOriginalExtension();
            $fileName1 = $file->getClientOriginalName();
            $file->move(public_path('images/shop/carosuel'), $fileName1);

            $file = $request->file('image_2');
            $extension = $file->getClientOriginalExtension();
            $fileName2 = $file->getClientOriginalName();
            $file->move(public_path('images/shop/carosuel'), $fileName2);

            $file = $request->file('image_3');
            $extension = $file->getClientOriginalExtension();
            $fileName3 = $file->getClientOriginalName();
            $file->move(public_path('images/shop/carosuel'), $fileName3);


            $ProductImage = new ProductImage;
            $ProductImage->p_id = $LastID;
            $ProductImage->image_1 = $fileName1;
            $ProductImage->image_2 = $fileName2;
            $ProductImage->image_3 = $fileName3;

            $ProductImage->save();







        }


        return redirect(route('Product.index'));
    }


//////////////////////////////////////////////  CAROSEL






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


         $Product = Product::where('id' , $id)->first();
         $ProductImage = ProductImage::where('p_id' , $id)->first();
         $Cat_id = $Product->cat_id;
         $Category = Category::where('id' , $Cat_id)->first();
         return response()->json(['success'=> true, 'Product'=> $Product , 'Category'=> $Category , 'ProductImage'=>$ProductImage ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Product = Product::where('id' , $id)->first();
      $ProductImage = ProductImage::where('p_id' , $id)->first();
      $Category= Category::all();
      return view('admin.product.create' , compact('Category','Product','ProductImage'));


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
        $file = Product::where('id',$id)->first();

        \File::delete(public_path('images/shop/'.$file->feature_image));
        $file->delete();
         echo true;
    }
}
