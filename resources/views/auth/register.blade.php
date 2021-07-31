@extends('front.master')

@include('components.menu')

@section('content')
    <style>
        #i-menu {
            background: rgba(100, 100, 100, 0.8);
            position: relative;
        }
        .item-contact {
            display: none;
        }
        .item-faq {
            margin-right: 50px;
        }
    </style>

    <div class="container-fluid " style="background-color: #ECECEC">
        <div class="container-xl">
            <div style="height: 700px; padding-top: 80px">
                <div class="row justify-content-center mt-4 mb-4">

                    <div class="column col-md-7">
                        <div class="card shadow rounded">
                            <div class="card-header">{{ __('Register') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

{{--                    <div class="column col-md-4 login-pic shadow">--}}

{{--                        <div class="col-10 flag-social"></div>--}}
{{--                        <div class="col-10 title-social">Via social media</div>--}}

{{--                        <div class="row social">--}}
{{--                            <div class="around-pic">--}}
{{--                                <a href="#"><img src="/img/icons/F.png" class="pic-social b-f"></a>--}}
{{--                            </div>--}}
{{--                            <div class="around-pic">--}}
{{--                                <a href="#"><img src="/img/icons/G.png" class="pic-social"></a>--}}
{{--                            </div>--}}
{{--                            <div class="around-pic">--}}
{{--                                <a href="#"><img src="/img/icons/T.png" class="pic-social"></a>--}}
{{--                            </div>--}}
{{--                            <div class="around-pic">--}}
{{--                                <a href="#"><img src="/img/icons/LI.png" class="pic-social"></a>--}}
{{--                            </div>--}}
{{--                            <div class="around-pic">--}}
{{--                                <a href="#"><img src="/img/icons/I.png" class="pic-social"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="label login-message-social">--}}
{{--					<span class="text-login-message">You can register or log in to your account via social media. Either--}}
{{--						they will ask for a password or you should be logged in to the network.</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
