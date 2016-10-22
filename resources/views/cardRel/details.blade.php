{{Session::get('message') }}

@foreach($blogs as $data)
    <p><a href="blog/{{ $data->donID }}">
            {{ $data->myID }}
        </a>
    </p>

@endforeach