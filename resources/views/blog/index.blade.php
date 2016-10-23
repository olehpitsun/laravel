{{Session::get('message') }}
@extends('front.template')
</br></br>
<div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
                <ul class="breadcrumb">
                        <li><a href="/">Головна</a></li>
                        <li class="active">Мої картки</li>
                </ul>
        </div>
</div>
<p><h1 align="center">Мої картки</h1></p>
        @section('main')
<div class="row">
                @foreach($blogs as $data)

                        <a  href="cardrel/{{ $data->card_num }}">
                                <div class="panel panel-success">
                                        <div class="panel-heading">
                                                <h3 class="panel-title">{{ $data->card_num }}</h3>
                                        </div>
                                        <div class="panel-body">
                                                {{ $data->date }}
                                        </div>
                                </div>
                        </a>

                @endforeach
</div>
        @endsection