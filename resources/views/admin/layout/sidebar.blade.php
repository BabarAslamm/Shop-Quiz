<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">  {{ Auth::user()->name }} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-list-alt"></i>
            <span>Pages</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pages:</h6>
                @php
                use App\Models\Page;
                $Pages = Page::all();
                @endphp


@foreach ($Pages as $page )
   <a class="collapse-item" href="{{url($page->slug.'/edit/'. $page->id) }}">{{ $page->name }}</a>
@endforeach


                {{-- <a class="collapse-item" href="cards.html">Home</a>
                <a class="collapse-item" href="cards.html">About</a>
                <a class="collapse-item" href="{{route('shop')}}">Shop</a>
                <a class="collapse-item" href="cards.html">Shop</a> --}}
            </div>
        </div>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-list-ol"></i>
            <span>Categories</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category:</h6>
                <a class="collapse-item" href="{{route('Category.index')}}">View Categories</a>
                <a class="collapse-item" href="{{route('Category.create')}}">Add Category</a>

            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
            aria-expanded="true" aria-controls="collapseProduct">
            <i class="fa fa-shopping-basket"></i>
            <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product:</h6>
                <a class="collapse-item" href="{{route('Product.index')}}">View Products</a>
                <a class="collapse-item" href="{{route('Product.create')}}">Add Product</a>

            </div>
        </div>
    </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Tutorial"
            aria-expanded="true" aria-controls="Tutorial">
            <i class="fa fa-book"></i>
            <span>Tutorial</span>
        </a>
        <div id="Tutorial" class="collapse" aria-labelledby="headingProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tutorial:</h6>
                <a class="collapse-item" href="{{route('tutorial.index')}}">View Tutorial</a>
                <a class="collapse-item" href="{{route('tutorial.create')}}">Add Tutorial</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Quiz"
            aria-expanded="true" aria-controls="Quiz">
            <i class="fa fa-book"></i>
            <span>Quiz</span>
        </a>
        <div id="Quiz" class="collapse" aria-labelledby="headingProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quiz:</h6>
                <a class="collapse-item" href="{{route('quiz.index')}}">View Quiz</a>
                <a class="collapse-item" href="{{route('quiz.create')}}">Add Quiz</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#question"
            aria-expanded="true" aria-controls="question">
            <i class="fa fa-book"></i>
            <span>Quiz question</span>
        </a>
        <div id="question" class="collapse" aria-labelledby="headingProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">question:</h6>
                <a class="collapse-item" href="{{route('question.index')}}">question Quiz</a>
                {{-- <a class="collapse-item" href="{{route('question.create')}}">Add Quiz</a> --}}

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Take_Quiz"
            aria-expanded="true" aria-controls="Take_Quiz">
            <i class="fa fa-book"></i>
            <span>Take Quiz</span>
        </a>
        <div id="Take_Quiz" class="collapse" aria-labelledby="headingProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">question:</h6>
                <a class="collapse-item" href="{{route('take.create')}}">Take Quiz</a>
                {{-- <a class="collapse-item" href="{{route('question.create')}}">Add Quiz</a> --}}

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <br><br><br>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
