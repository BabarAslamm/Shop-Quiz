@extends('admin.layout.app')

@section('myContent')

<div class="container-fluid">
    <h1 class="text-black-50" style="float: left;">Question </h1>
    {{-- <a href="{{ route('quiz.create') }}" class="btn btn-primary mt-2 text-white" style="float: right;">+ Add Quiz</a> --}}


        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Quiz</th>
                    <th>Question</th>
                    <th>Active</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

</div>

<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
         $(document).ready( function () {

        function showTable(){

        }

          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('question-data') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'quiz_id', name: 'quiz_id'},
                  {data: 'question', name: 'question'},
                  {data: 'is_active', name: 'is_active'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

        });

</script>



<script>

    $(document).on('click', '.delete', function(){
               var id = $(this).data('id');
            //   alert(id);
               swal({
                   title: "Are you sure?",
                   text: "Once deleted, you will not be able to recover data!",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
                   })
                 .then((willDelete) => {
                 if (willDelete) {
                       var url = "{{ route('question.destroy',':id') }}";
                       url = url.replace(':id', id);

                       var token = "{{ csrf_token() }}";

                       $.ajax({
                           type: 'DELETE',
                               url: url,
                               data: {'_token': token, '_method': 'DELETE'},
                               success: function (response) {
// alert(response);
                                swal("Poof! Quiz record has been deleted!", {
                                    icon: "success",
                                });
                            $('.data-table').DataTable().ajax.reload();
                            //   location.reload();

                           }
                       });

                  }

                  else {
                         swal("Your imaginary file is safe!");
                       }
             });





                    });

</script>

@endsection
