@include('user.body.header')
@include('user.body.navbar')









<div class="container">

<div class="container-fluid mt-5 mb-5 p-5" style=" background-color:rgb(233, 242, 247)">
    @php
    echo"<div>" . $PageMeta->content . "</div>";
   @endphp
</div>






</div>






@include('user.body.footer')
