<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<header>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>{{ trans('front/site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Bootswatch:%20Yeti_files/bootstrap.css" media="screen">
    <link rel="stylesheet" href="Bootswatch:%20Yeti_files/custom.css">
    {!! HTML::style('bootstrap.css')!!}
    {!! HTML::style('custom.css')!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
    <script src="../bower_components/respond/dest/respond.min.js"></script>

    {!! HTML::script('html5shiv.js') !!}
    {!! HTML::script('respond.min.js') !!}

    <![endif]-->
    {!! HTML::script('bootstrap.js') !!}
    {!! HTML::script('C6AILKT.js') !!}


<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
    </script>
    <script id="_carbonads_projs" type="text/javascript" src="C6AILKT.js"></script>
    <script type="text/javascript" src="a.html"></script>


        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li {!! classActivePath('/') !!}>
                </li>

                @if(Request::is('auth/register'))
                    <li class="active">
                        {!! link_to('auth/register', trans('front/site.register')) !!}
                    </li>
                @elseif(Request::is('password/email'))
                    <li class="active">
                        {!! link_to('password/email', trans('front/site.forget-password')) !!}
                    </li>
                @else
                    @if(session('statut') == 'visitor')
                        <li {!! classActivePath('login') !!}>

                        </li>
                    @else
                        @if(session('statut') == 'admin')
                            <li>
                                {!! link_to_route('admin', trans('front/site.administration')) !!}
                            </li>
                        @elseif(session('statut') == 'redac')
                            <li>
                                {!! link_to('blog', trans('front/site.redaction')) !!}
                            </li>
                        @endif
                        <li>
                            {!! link_to('/logout', trans('front/site.logout'), ['id' => "logout"]) !!}
                            {!! Form::open(['url' => '/logout', 'id' => 'logout-form']) !!}{!! Form::close() !!}
                        </li>
                    @endif
                @endif

            </ul>
        </div>

        @yield('header')
    @yield('head')

    {!! HTML::style('css/front.css') !!}
</header>

<body>
<div class="navbar navbar-default navbar-fixed-top">
        <div class="bs-component">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Головна</a>
                    </div>
                    <ul class="nav navbar-brand navbar-right">
                        <li><a href="/register">Реєстрація</a></li>
                    </ul>
                    <ul class="nav navbar-nav">

                        <li {!! classActivePath('/') !!}>
                        </li>

                        @if(Request::is('auth/register'))
                            <li class="active">
                                {!! link_to('auth/register', trans('front/site.register')) !!}
                            </li>
                        @elseif(Request::is('password/email'))
                            <li class="active">
                                {!! link_to('password/email', trans('front/site.forget-password')) !!}
                            </li>
                        @else
                            @if(session('statut') == 'visitor')
                                <li {!! classActivePath('login') !!}>

                                </li>
                            @else
                                @if(session('statut') == 'admin')
                                    <li>
                                        {!! link_to_route('admin', trans('front/site.administration')) !!}
                                    </li>
                                @elseif(session('statut') == 'redac')
                                    <li>
                                        {!! link_to('blog', trans('front/site.redaction')) !!}
                                    </li>
                                @endif
                                <li>
                                    {!! link_to('/logout', trans('front/site.logout'), ['id' => "logout"]) !!}
                                    {!! Form::open(['url' => '/logout', 'id' => 'logout-form']) !!}{!! Form::close() !!}
                                </li>
                            @endif
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
</div>




    <main class="container">
        @if(session()->has('ok'))
            @include('partials/error', ['type' => 'success', 'message' => session('ok')])
        @endif  
        @if(isset($info))
            @include('partials/error', ['type' => 'info', 'message' => $info])
        @endif
        @yield('main')
    </main>

    <footer>
        @yield('footer')
        <p class="text-center"><small>Copyright &copy;</small></p>
    </footer>
        
    {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js') !!}
    {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
            })
        });
    </script>

    @yield('scripts')

  </body>
</html>