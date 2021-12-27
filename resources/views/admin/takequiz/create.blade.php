@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">

            <form action="{{ route('take.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="tut_id" value="" >
                @csrf


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-black-50">Take Quiz  </h1>
<br>
                        <div class="form-group" >
                            <label for="fname">Select Quiz</label><br>
                            <select class="form-control" type="text" name="tutorial_id" id="tutorial_id">
                                <option  selected disabled>--Select Quiz--</option>

                               {{-- @foreach ($Tutorial as $Tut) --}}
                                <option  value="">option</option>
                                {{-- @endforeach --}}

                            </select>
                        </div>
                        @error('tutorial_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Title</label><br>
                           <input type="text" class="form-control" id="title" name="title" value="">
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="fname">Marks Per Question </label><br>
                           <input type="text" class="form-control" id="marks_per_question" name="marks_per_question" value="">
                        </div>
                        @error('marks_per_question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


<!-- Checked checkbox -->
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" @if (isset($Quiz)) @if($Quiz->is_active == '1') checked @endif  @endif />
                            <label class="form-check-label" for="flexCheckChecked"> Active </label>
                        </div>
                    </div>
                    @error('is_active')
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection
