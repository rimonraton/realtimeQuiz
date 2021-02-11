@extends('Admin.Layout.dashboard')
@section('css')
<style>
    .custom-select {
        display: inline-block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem 1.75rem .375rem .75rem;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #54667a;
        vertical-align: middle;
        background: #fff url("{{asset('images/custom-select.png')}}") no-repeat right .75rem center/8px 5px;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        appearance: none;
    }

    .custom-control {
        padding-left: 0;
    }

    /* body {
        font-family: sans-serif;
        background-color: #eeeeee;
    } */

    .file-upload {
        background-color: #ffffff;
        width: 300px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-content1 {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 0px;
        border: 2px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #4da6ff;
        border: 2px dashed #ffffff;
        /* color: white; */
    }

    .image-dropping,
    .image-upload-wrap:hover #txt {
        /* background-color: #26C6DA; */
        /* border: 2px dashed #ffffff; */
        color: white;
    }

    /* .image-dropping,
    .image-upload-wrap:hover #txt{
        color: #26C6DA;
    } */
    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

    .myadmin-dd .dd-list .dd-item .dd-handle-new {
        background: #fff;
        border: 1px solid rgba(120, 130, 140, .13);
        padding: 8px 16px;
        height: auto;
        font-family: Montserrat, sans-serif;
        font-weight: 400;
        border-radius: 0;
    }

    .dd-handle-new {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        cursor: pointer;
        /* color: #000; */
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #e5e5e5;
        background: #fafafa;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .activeli {
        background-color: #e9ecef !important;
    }
</style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Payment Form</h4>
                <hr>
                <form class="form-horizontal r-separator" id="smtform" action="{{url('')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row pb-3" id="divImage">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input ipf" name="file" type='file' accept="image/*" />
                                    <div class="drag-text">
                                        <h3 id="txt">{{__('form.logo')}}</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" class="remove-image">{{__('form.remove')}} <span class="image-title">{{__('form.uploaded_image')}}</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Institute Name</label>
                                    <div class="col-sm-9">
                                        <input value="" class="form-control" placeholder="Enter Your Institute Name Here.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group row">
                                    <label for="fname2" class="col-sm-6 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input value="{{$user->email}}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group row">
                                    <label for="lname2" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$user->info->mobile}}" class="form-control" placeholder="Type Mobile No">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Payment</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>


@endsection
@section('js')
<script>
    $(function() {
        // file upload
        $('.file-upload-input').on('change', function() {
            var id = $("input[name='customRadio']:checked").attr('id');
            readURL(this);
        });
        $('.remove-image').on('click', function() {
            removeUpload();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content1').hide();
                    $('.file-upload-content').show();
                    $('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);

            } else {
                alert('Success');
                removeUpload();
            }
        }

        function removeUpload() {
            // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.file-upload-content1').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function() {
            // alert('dragover');
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function() {
            // alert('dragleave');
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    })
</script>
@endsection