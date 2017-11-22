<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity"><i class="fa fa-home" aria-hidden="true"></i></span></a></li>
                <li><a href="users">User management<span style="font-size:16px;" class="pull-right hidden-xs showopacity"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span></a></li>
                {{-- <li class="dropdown">
                    <a href="users" class="dropdown-toggle" data-toggle="dropdown">User Management <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="users">Crear</a></li>
                        <li><a href="#">Modificar</a></li>
                        <li><a href="#">Reportar</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Informes</a></li>
                    </ul>
                </li> --}}
                <li ><a href="{{ route('Product.index') }}">Product management<span style="font-size:16px;" class="pull-right hidden-xs showopacity"><i class="fa fa-product-hunt" aria-hidden="true"></i></span></a></li>
                <li ><a href="#">Statistic<span style="font-size:16px;" class="pull-right hidden-xs showopacity"><i class="fa fa-bar-chart" aria-hidden="true"></i></span></a></li>
            </ul>
        </div>
    </div>
</nav>
