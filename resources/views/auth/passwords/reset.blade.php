

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
        .show {
            position: absolute;
            right: 21px;
            top: 73px;
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
        <div class="form-group">
            <div class="col-sm-12 text-center ">
                <img src="{{asset('images/logobe.png')}}" alt="" width="50px">
            </div>
        </div>
        <div>
            <div class="logo">
                <h3 class="box-title mb-3">{{__('auth.reset_password')}}</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group mb-3 ">
                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"  placeholder="{{__('form.email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 ">
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
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-group ">
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
                        <div id="divCheckPasswordMatch" class="mb-3"></div>

                        <div class="form-group text-center mt-3">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                    {{__('auth.reset')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function (){
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
            checkPasswordMatch();
        })
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password-confirm").val();
            var pass_match = "{{__('form.password_matched')}}";
            var pass_not_match = "{{__('form.password_not_matched')}}";

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html(pass_not_match).addClass('text-danger').removeClass('text-success');

            else
                $("#divCheckPasswordMatch").html(pass_match).addClass('text-success').removeClass('text-danger');
        }
    })

</script>

</body>

</html>


