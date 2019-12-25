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
                @if (session('status'))
                    <v-alert
                        type="success"
                        class="mb-4"
                    >
                        {{ session('status') }}
                    </v-alert>
                @endif
                <v-form method="post" action="{{ route('password.email') }}" lazy-validation>
                    @csrf

                    <v-text-field
                        color="primary"
                        label="@lang('app.email')"
                        value="{{ old('email') }}"
                        name="email"
                        :rules="[v => !!v || 'this field is required' , v => /.+@.+\..+/.test(v) || 'E-mail must be valid',]"
                        error-messages="@error('email') {{ $message }} @enderror"
                        prepend-icon="mdi-at"
                        type="email"
                        required
                    ></v-text-field>
                    <v-btn text color="primary" type="submit">@lang('app.send.reset.link')</v-btn>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
@endsection
