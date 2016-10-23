{{Session::get('message') }}

@extends('front.template')

</br></br>
<div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
        <ul class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li><a href="/blog">Мої картки</a></li>
                <li class="active">Інші картки</li>
        </ul>
        </div>
</div>




        @section('main')
                <p><h1 align="center">Інші картки</h1></p>

                        @foreach($blogs as $data)
                                        <a href="/cardrel/{{ $data->recepientID }}">
                                                <div class="panel panel-default">
                                                        <div class="panel-heading">{{ $data->recepientID }}</div>
                                                        <div class="panel-body">
                                                                {{ $data->created_at }}
                                                        </div>
                                                </div>


                                </a>
                        @endforeach

        @endsection