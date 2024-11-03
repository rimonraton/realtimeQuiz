@php $lang = App::getLocale(); @endphp
<input type="hidden" id="ucat_id" value="{{$QwithO->category_id}}" name="cat_id">
<input type="hidden" id="ufile_path" value="{{$QwithO->question_file_link}}" name="ufile_path">
@if($QwithO->fileType == 'image' || $QwithO->fileType == 'video' || $QwithO->fileType == 'audio')
<div class="text-center" id="preMedia">
    @if($QwithO->fileType == 'image')
    <img src="{{asset($QwithO->question_file_link)}}" alt="Image" class="img-thumbnail" width="25%">
    @elseif($QwithO->fileType == 'video')
    <video width="320" height="240" controls>
        <source src="{{asset($QwithO->question_file_link)}}" type="video/mp4">
        <source src="{{asset($QwithO->question_file_link)}}" type="video/ogg">
        Your browser does not support the video tag.
    </video>
    @else
    <audio controls>
        <source src="{{asset($QwithO->question_file_link)}}" type="audio/ogg">
        <source src="{{asset($QwithO->question_file_link)}}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    @endif
</div>
<div class="d-none text-center" id="fileUpdatePreview">
    <div class="image-title-wrap">
        <button type="button" class="remove-image" id="removeUpdateMediaFile">{{__('form.remove')}}</button>
    </div>
</div>
<div class="text-center">
    <div class="form-group">
        <input type="file" id="questionUpdate" class="optipt" name="questionimg" accept="image/*,video/*,audio/*">
        <div class="btn btn-tertiary js-labelFile" id="questionFileInput">
            <label for="optionOne" class="d-flex flex-column">
                <span class="js-fileName">
                    <i class="icon fa fa-upload"></i> {{__('form.choose_file')}}
                </span>
            </label>
        </div>
    </div>
</div>
@endif

<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_en')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" id="uquestion" value="{{$QwithO->question_text}}" class="form-control" name="question" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.question_bn')}} :</label>
    </div>
    <div class="col-md-9">
        <input type="text" id="ubdquestion" value="{{$QwithO->bd_question_text}}" class="form-control" name="bdquestion" placeholder="{{__('form.question_placeholder')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label class="pull-right">{{__('form.difficulty')}} :</label>
    </div>
    <div class="col-md-9">
        <select class="form-control" id="difficulty_update" required>
            {{--                                    <option value="">{{__('form.question_type')}}</option>--}}
            @foreach($difficulty as $dc)
                <option value="{{$dc->id}}" {{ $QwithO->level == $dc->id ? 'selected' : ($loop->first?'selected':'')}}>{{$lang=='gb'? $dc->name : $dc->bn_name}}</option>
            @endforeach
        </select>
    </div>
</div>
@foreach($QwithO->options as $QO)
<div class="form-group row" id="op_{{$QO->id}}">
    <div class="col-md-2">
        <label class="optionTitle">{{__('form.option')}} :</label>
    </div>
    <input type="hidden" class="oid" name="oid[]" value="{{$QO->id}}">
    @if($QO->flag == 'img')
        <div class="col-md-2">
            <div class="form-group">
                <input type="file" class="changeFile optipt" data-qid="{{$QwithO->id}}" data-id="{{$QO->id}}" data-old="{{$QO->img_link}}" accept="image/*">
                <div class="btn btn-tertiary js-labelFile d-none">
                    <label for="optionOne" class="d-flex flex-column">
                <span class="js-fileName">
                    <i class="icon fa fa-check"></i> {{__('form.choose_file')}}
                </span>
                        <small class="">({{__('form.video_image_audio')}})</small>
                    </label>
                </div>
                <label for="optionOne" class="img-label">
                    <img class="img-preview js-labelFilepreview optImg" src="{{asset($QO->img_link)}}" alt="">
                </label>
                <div class="text-center" id="loading-{{$QO->id}}" style="display: none">
                    <img src="{{asset('img/upload.gif')}}" alt="" width="100">
                </div>
                <div class="text-center">
                    <i class="ti-pencil text-danger" style="cursor:pointer;"></i>
                </div>
            </div>
        </div>
    @else
    <div class="col-md-3">
        <input type="text" value="{{$QO->option}}" class="form-control option" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
    </div>
    <div class="col-md-3">
        <input type="text" value="{{$QO->bd_option}}" class="form-control bdoption" name="bdoption[]" placeholder="{{__('form.option_bn_placholder')}}">
    </div>
    @endif
    <div class="col-md-1">
        <div class="bt-switch">
            <input type="hidden" name="ans[]" class="hi ans" value="{{$QO->correct}}">
            <input type="checkbox" class="chk" data-id="{{$QO->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$QO->correct == 1?"checked":""}} />
        </div>
    </div>
    <div class="col-md-1">
        <a style="cursor: pointer" id="dlt_{{$QO->id}}" class="m-4 delete_q {{$QO->correct?'disabled':'text-danger'}} " data-id="{{$QO->id}}"><i class="fas fa-trash"></i></a>
    </div>
