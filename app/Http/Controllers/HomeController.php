<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {

    //  return view('home');
    // }

    public function index()
    {
    if(auth()->user()->status == 'admin'){
        return view('admin.layout.app');
    }else{
        return view('user.index');
    }

}

//     @if(auth()->user()->status == 'admin')
//     <script>window.open('admin/home' , '_self')</script>

//    {{-- <a href="{{route('admin.home')}}">Admin</a> --}}

//     @else
//     <script>window.open('/user' , '_self')</script>
//     {{-- <a href="{{url('/user')}}">User </a> --}}
//     {{-- <a href="{{route('user')}}">User</a> --}}
//     @endif


    public function adminHome()
    {
        return view('admin.layout.app');
    }








}
