{{Session::get('message') }}
@extends('front.template')
</br></br>

<p><h1 align="center">Перелік закладів</h1></p>
@section('main')
    <div class="row">
        @foreach($serviceItems as $data)
                <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="/files/service/{{ $data->img_name }}" width="100%">
                        </div>
                        <div class="panel-footer"><center>{{ $data->title }}</center>
                            <center>Знижка: {{ $data->discount }}</center>
                            <center>{{ $data->address }}</center>

                        </div>
                    </div>
                </div>

        @endforeach
    </div>
@endsection