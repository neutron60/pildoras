<style>
    .back1 {
        background: rgb(171, 229, 235);
    }

    .centrar3 {
        margin-right: 60%;

    }

    .margen {
        margin-left: 30%;

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
            <img class="" src="{{asset($advertising->logo)}}" alt="imagen" height=100px />
        </div>

    </div>

    <div class="col-md-8 mp-2 ml-5">
        <div class="mt-3 ml-5">
            <form action="/neutron/search" class="form-inline">
                <div class="form-group  ">
                    <input type="search" class="form-control "  placeholder="buscar" name="search">
                </div>
                <div class="input-group-append ml-2" >
                    <button class="btn btn-navbar btn-outline-dark " type="submit"> search </button>
                </div>
            </form>
        </div>


        <div class="mt-2 texto">
            <h5> Lo mejor en moda y tecnologia</h3>

        </div>

    </div>

    <div class="col-md-2">
        <div class="mt-2">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <div class="form-row">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/neutron-login">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item ml-5">
                        <a class="nav-link text-dark" href="/neutron-register">{{ __('Register') }}</a>
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


