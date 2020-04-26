<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>ZTL Site</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">



    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css_dash/codebase.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>

<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-inverse'                           Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-modern'                        Modern Header style
    'page-header-inverse'                       Dark themed Header (works only with classic Header style)
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href="/profile"></a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->



        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Helper classes

        Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

        Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
        Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
            - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
    -->
    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">ZTL</span><span class="font-size-xl text-primary">Dashboard</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->

            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Main Profile</span></a>
                    </li>

                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">User Interface</span></li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Roster</span></a>
                    </li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Events</span></a>
                    </li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Files</span></a>
                    </li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Scenery</span></a>
                    </li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Statistics</span></a>
                    </li>
                    <li>
                        <a href="/profile"><i class="si si-cup"></i><span class="sidebar-mini-hide">Submit Controller Feedback</span></a>
                    </li>


                    <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">Training</span></li>


                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-search"></i>
                </button>
                <!-- END Open Search Section -->

                <!-- Layout Options (used just for demonstration) -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                        <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                        <h6 class="dropdown-header">Color Themes</h6>
                        <div class="row no-gutters text-center mb-5">
                            <div class="col-2 mb-5">
                                <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2 mb-5">
                                <a class="text-elegance" data-toggle="theme" data-theme="{{asset('css_dash/themes/elegance.min.css') }}" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2 mb-5">
                                <a class="text-pulse" data-toggle="theme" data-theme="{{ asset('css_dash/themes/pulse.min.css') }}"  href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2 mb-5">
                                <a class="text-flat" data-toggle="theme" data-theme="{{ asset('css_dash/themes/flat.min.css') }}" href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2 mb-5">
                                <a class="text-corporate" data-toggle="theme" data-theme="{{asset('css_dash/themes/corporate.min.css') }}"  href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                            <div class="col-2 mb-5">
                                <a class="text-earth" data-toggle="theme" data-theme="{{ asset('css_dash/themes/earth.min.css') }}"  href="javascript:void(0)">
                                    <i class="fa fa-2x fa-circle"></i>
                                </a>
                            </div>
                        </div>
                        <h6 class="dropdown-header">Header</h6>
                        <div class="row gutters-tiny text-center mb-5">
                            <div class="col-6">
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                            </div>
                        </div>
                        <h6 class="dropdown-header">Sidebar</h6>
                        <div class="row gutters-tiny text-center mb-5">
                            <div class="col-6">
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                            </div>
                        </div>
                        <div class="d-none d-xl-block">
                            <h6 class="dropdown-header">Main Content</h6>
                            <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                        </div>
                        <div class="dropdown-divider"></div>

                    </div>
                </div>
                <!-- END Layout Options -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{{$user->full_name}}}</span>
                        <i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                        <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                        <a class="dropdown-item" href="/profile">
                            <i class="si si-user mr-5"></i> Profile
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="si si-wrench mr-5"></i> Settings
                        </a>
                        <!-- END Side Overlay -->

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">
                            <i class="si si-logout mr-5"></i> Sign Out
                        </a>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Notifications -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-flag"></i>
                        <span class="badge badge-primary badge-pill">5</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
                        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                            <i class="fa fa-flag mr-5"></i> View All
                        </a>
                    </div>
                </div>
                <!-- END Notifications -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="fa fa-tasks"></i>
                </button>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header">
            <div class="content-header content-header-fullrow">
                <form action="be_pages_generic_search.html" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="/training/notes">
                        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                            <div class="ribbon-box">750</div>
                            <p class="mt-5">
                                <i class="si si-book-open fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">My Training</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="/events">
                        <div class="block-content bg-gd-primary">
                            <p class="mt-5">
                                <i class="si si-plus fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Events</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="/controller/feedback">
                        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                            <div class="ribbon-box">16</div>
                            <p class="mt-5">
                                <i class="si si-bubbles fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Submit Feedback</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="www.vatusa.net">
                        <div class="block-content bg-gd-lake">
                            <p class="mt-5">
                                <i class="si si-magnifier fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">VATUSA Main site</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="/stats">
                        <div class="block-content bg-gd-emerald">
                            <p class="mt-5">
                                <i class="si si-bar-chart fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Statistics</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="javascript:void(0)">
                        <div class="block-content bg-gd-corporate">
                            <p class="mt-5">
                                <i class="si si-settings fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Settings</p>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>
            <div class="row row-deck gutters-tiny invisible" data-toggle="appear">
                <!-- Row #2 -->
                <div class="col-xl-4">
                    <a class="block block-transparent bg-image d-flex align-items-stretch" href="javascript:void(0)" style="background-image: url('assets/media/photos/photo24@2x.jpg');">
                        <div class="block-content block-sticky-options pt-100 bg-black-op">
                            <div class="block-options block-options-left text-white">
                                <div class="block-options-item">
                                    <i class="si si-book-open text-white-op"></i>
                                </div>
                            </div>

                            <h2 class="h3 font-w700 text-white mb-5">Upcomeing Events!</h2>

                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <a class="block block-transparent bg-image d-flex align-items-stretch" href="javascript:void(0)" style="background-image: url('assets/media/photos/photo32@2x.jpg');">
                        <div class="block-content block-sticky-options pt-100 bg-primary-dark-op">
                            <div class="block-options block-options-left text-white">
                                <div class="block-options-item">
                                    <i class="si si-book-open text-white-op"></i>
                                </div>
                            </div>

                            <h2 class="h3 font-w700 text-white mb-5">New News!</h2>

                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <a class="block block-transparent bg-image d-flex align-items-stretch" href="javascript:void(0)" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
                        <div class="block-content block-sticky-options pt-100 bg-primary-op">


                            <h2 class="h3 font-w700 text-white mb-5">Check Your Email!</h2>
                            <h3 class="h5 text-white-op">{{{$user->email}}}</h3>
                        </div>
                    </a>
                </div>
                <!-- END Row #2 -->
            </div>
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #3 -->
                <div class="col-xl-8 d-flex align-items-stretch">
                    <div class="block block-themed block-mode-loading-inverse block-transparent bg-image w-100" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
                        <div class="block-header bg-black-op">
                            <div class="ribbon-box">Certifications</div>
                            <table class="table table-borderless table-vcenter" style="font-size: 1.5em;">
                                <tbody>
                                <tr>
                                    @if($user->del == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5">Solo Certification</span></td>
                                    @elseif($user->del == 1)
                                        <td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Delivery Certification</span></td>
                                    @elseif($user->del == 0)
                                        <td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Delivery Certification</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($user->gnd == 99 )
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5">Solo Certification</span></td>
                                    @elseif($user->gnd == 1)
                                        <td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Ground Certification</span></td>
                                    @elseif($user->gnd == 0)
                                        <td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Ground Certification</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($user->twr == 99)
                                        <td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Solo Certification</span></td>
                                    @elseif($user->twr == 1)
                                        <td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Tower Certification</span></td>
                                    @elseif($user->twr == 0)
                                        <td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Tower Certification</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($user->app == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Certification</span></td>
                                    @elseif($user->app == 1)
                                        <td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor TRACON Certification</span></td>
                                    @elseif($user->app == 0)
                                        <td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No TRACON Certification</span></td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-borderless table-vcenter" style="font-size: 1.5em;">
                                <tbody>
                                <tr>
                                    @if($user->del == 2)
                                        <td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Atlanta Delivery Certification</span></td>
                                    @elseif($user->del == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Delivery Certification</span></td>

                                    @endif
                                </tr>
                                <tr>
                                    @if($user->gnd == 2)
                                        <td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Atlanta Ground Certification</span></td>
                                    @elseif($user->gnd == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Ground Certification</span></td>

                                    @endif
                                </tr>
                                <tr>
                                    @if($user->twr == 2)
                                        <td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Atlanta Tower Certification</span></td>
                                    @elseif($user->twr == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Tower Certification</span></td>

                                    @endif
                                </tr>
                                <tr>
                                    @if($user->app == 2)
                                        <td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>A80 TRACON Certification</span></td>
                                    @elseif($user->app == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo A80 TRACON Certification</span></td>

                                    @endif
                                </tr>
                                <tr>
                                    @if($user->ctr == 1)
                                        <td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>ZTL Center Certification</span></td>
                                    @elseif($user->ctr == 99)
                                        <td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo ZTL Center Training</span></td>

                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content bg-black-op">
                            <div class="pull-r-l">
                                <!-- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
                                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                <canvas class="js-chartjs-dashboard-lines"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="block block-transparent bg-primary-dark d-flex align-items-center w-100">
                        <div class="block-content block-content-full">
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-book-open fa-2x text-success"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-success" data-toggle="countTo" data-speed="1000" data-to="750">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-success-light">Hours This Month</div>
                            </div>

                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-envelope-open fa-2x text-warning"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-warning" data-toggle="countTo" data-speed="1000" data-to="	@if(!empty($stats['total']))
                                {{{ $stats['total'] }}}
                                @else
                                        0
@endif">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-warning-light">Total Controlling Hours</div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- END Row #3 -->
            </div>


            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
            <div class="float-right">

            </div>
           
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!--
    Codebase JS Core

    Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
    to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

    If you like, you could also include them separately directly from the assets/js/core folder in the following
    order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

    assets/js/core/jquery.min.js
    assets/js/core/bootstrap.bundle.min.js
    assets/js/core/simplebar.min.js
    assets/js/core/jquery-scrollLock.min.js
    assets/js/core/jquery.appear.min.js
    assets/js/core/jquery.countTo.min.js
    assets/js/core/js.cookie.min.js
-->
<script type="text/javascript" src="{{ URL::to('js_dash/codebase.core.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('js_dash/codebase.app.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('js_dash/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('js_dash/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>