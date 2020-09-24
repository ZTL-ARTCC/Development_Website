<!doctype html>
<!--[if lte IE 9]>
<html lang="en" class="no-focus lt-ie10 lt-ie10-msg">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" class="no-focus">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>@section('title') Atlanta ARTCC @show</title>

    <meta name="description" content="The official website of ZTL ARTCC of VATSIM and VATUSA.">
    <meta name="author" content="ZTL ARTCC">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="ZTL ARTCC Website">
    <meta property="og:site_name" content="ZTL ARTCC">
    <meta property="og:description" content="The official website of ZTL ARTCC of VATSIM and VATUSA.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123789597-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-123789597-1');
    </script>

    <!-- Icons
    <link rel="shortcut icon" href="/assets_new/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets_new/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets_new/img/favicons/apple-touch-icon-180x180.png">
    END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets_new/js/plugins/datatables/dataTables.bootstrap4.min.css">
    <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
    <link rel="stylesheet" id="css-main" href="/assets_new/css/codebase.min.css">
    <!-- Site legacy style sheets -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/white.css">
</head>
<body>

<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow bg-black-op-10">
                    <div class="content-header-section text-center align-parent">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                                data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="/">
                                <span class="font-size-xl text-dual-primary-dark">Atlanta</span><span
                                    class="font-size-xl text-primary">ARTCC</span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Main Navigation -->
                <div class="content-side content-side-full">
                    <!--
                    Mobile navigation, desktop navigation can be found in #page-header

                    If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                    -->
                    <ul class="nav-main">
                        <li><a href="/"><i class="si si-home"></i>Home</a></li>

                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i>Controllers</a>
                        <ul>
                            <li><a href="/staff">Staff Team</a></li>
                            <li><a href="/roster">Roster</a></li>
                            <li><a href="/documents">Documents and Downloads</a></li>
                            <li><a href="/stats">ARTCC Stats</a></li>
                            <li><a href="/events">Events</a></li>
                        </ul>
                        </li>
                        <li><a href="/feedback/new"><i class="si si-pencil"></i>Feedback</a></li>
                        @if(Auth::guest())
                            <li><a href="/visit"><i class="si si-doc"></i>Visitor Application</a></li>
                        @endif
                        @if(Auth::guest())
                            <li><a href="/login"><i class="si si-login"></i>Login</a></li>
                        @else
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                        class="si si-user"></i>{{Auth::user()->full_name}}</a>
                                <ul>
                                    <li><a href="/profile">Profile</a></li>
                                    <li><a href="https://training.ztlartcc.org">My Training</a></li>
                                    @if(Auth::user()->can('snrStaff') || Auth::user()->can('staff') || Auth::user()->can('mentor') || Auth::user()->can('scenery') || Auth::user()->can('events') || Auth::user()->can('docs'))

                                    @endif
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- END Side Main Navigation -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700 mr-5" href="/">
                        <span class="font-size-xl text-dual-primary-dark">Atlanta</span><span
                            class="font-size-xl text-primary"> ARTCC</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Middle Section -->
            <div class="content-header-section d-none d-lg-block">
                <!-- Header Navigation -->
                <!--
                Desktop Navigation, mobile navigation can be found in #sidebar

                If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                If your sidebar menu includes headings, they won't be visible in your header navigation by default
                If your sidebar menu includes icons and you would like to hide them, you can add the class 'nav-main-header-no-icons'
                -->
                <ul class="nav-main-header">
                    <li><a href="/"><i class="si si-home"></i>Home</a></li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i>Controllers</a>
                        <ul>
                            <li><a href="/staff">Staff Team</a></li>
                            <li><a href="/roster">Roster</a></li>
                            <li><a href="/documents">Documents and Downloads</a></li>
                            <li><a href="/stats">ARTCC Stats</a></li>
                            <li><a href="/events">Events</a></li>
                        </ul>
                    </li>
                    <li><a href="/feedback/new"><i class="si si-pencil"></i>Feedback</a></li>
                    @if(Auth::guest())
                        <li><a href="/visit"><i class="si si-doc"></i>Visitor Application</a></li>
                    @endif
                </ul>
                <!-- END Header Navigation -->
            </div>
            <!-- END Middle Section -->
            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                @if(Auth::guest())
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-login">
                            <a href="/login" style="color:white;"><i class="si si-login mr-5"></i> Login</i></a>
                        </button>
                    </div>
                @else
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->fname}}<i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150"
                             aria-labelledby="page-header-user-dropdown">
                            <a class="dropdown-item" href="/profile">
                                <i class="si si-user mr-5"></i> Profile
                            </a>
                            <a class="dropdown-item" href="/training/notes">
                                <i class="si si-graduation mr-5"></i> My Training
                            </a>
                            <a class="dropdown-item" href="https://www.ids.ztlartcc.org">
                                <i class="si si-graduation mr-5"></i> IDS
                            </a>
                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            @if(Auth::user()->can('snrStaff') || Auth::user()->can('staff') || Auth::user()->can('train') || Auth::user()->can('scenery') || Auth::user()->can('events') || Auth::user()->can('files'))
                                <div class="dropdown-divider"></div>
                                </a>
                        @endif
                        <!-- END Side Overlay -->

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">
                                <i class="si si-logout mr-5"></i> Sign Out
                            </a>
                        </div>
                    </div>
            @endif
            <!-- END User Dropdown -->
                <!-- Toggle Sidebar (for Mobile) -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
                <!-- END Toggle Sidebar (for Mobile) -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->


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
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->


    <footer id="page-footer" class="bg-white opacity-0">
        <div class="content content-full">
            <!-- Footer Navigation -->
            <div class="row items-push-2x mt-30">
                <div class="col-6 col-md-8">
                    <h3 class="h5 font-w700"><i class="fa fa-info-circle"></i> Disclaimer</h3>
                    <p>The information contained on this website is for flight simulation purposes only. It is not
                        intended for real world navigation. This site is not affiliated with the FAA, the actual Atlanta
                        ARTCC, or any governing aviation body. All content contained herein is approved only for use on
                        the VATSIM network.</p>
                </div>
                <div class="col-md-4">
                    <h3 class="h5 font-w700">Partners</h3>
                    <div class="font-size-sm mb-30">
                        <ul class="list list-simple-mini font-size-sm">
                            <li>
                                <a class="link-effect font-w600" href="https://vatusa.net/" target="_blank">VATUSA</a>
                            </li>
                            <li>
                                <a class="link-effect font-w600" href="https://vatsim.net/" target="_blank">VATSIM</a>
                            </li>
                            <li>
                                <a class="link effect font-w600" href="https://www.vatstar.com/"
                                   target="_blank">VATSTAR</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END Footer Navigation -->

            <!-- Copyright Info -->
            <div class="font-size-xs clearfix border-t pt-20 pb-10">
                <div class="float-left">
                    &copy; Copyright <span class="js-year-copy"></span> Atlanta ARTCC. All rights reserved.
                </div>

            </div>
            <!-- END Copyright Info -->
        </div>
    </footer>
    <!-- END Footer -->

