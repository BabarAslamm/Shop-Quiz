{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(auth()->user()->status == 'admin')
                    <script>window.open('admin/home' , '_self')</script>

                   {{-- <a href="{{route('admin.home')}}">Admin</a> --}}

                    @else
                    <script>window.open('/user' , '_self')</script>
                    {{-- <a href="{{url('/user')}}">User </a> --}}
                    {{-- <a href="{{route('user')}}">User</a> --}}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
