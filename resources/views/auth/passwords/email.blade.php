@extends('layouts.authentication')
@section('authenticate')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/reg.jpg')}}) no-repeat center center; background-size: cover;">
        <div class="auth-box p-4 bg-white rounded">
            <div><div class="form-group">
                    <div class="col-sm-12 text-center ">
                        <img src="{{asset('images/logobe.png')}}" alt="" width="50px">
                    </div>
                </div>
                <div class="logo">
                    <h3 class="mb-3">{{__('auth.recover_password')}}</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{app()->getLocale()=='gb'?session('status'):'আমরা আপনার পাসওয়ার্ড রিসেট লিঙ্কটি ইমেল করেছি!' }}
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('password/reset') }}" class="btn btn-warning">
                                        {{__('auth.retry_password')}}
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-primary">
                                        {{__('auth.login')}}
                                    </a>
                                </div>
                            </div>

                        @else
                        <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-12">
{{--                                    <input class="form-control" type="text" required="" placeholder="Email">--}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('form.email')}}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12">
                                    <button class="btn btn-block btn-lg btn-info" type="submit">{{__('auth.reset')}}</button>
                                </div>
                            </div>
                        </form>
                            <div class="form-group text-center">
                                <div class="col-xs-12">
                                    <a href="{{route('login')}}" class="" >{{__('auth.back_to_login')}}</a>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
