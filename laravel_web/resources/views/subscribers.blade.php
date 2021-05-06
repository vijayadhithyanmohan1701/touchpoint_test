<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/6666565380.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  
  <script src="{{asset('js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
         <script src="{{ asset('js/custom.js') }}"></script>
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
                width: 70%;
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
            .card {
                display: inline-block;
                width: 100%;
                margin: 0 auto;
                position: relative;
                /* padding: 15px 0; */
                /* background-color: #dae5ff; */
                margin: 3px 0;
            }
            .card table{
                width:100%;
            }
            .card .card-body {
                padding: 10px 0;
                background-color: #daeeff;
            }
            .email-single button[type="submit"], .email-all button[type="submit"]{
                border: 0;
                padding: 15px;
                background-color: #3e7ddc;
                color: #fff;
                font-size: 16px;
                font-weight: 300;
                width: 100%;
            }
            .form-modal, .form-modal-all {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0,0.4);
            }
            a.trigger-email-all{
                width: 100% !important;
            /* float: none; */
            /* margin: 20px 0 !important; */
            display: inline-block !important;
            margin: 0 !important;
    float: none !important;
    background-color: #33b062 !important;
    color:#fff !important;
            }
            .form-modal form, .form-modal-all form{
                width: 70%;
                margin: 20vh auto;
                padding: 30px;
                background-color: #daeeff;
            }
            a.trigger-email, a.trigger-email-all {
                cursor: pointer;
                color: #000;
                font-weight: bold;
                padding: 10px;
                background-color: #fff;
                transition:0.3s ease;
                float: right;
    margin-right: 20px;
            }
            a.close-modal, a.close-modal-all{
                cursor: pointer;
                color: #fff;
                font-weight: bold;
                padding: 10px;
                background-color: red;
                transition: 0.3s ease;
                float: right;
                margin: 20px;
            }
            a.trigger-email:hover, a.trigger-email-all:hover{
                color:#fff;
                background-color: #2173b8;
                transition:0.3s ease;
            }
            .email-single .input-group, .email-all .input-group {
                display: grid;
                margin-bottom: 20px;
            }
            .email-single label, .email-all label{
                color:#000;
                font-size:16px;
                margin-bottom:5px;
                text-align:left;
                font-weight:700;
            }
            .email-single input[type="text"], .email-all input[type="text"]{
                padding: 15px;
                border:0;
            }
            .email-single textarea {
                padding: 15px;
                border:0;
            }
            .alert.alert-success {
                font-weight: bold;
                color: green;
                width: auto;
            }
            .subscribers-table h3{
                text-align: left;
                margin-left: 20px;
            }
            .delete-action{
                cursor: pointer;
                color: #fff;
                font-weight: bold;
                padding: 10px;
                background-color: red;
                transition: 0.3s ease;
                float: right;
                margin-right: 20px;
                border:0;
            }
            .toggle-action, .toggle-action-delete{
                width:20%;
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
                    Subscribers
                </div>
                @if(Session::has('success'))
                                <div>
                                    <span>
                                        <div class="alert alert-success">
                                        <i class="fa fa-check"></i> {{Session::get('success')}} <b>{{Session::get('username')}}</b>
                                        </div>
                                    </span>
                                </div>
                                @endif
                @if(Session::has('successall'))
                <div>
                                    <span>
                                        <div class="alert alert-success">
                                        <i class="fa fa-check"></i> {{Session::get('successall')}}
                                        </div>
                                    </span>
                                </div>
                @endif
                @foreach ($subscribers as $subscriber)
                <div class="card">

                    <div class="card-body">
                        <table class="table table-striped subscribers-table">
                                <tr>
                                    <td>
                                        <h3>{{ $subscriber->name }}</h3>
                                        
                                    </td>
                                    <td class="text-right toggle-action">
                                        <a class="trigger-email"><i class="fa fa-envelope-o"></i> Email</a>
                                        <div class="form-modal">
                                            <a class="close-modal"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                                            <form method="POST" action="{{ route('subscribers.update') }}" class="email-single" id="subscriber_{{ $subscriber->id }}">
                                                @csrf
                                                <div class="input-group">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" name="subject" value="" />
                                                </div>
                                                <div class="input-group">
                                                    <label for="subject">Message</label>
                                                    <textarea rows="20" name="message" value="" class="message"></textarea>
                                                    <script>
                                                        tinymce.init({
                                                            selector:'textarea.message',
                                                            width: 650,
                                                            height: 300
                                                        });
                                                    </script>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ $subscriber->id }}" />
                                                <button type="submit" class="btn btn-primary">Send mail</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="text-right toggle-action-delete">
                                        <form action="{{ url('subscribers/'.$subscriber->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger delete-action">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                
                        </table>
                    </div>
                </div>
                 @endforeach
                
                 <div class="form_email_all">
                     
                    <a class="trigger-email-all"><i class="fa fa-envelope-o"></i> Email all subscribers</a>
                    <div class="form-modal-all">
                        <a class="close-modal-all"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                        <form method="POST" action="{{ route('subscribers.update') }}" class="email-all" id="subscriber_all">
                            @csrf
                            <div class="input-group">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" value="" />
                            </div>
                            <div class="input-group">
                                <label for="subject">Message</label>
                                <textarea rows="20" name="message" value="" class="message"></textarea>
                                <script>
                                    tinymce.init({
                                        selector:'textarea.message',
                                        width: 650,
                                        height: 300
                                    });
                                </script>
                            </div>
                            <input type="hidden" name="user_id" value="all" />
                            <button type="submit" class="btn btn-primary">Send mail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
