<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-Comm</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/admin/cartlist">Carts </a></li>
                <li class=""><a href="/admin/products">Products </a></li>
                <li class=""><a href="/admin/orders">Orders </a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Session::has('admin'))
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('admin')['name']}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/logout">Logout</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="/admin/adproducts"> Add Product</a></li>
                @else
                    <li><a href="/admin/login">Login</a></li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
