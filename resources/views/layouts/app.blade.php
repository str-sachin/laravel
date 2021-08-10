<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            .notification {
                background: red;
                color: white;
                padding: 5px;
            }

            .notification:empty {
                display: none;
            }
        </style>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.min.css" rel="stylesheet" />
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif @else

                            <ul class="nav-item dropdown">
                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell" style="margin-top: 13.5px; margin-right: 10px;">
                                        @if (auth()->user()->unreadnotifications->count())
                                        <span class="badge badge-light"> {{ auth()->user()->unreadnotifications->count() }} </span>
                                        @endif
                                    </i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a style="color: blue;" href="{{ route('markRead') }}">
                                            <i style="margin-left: 20px; background: white;">Mark all as Read</i>
                                        </a>
                                    </li>
                                    <br />

                                    <?php $count = 0; ?>
                                    @foreach (auth()->user()->unreadnotifications as $notification)
                                    <?php if($count == 4) break; ?>
                                    <?php $count++; ?>
                                    <li style="background-color: lightgray;">
                                        <a href="">{{$notification[0]['data']['data']}}</a>
                                        <a class="dropdown-item" href="{{ url('ReadNotification') }}/{{ $notification->id }}" data-id="{{$notification->id}}">
                                            <p>
                                                <i>
                                                    {{ $notification['data']['subject']}} <br />
                                                    (Msg.{{ $notification['data']['message']}})
                                                </i>
                                            </p>
                                        </a>
                                    </li>
                                    @endforeach

                                    <?php $count = 0; ?>
                                    @foreach (auth()->user()->readNotifications as $notification)
                                    <?php if($count == 3) break; ?>
                                    <?php $count++; ?>
                                    <a href="#">{{$notification[0]['data']['data']}}</a>
                                    <a class="dropdown-item" href="shownotificationinuser?id={{$notification->id}}">
                                        <p>
                                            <i>{{$notification['data']['subject']}}</i>
                                        </p>
                                    </a>
                                    @endforeach
                                    <li>
                                        <a style="color: blue;" href="shownotificationinuser">
                                            <i style="margin-left: 20px; background: white;">See All</i>
                                        </a>
                                    </li>
                                </div>
                            </ul>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
