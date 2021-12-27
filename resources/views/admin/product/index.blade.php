@extends('admin.layout.app')

@section('myContent')


<div class="row">
    <div class="col-md-12">
<div class="container-fluid">
    <h1 class="text-black-50" style="float: left;"> Products </h1>
    <a href="{{ route('Product.create') }}" class="btn btn-primary mt-2 text-white" style="float: right;">+ Add Product</a>


        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Title</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Feature-Image</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>


</div>

    </div>
</div>



@include('admin.product.popup')





<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<script>



         $(document).ready( function () {



        function showTable(){

        }

          var table = $('.data-table').DataTable({
             responsive: true,
              processing: true,
              serverSide: true,


              ajax: "{{ route('Product-data') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'title', name: 'title'},
                  {data: 'sku', name: 'sku'},
                  {data: 'price', name: 'price'},
                  {data: 'cat_name', name: 'cat_name'},
                  {data: 'logo', name: 'logo'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });

        });


//         $(document).ready(function() {
//     $('.data-table').DataTable( {
//         "scrollX": true
//     } );
// } );

</script>



<script>

    $(document).on('click', '.show', function(){
               var id = $(this).data('id');
            //  alert('SHOWWW');


                       var url = "{{ route('Product.show',':id') }}";
                       url = url.replace(':id', id);
                       var token = "{{ csrf_token() }}";

                       $.ajax({
                           type: 'GET',
                               url: url,
                               data: {'_token': token, '_method': 'DELETE'},
                               success: function (response) {
                                //     alert(response);
                                     console.log(response);

                                    var cat_id  = response.Category.name;
                                    var title   = response.Product.title;
                                    var sku     = response.Product.sku;
                                    var price   = response.Product.price;

                                    var image_1 = response.ProductImage.image_1;
                                    var image_2 = response.ProductImage.image_2;
                                    var image_3 = response.ProductImage.image_3;



                                    $('#title').html(title);
                                    $('#sku').html(sku);
                                    $('#cat_id').html(cat_id);
                                    $('#price').html(price);


                                    $('#title').html(title);
                                    $('#sku').html(sku);
                                    $('#cat_id').html(cat_id);
                                    $('#price').html(price);


                                    var image1 = "{{ asset('images/shop/carosuel/:image1')}}";
                                    image1 = image1.replace(':image1', image_1);


                                    var image2 = "{{ asset('images/shop/carosuel/:image2')}}";
                                    image2 = image2.replace(':image2', image_2);


                                    var image3 = "{{ asset('images/shop/carosuel/:image3')}}";
                                    image3 = image3.replace(':image3', image_3);


                                   var a = $("#image_1").attr("src", image1);
                                    $("#image_2").attr("src", image2);
                                    $("#image_3").attr("src", image3);


                                    // $("#image_1").attr("src", "images/shop/carosuel/"+image_1);
                                    // $("#image_2").attr("src", "images/shop/carosuel/"+image_2);
                                    // $("#image_3").attr("src", "images/shop/carosuel/"+image_3);

                           }
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
                       var url = "{{ route('DelPost',':id') }}";
                       url = url.replace(':id', id);

                       var token = "{{ csrf_token() }}";

                       $.ajax({
                           type: 'GET',
                               url: url,
                               data: {'_token': token, '_method': 'DELETE'},
                               success: function (response) {

                                swal("Poof! Product record has been deleted!", {
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
