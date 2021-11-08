@extends('admin.layout.app')

@section('myContent')
    <div class="container-fluid">

        @php
        if ($page->name =='Shop') { @endphp
            @include('admin.product')
            @php   } 
        else { @endphp

  @include('admin.ckPost')
  @php   }  @endphp






    </div>


@endsection

