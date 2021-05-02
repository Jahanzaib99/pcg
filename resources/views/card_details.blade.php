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
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Card details</h1>
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
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Population report</h3>
            </div>
            <div class="block-content">
                <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <img src="https://pokemonprice.com/Content/images/cards/base-set/alakazam-base-set-bs-1.jpg" width="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="d-flex row mt-5 mb-5">
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">100</p>
                                <p class="text-muted mb-0">
                                    PSA1
                                </p>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">20</p>
                                <p class="text-muted mb-0">
                                    PSA2
                                </p>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">900</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA3
                                </a>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">87</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA4
                                </a>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">788</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA5
                                </a>
                            </div><div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">232</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA6
                                </a>
                            </div><div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">122</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA7
                                </a>
                            </div><div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">122</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA8
                                </a>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">232</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA9
                                </a>
                            </div>
                            <div class="px-2 col-sm-3 px-sm-4 ml-2 ml-sm-4">
                                <p class="font-size-h3 text-dark mb-0">234</p>
                                <a href="#" class="text-muted mb-0">
                                    PSA10
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Detail <small></small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">Sale Date</th>
                        <th>Grade</th>
                        <th>Price</th>
                        <th>Auction Id</th>
                        <th>Seller Id</th>
                        <th>PSA Cert Number</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Sale type</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($card_details as $detail)
                        <tr>
                            <td class="">
                                {{$detail->sale_date}}
                            </td>
                            <td class="">
                                {{$detail->grade}}
                            </td><td class="">
                                {{$detail->price}}
                            </td>
                            <td class="">
                                {{$detail->auction_id}}
                            </td>
                            <td class="">
                                {{$detail->seller_id}}
                            </td>
                            <td class="">
                                {{$detail->psa_cert_number}}
                            </td>
                            <td class="">
                                {{$detail->sale_type}}
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
