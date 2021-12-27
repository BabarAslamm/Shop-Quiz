<!-- Modal -->
<div class="modal fade" id="choiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <div class="d-flex justify-content-center"> <h5 class="modal-title" id="exampleModalLabel">Add New Choice</h5></div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form role="form" id="addChoice" method="post" action="">
                <input type="hidden" name="quiz_id" value="@if(isset($id)){{$id}} @endif" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fname">Quiz Choice</label><br>
                            <textarea  id="description" name="question" cols="53" rows="5"></textarea>
                        </div>
                        @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" />
                                <label class="form-check-label" for="flexCheckChecked"> is right choice </label>
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







