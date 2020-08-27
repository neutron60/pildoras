
    <nav class="navbar navbar-expand-lg navbar-light bg-light ml-5">


        @include('neutron.navigation_bar_basic')

        @include('client.navigation_bar_basic')




        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-5">
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
            </ul>
            <ul class="navbar-nav ml-3">
            <li class="nav-item ml-5">
                <a class="nav-link text-dark " href="/seller/purchase/index-sales">ventas</a>
            </li>
            </ul>
        </div>




    </nav>

