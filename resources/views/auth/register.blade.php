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
            margin: 2% 0;
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
            top: 4px;
            left: 8px;
            z-index: 9999;
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

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('Landing/assets/img/cta-bg.jpg')}}) no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded wd">


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
                <h3 class="box-title mb-3">{{__('auth.register_header')}}</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form id="registerForm" class="form-horizontal mt-3 form-material" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="col-xs-12">
                                {{--<input class="form-control" type="text" required="" placeholder="Name">--}}
                                <input type="text" class="form-control" name="special_name"   placeholder="{{__('form.special_name_or_nickname')}}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-xs-12">
                                <span class="text-danger name_astarik">*</span>
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
                                <span class="text-danger email_astarik">*</span>
                                {{--                                    <input class="form-control" type="text" required="" placeholder="Email">--}}
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{__('auth.emailOrMobile')}}">
                                <span id="show_msg" class="text-danger"></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3 ">
                            <span class="text-danger password_astarik">*</span>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password"
                                   autofocus placeholder="{{__('auth.new_password')}}">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm input-group-text showhide" data-id="password">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert" id="pass_msg">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="text-danger password_astarik">*</span>
                            <input id="password-confirm"
                                   type="password" class="form-control"
                                   name="password_confirmation"
                                   required autocomplete="new-password"
                                   placeholder="{{__('auth.confirm_password')}}">
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm input-group-text showhide" data-id="password-confirm">
                                    <i class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <div id="divCheckPasswordMatch"></div>

                        <div class="form-group text-center mb-3">
                            <div class="col-xs-12">
                                <button id="smt_btn"
                                        class="g-recaptcha btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"
                                        data-callback='onSubmit'
                                        data-action='submit'
                                        disabled>
                                    {{__('auth.register')}}
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-2 ">
                            <div class="col-sm-12 text-center ">
                                {{__('auth.have_an_account')}} <a href="{{route('login')}}" class="text-info ml-1 ">{{__('auth.login')}}</a>
                            </div>
                        </div>
                    </form>
                    @if(Session::has('status'))
                        <div id="successMessage">
                            <p class="text-center alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('status') }}</p>
                        </div>
                    @endif
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
<script src="https://www.google.com/recaptcha/api.js" defer></script>

<script>
    function onSubmit(token) {
        document.getElementById("registerForm").submit();
    }
    $(function (){
        $("#successMessage").delay(5000).slideUp(300);
        $('#password').on('keypress',function (){
            $('#pass_msg').addClass('d-none');
            $(this).removeClass('is-invalid');
            // console.log('keypress successfull');
        });
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
        $('#password-confirm').keyup(function (){

            if($("#password-confirm").val() != ''){
                checkPasswordMatch();
            }else{
                $("#divCheckPasswordMatch").addClass('d-none');
            }

        })
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password-confirm").val();
            var pass_match = "{{__('form.password_matched')}}";
            var pass_not_match = "{{__('form.password_not_matched')}}";
                if (password != confirmPassword){
                    $('#smt_btn').prop('disabled',true);;
                    $("#divCheckPasswordMatch").removeClass('d-none');
                    $("#divCheckPasswordMatch").html(pass_not_match).addClass('text-danger').removeClass('text-success');
                }
                else{
                    $("#divCheckPasswordMatch").removeClass('d-none');
                    $("#divCheckPasswordMatch").html(pass_match).addClass('text-success').removeClass('text-danger');
                    $('#smt_btn').removeAttr('disabled');
                }
            }
        $(document).on('focusout','#email',function (){
                var emailaddress = $(this).val();
                if( validateEmail(emailaddress)) {
                    return;
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
                        }
                        // alert("Please put 10 digit mobile number");
                        // return;
                    }
                    else{
                        $('#show_msg').removeClass('d-none');
                        $('#show_msg').html('{{__('auth.valid_email')}}');
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

        $('#email').keyup(function (){
            $('#show_msg').addClass('d-none');
        })
    })

</script>

</body>

</html>

