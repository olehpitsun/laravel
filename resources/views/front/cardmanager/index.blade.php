@extends('front.template')

@section('main')

    <div class="row">

    @foreach($posts as $post)
        <div class="box">
            <div class="col-lg-12 text-center">
                <h2>
                <br>
                <small>{!! $post->user->id . ' '. $post->card_num . ' ' . $post->card_num_from !!}</small>
                        {!! session('name') !!}
                    </h2>
                </div>
                <div class="col-lg-12">

                </div>
                <div class="col-lg-12 text-center">
                    {!! link_to('blog/' . $post->slug, trans('front/blog.button'), ['class' => 'btn btn-default btn-lg']) !!}
                    <hr>
                </div>
            </div>
        @endforeach
     
        <div class="col-lg-12 text-center">
            {!! $posts->links() !!}
        </div>

    </div>

@endsection

