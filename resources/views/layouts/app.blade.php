<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('site.title') }} @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<v-app id="app">
    @if(App::getLocale() === 'ar')
        <app-rtl></app-rtl>
    @endif
    <v-app-bar
        app
        elevate-on-scroll
        style="z-index: 99"
    >
        <app-dark></app-dark>
        <v-toolbar-title><v-btn icon href="@auth {{ route('home') }} @else {{ url('/') }} @endauth"><v-img width="25px" src="{{ asset('storage/'.setting('site.logo')) }}" alt="{{ setting('site.title') }}"></v-img></v-btn></v-toolbar-title>
        <v-spacer></v-spacer>
        @guest
            <v-btn text href="{{ route('login') }}">
                @lang('app.login')
            </v-btn>

            <v-btn text href="{{ route('register') }}">
                @lang('app.register')
            </v-btn>
        @else
            <v-menu
                :close-on-content-click="false"
                :nudge-width="200"
                offset-x
            >
                <template v-slot:activator="{ on }">
                    <v-btn
                        icon
                        v-on="on"
                    >
                        <v-avatar
                            color="color"
                        >
                            <img
                                @php
                                    $avatar = "/storage/" . Auth::user()->avatar;
                                @endphp
                                src="{{ asset($avatar) }}"
                                alt="{{ Auth::user()->name }}"
                            >
                        </v-avatar>
                    </v-btn>
                </template>

                <v-card>
                    <v-list>
                        <v-list-item>
                            <v-list-item-avatar>
                                <img src="{{ asset($avatar) }}" alt="{{ Auth::user()->name }}">
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title>{{ Auth::user()->name }}</v-list-item-title>
                                <v-list-item-subtitle>@lang('app.amazing.client')</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-action>
                                <v-btn icon href="{{ route('setting') }}">
                                    <v-icon>mdi-settings</v-icon>
                                </v-btn>
                            </v-list-item-action>
                        </v-list-item>

                        <v-divider></v-divider>

                        <v-list-item link href="{{ route('password.edit') }}">
                            <v-list-item-icon>
                                <v-icon>mdi-security</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>@lang('app.change.password')</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        @if(Auth::user()->role_id === 2)
                        @elseif (Auth::user()->role_id === 3)
                            <v-list-item link href="{{ route('author.detail') }}">
                                <v-list-item-icon>
                                    <v-icon>mdi-microphone-variant</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>@lang('app.author')</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        @endif
                        <switch-dark></switch-dark>
                    </v-list>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-form method="post" action="{{ route('logout') }}">
                            @csrf
                            <v-btn color="red" text dark type="submit"><v-icon>mdi-power</v-icon>@lang('app.logout')</v-btn>
                        </v-form>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
            </v-menu>
        @endguest

    </v-app-bar>

    <v-content>
        @yield('content')
    </v-content>

    <v-footer
        color="grey darken-3"
    >
        <v-spacer></v-spacer>
        <span>@{{ new Date().getFullYear() }} &copy; <strong>{{ setting('site.title') }}</strong></span>
        <v-spacer></v-spacer>
    </v-footer>
</v-app>
<script src="https://www.google.com/recaptcha/api.js?render=6Lewo78UAAAAAMWUcdxqWKyePqG7Pa14coSQr0O9" async
        defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>

@yield('javascript')

</body>
</html>
