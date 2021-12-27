@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">

            <form action="{{ route('tutorial.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="tut_id" value="@if(isset($Tutorial)){{$Tutorial->id}} @endif" >
                @csrf


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-black-50">Add New Tutorial  </h1>

                        <div class="form-group">
                            <label for="fname">Name</label><br>
                           <input type="text" class="form-control" id="name" name="name" value="@if(isset($Tutorial)){{$Tutorial->name}} @endif">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Description</label><br>
                            <textarea  id="description" name="description" cols="55" rows="5">@if(isset($Tutorial)){{$Tutorial->description}} @endif</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    {{-- <div class="form-group">
                        <label for="fname">Create Post</label>
                        <textarea name="description" id="editor1" cols="30" rows="10">@if(isset($Tutorial)){{$Tutorial->description}} @endif</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>



                <div class="col-md-3"></div>

              </form>
<hr>
        </div>






    </div>

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
