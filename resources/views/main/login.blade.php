@extends('layouts.main')

@section('content')

<main>
    <!-- signin__area start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/slider/top.jpg" >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Вход</h1>
                        <div class="page__title-breadcrumb">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="signin__area po-rel-z1 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">
                        <div class="sign__form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
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
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Пароль') }}" required>
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

                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember" name="remember">
                                            <label for="remember">
                                                {{ __('Запомнить меня') }}
                                            </label>
                                        </div>
                                    </div>
                                    <p>Нет акаунта? <a href="{{ route('register') }}">Зарегистрировать</a></p>
                                    <!-- /.col -->

                                        <button type="submit" class="btn-tp w-100">{{ __('Вход') }}</button>

                                    <!-- /.col -->
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
