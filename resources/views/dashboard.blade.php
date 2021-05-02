@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <!-- Page Container -->
    <div class="bg-image" style="background-image: url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.esquire.com%2Flifestyle%2Fa22723899%2Fpokemon-cards-1999-unopened-sell-at-auction%2F&psig=AOvVaw3ayqmjpGOzQZ6-B1NG4SqQ&ust=1618351874157000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLDU2djc-e8CFQAAAAAdAAAAABAF');">
        <div class="bg-gd-white-op-rl text-center">
            <div class="content content-boxed content-full py-5 py-md-7">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-6">
                        <h1 class="h2 mb-2">
                            Find your favorite card <span class="text-primary">today</span>.
                        </h1>
                        <p class="font-size-lg font-w400 text-muted">
                            Use this site to find out the price history of your favorite card or maybe a card that you are invested in with PTP tool.
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-8 col-xl-6">
                        <div class="p-2 rounded bg-white shadow-sm">
                            <form class="form-inline" action="be_pages_jobs_dashboard.html" method="POST" onclick="return false;">
                                <label class="sr-only" for="example-job-search">Search card...</label>
                                <input type="text" class="form-control form-control-alt p-4 mb-2 mr-sm-2 mb-sm-0 flex-grow-1" id="example-job-search" name="example-job-search" placeholder="Search card..">
                                <button type="submit" class="btn btn-hero-lg btn-hero-primary flex-grow-1 flex-sm-grow-0">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div>
                        <p class="px-2 px-sm-4 font-size-h3 text-dark mb-0">230</p>
                        <p class="text-muted mb-0">
                            Collections
                        </p>
                    </div>
                    <div class="px-2 px-sm-4 ml-2 ml-sm-4 border-left">
                        <p class="font-size-h3 text-dark mb-0">2,960</p>
                        <p class="text-muted mb-0">
                            Cards
                        </p>
                    </div>
                    <div class="px-2 px-sm-4 ml-2 ml-sm-4 border-left">
                        <p class="font-size-h3 text-dark mb-0">980</p>
                        <p class="text-muted mb-0">
                            Members
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        Dashmix JS Core

        Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
        to handle those dependencies through webpack. Please check out assets/_js/main/bootstrap.js for more info.

        If you like, you could also include them separately directly from the assets/js/core folder in the following
        order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

        assets/js/core/jquery.min.js
        assets/js/core/bootstrap.bundle.min.js
        assets/js/core/simplebar.min.js
        assets/js/core/jquery-scrollLock.min.js
        assets/js/core/jquery.appear.min.js
        assets/js/core/js.cookie.min.js
    -->
    <script src="assets/js/dashmix.core.min.js"></script>

    <!--
        Dashmix JS

        Custom functionality including Blocks/Layout API as well as other vital and optional helpers
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Page JS Helpers (jQuery Sparkline plugin) -->
    <script>jQuery(function(){Dashmix.helpers('sparkline');});</script>
    <!-- END Page Content -->
@endsection
