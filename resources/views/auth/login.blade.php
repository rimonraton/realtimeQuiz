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
        .auth-wrapper {
            position: relative;
            min-height: 100vh;
        }
        .align-items-center {
            align-items: center !important;
        }


    </style>
</head>
<body>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/cta-bg.jpg')}}) no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded">
        <div class="d-flex justify-content-between">

            <div class="dropdown show">
                <a class="btn btn-default dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://flagcdn.com/40x30/{{ session('locale', config('app.locale')) }}.png">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="{{ url('setLanguage/gb') }}" class="language p-3 ">
                        <img src="https://flagcdn.com/40x30/gb.png">
                        {{ __('msg.english') }}
                    </a><br>
                    <a href="{{ url('setLanguage/bd') }}" class="language p-3 ">
                        <img src="https://flagcdn.com/40x30/bd.png">
                        {{ __('msg.bangla') }}
                    </a>
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="col-sm-12 text-center ">
                    <img src="{{asset('images/logobe.png')}}" alt="" width="50px">
                </div>
            </div>

        </div>

        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">{{__('auth.login')}}</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="">
                                <input id="emailormobile" class="form-control" type="text"  required  autofocus placeholder="{{__('auth.emailOrMobile')}}">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="hidden" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('form.email')}}">
                                <span id="show_msg" class="text-danger"></span>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3 ">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password"
                                   autofocus placeholder="{{__('form.password')}}">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm input-group-text showhide" data-id="password">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <div class="checkbox checkbox-info pt-0">
                                    <input id="remember" type="checkbox" name="remember" class="material-inputs chk-col-indigo" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" style="font-size: 14px;"> {{__('auth.remember_me')}} </label>
                                </div>
                                <div class="ml-3">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" id="to-recover" class="text-success float-right">
                                            <i class="fa fa-lock mr-1"></i> {{__('auth.forgot_pwd')}}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                    {{__('auth.login')}}</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                <div class="social mb-3">
                                    <a href="{{ url('login/facebook') }}" class="btn  btn-primary btn-sm" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> {{__('form.facebook')}} </a>
                                    <a href="{{ url('login/google') }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google"></i>
                                        {{__('form.google')}} </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 justify-content-center d-flex">
                                <p>{{__('auth.do_not_have_account')}} <a href="{{ route('register') }}" class="text-info font-weight-normal ml-1">{{__('auth.register')}}</a></p>
                            </div>
                        </div>
                    </form>
{{--                    @if(Session::has('status'))--}}
{{--                        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('status') }}</p>--}}
{{--                    @endif--}}
                    <div class="form-group mb-0 mt-4">
                        <div class="col-sm-12 justify-content-center d-flex">
                            <a href="{{ url('/') }}" class="text-white font-weight-normal ml-1 btn btn-info">{{__('auth.go_to_home')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(function (){
        $('#show').on('click',function (e){
            e.preventDefault();
            $('#hide').removeClass('d-none');
            $(this).addClass('d-none');
            $('#password').attr('type','text');

        })
        $('#hide').on('click',function (e){
            e.preventDefault();
            $('#show').removeClass('d-none');
            $(this).addClass('d-none');
            $('#password').attr('type','password');

        })
        $('.showhide').on('click',function (e){
            e.preventDefault();
            let did = '#'+$(this).attr('data-id');
            let textIcon = '<i class="fas fa-eye"></i>';
            let passIcon = '<i class="fas fa-eye-slash"></i>';
            let textOrPassword = $(did).attr('type');
            $(did).focus();
            if (textOrPassword === 'password') {
                $(this).html(textIcon);
                $(did).attr('type', 'text');
            }
            else {
                $(this).html(passIcon);
                $(did).attr('type', 'password');
            }
        })
        $(document).on('focusout','#emailormobile',function (){
            var emailaddress = $(this).val();
            if (emailaddress != ''){
                if( validateEmail(emailaddress)) {
                    UserCedential(emailaddress);
                }
                else{
                    if(is_numeric(emailaddress))  {
                        if(!emailaddress.match('[0-9]{11}')){
                            $('#show_msg').removeClass('d-none');
                            $('#show_msg').html('{{__('auth.mobile_11_no')}}');
                        }
                        else{
                            if(emailaddress.length > 11){
                                $('#show_msg').removeClass('d-none');
                                $('#show_msg').html('{{__('auth.mobile_11_no')}}');
                            }
                            else{
                                UserCedential(emailaddress);
                            }
                        }
                        // alert("Please put 10 digit mobile number");
                        // return;
                    }
                    else{
                        $('#show_msg').removeClass('d-none');
                        $('#show_msg').html('{{__('auth.valid_email')}}');
                    }
                }
            }

        });
        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test( $email );
        }
        function is_numeric(value){
            return /^\d*$/.test(value);
        }
        $('#emailormobile').keyup(function (){
            $('#show_msg').addClass('d-none');
        })
        function UserCedential(value){
            $.ajax({
                url:"{{url('user_cedential')}}/" + value,
                type:"GET",
                success:function (data){

                    if (data == '0'){
                        $('#show_msg').removeClass('d-none');
                        $('#show_msg').html('{{__('auth.not_registered_user')}}');
                    }
                    else {
                        $('#email').val(data);

                    }
                }
            })
        }
    })
</script>
</body>

</html>

