<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">

    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div class="d-flex justify-content-end">
                    @auth
                        <a href="{{ url('admin') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="pr-3">Accedi</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="pr-3">Registrati</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div id="root"></div>
             
            </div>
        </div>
        <script src="{{asset('js/front.js')}}" charset="utf-8"></script>
    </body>
</html>