</div>
<!-- END Page Container -->

@if(count($errors) > 0)
    <div class="modal fade" id="flash-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    @foreach($errors->all() as $error)
                        <p><strong>{{ $error }}</strong></p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Codebase Core JS -->
<script src="/assets_new/js/core/jquery.min.js"></script>
<script src="/assets_new/js/core/popper.min.js"></script>
<script src="/assets_new/js/core/bootstrap.min.js"></script>
<script src="/assets_new/js/core/jquery.slimscroll.min.js"></script>
<script src="/assets_new/js/core/jquery.scrollLock.min.js"></script>
<script src="/assets_new/js/core/jquery.appear.min.js"></script>
<script src="/assets_new/js/core/jquery.countTo.min.js"></script>
<script src="/assets_new/js/core/js.cookie.min.js"></script>
<script src="/assets_new/js/codebase.js"></script>


<!-- Page JS Plugins -->
<script src="/assets_new/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets_new/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page JS Code -->
<script src="/assets_new/js/pages/be_tables_datatables.js"></script>

<script>
    jQuery(function () {
        // Init page helpers (Content Filtering helper)
        Codebase.helpers('content-filter');
    });
</script>


@if(Session::has('message'))
    <!-- Fade In Modal -->
    <div class="modal fade" id="modal-notice" tabindex="-1" role="dialog" aria-labelledby="modal-notice"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">Notice</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>{{{Session::get('message')}}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Fade In Modal -->

    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modal-notice').modal('show');
        });
    </script>
@endif

@if(count($errors) > 0)
    <!-- Fade In Modal -->
    <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-error"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">Notice</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Fade In Modal -->

    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modal-error').modal('show');
        });
    </script>
@endif
@include('inc.messages')


</body>
</html>