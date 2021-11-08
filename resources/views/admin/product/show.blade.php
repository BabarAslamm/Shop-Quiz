@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">




                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-black-50">Product  </h1>
                        <div class="form-group">
                            <label for="fname">Tilte</label><br>
                           <input type="text" class="form-control" id="title" name="title" value="@if(isset($Product)){{$Product->title}} @endif" readonly>
                        </div>

                        <div class="form-group">
                            <label for="fname">Tilte</label><br>
                           <input type="text" class="form-control" id="title" name="title" value="@if(isset($Product)){{$Product->Category->name}} @endif" readonly>
                        </div>


                        <div class="form-group">
                            <label for="fname">Feature-Image</label><br>
                            <img class=" ml-5" src="{{ asset('images/Shop/'.$Product->feature_image)}}"  width="250" height="100">
                        </div>


                        <div class="form-group">
                            <label for="fname">Price</label><br>
                           <input type="text" class="form-control" id="price" name="price" value="@if(isset($Product)){{$Product->price}} @endif" readonly>
                        </div>


                        <div class="form-group">
                            <label for="fname">SKU</label><br>
                           <input type="text" class="form-control" id="sku" name="sku" value="@if(isset($Product)){{$Product->sku}} @endif" readonly>
                        </div>



                    </div>

                </div>



                <div class="col-md-3"></div>


<hr>
        </div>


    </div>



@endsection
