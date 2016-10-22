{{Session::get('message') }}
@extends('front.template')
</br>
<div class="row">
        <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-xs-12">
        <ul class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li><a href="/blog">Мої картки</a></li>
                <li class="active">Інші картки</li>
        </ul>
        </div>
</div>




        @section('main')
                <p><h1 align="center">Інші картки</h1></p>
                <div class="login-page">
                        <div class="list-group">
                        @foreach($blogs as $data)
                                        <a href="#" class="list-group-item">
                                                {{ $data->recepientID }}

                                </a>
                        @endforeach
                                </div>
                </div>
        @endsection