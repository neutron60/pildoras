<style>
    .back1 {
        background: rgb(171, 229, 235);
    }

    .centrar3 {
        margin-right: 70%;

    }

    .texto {
        text-shadow: 2px 2px gray;
        font-style: oblique;
        text-align: center
    }

</style>


<div class="form-row ml-3 back1">


    <div class="col-md-1">
        <div class="my-2">
            <img class="col-md-2 image" src="{{asset($advertising->logo)}}" alt="imagen" height=100px />
        </div>

    </div>

    <div class="col-md-8 mp-2 ">
        <div class="mt-3">
            <form action="/neutron/search" class="form-inline ">
                <div class="input-group input-group-sm">
                    @isset($query)
                    <input type="search" class="form-control  col-md-2" name="search" size="80" placeholder="search  "
                        aria-label="Search" size="50px" value="{{$query}}">
                    @else
                    <input type="search" class="form-control  col-md-2" name="search" size="80" placeholder="search  "
                        aria-label="Search" size="50px" value="">
                    @endisset

                    <div class="input-group-append ml-2">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-2 texto">
            <h5> Lo mejor en moda y tecnologia</h3>

        </div>

    </div>

    <div class="col-md-3">

        <div class="mt-2">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <div class="form-row">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item ml-5">
                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                </div>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </div>

</div>

<div>


</div>
