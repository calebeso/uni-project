<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UniAmérica | Gestão Educacional </title>

    <!-- Main Styles -->
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('css/vendor-material-icons.css') }}" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('css/vendor-fontawesome-free.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.svg') }}">

    @yield('admin-style')
</head>

<body class="layout-default">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container-fluid p-0">

                        <!-- Navbar toggler -->

                        <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Navbar Brand -->
                        <a href="/" class="navbar-brand ">

                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="width:20px;" viewBox="0 0 40 40">
                                <path d="M40 34.16666667c.01-3.21166667-2.58333333-5.82333334-5.795-5.835-1.94-.00666667-3.75666667.955-4.84166667 2.565-.10166666.155-.295.22333333-.47166666.16666666L11.94 25.66666667c-.19-.06-.31-.245-.28833333-.44333334.01-.07333333.015-.14833333.015-.22333333 0-.06833333-.005-.13833333-.01333334-.20666667-.02166666-.20166666.105-.39.3-.44666666l17.96-5.13c.13833334-.04.28666667-.005.39333334.09166666 1.05.97333334 2.42833333 1.51666667 3.86 1.525C37.38833333 20.83333333 40 18.22166667 40 15s-2.61166667-5.83333333-5.83333333-5.83333333C32.52 9.17166667 30.95333333 9.87833333 29.86 11.11c-.11.12166667-.28.16833333-.43666667.11833333L11.91 5.65333333c-.16-.05-.27333333-.19166666-.28833333-.35833333-.30333334-3.20166667-3.14333334-5.55166667-6.345-5.24833333S-.275 3.19.02833333 6.39166667c.28166667 2.99333333 2.79833334 5.28 5.805 5.275 1.64666667-.005 3.21333334-.71333334 4.30666667-1.945.11-.12166667.28-.16833334.43666667-.11833334l16.57 5.27166667c.22.06833333.34166666.30333333.27166666.52333333-.04166666.13333334-.14833333.23833334-.28333333.275L9.90333333 20.59666667c-.13333333.03833333-.275.00833333-.38166666-.08-1.03333334-.86833334-2.33833334-1.34666667-3.68833334-1.35C2.61166667 19.16666667 0 21.77833333 0 25s2.61166667 5.83333333 5.83333333 5.83333333c1.355-.005 2.665-.485 3.7-1.35833333.10833334-.09166667.25833334-.12.39333334-.07666667l18.29 5.81833334c.14.04333333.24666666.15666666.28.3.75666666 3.13166666 3.90833333 5.05666666 7.04 4.3C38.14833333 39.185 39.99 36.85333333 40 34.16666667z" />
                            </svg>

                            <span>UniAmérica</span>
                        </a>

                        @if(Route::has('login'))
                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            @auth
                            <li class="nav-item dropdown">
                                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <span class="mr-1 d-flex-inline">
                                        <span class="text-light">{{ Auth::user()->login }}</span>
                                    </span>
                                    <img src="{{ asset('images/avatar.png') }}" class="rounded-circle" width="32" alt="Frontted">
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong>{{ Auth::user()->name }}</strong></div>
                                        <div class="text-muted">{{ Auth::user()->email }}</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/"><i class="material-icons">dvr</i> Dashboard</a>
                                    @can('is-admin')
                                    <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()->id) }}"><i class="material-icons">account_circle</i> Meu perfil</a>
                                    @endcan
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> Sair</a>

                                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display:none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth
                        </ul>
                        @endif


                    </div>
                </div>

            </div>
        </div>


        <!-- Dashboard header e sidebar -->
        @auth
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    @yield('content')

                </div>
                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <div class="mdk-drawer__content">
                        <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
                            <div class="sidebar-heading">Menu</div>
                            <ul class="sidebar-menu">
                                @can('is-admin')
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                        <span class="sidebar-menu-text">Usuários</span>
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu collapse" id="dashboards_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="{{ route('admin.users.index') }}">
                                                <span class="sidebar-menu-text">Ver usuários</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#apps_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                        <span class="sidebar-menu-text">Cursos</span>
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu collapse" id="apps_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="{{ route('courses.index') }}">
                                                <span class="sidebar-menu-text">Ver cursos</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-menu-item active open">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#pages_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>
                                        <span class="sidebar-menu-text">Alunos</span>
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu collapse show " id="pages_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="{{ route('students.index') }}">
                                                <span class="sidebar-menu-text">Ver alunos</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exit_to_app</i>
                                        <span class="sidebar-menu-text">Sair</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endauth
        @unless(Auth::check())

        <!-- Página de Login -->
        <section class="login-signup">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="login-area">
                            <div class="header-area">
                                <h4 class="title">Entrar agora</h4>
                                <p class="text">Bem-vindo de volta, faça login abaixo</p>
                            </div>
                            <div class="login-form">
                                <form id="loginform" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-input">
                                        <input type="text" name="login" class="User Name" placeholder="Entre com login" value="" required="" autofocus>
                                        <i class="material-icons">person</i>
                                    </div>
                                    <div class="form-input">
                                        <input type="password" id="panel_password" name="password" class="Password" placeholder="Digite a senha">
                                        <span toggle="#panel_password" class="toggle-panel"><i class="material-icons show-password">visibility</i></span>
                                        <i class="material-icons">lock</i>
                                    </div>
                                    <input id="authdata" type="hidden" value="{{ __('Authenticating...') }}">
                                    <button class="submit-btn">{{ __('Login') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endunless
    </div>

    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- JqueryMask by Igor Escobar --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('js/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('js/material-design-kit.js') }}"></script>

    <!-- App -->
    <script src="{{ asset('js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('js/check-selected-row.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('main-scripts')
</body>