<!-- Modal -->
<div class="modal fade" id="exampleModalNext" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <div class="d-flex justify-content-center"> <h5 class="modal-title" id="exampleModalLabel">Add New Question For Next Roww</h5></div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form role="form" id="addQuestionFormNext" action="{{ route('addQuestion') }}" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="quiz_id" value="@if(isset($id)){{$id}} @endif" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Question</label><br>
                            <textarea  id="description" name="question" cols="53" rows="5"></textarea>
                        </div>
                        @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" />
                                <label class="form-check-label" for="flexCheckChecked"> Active </label>
                            </div>
                        </div>
                        <input type="hidden" name="" id="test" >
                        @error('is_active')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>



    </div>
    <div class="modal-footer">
      <button type="button" id="close" class="btn btn-secondary " data-dismiss="modal">Close</button>
      <button id="submit2Next" type="submit" class="btn btn-primary cat" >Save changes</button>
    </div>
</form>




      </div>
    </div>
  </div>


  <script>

function ShowModal(elem){
    var dataId = $(elem).data("quest");
    // alert(dataId);
$("#test").val(dataId);



        $('#submit2Next').click(function(e){
       e.preventDefault();
       /*Ajax Request Header setup*/
    //    alert('hash');
    // var quest  = $(this).data('new');
    // alert(quest)
    var index = $("#test").val();
        // alert(index);

       $.ajaxSetup({
           headers: {
               "_token": "{{ csrf_token() }}",

           }
       });


       $.ajax({
           url: "{{ route('addQuestion')}}",
           method: 'post',

           data: $('#addQuestionFormNext').serialize(),

           success: function (data) {

           $("#exampleModalNext #close").click();
           $('#addQuestionFormNext').trigger("reset");
    //  alert(index);
                   var s = '<option value="-1">--Select Question--</option>';
               for (var i = 0; i < data.length; i++) {
                   s += '<option value="' + data[i].id + '" selected>' + data[i].question + '</option>';

               }
            //    console.log(s);
               $('#selectQuestion'+index).html(s);


               }









        });


           });




}


    </script>




