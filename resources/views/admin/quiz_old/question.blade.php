@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">


<center><h5>Questions For Quiz Babr</h5></center><br>

            <form id="questionChoice" action="{{ route('choice.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="quiz_id" value="@if(isset($id)){{$id}} @endif" >
                @csrf
<div id="test"></div>

                <div class="row">


                <div class="col-md-12">

                    <div class="row main">
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label for="fname">Select Question</label><br>
                                <select class="form-control" type="text" name="quiz_question_id" id="selectQuestion" >

                                    <option  selected disabled>--Select Question--</option>

                                @foreach ($Question as $quest)
                                    <option  value="{{ $quest->id }}">{{ $quest->question }}</option>
                                    @endforeach

                                </select>
                            </div>
                                @error('quiz_question_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="col-md-1 mt-2">
                            <div class="form-group">
                            <label for="fname"></label></br>
                            <a class="btn btn-primary" href="" class="show " id="cat" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>







                        <div class="col-md-3">

                            <div class="form-group" >
                                <label for="fname">Quiz Choice</label><br>
                                <textarea name="choice" id="" cols="24" rows="3"></textarea>
                            </div>
                            <div class="choiceArea"></div>
                        </div>

                        <div class="col-md-2">

                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_active" />
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-1">
                            <div class="form-group mt-2">
                            <label for="fname"></label></br>
                            <a class="btn btn-primary text-white" href="" class="show" id="addChoice" data-toggle="modal" data-target="#choiceModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    <div class="col-md-1">
                        <div class="input-group-btn ml-1  mt-4 pt-2" id="mainAdd">
                            <button class="btn btn-success add" type="button"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                            {{-- <button class="btn btn-danger mt-1 remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button> --}}
                        </div>
                    </div>


                    </div>
                    <div class="addRow"></div>
                </div>


                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

                    </div>

                </div>





            </form>
<hr>
        </div>






        @include('admin.quiz.addQuestion')
        @include('admin.quiz.addChoice')
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}


<script type="text/javascript">


    $(document).ready(function() {
var addRemove = `<button class="btn btn-danger mt-1 removeMain" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button>`;
var field = `
                    <div class="row myRow">
                        <div class="col-md-4">
                            <div class="form-group" >
                                <label for="fname">Select Question</label><br>
                                <select class="form-control" type="text" name="question[]" id="selectQuestion" >

                                    <option  selected disabled>--Select Question--</option>

                                @foreach ($Question as $quest)
                                    <option  value="{{ $quest->id }}">{{ $quest->question }}</option>
                                    @endforeach

                                </select>
                            </div>
                                @error('question')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="col-md-1 mt-2">
                            <div class="form-group">
                            <label for="fname"></label></br>
                            <a class="btn btn-primary" href="" class="show " id="cat" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>







                        <div class="col-md-3">
                            <div class="form-group" >
                                <label for="fname">Quiz Choice</label><br>
                                <textarea name="choice" id="" cols="24" rows="3"></textarea>
                            </div>
                                @error('choice')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-md-2">
                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" />
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-1 mt-2">
                            <div class="form-group">
                            <label for="fname"></label></br>
                            <a class="btn btn-primary" href="" class="show " id="addChoice" data-toggle="modal" data-target="#choiceModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>


                        <div class="col-md-1">
                            <div class="input-group-btn ml-1 mt-4">
                                <button class="btn btn-success add2" type="button"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                                <button class="btn btn-danger mt-1 remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button>
                            </div>
                        </div>


                    </div>

`;

var choiceArea = `<div class="form-group" styel="border:1px solid red">
                        <label for="fname">Quiz Choice</label><br>
                        <textarea name="choice" id="" cols="24" rows="3"></textarea>
                 </div>`;

var isRight    = `
                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" />
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>`;


      $(".add").click(function(){
          $(".addRow").append(field);
          $(this).remove();
          $("#mainAdd").append(addRemove);
      });


    $("body").on("click",".add2",function(){
          $(this).remove();
          $(".addRow").append(field);
      });

      $("body").on("click",".remove",function(){
        //   alert('remove');
          $(this).parents(".myRow").remove();
      });

      $("body").on("click",".removeMain",function(){
          $(this).parents(".main").remove();
      });


    //   $("#addChoice").on("click",function(){
    //     $(".choiceArea").append(choiceArea);
    //     $(".isRight").append(isRight);
    //     // alert('hii');
    //   });


    });


</script>






<script>

    $('#submit').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
//    alert('hash');

   $.ajaxSetup({
       headers: {
           "_token": "{{ csrf_token() }}",

       }
   });


   $.ajax({
       url: "{{ route('choice.store')}}",
       method: 'post',

       data: $('#questionChoice').serialize(),

       success: function (data) {

       $("#exampleModal #close").click();
       $('#questionChoice').trigger("reset");
       $("#selectQuestion")[0].selectedIndex = 0;
alert(data);
        //        var s = '<option value="-1">--Select Question--</option>';
        //    for (var i = 0; i < data.length; i++) {
        //        s += '<option value="' + data[i].id + '" selected>' + data[i].question + '</option>';

        //    }
        //    console.log(s);
        //    $('#selectQuestion').html(s);

           }









    });


       });


</script>
@endsection

