@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">

            <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="p_id" name="p_id" value="@if(isset($Product)){{$Product->id}} @endif" >
                @csrf


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-black-50">Add New Product  </h1>
                        <div class="form-group">
                            <label for="fname">Tilte</label><br>
                           <input type="text" class="form-control" id="title" name="title" value="@if(isset($Product)){{$Product->title}} @endif">
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Category</label><br>
                            <select class="form-control" type="text" name="cat_id" id="cat_id">
                                <option value="">Select Category :</option>
                                @foreach ($Category as $cat)

<option @if(isset($Product)) @if($Product->cat_id == $cat->id) selected @endif  @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        @error('cat_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Feature-Image</label><br>
                           <input name="feature_image" id="feature_image" type="file" value="@if(isset($Product)){{$Product->feature_image}} @endif">
                        </div>
                        @error('feature_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Price</label><br>
                           <input type="text" class="form-control" id="price" name="price" value="@if(isset($Product)){{$Product->price}} @endif" >
                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">SKU</label><br>
                           <input type="text" class="form-control" id="sku" name="sku" value="@if(isset($Product)){{$Product->sku}} @endif" >
                        </div>
                        @error('sku')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <hr>
                        <h3>Add Carousel Images</h3>

                     @if(isset($ProductImage))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group justify-content-right">
                                    <label for="fname">Old-Image 1</label><br>
                                    <img class=" " src="{{ asset('images/shop/carosuel/'.$ProductImage->image_1)}}"  width="250" height="100">
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="fname">Image 1</label><br>
                           <input name="image_1" id="image_1" type="file" value="@if(isset($ProductImage)){{$ProductImage->image_1}} @endif">
                        </div>
                        @error('image_1')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror


                    @if(isset($ProductImage))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group justify-content-right">
                                    <label for="fname">Old-Image 2</label><br>
                                    <img class=" " src="{{ asset('images/shop/carosuel/'.$ProductImage->image_2)}}"  width="250" height="100">
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="form-group">
                            <label for="fname">Image 2</label><br>
                           <input name="image_2" id="image_2" type="file"  value="@if(isset($ProductImage)){{$ProductImage->image_2}} @endif">
                        </div>
                        @error('image_2')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror

                        @if(isset($ProductImage))
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group justify-content-right">
                                    <label for="fname">Old-Image 3</label><br>
                                    <img class="" src="{{ asset('images/shop/carosuel/'.$ProductImage->image_3)}}"  width="250" height="100">
                                </div>
                            </div>

                        </div>
                        @endif


                            <div class="form-group">
                                <label for="fname">Image 3</label><br>
                               <input name="image_3" id="image_3" type="file" value="@if(isset($ProductImage)){{$ProductImage->image_3}} @endif" >
                            </div>
                            @error('image_3')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror





<br>

                        <button type="submit" class="btn btn-primary">Save</button>
                        {{-- <button  class="btn btn-warning">Save and ADD Other</button>
                        <button  class="btn btn-danger">Cancel</button> --}}
                    </div>

                </div>




              </form>
<hr>
        </div>





    @endsection















