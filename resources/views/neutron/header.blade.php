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

   .image4{
height: 100px;

   }


   @media screen and (max-width: 1200px) {
            .image4 {
                /* usado en neutron/index  */
                height: 80px;
            }
   }

   @media screen and (max-width: 992px) {
            .image4 {
                /* usado en neutron/index  */
                height: 120px;
            }
   }


   @media screen and (max-width: 768px) {
            .image4 {
                /* usado en neutron/index  */
                height: 80px;
            }
   }

</style>


<div class="form-row ml-3 back1">

    <div class="col-sm-1 col-md-2 col-lg-1">
        <div class="my-2">
            <img class="image4" src="{{asset($advertising->logo)}}" alt="logo"  />
        </div>

    </div>

    <div class="col-sm-6 col-md-7 col-lg-8 mp-2 ml-5">
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

    <div class="col-sm-3 col-md-2 col-lg-2">
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


