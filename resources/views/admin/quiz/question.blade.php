@extends('admin.layout.app')

@section('myContent')


    <div class="container-fluid">

        <div class="container-fluid">


<center><h5>Questions For Quiz</h5></center><br>

            <form id="questionChoice" action="{{ route('choice.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="quiz_id" id="quiz_id" value="@if(isset($id)){{$id}} @endif" >
                @csrf

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
                                <textarea name="choice" class="choice" id="choice" cols="24" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_right_choice" />
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-1">
                            <div class="form-group mt-2">
                            <label for="fname"></label></br>

                            </div>
                        </div>

                    <div class="col-md-1">
                        <div class="input-group-btn ml-1  mt-4 pt-2" id="mainAdd">
                            <button type="submit" id="" class="btn btn-success add" ><i class="fa fa-plus" aria-hidden="true"></i> </button>
                            {{-- <button class="btn btn-danger mt-1 remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button> --}}
                        </div>
                    </div>


                    </div>
                     <div class="row database" > {{-- Delete --}}


    {{-- <div class="col-md-12">
        <div class="row">
        <div class="col-md-4">
             <div class="form-group" >
                 <label for="fname">Select Question From database</label><br>
                 <select class="form-control" type="text" name="quiz_question_id" id="selectQuestion" >

                     <option  selected >sss</option>



                 </select>
             </div>
                 @error('quiz_question_id')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
         </div>


         <div class="col-md-1 mt-2">

         </div>







         <div class="col-md-3">

             <div class="form-group" >
                 <label for="fname">Quiz Choice</label><br>
                 <textarea name="choice" class="choice" id="choice" cols="24" rows="3"></textarea>
             </div>

         </div>

         <div class="col-md-2">

             <div class="form-group mt-5">
                 <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_right_choice" />
                     <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                 </div>
             </div>

         </div>



         <div class="col-md-1">
             <div class="form-group mt-2">
             <label for="fname"></label></br>

             </div>
         </div>

     <div class="col-md-1">
         <div class="input-group-btn ml-1  mt-4 pt-2" id="mainAdd">
               <button class="btn btn-danger mt-1 " type="button"> Delete</button>
         </div>
     </div>
 </div>
</div> --}}






                    </div>
                    <div class="addRow"></div>

                  </div>


                </div>

                </div>





            </form>




<hr>
        </div>






        @include('admin.quiz.addQuestion')
        @include('admin.quiz.addQuestionNext')
        @include('admin.quiz.addChoice')
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}


<script type="text/javascript">

var x=0;
    $(document).ready(function(){

        // Check value of i in storage if its available then add 1 to it
// if not available Store variable i in local storage i = 1;
// var i = localStorage('i');

var addRemove = `<button class="btn btn-danger mt-1 removeMain" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button>`;




var numb = 0;
      $(".add").click(function(e){
          $(this).remove();

   e.preventDefault();
   /*Ajax Request Header setup*/
    //  alert('static');


   var _token   = $("input[name='_token']").val();
   var quiz_id = $("#quiz_id").val();
   var question = $("#selectQuestion").val();
   var choice   = $("#choice").val();
//    var right    = $("#is_right_choice").val();

   if ($('#is_right_choice').is(":checked"))
        {
        var  right = '1';
        }else{
            right = '';
        }
// alert(right)
//    alert(question+choice+right);

   $.ajax({
       url: "{{ route('choice.store')}}",
       method: 'post',

       data: {_token:_token, quiz_id:quiz_id, question:question, choice:choice, right:right},
       success: function (data) {

console.log(data);

/// Last Insertd Record
var sid = data.LastRec.quiz_question_id;
if( data.LastRec.is_right_choice == '1') {
  var  ans = 'checked';
//   alert(ans);
    }else{
        ans = '';
    }
         $('.main').html(`<div class="col-md-4">
                            <div class="form-group" >
                                <label for="fname">Selected Question </label><br>
                                <select class="form-control" type="text" name="quiz_question_id" id="selectQuestion" readonly>

                                    <option value="`+data.LasQuest.id+`">`+data.LasQuest.question+`</option>

                                </select>
                            </div>
                                @error('quiz_question_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="col-md-1 mt-2">

                        </div>







                        <div class="col-md-3">

                            <div class="form-group" >
                                <label for="fname">Quiz Choice</label><br>
                                <textarea name="choice" class="choice" id="choice" cols="24" rows="3" readonly>`+data.LastRec.choice+`</textarea>
                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_right_choice" `+ans+` disabled/>
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-1">
                            <div class="form-group mt-2">
                            <label for="fname"></label></br>

                            </div>
                        </div>

                    <div class="col-md-1">
                        <div class="input-group-btn ml-1  mt-4 pt-2" id="mainAdd">
                              <a href="javascript:"  data-id="`+data.LastRec.id+`" class="btn btn-danger mt-1 delete1 removeMain"><i class="fa fa-minus" aria-hidden="true"></i></a>
                        </div>
                    </div>`);
        ///// Last Inserted Record End



//// Next Row
        if(data.Data.right === '1') {
        checked = 'checked';
    }else{
        checked = '';
    }
var pre = $("select option[value='"+data.Data.question+"']").val();

var selecthtm = `<select  class="form-control" type="text" id="selectQuestion`+numb+`">`
data.allQuest.forEach(function(v, i){
    selecthtm += `
        <option value="${v.id}"`
        if(v.id == data.Data.question){
            selecthtm += ` selected `;
        }
        selecthtm += `>${v.question}</option>        `;

});

selecthtm += `</select>`;

        $(".addRow").append(`



<div class="row myRow">
              <div class="col-md-4">
                  <div class="form-group" >
                      <label for="fname">Select Question</label><br>
                      `+selecthtm+`
                  </div>
                      @error('question')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              </div>


              <div class="col-md-1 mt-2">
                  <div class="form-group">
                  <label for="fname"></label></br>
                  <a class="btn btn-primary" href="" onClick="ShowModal(this)" class="show " data-quest=`+numb+` id="next" data-toggle="modal" data-target="#exampleModalNext"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </div>
              </div>




              <div class="col-md-3">
                  <div class="form-group" >
                      <label for="fname">Quiz Choice</label><br>
                      <textarea name="choice" id="choice`+numb+`" id="" cols="24" rows="3">`+data.Data.choice+`</textarea>
                  </div>
                      @error('choice')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              </div>

              <div class="col-md-2">
                  <div class="form-group mt-5">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_right_choice`+numb+`" `+checked+`/>
                          <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                      </div>
                  </div>
              </div>


              <div class="col-md-1 mt-2">
                  <div class="form-group">
                  <label for="fname"></label></br>

                  </div>
              </div>


              <div class="col-md-1">
                  <div class="input-group-btn ml-1 mt-4">
                      <button type="submit"  class="btn btn-success add"  data-i="`+numb+`"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                      <button class="btn btn-danger mt-1 remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button>
                  </div>
              </div>
              </div>


</div>


`);



         }


    });









        // $('.main').remove();
        //   $("#mainAdd").append(addRemove);
      });

var numb = 0;
    $("body").on("click",".add",function(e){
        numb++;
        //   $(this).remove();
        // $('.myRow').remove();

        // $(this).parents(".myRow").remove();





e.preventDefault();

   /*Ajax Request Header setup*/
var myNumb = numb -1;
var index  = $(this).data('i');


   var _token   = $("input[name='_token']").val();
   var quiz_id = $("#quiz_id").val();
   var question = $("#selectQuestion"+index).val();
   var choice   = $("#choice"+index).val();
//    var right1    = $("#is_right_choice"+index).val();

   if ($('#is_right_choice'+index).is(":checked"))
        {
        var  right = '1';
        }else{
        var  right = '';
        }

//   alert(question+choice+right);

   $.ajax({
       url: "{{ route('choice.store')}}",
       method: 'post',

       data: {_token:_token, quiz_id:quiz_id, question:question, choice:choice, right:right},
       success: function (data) {

// console.log(data);


//// Last Inserted Record
if( data.LastRec.is_right_choice == '1') {
  var  ans = 'checked';
//   alert(ans);
    }else{
        ans = '';
    }
$('.database').append(`<div class="col-md-12 dy2">
                       <div class="row">
                       <div class="col-md-4">
                            <div class="form-group" >
                                <label for="fname">Select Question disableeee</label><br>
                                <select class="form-control" type="text"  readonly>

                                    <option value="`+data.LasQuest.id+`">`+data.LasQuest.question+`</option>



                                </select>
                            </div>
                                @error('quiz_question_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="col-md-1 mt-2">

                        </div>







                        <div class="col-md-3">

                            <div class="form-group" >
                                <label for="fname">Quiz Choice</label><br>
                                <textarea name="choice" class="choice" id="choice" cols="24" rows="3" readonly>`+data.LastRec.choice+`</textarea>
                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group mt-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_right_choice" id="is_right_choice" `+ans+` disabled/>
                                    <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-1">
                            <div class="form-group mt-2">
                            <label for="fname"></label></br>

                            </div>
                        </div>

                    <div class="col-md-1">
                        <div class="input-group-btn ml-1  mt-4 pt-2" id="mainAdd">
                              <a href="javascript:"   data-id="`+data.LastRec.id+`" class="btn btn-danger mt-1 delete dynamic"><i class="fa fa-minus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>`);
        ///// Last Inserted Record End











    if(data.Data.right === '1') {
        checked = 'checked';
    }else{
        checked = '';
    }
    var pre = $("select option[value='"+data.Data.question+"']").val();

    var selecthtm = `<select  class="form-control" type="text" id="selectQuestion`+numb+`">`
    data.allQuest.forEach(function(v, i){
        selecthtm += `
            <option value="${v.id}"`
            if(v.id == data.Data.question){
                selecthtm += ` selected `;
            }
            selecthtm += `>${v.question}</option>        `;

    });

    selecthtm += `</select>`;
    console.log(selecthtm)

    ////// Next Row for quiz
$(".addRow").append(`
<div class="row myRow">
              <div class="col-md-4">
                  <div class="form-group" >
                      <label for="fname">Select Question`+numb+`</label><br>
`+selecthtm+`
                  </div>
                      @error('question')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              </div>


              <div class="col-md-1 mt-2">
                  <div class="form-group">
                  <label for="fname"></label></br>
                  <a class="btn btn-primary" href="" onClick="ShowModal(this)" class="show " data-quest=`+numb+` id="next" data-toggle="modal" data-target="#exampleModalNext"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </div>
              </div>




              <div class="col-md-3">
                  <div class="form-group" >
                      <label for="fname">Quiz Choice</label><br>
                      <textarea name="choice" id="choice`+numb+`" id="" cols="24" rows="3">`+data.Data.choice+`</textarea>
                  </div>
                      @error('choice')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              </div>

              <div class="col-md-2">
                  <div class="form-group mt-5">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="is_right_choice"  id="is_right_choice`+numb+`"  `+checked+`/>
                          <label class="form-check-label" for="flexCheckChecked"> is right choice </label>


                      </div>
                  </div>
              </div>


              <div class="col-md-1 mt-2">
                  <div class="form-group">
                  <label for="fname"></label></br>

                  </div>
              </div>


              <div class="col-md-1">
                  <div class="input-group-btn ml-1 mt-4">
                      <button type="submit"  class="btn btn-success add" data-i="`+numb+`"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                      <button class="btn btn-danger mt-1 remove" type="button"><i class="fa fa-minus" aria-hidden="true"></i> </button>
                  </div>
              </div>
              </div>


</div>

`);
// });



           }


    });



    $(this).parents(".myRow").remove();








      });
      $("body").on("click",".remove",function(){
        //   alert('remove');
          $(this).parents(".myRow").remove();
      });

      $("body").on("click",".dynamic",function(){
        //   alert('remove');
        //   $(this).parents(".dy2").remove();
      });

      $("body").on("click",".removeMain",function(){
        //   $(this).parents(".main").remove();
      });




    });


</script>












<script>

    $(document).on('click', '.delete', function(){
               var id = $(this).data('id');
            //    alert(id);
               var record = this;
               swal({
                   title: "Are you sure?",
                   text: "Once deleted, you will not be able to recover data!",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
                   })
                 .then((willDelete) => {
                 if (willDelete) {
                       var url = "{{ route('choice.destroy',':id') }}";
                       url = url.replace(':id', id);

                       var token = "{{ csrf_token() }}";

                       $.ajax({
                           type: 'DELETE',
                               url: url,
                               data: {'_token': token, '_method': 'DELETE'},
                               success: function (response) {
                                $(record).parents(".dy2").remove();

                                swal("Poof! Tutorial record has been deleted!", {
                                    icon: "success",
                                });


                           }
                       });

                  }

                  else {
                         swal("Your imaginary file is safe!");
                       }
             });





                    });

</script>



<script>

    $(document).on('click', '.delete1', function(){
               var id = $(this).data('id');
            //    alert(id);
               var record = this;
               swal({
                   title: "Are you sure?",
                   text: "Once deleted, you will not be able to recover data!",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
                   })
                 .then((willDelete) => {
                 if (willDelete) {
                       var url = "{{ route('choice.destroy',':id') }}";
                       url = url.replace(':id', id);

                       var token = "{{ csrf_token() }}";

                       $.ajax({
                           type: 'DELETE',
                               url: url,
                               data: {'_token': token, '_method': 'DELETE'},
                               success: function (response) {
                                $(record).parents(".main").remove();

                                swal("Poof! Choice record has been deleted!", {
                                    icon: "success",
                                });


                           }
                       });

                  }

                  else {
                         swal("Your Choice option is safe!");
                       }
             });





                    });

</script>



@endsection

