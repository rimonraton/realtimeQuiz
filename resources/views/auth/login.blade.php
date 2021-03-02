@extends('layouts.authentication')
@section('authenticate')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/cta-bg.jpg')}}) no-repeat center center; background-size: cover;">
        <div class="auth-box p-4 bg-white rounded">
            <div class="form-group mb-0">
                <div class="col-sm-12 text-center ">
                    <img src="{{asset('images/logo.jpg')}}" alt="" width="50px">
                </div>
            </div>
            <div id="loginform">
                <div class="logo">
                    <h3 class="box-title mb-3">Log In</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="">
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="checkbox checkbox-info pt-0">
                                        <input id="remember" type="checkbox" name="remember" class="material-inputs chk-col-indigo" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember"> Remember me </label>
                                    </div>
                                    <div class="ml-auto">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" id="to-recover" class="text-success float-right">
                                                <i class="fa fa-lock mr-1"></i> Forgot Your Password?
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                    <div class="social mb-3">
{{--                                                                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>--}}
                                        <a href="{{ url('login/google') }}" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <div class="col-sm-12 justify-content-center d-flex">
                                    <p>Don't have an account? <a href="{{ route('register') }}" class="text-info font-weight-normal ml-1">Register</a></p>
                                </div>
                            </div>
                        </form>
                        <div class="form-group mb-0 mt-4">
                            <div class="col-sm-12 justify-content-center d-flex">
                                <a href="{{ url('/') }}" class="text-white font-weight-normal ml-1 btn btn-info">Go to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
