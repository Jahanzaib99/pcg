@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <!-- Page Container -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Collections <small></small></h3>
            </div>
            <div class="block-content block-content-full">
                <div class="d-flex row justify-content-center mt-5">
                    @foreach($sets as $set)
                    <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4 mb-5">
                        <p class="font-size-h3 text-dark mb-0"><img src="{{$set->avatar}}" alt="{{$set->name}}" width="40px"></p>
                        <a href="{{route('collection.cards', $set->id)}}" class="text-muted mb-0">
                            {{$set->name}}
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- END Footer -->
    </div>
    <!-- END Page Container -->
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
