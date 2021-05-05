@extends('Admin.Layout.dashboard')
@section('css')
<style>
    picture-container {
        position: relative;
        cursor: pointer;
        text-align: center;
    }

    .picture {
        width: 100px;
        height: 100px;
        /* position: absolute; */
        /* background-color: #999999; */
        /* border: 4px solid #CCCCCC; */
        /* color: #FFFFFF; */
        /* border-radius: 50%; */
        margin: 0px auto;
        /*  overflow: hidden; */
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
    }

    @media only screen and (max-width: 600px) {
        .picture {
            position: relative;
        }
    }

    .picture:hover {
        border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
        border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
        border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
        border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
        border-color: #ff3b30;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 40%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        align-items: center;
        top: 8%;
        width: 100%;
    }

    .picture-src {
        width: 100%;

    }
</style>
@endsection
@section('content')
    <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="mt-4">
                    <img src="{{asset($userInfo->avatar?$userInfo->avatar:'Admin/assets/images/users/1.png')}}" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-2">{{$userInfo->name}}</h4>
                    <h6 class="card-subtitle">{{$userInfo->info?$userInfo->info->slogan:''}}</h6>
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body">
                <small class="text-muted">{{__('form.email')}} </small>
                <h6>{{$userInfo->email}}</h6>
                <small class="text-muted pt-4 db">{{__('form.phone')}}</small>
                <h6>01737538343</h6>
                <small class="text-muted pt-4 db">{{__('form.address')}}</small>
                <h6>Dhaka, Mirpur DOHS</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('form.profile')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{__('form.setting')}}</a>
                </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-3 col-xs-6 b-r"> </div> -->
                            <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('form.full_name')}}</strong>
                                <br>
                                <p class="text-muted">{{$userInfo->name}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>{{__('form.mobile')}}</strong>
                                <br>
                                <p class="text-muted">01737538343</p>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r"> <strong>{{__('form.email')}}</strong>
                                <br>
                                <p class="text-muted">{{$userInfo->email}}</p>
                            </div>
                            <div class="col-md-2 col-xs-6"> <strong>{{__('form.location')}}</strong>
                                <br>
                                <p class="text-muted">
                                    <img src="https://flagcdn.com/40x30/{{ \Str::lower($geoip->getCountryCode()) }}.png">
                                    {{$geoip->getCountry()}}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <p class="mt-4">@if($userInfo->info){{$userInfo->info->about}}@endif</p>
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                        <!-- <h4 class="font-medium mt-4">Skill Set</h4>
                        <hr>
                        <h5 class="mt-4">Wordpress <span class="pull-right">80%</span></h5>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5 class="mt-4">HTML 5 <span class="pull-right">90%</span></h5>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5 class="mt-4">jQuery <span class="pull-right">50%</span></h5>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5 class="mt-4">Photoshop <span class="pull-right">70%</span></h5>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                        </div> -->
                    </div>
                </div>
                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="Post" action="{{url('profile/update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$userInfo->id}}" name="uid">
                            <div class="form-group">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{asset($userInfo->avatar?$userInfo->avatar:'Admin/assets/images/users/1.png')}}" class="picture-src rounded-circle" id="wizardPicturePreview" title="">
                                        <input type="file" id="wizard-picture" name="file" class="" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$userInfo->id}}" name="uid">
                            <div class="form-group">
                                <label class="col-md-12">{{__('form.full_name')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" value="{{$userInfo->name}}" name="name" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">{{__('form.email')}}</label>
                                <div class="col-md-12">
                                    <input type="email" value="{{$userInfo->email}}" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">{{__('form.password')}}</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">{{__('form.phone')}}</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$userInfo->info?$userInfo->info->mobile:''}}" name="mobile" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">{{__('form.slogan')}}</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="slogan" class="form-control form-control-line">{{$userInfo->info?$userInfo->info->slogan:''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">{{__('form.about')}}</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="about" class="form-control form-control-line">{{$userInfo->info?$userInfo->info->about:''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">{{__('form.update_profile')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        function passwordCreatedMsg(){

            toastr.success('{{\Session::get('success')}}', {
                "closeButton": true
            });

        }
        @if (\Session::has('success'))
            passwordCreatedMsg();
        @endif


        // Prepare the preview for profile picture
        $("#wizard-picture").change(function() {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
