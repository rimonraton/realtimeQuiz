@extends('layouts.authentication')
@section('authenticate')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/reg.jpg')}}) no-repeat center center; background-size: cover;">

        <div class="auth-box p-4 bg-white rounded">
            <div class="form-group mb-0">
                <div class="col-sm-12 text-center ">
                    <img src="{{asset('images/logo.jpg')}}" alt="" width="50px">
                </div>
            </div>
            <div>
                <div class="logo">
                    <h3 class="box-title mb-3">Reset Password</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('password.update') }}">
                            @csrf
{{--                            <input type="hidden" name="token" value="{{ $token }}">--}}
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"  placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="New Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-xs-12">
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">--}}
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                                </div>
                            </div>
                            <div class="form-group text-center mb-3">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
