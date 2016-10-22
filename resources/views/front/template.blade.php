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

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }
    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }
    .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
    }
    .container .info {
        margin: 50px auto;
        text-align: center;
    }
    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }
    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }
    .container .info span a {
        color: #000000;
        text-decoration: none;
    }
    .container .info span .fa {
        color: #EF3B3A;
    }
    body {
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    </style>
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
            <nav class="navbar ">
                <div class="container-fluid">
                    <div class="navbar">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    </div>
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
        <p class="text-center"><small>Copyright &copy; Momo</small></p>
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