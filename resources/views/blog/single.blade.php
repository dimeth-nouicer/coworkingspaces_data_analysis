<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{$story->title}} </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   {{ $story->title }}
                </div>
                <hr>
                {{ $story->body }}


                <div>
                        @foreach($story->comments as $comment)
                        <hr>
                        <div>
                            <div>
        
                                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}">
                                <div>
                                    <h4>{{ $comment->name }}</h4>
                                    <p>{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                                </div>
        
                            </div>
        
                            <div>
                                {{ $comment->comment }}
                            </div>
        
                        </div>
                       
                    @endforeach
                </div>



                <div>
                    
                    {{ Form::open(['route' => ['comments.store', $story->id], 'method' => 'POST']) }}

                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name', "Name:") }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
    
                        <div class="col-md-6">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
    
                        <div class="col-md-12">
                            {{ Form::label('comment', "Comment:") }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
    
                            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
        
                        
                        {!! Form::close() !!}
                </div>

            </div>
        </div>
    </body>
</html>