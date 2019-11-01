@extends('layouts.master')

@push('title')
<title>Registrasi</title>
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
    <div class="mai-wrapper mai-sign-up">
        <div class="main-content container">
            <div class="splash-container row">
                <div class="col-sm-12 form-message">
                    <!-- <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-img mb-4"> -->
                    <span class="splash-description text-center">Aplikasi Notulen</span>
                    <span class="splash-description text-center mb-5">Prospective</span>
                    <span class="splash-description text-center mb-5">Daftarkan akun anda</span>

                    @include('partials.flash')

                    <form class="sign-up-form" method="POST" action="{{ url('register') }}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-user"></i>
                                </span>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Nama Lengkap*" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-mail"></i>
                                </span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email*">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-user"></i>
                                </span>
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" autocomplete="address" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-user"></i>
                                </span>
                                <input id="current_position" type="text" class="form-control" name="current_position" value="{{ old('current_position') }}" autocomplete="current_position" placeholder="Jabatan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-phone"></i>
                                </span>
                                <input id="primary_contact" type="text" class="form-control" name="primary_contact" value="{{ old('primary_contact') }}" autocomplete="primary_contact" placeholder="Kontak Utama*">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon s7-phone"></i>
                                </span>
                                <input id="secondary_contact" type="text" class="form-control" name="secondary_contact" value="{{ old('secondary_contact') }}" autocomplete="secondary_contact" placeholder="Kontak Sekunder">
                            </div>
                        </div> 
                        <div class="form-group inline row">
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon s7-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon s7-lock"></i>
                                    </span>
                                    <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi*">
                                </div>
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

                        <div class="form-group sign-up-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Daftar
                            </button>
                        </div>

                        <p class="conditions">Pendaftaran memerlukan persetujuan admin</p>

                    </form>

                    <span class="alternative-message text-center mt-4">Sudah memiliki akun? <a href="{{ route('login') }}">Login</a>

                    <div class="out-links"><a href="http://aurasoft.co">© {{ date('Y') }} Prospective</a></div>

                    <p>{{ $errors }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection