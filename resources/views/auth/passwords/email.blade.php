@extends('layouts.simple')

@section('content')
    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="row no-gutters justify-content-center bg-body-dark">
                <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image"
                        style="background-image: url('assets/media/photos/photo20@2x.jpg');">
                        <div class="row no-gutters">
                            <div class="col-md-6 order-md-1 bg-white">
                                <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                    <!-- Header -->
                                    <div class="mb-2 text-center">
                                        <a class="link-fx font-w700 font-size-h1" href="index.html">
                                            <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                                        </a>
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                                    </div>
                                    <!-- END Header -->

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="js-validation-signin" method="POST"
                                        action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-alt @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="E-mail">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-hero-primary">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>

                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1"
                                                href="{{ route('login') }}">
                                                <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Login
                                            </a>
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1"
                                                href="{{ route('register') }}">
                                                <i class="fa fa-plus text-muted mr-1"></i> New Account
                                            </a>
                                        </p>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                            <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                                <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                    <div class="media">
                                        <a class="img-link mr-3" href="javascript:void(0)">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="/assets/media/avatars/avatar16.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <p class="text-white font-w600 mb-1">
                                                Amazing framework with tons of options! It helped us build our project!
                                            </p>
                                            <a class="text-white-75 font-w600" href="javascript:void(0)">Scott Young, Web
                                                Developer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
