<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', 'B2B Almoxarifado')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        @yield('css')
        @yield('js-header')
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">B2B Almoxarifado</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Configurações</a></li> --}}
                        {{-- <li><hr class="dropdown-divider" /></li> --}}
                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Deslogar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{ route('home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-home"></i></div>
                                Início
                            </a>
                            <div class="sb-sidenav-menu-heading">PRINCIPAL</div>
                            <a class="nav-link" href="{{ route('types.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-location"></i></div>
                                Secretarias
                            </a>
                            <a class="nav-link" href="{{ route('entities.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-building"></i></div>
                                Unidades de Consumo
                            </a>
                            <a class="nav-link" href="{{ route('warehouses.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-bank"></i></div>
                                Almoxarifados
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#products" aria-expanded="false" aria-controls="products">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-plus-square"></i></div>
                                Produtos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="products" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    {{-- <a class="nav-link" href="{{ route('manufacturers.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-wrench"></i></div>
                                        Fabricantes
                                    </a> --}}
                                    <a class="nav-link" href="{{ route('suppliers.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-bank"></i></div>
                                        Fornecedores
                                    </a>
                                    <a class="nav-link" href="{{ route('categories.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tags"></i></div>
                                        Categorias
                                    </a>
                                    <a class="nav-link" href="{{ route('products.index') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-barcode"></i></div>
                                        Itens
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-handshake"></i></div>
                                Pedidos
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#buying" aria-expanded="false" aria-controls="products">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-plus-square"></i></div>
                                Compras
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="buying" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{ route('products.invoice') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-file-code"></i></div>
                                        Nota Fiscal
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link" href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                                Usuários
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado Como:</div>
                        {{ request()->user()->email  }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @if (session()->get('error'))
                        <div class="alert alert-danger mt-4">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        <h1 class="mt-4">@yield('container-title')</h1>
                        <ol class="breadcrumb mb-4">
                            @yield('breadcrumb')
                        </ol>
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; B2B Almoxarifado 2023</div>
                            <div>
                                {{-- <a href="#">Privacy Policy</a> --}}
                                &middot;
                                {{-- <a href="#">Terms &amp; Conditions</a> --}}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="https://unpkg.com/imask"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        @yield('js-footer')
    </body>
</html>


