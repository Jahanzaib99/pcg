@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">BASE SET CARDS</h1>
                {{--                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">--}}
                {{--                    <ol class="breadcrumb">--}}
                {{--                        <li class="breadcrumb-item">Examples</li>--}}
                {{--                        <li class="breadcrumb-item active" aria-current="page">Plugin</li>--}}
                {{--                    </ol>--}}
                {{--                </nav>--}}
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
    {{--        <div class="block block-rounded">--}}
    {{--            <div class="block-header block-header-default">--}}
    {{--                <h3 class="block-title">Plugin Example</h3>--}}
    {{--            </div>--}}
    {{--            <div class="block-content">--}}
    {{--                <p>--}}
    {{--                    This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.--}}
    {{--                </p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Cards <small></small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Last sale</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cards as $index => $card)
                        <tr>
                            <td class="text-center">{{$index+1}}</td>
                            <td class="font-w600">
                                <a href="{{route('collection.card.detail', $card->id)}}">{{$card->name}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                @php
                                $cardDetail = \App\Models\CardDetail::select('price')->where('card_id', $card->id)->orderBy('sale_date', 'desc')->first();
                                @endphp
{{--                                {{$cardDetail->sale_price}}--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
