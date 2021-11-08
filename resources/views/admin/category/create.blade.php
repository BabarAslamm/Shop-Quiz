@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">

            <form action="{{ route('Category.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cat_id" value="@if(isset($Category)){{$Category->id}} @endif" >
                @csrf


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-black-50">Add New Category  </h1>
                        <div class="form-group">
                            <label for="fname">Category</label><br>
                           <input type="text" class="form-control" id="name" name="name" value="@if(isset($Category)){{$Category->name}} @endif">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>



                <div class="col-md-3"></div>

              </form>
<hr>
        </div>






    </div>

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}

@endsection
