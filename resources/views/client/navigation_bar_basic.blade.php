


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link text-dark ml-3" href="/client/purchase/index-my-orders">mis ordenes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark ml-3" href="/client/purchase/index-my-purchases">mis compras</a>
            </li>
            <li class="nav-item dropdown ml-5"id="borrar_id" >

                    <a class="nav-link dropdown-toggle text-dark " href="#" role="button" id="navbarDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         mis datos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="">
                        <a class="dropdown-item" href="/client/user/show-user">ver datos</a>
                        <a class="dropdown-item" href="/client/user/edit-user-id-number"  id="ocultar_id" value="{{$user->id_number}}">registrar id</a>
                        <a class="dropdown-item" href="/client/user/edit-user-phone">cambiar telefono</a>
                        <a class="dropdown-item" href="/client/user/edit-user-address">cambiar direccion</a>
                    </div>

            </li>
        </ul>
   </div>





