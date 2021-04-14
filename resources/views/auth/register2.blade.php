@extends('layouts.authentication')
@section('authenticate')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/reg.jpg')}}) no-repeat center center; background-size: cover;">

        <div class="auth-box p-4 bg-white rounded">
            <div class="form-group mb-0">
                <div class="col-sm-12 text-center ">
                    <img src="{{asset('images/logobe.png')}}" alt="" width="50px">
                </div>
            </div>
            <div>
                <div class="logo">
                    <h3 class="box-title mb-3">{{__('auth.register_header')}}</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="col-xs-12">
{{--                                    <input class="form-control" type="text" required="" placeholder="Name">--}}
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{__('auth.name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
{{--                                    <input class="form-control" type="text" required="" placeholder="Email">--}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{__('form.email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
{{--                                    <input class="form-control" type="password" required="" placeholder="Password">--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{__('form.password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-xs-12">
{{--                                    <input class="form-control" type="password" required="" placeholder="Confirm Password">--}}
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('auth.confirm_password')}}">
                                </div>
                            </div>
{{--                            <div class="form-group mb-3">--}}
{{--                                <div class="">--}}
{{--                                    <div class="checkbox checkbox-success pt-0">--}}
{{--                                        <input id="checkbox-signup" type="checkbox" class="chk-col-indigo material-inputs">--}}
{{--                                        <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group text-center mb-3">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                        {{__('auth.register')}}</button>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-2 ">
                                <div class="col-sm-12 text-center ">
                                    {{__('auth.have_an_account')}} <a href="{{route('login')}}" class="text-info ml-1 ">{{__('auth.login')}}</a>
                                </div>
                            </div>
                        </form>
                        <div class="form-group mb-0 mt-2 ">
                            <div class="col-sm-12 text-center ">
                                <a href="{{url('/')}}" class="text-white ml-1 btn btn-info btn-sm">{{__('auth.go_to_home')}}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
