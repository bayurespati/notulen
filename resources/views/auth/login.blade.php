@extends('layouts.master')

@push('title')
<title>Notulen App - Login</title>
@endpush

@push('additional_css')
<style>
    /*body {*/
        /*background: url('{{ asset('img/insert background image here') }}');*/
    /*}*/
    .splash-container {
        width: 400px;
    }
</style>
@endpush

@section('content')
    <div class="mai-wrapper mai-login">
        <div class="main-content container">
            <div class="splash-container row">
                <div class="col-sm-12 form-message">
                    <!-- <img src="" alt="logo" class="logo-img mb-4"> -->
                    <span class="splash-description text-center">Aplikasi Notulen</span>
                    <span class="splash-description text-center mb-5">Prospective</span>
                    <span class="splash-description text-center mb-5">Login ke akun anda</span>


                    @include('partials.flash')

                    <form action="{{ route('login') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span>
                                <input name="email" 
                                    id="email" 
                                    type="text" 
                                    placeholder="Email" 
                                    autocomplete="email"
                                    class="form-control" 
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                <input name="password" 
                                    id="password" 
                                    type="password"
                                    autocomplete="current-password" 
                                    placeholder="Password" 
                                    class="form-control">
                            </div>
                        </div>

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                                <div role="alert" class="alert alert-dark alert-danger alert-dismissible">
                                    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                        <span aria-hidden="true" class="s7-close"></span>
                                    </button>
                                    {{--<span class="icon s7-less"></span>--}}
                                    <span>{{ $error }}</span>

                                </div>
                            @endforeach
                        @endif

                        <div class="form-group login-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Login
                            </button>
                        </div>

                        <div class="form-group row login-tools">

                            <div class="col-6 login-remember">
                                <label class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" 
                                        class="custom-control-input"
                                        name="remember" 
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Ingat saya</span>
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="col-6 pt-2 text-right login-forgot-password">
                                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                                </div>
                            @endif
                        </div>
                    </form>

                    <span class="alternative-message text-center mt-4">
                        Belum memiliki akun? 
                        <a href="{{ route('register') }}">Daftar Sekarang</a>
                    </span>

                    <div class="out-links"><a href="#">© {{ date('Y') }} Prospective</a></div>

                </div>
            </div>
        </div>
    </div>
@endsection