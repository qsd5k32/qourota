@extends('layouts.app')

@section('content')
    <v-container>
        <v-row
            align="center"
            justify="center"
        >
            <v-col
                cols="12"
                sm="8"
                md="4"
            >
                <h1 class="display-2 text-center font-weight-black">{{ setting('site.title') }}</h1>
                <v-form method="post" action="{{ route('password.update') }}" lazy-validation>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <v-text-field
                        color="primary"
                        label="@lang('app.email')"
                        value="{{ $email ?? old('email') }}"
                        name="email"
                        :rules="[v => !!v || 'this field is required' , v => /.+@.+\..+/.test(v) || 'E-mail must be valid',]"
                        error-messages="@error('email') {{ $message }} @enderror"
                        prepend-icon="mdi-at"
                        type="email"
                        required
                    ></v-text-field>
                    <v-text-field
                        color="primary"
                        id="password"
                        :rules="[v => !!v || 'this field is required']"
                        error-messages="@error('password') {{ $message }} @enderror"
                        label="@lang('app.password')"
                        name="password"
                        prepend-icon="mdi-lock"
                        type="password"
                    ></v-text-field>
                    <v-text-field
                        color="primary"
                        id="password"
                        :rules="[v => !!v || 'this field is required']"
                        label="@lang('app.confirm.password')"
                        name="password_confirmation"
                        prepend-icon="mdi-lock"
                        type="password"
                    ></v-text-field>

                    <v-btn color="primary" type="submit" dark>@lang('app.reset')</v-btn>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
@endsection