</div>
@endforeach
<div id="optadd"></div>
<div class="text-center"><a href="" id="add_option">{{__('form.add_option')}}</a></div>
@php $lang = App::getLocale(); @endphp
<script>
    $(function() {
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        numberSerial()
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            var qid = $(this).data('id');
            if (state == true) {
                console.log(qid);
                $(this).closest("div.bt-switch").find(".hi").val('1');
                $('#dlt_'+qid).addClass('disabled').removeClass('text-danger');
            } else {
                console.log(qid);
                $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
                $('#dlt_'+qid).removeClass('disabled').addClass('text-danger');
            }
        });
    })
    $('#add_option').on('click',function (e){
        e.preventDefault();
        var data = '';
        // alert('data', data)
        var optOrImage = ''
        var id = ''
        var qid = '{{$QwithO->id}}'
        if ({{$isImage }} === 1) {
            optOrImage = `<div class="col-md-2">
                                <div class="form-group">
                                    <input type="file" class="optipt changeFile" data-id="" data-qid="${qid}" data-old="" accept="image/*">
                                    <div class="btn btn-tertiary js-labelFile">
                                        <label for="optionOne" class="d-flex flex-column">
                                    <span class="js-fileName">
                                        <i class="icon fa fa-check"></i> {{__('form.choose_file')}}
                                        </span>
                                         <small class="">({{__('form.video_image_audio')}})</small>
                                        </label>
                                    </div>
                                    <label for="optionOne" class="d-none img-label">
                                        <img class="img-preview js-labelFilepreview" src="" alt="">
                                    </label>
                                    <div class="d-none text-center">
                                        <i class="ti-close removePreview" style="color:red;cursor:pointer;"></i>
                                    </div>
                                </div>
                            </div>`
        } else {
            optOrImage = `<div class="col-sm-3">
                                <input type="text" class="form-control option" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control bdoption" name="bdoption[]" placeholder="{{__('form.option_bn_placholder')}}">
                            </div>`
        }
        data += `<div class="form-group row">
                            <label for="option1" class="col-md-2 optionTitle">{{__('form.option')}} :</label>
                             <input name=oid[] class="oid" value='new' type='hidden' />
                                 ${optOrImage}
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi ans" value="0">
                                <input type="checkbox" class="chk" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                            </div>
                            <div class="col-md-1">
                                <a style="cursor: pointer" class="m-4 text-danger remove"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>`;
        $('#optadd').append(data);
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        numberSerial()
    })
    function numberSerial() {
        {{--console.log('lang..', '{{$lang}}')--}}
        $('.optionTitle').each(function(idx, elem){
            if('{{$lang}}' == 'gb') {
                $(elem).text( 'Option ' + (idx+1));
            } else {
                $(elem).text( 'অপশন ' + q2bNumber(idx+1));
            }

        });
    }
    function q2bNumber(numb) {
        let numbString = numb.toString();
        let bn = ''
        let eb = {0: '০', 1: '১', 2: '২', 3: '৩', 4: '৪', 5: '৫', 6: '৬', 7: '৭', 8: '৮', 9: '৯'};
        [...numbString].forEach(n => bn += eb[n])
        return bn
    }
    $('#questionUpdate').on('change', function (event) {
        if (event.target.files[0]) {
            const fileType = ['image', 'video', 'audio']
            if(fileType.includes(event.target.files[0].type.split('/')[0])) {
                const size = Math.round(event.target.files[0].size/1024)
                if(event.target.files[0].type.split('/')[0] == 'image'){
                    // console.log('size..', size)
                    if(size <= 100){
                        $('#preMedia').addClass('d-none')
                        $('#fileUpdatePreview').removeClass('d-none')
                        $('#questionFileInput').addClass('d-none')
                        var img = document.createElement("img");
                        img.className = 'file-upload-image'
                        img.width = 200
                        img.src = URL.createObjectURL(event.target.files[0]);
                        $('#fileUpdatePreview').prepend(img)
                        img.onload = function() {
                            URL.revokeObjectURL(img.src) // free memory
                        }
                    } else {
                        // alert('File Size less than 100KB')
                        alertMessage('File Size less than 100KB')
                        return;
                    }
                } else if(event.target.files[0].type.split('/')[0] == 'video') {
                    if (size <= 1024) {
                        $('#preMedia').addClass('d-none')
                        $('#fileUpdatePreview').removeClass('d-none')
                        $('#questionFileInput').addClass('d-none')
                        var video = document.createElement('video');
                        video.src = URL.createObjectURL(event.target.files[0]);
                        video.controls = true
                        video.width = 400
                        $('#fileUpdatePreview').prepend(video)
                        video.onload = function() {
                            URL.revokeObjectURL(video.src) // free memory
                        }
                    } else {
                        // alert('File Size less than 1MB')
                        alertMessage('File Size less than 1MB')
                        return;
                    }

                }else {
                    if (size <= 500) {
                        $('#preMedia').addClass('d-none')
                        $('#fileUpdatePreview').removeClass('d-none')
                        $('#questionFileInput').addClass('d-none')
                        var audio = document.createElement('audio');
                        audio.src = URL.createObjectURL(event.target.files[0]);
                        audio.controls = true
                        $('#fileUpdatePreview').prepend(audio)
                        audio.onload = function() {
                            URL.revokeObjectURL(audio.src) // free memory
                        }
                    } else {
                        // alert('File Size less than 500KB')
                        alertMessage('File Size less than 500KB')
                        return;
                    }
                }
            console.log('after all true')
                // $('#questionUpdate').val(event.target.files[0].type.split('/')[0])
                // $(this).parent().addClass('d-none')
            } else {
                // alert('File format is not correct')
                alertMessage('File format is not correct')
                return
            }
        }
    })
    function alertMessage(title){
        Swal.fire({
            position: 'top-end',
            type: 'error',
            title: title,
            showConfirmButton: false,
            timer: 1500
        })
    }
    $('#removeUpdateMediaFile').on('click', function (event) {
        $('#preMedia').removeClass('d-none')
        $('#questionUpdate').val(null)
        // $(this).parent().parent().parent().find('.image-upload-wrap').removeClass('d-none')
        $('#fileUpdatePreview').addClass('d-none')
        const whichTag =  $('#fileUpdatePreview')[0].firstChild
        if(whichTag.tagName == 'AUDIO' || whichTag.tagName == 'VIDEO') {
            whichTag.pause()
        }
        $('#fileUpdatePreview')[0].firstChild.remove()
        $('#questionFileInput').removeClass('d-none')

    })
    $(document).on('change', '.changeFile', function (event) {
        // console.log('event file', event.target.files.length > 0, event.target.files[0].type.split('/')[0])
        // console.log('event...', $(this)[0])
        // return;
        if (event.target.files[0]) {
            const size = Math.round(event.target.files[0].size/1024)
            if(event.target.files[0].type.split('/')[0] == 'image'){
                if (size <= 100) {
                    $(this).next().addClass('d-none');
                    $(this).next().next().removeClass('d-none');
                    // $(this).next().next().next().removeClass('d-none');
                    var output = $(this).siblings('.img-label')[0]
                    if(output.firstElementChild != null) {
                        output.firstElementChild.remove()
                    }
                    var img = document.createElement("img");
                    img.className = 'img-preview js-labelFilepreview optImg'
                    img.src = URL.createObjectURL(event.target.files[0]);
                    output.prepend(img)
                    img.onload = function() {
                        URL.revokeObjectURL(img.src) // free memory
                    }

                    var fd = new FormData();
                    var files = $(this)[0].files;
                    if(files.length > 0){
                        fd.append('file', files[0]);
                        fd.append('id', $(this).attr('data-id'));
                        fd.append('old_file', $(this).attr('data-old'));
                        fd.append('qid', $(this).attr('data-qid'));
                        // fd.append('fileType', files[0].type.split('/')[0]);
                    }
                    $.ajax({
                        url:"{{url('option-file-update')}}",
                        type:"Post",
                        data: fd,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            // console.log('next element....', $(this).next().next().next())
                            // $(this).next().next().next().removeClass('d-none');
                            // $(this).next().next().next().removeClass('d-none');
                            $('#loading-'+$(this).attr('data-id')).show()
                            console.log('before mounted..')
                        },
                        success:function (data) {
                            console.log(data)
                        },
                        complete: function () {
                            // $(this).next().next().next().addClass('d-none');
                            // $(this).next().next().next().addClass('d-none');
                            $('#loading-'+$(this).attr('data-id')).hide()
                            console.log('completed')
                            toastr.success("{{__('form.option_upload')}}", {
                                "closeButton": true
                            });
                        }
                    })

                } else {
                    // alert('File Size less than 100KB')
                    alertMessage('File Size less than 100KB')
                    return;
                }

            } else {
                // alert('File format is not correct')
                alertMessage(`${event.target.files[0].type.split('/')[0]} file format is not correct`)
                return;
            }
        }
    })
</script>
<style>
    .optipt{
        width: 100%;
        height: 100px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
    }
    .input-file {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .input-file + .js-labelFile {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding: 3px 10px;
        cursor: pointer;
    }
    .labelFilepreview {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer;
    }
    .input-file + .js-labelFile .icon:before {
        content: "";
    }
    .input-file + .js-labelFile.has-file .icon:before {
        content: "";
        color: #5aac7b;
    }
    .img-preview{
        width: 102px;
        height: 50px;
        cursor: pointer;
    }
</style>
