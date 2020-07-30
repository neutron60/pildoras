<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Quienes Somos<span class="sr-only">(current)</span></a>
                </li>-->
                @include('neutron.navigation_bar_basic')
        </ul>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link text-dark ml-3" href="/client/purchase/index-my-orders">mis ordenes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark ml-3" href="/client/purchase/index-my-purchases">mis compras</a>
            </li>
        </ul>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle text-dark " href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        tu cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/client/user/show-user">mis datos</a>
                        <a class="dropdown-item" href="/client/user/edit-user-id-number">cambiar id</a>
                        <a class="dropdown-item" href="/client/user/edit-user-phone">cambiar telefono</a>
                        <a class="dropdown-item" href="/client/user/edit-user-address">cambiar direccion</a>
                    </div>
                </div>
            </li>

        </ul>
    </div>

</nav>
