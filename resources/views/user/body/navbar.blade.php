<nav class="navbar navbar-dark navbar-expand-md" id="app-navbar">
    <div class="container-fluid"><a class="navbar-brand" href="{{url('/user')}}"><h4>Welcome</h4></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                @php
                    use App\Models\Page;
                    use App\Models\PageMeta;

                    $Pages = Page::all();

                @endphp

            @foreach ($Pages as $page)
            @if ( $page->name =='Shop')
            <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('/create/shop') }}">Shop</a></li>
            @else
            <li class="nav-item" role="presentation"><a class="nav-link active" href="{{url($page->slug.'/show/'. $page->id) }}">{{ $page->name }}</a></li>
            @endif

            @endforeach

                {{-- <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('/create/shop') }}">Create Shop Page</a></li> --}}

                {{-- <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Book now</a></li> --}}
            </ul>




            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- {{ Auth::user()->name }} --}}Logout
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul
        </div>
    </div>
</nav>
