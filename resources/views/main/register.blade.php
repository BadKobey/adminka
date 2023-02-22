@extends('layouts.main')

@section('content')

<main>
    <!-- signin__area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/slider/top.jpg" >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Регистрация</h1>
                        <div class="page__title-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signup__area start -->
    <section class="signup__area po-rel-z1 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">
                        <div class="sign__form">


                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Имя') }}" required autocomplete="name" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('name')
                                    <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Email') }}" required autocomplete="email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('Пароль') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           placeholder="{{ __('Повторите пароль') }}" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <p>У Вас есть акаунт? <a href="{{ route('login') }}"> Войти</a></p>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn-tp w-100">{{ __('Регистрация') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- signin__area end -->

</main>
@endsection
