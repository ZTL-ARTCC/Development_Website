@extends('layouts.dashboard')

@section('content')
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="row gutters-tiny invisible" data-toggle"appear">
            <!-- Row #1 -->
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="/training/notes">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">

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

                        <h2 class="h3 font-w700 text-white mb-5">Upcoming Events!</h2>

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
                    <div class="block-header bg-black-op">=
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
                                @if($personal_stats->total_hrs < 0)
                                <div class="font-size-h3 font-w600 text-success" data-toggle="countTo" data-speed="1000" data-to="{{ $personal_stats->total_hrs }}">
                                    @else
                                        0
                                    @endif</div>

                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-success-light">Hours This Month</div>
                            </div>

                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-envelope-open fa-2x text-warning"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-warning" data-toggle="countTo" data-speed="1000" data-to="	
                                
                                   0"</div>
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

</body>
</html>
    @stop
