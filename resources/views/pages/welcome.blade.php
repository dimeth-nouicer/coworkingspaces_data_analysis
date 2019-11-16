<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

        <title>Laravel</title>

       
    </head>
    <body>
        <div id="app">

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div>
                    Welcome!
                </div>
                <div>
                        <router-view name="Home"></router-view>
                        <router-view></router-view>
                </div>
                <p>this is the beginning of your laravel project </p>
                    @foreach($stories as $story)
                    <div>
                        <h3> {{$story->title}} </h3>
                        <p> {{ substr($story->body, 0, 300)}}{{ strlen($story->body) > 300 ? "..." : "" }} </p>
                        <a href=" {{url('blog/'.$story->slug) }} ">Read More</a>
                    </div>

                    @endforeach



                </div> 
                <script src="{{ asset('js/app.js') }}"></script>
   
    </body>
</html>
