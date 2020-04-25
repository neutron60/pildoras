<style>
    .icono {
        color: blue;
    }

    .icono1 {
        color: aquamarine;
    }

    .icono2 {
        color: deeppink;
    }

    .icono3 {
        color: red;
    }

</style>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-brand">
                <p class="">NEUTRON</p>
                <P class="">RIF J-401691803</P>
                <p class="">Puerto Ordaz, Venezuela</p>
            </div>
            <form class="form-inline my-2 my-lg-0 ml-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            @guest
            <h1>fuera</h1>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('ingresar') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('registrarse') }}</a>
            </li>
            <a class="ins-ic">
                <i class="fas fa-shopping-cart fa-2x"></i>
            </a>
            @endif
            @else
            <h1>dentro</h1>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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


        </div>
    </nav>
</div>

<br>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Quienes Somos<span class="sr-only">(current)</span></a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="#">Quienes Somos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactanos</a>
                </li>
            </ul>
            <!-- iconos -->
            <div class="mb-3 flex-center white-text">
                <!-- Facebook -->
                <a class="fb-ic">
                    <i class="icono fab fa-facebook-f fa-lg mr-md-1 mr-3 fa-1.5x"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                    <i class="icono1 fab fa-twitter fa-lg  mr-md-1 mr-3 fa-1.5x"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
                    <i class="icono2 fab fa-instagram fa-lg mr-md-1 mr-3 fa-1.5x"> </i>
                </a>
                <!-- telegram -->
                <a class="tw-ic">
                    <i class="icono1 fab fa-telegram fa-lg mr-md-1 mr-3 fa-1.5x"> </i>
                </a>
                <!-- you tube -->
                <a class="tw-ic">
                    <i class="icono3 fab fa-youtube fa-lg mr-md-1 mr-3 fa-1.5x"> </i>
                </a>
            </div>
        </div>
    </nav>
</div>



