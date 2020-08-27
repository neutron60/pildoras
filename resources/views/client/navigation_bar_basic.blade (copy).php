


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
                <div class="dropdown" id="borrar_id">
                    <a class="dropdown-toggle text-dark " href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         mis datos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="">
                        <a class="dropdown-item" href="/client/user/show-user">ver datos</a>
                        <a class="dropdown-item" href="/client/user/edit-user-id-number"  id="ocultar_id" value="{{$user->id_number}}">registrar id</a>
                        <a class="dropdown-item" href="/client/user/edit-user-phone">cambiar telefono</a>
                        <a class="dropdown-item" href="/client/user/edit-user-address">cambiar direccion</a>
                    </div>
                </div>
            </li>

        </ul>
    </div>





