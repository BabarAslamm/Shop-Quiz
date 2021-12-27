<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <div class="d-flex justify-content-center"> <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5></div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form role="form" id="addQuestion" method="post" action="{{ route('addQuestion')}}">
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
                        @error('is_active')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>



    </div>
    <div class="modal-footer">
      <button type="button" id="close" class="btn btn-secondary " data-dismiss="modal">Close</button>
      <button id="submit" type="submit" class="btn btn-primary cat" >Save changes</button>
    </div>
</form>




      </div>
    </div>
  </div>


  <script>

        $('#submit').click(function(e){
       e.preventDefault();
       /*Ajax Request Header setup*/
       alert('hash');

       $.ajaxSetup({
           headers: {
               "_token": "{{ csrf_token() }}",

           }
       });


       $.ajax({
           url: "{{ route('addQuestion')}}",
           method: 'post',

           data: $('#addQuestion').serialize(),

           success: function (data) {

           $("#exampleModal #close").click();
           $('#addQuestion').trigger("reset");
    alert(data);
                //    var s = '<option value="-1">--Select Question--</option>';
                //    for (var i = 0; i < data.length; i++) {
                //    s += '<option value="' + data[i].id + '" selected>' + data[i].question + '</option>';
                //     }

            //    console.log(data);
            //    $('#selectQuestion').html(s);

               }









        });


           });


    </script>




