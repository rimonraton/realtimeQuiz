<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logobe.png') }}">
    <title>{{ config('app.name', 'Gyankosh') }}</title>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <style>
        body {
            font-family: Poppins,sans-serif;
            font-size: .875rem;
            font-weight: 300;
            line-height: 1.5;
            color: #67757c;
            text-align: left;
        }
        .auth-wrapper .auth-box {
            box-shadow: 1px 0 20px rgba(0,0,0,.08);
            /*margin: 2% 0;*/
            max-width: 400px;
            width: 90%;
            /*min-height: 100vh;*/
        }
        .auth-wrapper {
            position: relative;
            min-height: 100vh;
        }
        .align-items-center {
            align-items: center !important;
        }
        .show {
            position: absolute;
            right: 21px;
            top: 74px;
        }
        .show {
            position: absolute;
            right: 18px;
            top: 182px;
        }
        .name_astarik {
            position: absolute;
            top: 75px;
            left: 21px;
        }
        .email_astarik {
            position: absolute;
            top: 128px;
            left: 21px;
        }
        .password_astarik {
            position: absolute;
            top: 182px;
            left: 21px;
        }
        .confirm_password_astarik {
            position: absolute;
            top: 234px;
            left: 21px;
        }
        /*.wd{*/
        /*    width: 30%;*/
        /*}*/
        /*@media screen and (min-device-width: 480px) {*/
        /*    .wd{*/
        /*        width: 90%;*/
        /*    }*/
        /*}*/

        /*@media (min-width:768px) {*/
        /*    .wd{*/
        /*        width: 90%;*/
        /*    }*/
        /*}*/

    </style>
</head>

<body>

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
                        <div class="form-group row justify-content-between mb-0">
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


</body>

</html>


