{{Session::get('message') }}
@extends('front.template')
</br></br>

<p><h1 align="center">Категорії знижок</h1></p>
        @section('main')
<div class="row">
                @foreach($services as $data)
                        <a  href="service/{{ $data->id }}">
                            <div class="col-lg-4 col-md-6 ">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img src="/files/service/{{ $data->img_name }}" width="100%">
                                    </div>
                                    <div class="panel-footer"><center>{{ $data->title }}</center></div>
                                </div>
                            </div>
                        </a>

                @endforeach
</div>
        @endsection