<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Poke TCG Price</title>

    <meta name="description"
        content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xwork.css') }}"> -->
    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

    </script>
</head>

<body>
    <div id="page-container"
        class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <!-- Notifications Dropdown -->
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-user-circle"></i>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                                <div class="pt-2">
                                    <a class="text-white font-w600" href="">{{ auth()->user()->name }}</a>
                                </div>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="#">
                                    <i class="far fa-fw fa-user mr-1"></i> Profile
                                </a>

                                <div role="separator" class="dropdown-divider"></div>
                                <form class="text-white font-w600" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                    <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="far fa-fw fa-bookmark"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-sidebar-dark">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-dark" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search Application.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-darker">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->
        <aside id="side-overlay">
            <!-- Side Header - Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="content-header bg-body-light justify-content-center text-danger" data-toggle="layout" data-action="side_overlay_close" href="javascript:void(0)">
                <i class="fa fa-2x fa-times-circle"></i>
            </a>
            <!-- END Side Header - Close Side Overlay -->

            <!-- Side Content -->
            <form action="" method="POST" onsubmit="return false;">
                <div class="content-side">
                    <div class="block pull-x">
                        <!-- Personal -->
                        <div class="block-content block-content-sm block-content-full bg-body-dark">
                            <span class="text-uppercase font-size-sm font-w700">Personal</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="form-group">
                                <label for="so-profile-name">Name</label>
                                <input type="text" class="form-control form-control-alt" id="so-profile-name" name="so-profile-name" value="George Taylor">
                            </div>
                            <div class="form-group">
                                <label for="so-profile-email">Email</label>
                                <input type="email" class="form-control form-control-alt" id="so-profile-email" name="so-profile-email" value="g.taylor@example.com">
                            </div>
                        </div>
                        <!-- END Personal -->

                        <!-- Password Update -->
                        <div class="block-content block-content-sm block-content-full bg-body-dark">
                            <span class="text-uppercase font-size-sm font-w700">Password Update</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="form-group">
                                <label for="so-profile-password">Current Password</label>
                                <input type="password" class="form-control form-control-alt" id="so-profile-password" name="so-profile-password">
                            </div>
                            <div class="form-group">
                                <label for="so-profile-new-password">New Password</label>
                                <input type="password" class="form-control form-control-alt" id="so-profile-new-password" name="so-profile-new-password">
                            </div>
                            <div class="form-group">
                                <label for="so-profile-new-password-confirm">Confirm New Password</label>
                                <input type="password" class="form-control form-control-alt" id="so-profile-new-password-confirm" name="so-profile-new-password-confirm">
                            </div>
                        </div>
                        <!-- END Password Update -->

                        <!-- Submit -->
                        <div class="block-content border-top">
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="fa fa-fw fa-save mr-1"></i> Save
                            </button>
                        </div>
                        <!-- END Submit -->
                    </div>
                </div>
            </form>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->
        <!-- Sidebar -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header (mini Sidebar mode) -->
            <div class="smini-visible-block">
                <div class="content-header">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        D<span class="opacity-75">x</span>
                    </a>
                    <!-- END Logo -->
                </div>
            </div>
            <!-- END Side Header (mini Sidebar mode) -->

            <!-- Side Header (normal Sidebar mode) -->
            <div class="smini-hidden">
                <div class="content-header justify-content-lg-center">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="{{url('/')}}">
                        Poke <span class="opacity-75">TCG</span>
                        <span class="font-w400">Price</span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div class="d-lg-none">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header (normal Sidebar mode) -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">

                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="{{ url('/') }}">
                                <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                                <span class="nav-main-link-badge badge badge-pill badge-primary"></span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Navigation</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <i class="nav-main-link-icon fa fa-search"></i>
                                <span class="nav-main-link-name">Card Search</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/set') }}">
                                <i class="nav-main-link-icon fa fa-scroll"></i>
                                <span class="nav-main-link-name">Set</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ url('/card') }}">
                                <i class="nav-main-link-icon fa fa-scroll"></i>
                                <span class="nav-main-link-name">Card</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/collection">
                                <i class="nav-main-link-icon fa fa-scroll"></i>
                                <span class="nav-main-link-name">Collection</span>
                                <span class="nav-main-link-badge badge badge-pill badge-success">9</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                <span class="nav-main-link-name">Charts</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Information</span>
                                <span class="nav-main-link-badge badge badge-pill badge-warning">3</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->
        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600"
                            href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- Dashmix Core JS -->
    <script src="{{ mix('js/dashmix.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

    @yield('js_after')
</body>

</html>
