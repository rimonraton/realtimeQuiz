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
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Create Question</h4>
                <hr>
                <form class="form-horizontal r-separator" id="smtform" action="{{url('question/save')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="cid" id="selectedCid">
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
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Question Type<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="questionType" id="category" required>
                                    <option value="">Select Question Type</option>
                                    @foreach($quizCategory as $qc)
                                    <option value="{{$qc->id}}" id="cat_{{$qc->id}}" {{$loop->first?'selected':''}}>{{$qc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">Topic<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-9">
                                <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                                    <ol class="dd-list">
                                        <li class="dd-item" id="parentdd">
                                            <div class="dd-handle-new">
                                                <strong class="selectedTopic">Select Topic</strong>
                                            </div>
                                            <ol class="dd-list">
                                                @foreach($category as $c)
                                                <li class="dd-item">
                                                    <div class="dd-handle-new topicls" data-cid="{{$c->id}}"> {{$c->name}} </div>
                                                    @if(count($c->childs))
                                                    @include('Admin.PartialPages.Questions._subtopic', ['category'=>$c->childs])
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">Question in English :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control txtareaValidation" id="question" placeholder="Type Question here." name="question"></textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">Question in Bangla :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="bdquestion" placeholder="Type Question here." name="questionbd"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label">Option :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" pattern="^[a-zA-Z0-9 ]+$" name="option[]" placeholder="Enter Option in English" >
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="Enter Option in Bangla">
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="Yes" data-off-text="No" data-size="normal" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"> Option :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" pattern="^[a-zA-Z0-9 ]+$" name="option[]" placeholder="Enter Option in English">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="Enter Option in Bangla">
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
                            <label for="question" class="col-sm-2 text-right control-label col-form-label">Explenation :</label>
                            <div class="col-sm-5">
                                <textarea class="form-control txtareaValidation" placeholder="Type Answer Explenation here in English." name="explenation"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <textarea class="form-control" placeholder="Type Answer Explenation here in Bangla." name="bdexplenation"></textarea>
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
        // var regx = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%\s]+$/;
        // $('.txtareaValidation').keyup(function() {
        //     if (regx.test(this.value)) {
        //         console.log('correct');
        //     } else {
        //         if (this.value == '') {
        //             Swal.fire({
        //                 type: 'error',
        //                 title: 'Oops...',
        //                 text: 'This is Required Field.',
        //             })
        //         } else {
        //             Swal.fire({
        //                 type: 'error',
        //                 title: 'Oops...',
        //                 text: 'Please Type in English.',
        //             })
        //         }

        //     }
        // });

        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();

        $('.smt').on('click', function(e) {
            var cid = $('#selectedCid').val();
            var paise = 0;
            $('input[name="ans[]"]').each(function() {
                console.log($(this).val());
                if ($(this).val() == 1) {
                    paise = 1;
                }
            });
            if (paise == 1) {
                if (cid != '') {
                    $('#smtform').submit();
                } else {
                    e.preventDefault();
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please select the Topic.',
                    })
                }
            } else {
                e.preventDefault();
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please select the answer.',
                })
            }
        })

        $('#createNew').on('click', function(e) {
            e.preventDefault();
            var data = '';
            data += `<div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"><i class="ti-close remove" style="color:red;cursor:pointer;"></i> Option :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" pattern="^[a-zA-Z0-9 ]+$" name="option[]" placeholder="Enter Option in English">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="Enter Option in Bangla">
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
                        $("#showsubtopic").empty().append(data);
                    } else {
                        $('.subtopicDiv').hide();
                    }
                }
            })

        })
        $(document).on('click', '.topicls', function() {

            // $(this).hasClass('activeli') ? $(this).removeClass('activeli') : [$('.topicls').removeClass('activeli'), $(this).addClass('activeli'), $('#selectedCid').val($(this).attr('data-cid')), $('#selectedTopic').html($(this).text())];

            if ($(this).hasClass('activeli')) {
                $(this).removeClass('activeli');
                $('#selectedCid').val('');
                $('.selectedTopic').html('Select Topic');
            } else {
                // $('.topicls').removeClass('activeli');
                // $(this).addClass('activeli');
                // alert($(this).attr('data-cid'));

                $('#parentdd').addClass('dd-collapsed').children('[data-action="collapse"]').hide();
                $('#parentdd').children('[data-action="expand"]').show();
                $('.topicls').removeClass('activeli');
                $(this).addClass('activeli');
                $('#selectedCid').val($(this).attr('data-cid'));
                $('.selectedTopic').html($(this).text());
            }

        })
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable-menu').nestable();


    })
</script>
@endsection