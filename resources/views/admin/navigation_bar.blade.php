
    <nav class="navbar navbar-expand-lg navbar-light bg-light ml-5">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Quienes Somos<span class="sr-only">(current)</span></a>
                </li>-->
                @include('neutron.navigation_bar_basic')
                <li class="nav-item">
                    <a class="nav-link text-dark ml-5" href="/client/purchase/index-my-orders">mis ordenes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark  mr-3" href="/client/purchase/index-my-purchases">mis compras</a>
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link text-dark " href="/seller/purchase/index-sales">ventas</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-dark " href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ordenes </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/seller/purchase/index-order-requested"">ordenes, reportar pago</a>
                            <a class=" dropdown-item" href="/seller/purchase/index-order-verified-payment">ordenes,
                                verificar pago</a>
                            <a class="dropdown-item" href="/seller/purchase/index-order-assign-invoice">ordenes, asignar
                                factura</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item ml-5">
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

