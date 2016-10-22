@extends('front.template')

@section('main')
    <div class="login-page">
        <div class="form">
            @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif
                <hr>
                <h2 class="intro-text text-center">Увійти</h2>
                <hr>

                {!! Form::open(['url' => 'login']) !!}

                    <div class="row">

                        {!! Form::controlBootstrap('text', 12, 'log', $errors, trans('front/login.log')) !!}
                        {!! Form::controlBootstrap('password', 12, 'password', $errors, trans('front/login.password')) !!}
                        {!! Form::submitBootstrap("OK", 'col-lg-12') !!}
                        {!! Form::checkboxBootstrap('memory', trans('front/login.remind')) !!}

                        <p class="message">Не зареєстровані? <a href="/register">Зареєструватися</a></p>
                    </div>

                {!! Form::close() !!}



            </div>
        </div>
@endsection

