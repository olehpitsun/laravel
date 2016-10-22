{{Session::get('message') }}
@foreach($blogs as $data)
<p>
    {{ $data->card_num }}
    </p>
    @endforeach

