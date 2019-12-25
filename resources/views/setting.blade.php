@extends('layouts.app')
@section('title' , ' - Setting')
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
        <h1>@lang('app.setting')</h1>
        @if(Session::has('success'))
            <v-alert type="success">{{ Session::get('success') }}</v-alert>
        @endif
        <v-row justify="center">
            <v-col
                cols="12"
                md="8"
            >
                <v-card>
                    <v-form method="POST" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        <v-container class="py-0">
                            <v-row>

                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-text-field
                                        label="@lang('app.email')"
                                        name="email"
                                        class="purple-input"
                                        error-messages="@error('email') {{ $message }} @enderror"
                                        value="{{ $user->email }}"
                                    ></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-text-field
                                        label="@lang('app.name')"
                                        name="name"
                                        value="{{ $user->name }}"
                                        error-messages="@error('name') {{ $message }} @enderror"
                                        class="purple-input"
                                    ></v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="12"
                                >
                                    <v-file-input
                                        label="@lang('app.avatar')"
                                        messages="if you din't want to change photo keep it empty"
                                        name="avatar"
                                        accept="image/*"
                                        error-messages="@error('avatar') {{ $message }} @enderror"
                                    ></v-file-input>
                                </v-col>

                                <v-col
                                    cols="12"
                                    class="text-center"
                                >
                                    <v-btn color="primary" text type="submit">
                                        @lang('app.save')
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
