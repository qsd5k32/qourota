@extends('layouts.app')
@section('title' , ' - Change password')
@section('content')
    <v-breadcrumbs :items="[
        {
          text: 'Dashboard',
          disabled: false,
          href: '{{ route('home') }}',
        },
        {
          text: 'Setting',
          disabled: false,
          href: '{{ route('setting') }}',
        },
        ]" divider=">"></v-breadcrumbs>

    <v-container>
        <h1>@lang('app.change.password')</h1>
        @if(Session::has('success'))
            <v-alert type="success">{{ Session::get('success') }}</v-alert>
        @endif
        <v-row justify="center">
            <v-col
                cols="12"
                md="8"
            >
                <v-card>
                    <v-form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                        @csrf
                        <v-container class="py-0">
                            <v-row>

                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-text-field
                                        type="password"
                                        label="@lang('app.current.password')"
                                        name="current_password"
                                        class="purple-input"
                                        error-messages="@error('current_password') {{ $message }} @enderror"
                                    ></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-text-field
                                        type="password"
                                        label="@lang('app.new.password')"
                                        name="password"
                                        error-messages="@error('password') {{ $message }} @enderror"
                                        class="purple-input"
                                    ></v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-text-field
                                        type="password"
                                        label="@lang('app.confirm.password')"
                                        name="password_confirmation"
                                        class="purple-input"
                                    ></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    class="text-center"
                                >
                                    <v-btn color="primary" text type="submit">
                                        @lang('app.change.password')
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
            </v-col>
            <v-col
                cols="12"
                md="4"
            >
                <div class="v-card-profile">
                    <v-avatar
                        slot="offset"
                        class="mx-auto d-block elevation-6"
                        size="130"
                    >
                        @php
                            $avatar = "/storage/" . Auth::user()->avatar;
                        @endphp
                        <img
                            src="{{ asset($avatar) }}"
                        >
                    </v-avatar>
                    <v-card-text class="text-center">
                        <h6 class="overline mb-3">
                            @lang('app.amazing.client')
                        </h6>

                        <h4 class="font-weight-light">
                            {{ $user->name }}
                        </h4>
                    </v-card-text>
                </div>
            </v-col>
        </v-row>
    </v-container>
@endsection
@section('style')
    <style>
        .bg-dark-opacity {
            background: rgba(0,0,0,0.60)
        }
    </style>
@stop
