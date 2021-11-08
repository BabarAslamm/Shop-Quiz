{{-- @include('user.body.header')
@include('user.body.navbar') --}}




<div class="container">
    <br/>
    <section>
        <div class="container-fluid">
            <div class="container">
                <div class="row">

                    @foreach ($Product as $product)

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="card" style="width: 100%;">
                            <img id="img" width="100%" height="150px" src="{{ asset('images/Shop/'.$product->feature_image)}}" class="card-img-top" alt="...">
<a href="javascript:" data-id="{{ $product->id }}" class="btn btn-sm btn-warning mr-1 showpro"  data-toggle="modal" data-target="#note_popup">Modal</a>
                            {{-- <a href="" class="btn btn-warning"  data-toggle="modal" data-target="#note_popup"><h6 class="text-white">Quick Modal</h6></a> --}}
                            <div class="card-body text-center">
                            <p class="card-text text-info">{{ $product->title }}</p>
                            <h6 class="text-center">Rs.{{ $product->price }}</h6>
                         </div>
                        </div>
                    </div>

                    @endforeach






                </div>
            </div>
        </div>
    </section><br/>





    <script>

        $(document).on('click', '.showpro', function(){
                   var id = $(this).data('id');
                //   alert('SHOWWW');
                //   alert(id);

                           var url = "{{ route('Product.show',':id') }}";
                           url = url.replace(':id', id);

                           var token = "{{ csrf_token() }}";

                           $.ajax({
                               type: 'GET',
                                   url: url,
                                   data: {'_token': token, '_method': 'DELETE'},
                                   success: function (response) {
                                    //     alert(response);
                                        // console.log(response);

                                        var cat_id = response.Category.name;
                                        var title = response.Product.title;
                                        var sku = response.Product.sku;
                                        var price = response.Product.price;

                                        var image_1 = response.ProductImage.image_1;
                                        var image_2 = response.ProductImage.image_2;
                                         var image_3 = response.ProductImage.image_3;



                                        $('#title').html(title);
                                        $('#sku').html(sku);
                                        $('#cat_id').html(cat_id);
                                        $('#price').html(price);
                                        $("#image_1").attr("src", "http://127.0.0.1:8000/images/shop/carosuel/"+image_1);
                                        $("#image_2").attr("src", "http://127.0.0.1:8000/images/shop/carosuel/"+image_2);
                                        $("#image_3").attr("src", "http://127.0.0.1:8000/images/shop/carosuel/"+image_3);
                               }
                           });





                        });

    </script>


</div>



@include('user.ShopModal')


@include('user.body.footer')
