@extends('admin.layout.app')

@section('myContent')
    <div class="container-fluid">

        <div class="container-fluid">
            <h1 class="text-black-50"> {{ $page->name }} </h1>
            <form action="{{ route('PageMeta.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="{{ $page->id }}" >
                @csrf


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Create Post</label>
                            <textarea name="editor1" id="editor1" cols="30" rows="10">@if(isset($PageMeta)){{$PageMeta->content}} @endif</textarea>
                        </div>
                        @error('editor1')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>




                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>






    </div>

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
