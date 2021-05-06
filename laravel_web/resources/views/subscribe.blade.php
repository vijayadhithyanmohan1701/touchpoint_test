<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .subscribe-form{
                padding: 30px;
                background-color: #daeeff;
            }
            .subscribe-form input{
                padding: 15px;
                border:0;
            }
            .subscribe-form label{
                color: #000;
                font-size: 16px;
                margin-bottom: 5px;
                text-align: left;
                font-weight: 700;
            }
            form.subscribe-form .form-group {
                margin: 10px 0;
                display:grid;
            }
            form.subscribe-form input[type="submit"]{
                border: 0;
                padding: 15px;
                background-color: #3e7ddc;
                color: #fff;
                font-size: 16px;
                font-weight: 300;
                width: 100%;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
            </div>
           <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif-->
            <div class="top-right links">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ route('subscribe') }}">Subscribe</a>
                        <a href="{{ route('subscribers') }}">View Subscribers</a>
                </div>
            <div class="content">
                <div class="title m-b-md">
                    Subscribe
                </div>
                <!-- Success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form method="post" action="{{ route('subscribe.store') }}" class="subscribe-form">

                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                        <!-- Error -->
                        @if ($errors->has('name'))
                            <div class="error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                        @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                </form>

                
            </div>
        </div>
    </body>
</html>
