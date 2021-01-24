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
        width: 600px;
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
        background-color: #26C6DA;
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
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Create Question</h4>
                <hr>
                <form class="form-horizontal r-separator" id="smtform" action="{{url('question/save')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="image" value="image" name="customRadio" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="customRadio4">Image</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="video" value="video" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Video</label>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input ipf" name="file" type='file' accept="image/*" />
                                    <div class="drag-text">
                                        <h3 id="txt">Drag and drop a Image file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                                <div class="file-upload-content1">
                                    <video id="videos" width="400" controls>
                                        <source src="" type="video/*">
                                    </video>
                                    <div class="image-title-wrap">
                                        <button type="button" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Category :</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="questionType" id="category" required>
                                    <option value="">Select Category</option>
                                    @foreach($quizCategory as $qc)
                                    <option value="{{$qc->id}}" id="cat_{{$qc->id}}">{{$qc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Topic :</label>
                            <div class="col-sm-9" id="topic">
                                <select class="form-control custom-select" id="getTopic" name="category" required>
                                    <option value="">Select Topic</option>
                                    @foreach($category as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-3 subtopicDiv" style="display: none;">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Sub Topic :</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="subtopic" id="showsubtopic">
                                    <option value="">Select Sub Topic</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">Question :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="question" placeholder="Type Question here." name="question" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label">Option :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control inpoption" id="option" name="option[]" placeholder="Enter Option" required>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="Yes" data-off-text="No" data-size="normal" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"> Option :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control inpoption" id="option" name="option[]" placeholder="Enter Option" required>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="Yes" data-off-text="No" data-size="normal" />
                            </div>
                        </div>
                        <div id="newOne">

                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-4 text-right control-label col-form-label">
                                <a class="waves-effect waves-light" id="createNew" href="">Add New Option</a>
                            </label>
                        </div>
                        <div class="form-group row  pb-3 pl-5">
                            <label for="option1" class="col-sm-4 text-right control-label col-form-label">
                                <input type="checkbox" class="filled-in chk-col-indigo material-inputs" id="explenation">
                                <label style="font-size: .9rem;" for="explenation">Answer Explenation</label>
                            </label>
                        </div>
                        <div class="form-group row pb-3 exl" style="display: none;">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">Explenation :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="Type Answer Explenation here." name="explenation"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light smt">Create Question</button>
                            <a class="btn btn-success waves-effect waves-light text-white" href="{{url('question/list')}}">Go to List</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $.noConflict();
    $(function() {
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $('.smt').on('click', function(e) {
            var paise = 0;
            $('input[name="ans[]"]').each(function() {
                console.log($(this).val());
                if ($(this).val() == 1) {
                    paise = 1;
                }
            });
            if (paise == 1) {
                $('#smtform').submit();
            } else {
                e.preventDefault();
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please select the answer.',
                })
            }
        })
        // $('#category').on('change', function() {
        //     if ($(this).val() == '3') {
        //         $('.opt3').hide();
        //         $('.optiontf').removeAttr('required');

        //     } else {
        //         $('.opt3').show();
        //         $('.optiontf').attr('required', 'required');

        //     }
        // });
        $('#createNew').on('click', function(e) {
            e.preventDefault();
            var data = '';
            data += `<div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"><i class="ti-close remove" style="color:red;cursor:pointer;"></i> Option :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control inpoption" id="option" name="option[]" placeholder="Enter Option" required>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="Yes" data-off-text="No" data-size="normal" />
                            </div>
                        </div>`;
            $('#newOne').append(data);
            $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('.row').remove();
        });

        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            if (state == true) {
                $(this).closest("div.bt-switch").find(".hi").val('1');
            } else {
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
            }
        });

        // file upload

        $('.file-upload-input').on('change', function() {
            var id = $("input[name='customRadio']:checked").attr('id');
            readURL(this, id);
        });
        $('.remove-image').on('click', function() {
            removeUpload();
        });

        function readURL(input, type) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // alert(input.files + ' - ' +input.files[0]);
                // return;
                if (type == 'image') {
                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();

                        $('.file-upload-image').attr('src', e.target.result);
                        $('.file-upload-content1').hide();
                        $('.file-upload-content').show();

                        $('.image-title').html(input.files[0].name);
                    };
                } else {
                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();

                        // $('.file-upload-image').attr('src', e.target.result);
                        var video = $('#videos')[0];
                        video.src = e.target.result;
                        $('.file-upload-content').hide();
                        $('.file-upload-content1').show();

                        $('.image-title').html(input.files[0].name);
                    };

                    // var video = $('#divVideo video')[0];
                    // video.src = videoFile;
                    // video.load();
                    // video.play();
                }
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


        $('#video').on('change', function() {
            changeVI('Drag and drop a Video file or select add Video', 'video/*');
        })
        $('#image').on('change', function() {
            changeVI('Drag and drop a Image file or select add Image', 'image/*');
        })

        function changeVI(msg, type) {
            $('#txt').html(msg);
            $('.ipf').attr('accept', type);
        }

        $("#explenation").click(function() {
            if (this.checked) {
                $('.exl').show();
                // alert('checked');
            }
            if (!this.checked) {
                $('.exl').hide();
                // alert('Unchecked');
            }
        });

        $('#getTopic').on('change', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{url('question/subtopic')}}/" + id,
                type: "GET",
                success: function(data) {
                    if (data != '') {
                        $('.subtopicDiv').show();
                        $("#showsubtopic").append(data);
                    }
                    else{
                        $('.subtopicDiv').hide();
                    }
                }
            })

        })
    })
</script>
@endsection