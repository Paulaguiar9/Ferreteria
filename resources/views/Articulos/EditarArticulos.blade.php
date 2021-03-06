<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ferricentro Gallegos</title>
        <link href="/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('home')}}">Sistema Ferretero</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
              
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                        @else
                    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesi??n') }}
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
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('clientes')}}">Lista de Cliente</a>
                                    <a class="nav-link" href="{{route('clientesAdd')}}">Agregar Cliente</a>
                                   
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Articulos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('articulos')}}">Lista de Articulos</a>
                                    <a class="nav-link" href="{{route('articulosAdd')}}">Agregar Articulos</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                              <a class="nav-link" href="{{route('factura')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Factura
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pedidos
                            </a>
                        </div>
                    </div>
                
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                                               
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Formulario para editar articulos 
                            </div>
                                
                           <form action="{{url('/actualizar/'.$articulo->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="NombreArticulo">Nombre del Articulo</label>
                                <input type="text" class="form-control{{ $errors->has('NombreArticulo') ? ' is-invalid' : '' }}" id="NombreArticulo" placeholder="Ingrese nombre del articulo" value="{{$articulo->nombrearticulo}}" required="" name="NombreArticulo">
                                @if ($errors->has('NombreArticulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('NombreArticulo') }}</strong>
                                </span>
                                @endif
                            </div>

                           <div class="form-group">
                                 <label for="Descripcion">Descripcion del Articulo</label>
                                 <input type="text" class="form-control{{ $errors->has('Descripcion') ? ' is-invalid' : '' }}" id="Descripcion" placeholder="Ingrese Descripcio" value="{{$articulo->descripcion}}" required="" name="Descripcion">
                                 @if ($errors->has('Descripcion'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('Descripcion') }}</strong>
                                 </span>
                                 @endif
                             </div>
                            
                            <div class="form-group row">
                            <div class="col-md-6">
                            <!-- cedula -->
                                 <label for="Cantidad">Cantidad</label>
                                 <input type="text" class="form-control{{ $errors->has('Cantidad') ? ' is-invalid' : '' }}" id="Cantidad" placeholder="Ingrese la cantidad" value="{{$articulo->cantidad}}" required="" name="Cantidad">
                                 @if ($errors->has('Cantidad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Cantidad') }}</strong>
                                </span>
                                 @endif
                            </div>
                            <div class="col-md-6">
                            <!-- T??lefono -->
                                <label for="Precio">Precio</label>
                                <input type="text" class="form-control{{ $errors->has('Precio') ? ' is-invalid' : '' }}" id="Precio" placeholder="Ingrese el Precio" value="{{$articulo->precio}}" name="Precio">
                                @if ($errors->has('Precio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Precio') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block" type="submit">Actualizar </button> 
                            </div>
                            
                           </form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ing. Paul Aguiar </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/dist/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    </body>
</html>