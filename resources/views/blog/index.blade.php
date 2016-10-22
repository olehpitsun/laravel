{{Session::get('message') }}
@extends('front.template')
</br>
<div class="row">
        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-xs-12">
                <ul class="breadcrumb">
                        <li><a href="/">Головна</a></li>
                        <li class="active">Мої картки</li>
                </ul>
        </div>
</div>
<p><h1 align="center">Мої картки</h1></p>
        @section('main')
<div class="row">
        <div class="col-md-12 col-lg-12" >
                @foreach($blogs as $data)
                        <a href="cardrel/{{ $data->card_num }}">
                                <div class="login-page">
                                        <div class="form">


                                        {{ $data->card_num }}
                                        </div>

                                </div>
                        </a>

                @endforeach
</div></div>
        @endsection