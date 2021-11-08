


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Shop/assets/js/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Shop/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Shop/assets/css/style.css')}}">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Popup</title> --}}
</head>
<body>
    <div class="modal" id="note_popup">
    <div style="margin-right: 25px;">

        {{-- <h5 class="float-right">X</h5> --}}
     </div><br/><br/>
    <div class="container" style="width: 100%">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
              <!-- empty -->
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" card">
                    <div class="row">
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                  <!-- Indicators -->
                                  <ul class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                  </ul>

                                  <!-- The slideshow -->
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img width="100%" id="image_1" src="" alt="New York" width="1100" height="400"  style="height: 500px!important;">
                                    </div>
                                    <div class="carousel-item">
                                      <img width="100%" id="image_2" src="" width="1100" height="400"  style="height: 500px!important;">
                                    </div>
                                    <div class="carousel-item">
                                      <img width="100%" id="image_3" src="" alt="New York" width="1100" height="400"  style="height: 500px!important;">
                                    </div>
                                  </div>

                                  <!-- Left and right controls -->
                                  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                  </a>
                                  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                  </a>
                                </div>

                                </div>
                          </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <button  class="float-right btn btn-primary" data-dismiss="modal">X</button>
                             <div>
                                 <h4 class="text-center text-primary" id="title"></h4>
                                  <h6>Rs.<span id="price"><span></h6><br/>

                                  <div id="bootom">
                                      <p id="border"></p>
                                      <p>SKU: <span id="sku"></span></p>
                                      <p id="border"></p>
                                      <span>Category:</span> &nbsp;<span class="text-primary" id="cat_id"></span>
                                  </div>
                                </div>

                       </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
             <!-- empty -->
            </div>
        </div>
    </div>
    </div>
    {{-- ////////////MODAL --}}
</body>
</html>
