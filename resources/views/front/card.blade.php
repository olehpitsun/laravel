@extends('front.template')

@section('main')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>Привіт
                <h2 class="intro-text text-center">{{ trans('front/contact.title') }}</h2>
                <hr>
                <p>{{ trans('front/contact.text') }}</p>
                {!! Form::open(['url' => 'card']) !!}
                <div class="row">
                    {!! Form::controlBootstrap('text', 10, 'myID', $errors, trans('Мій ID')) !!}
                    {!! Form::controlBootstrap('text', 10, 'donID', $errors, trans('ID')) !!}
                    {!! Form::text('address', '', ['class' => 'hpet']) !!}
                    {!! Form::submitBootstrap(trans('OK'), 'col-lg-12') !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection