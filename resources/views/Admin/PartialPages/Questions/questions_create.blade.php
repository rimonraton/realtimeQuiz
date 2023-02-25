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
    .file-upload-content2 {
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
        font-weight: 50;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
        font-size: 20px;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        /*width: 200px;*/
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        /*border-bottom: 4px solid #b02818;*/
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
    .btn-tertiary {
        color: #555;
        padding: 0;
        line-height: 1;
        /*width: 300px;*/
        margin: auto;
        display: block;
        border: 2px solid #555;
    }
    .btn-tertiary:hover, .btn-tertiary:focus {
        color: #888888;
        border-color: #888888;
    }
    /* input file style */
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
        width: 180px;
        height: 50px;
        cursor: pointer;
    }
    .optionImage{
        display: none;
    }
    .width-video-100{
        width: 100%;
    }
</style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('msg.createQuestion')}}</h4>
                <hr>
                <form class="form-horizontal r-separator" id="smtform" action="{{url('question/save')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="cid" id="selectedCid">
                    <div class="card-body">
                        <input type="hidden" id="fileType" value="" name="fileType" class="custom-control-input">
                        <div class="form-group row justify-content-center">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sentence" value="sentence" name="sentenceOrfile" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="sentence">{{__('form.txt')}}</label>
                                    </div>
                                </label>
                                <label class="btn btn-primary">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="file" value="file" name="sentenceOrfile" class="custom-control-input">
                                        <label class="custom-control-label" for="file">{{__('form.media')}}</label>
                                    </div>
                                </label>
                            </div>
                        </div>
{{--                        <div class="form-group row justify-content-center">--}}
{{--                            <div class="btn-group" data-toggle="buttons">--}}
{{--                                <label class="btn btn-primary">--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="txt" value="txt" name="customRadio" class="custom-control-input" checked="">--}}
{{--                                        <label class="custom-control-label" for="txt">{{__('form.txt')}}</label>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-primary">--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="image" value="image" name="customRadio" class="custom-control-input">--}}
{{--                                        <label class="custom-control-label" for="image">{{__('form.image')}}</label>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-primary">--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="video" value="video" name="customRadio" class="custom-control-input" >--}}
{{--                                        <label class="custom-control-label" for="video">{{__('form.video')}}</label>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-primary">--}}
{{--                                    <div class="custom-control custom-radio">--}}
{{--                                        <input type="radio" id="audio" value="audio" name="customRadio" class="custom-control-input" >--}}
{{--                                        <label class="custom-control-label" for="audio">{{__('form.audio')}}</label>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="allMedia" class="d-none">--}}
{{--                            <div class="form-group row pb-3" id="divImage">--}}
{{--                                <div class="file-upload">--}}
{{--                                    <div class="image-upload-wrap">--}}
{{--                                        <input class="file-upload-input ipf" name="file" type='file' accept="image/*" />--}}
{{--                                        <div class="drag-text">--}}
{{--                                            <h3 id="txt">{{__('form.image_title')}}</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="file-upload-content">--}}
{{--                                        <img class="file-upload-image" src="#" alt="your image" />--}}
{{--                                        <div class="image-title-wrap">--}}
{{--                                            <button type="button" class="remove-image">{{__('form.remove')}} <span class="image-title">{{__('form.uploaded_image')}}</span></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row pb-3 d-none" id="divVideo">--}}
{{--                                <div class="file-upload">--}}
{{--                                    <div class="image-upload-wrap">--}}
{{--                                        <input class="file-upload-input ipf" name="video" type='file' accept="video/*" />--}}
{{--                                        <div class="drag-text">--}}
{{--                                            <h3 id="txt">{{__('form.video_title')}}</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="file-upload-content1">--}}
{{--                                        <video id="videos" width="400" controls>--}}
{{--                                            <source src="" type="video/*">--}}
{{--                                        </video>--}}
{{--                                        <div class="image-title-wrap">--}}
{{--                                            <button type="button" class="remove-image">{{__('form.remove')}} <span class="image-title">{{__('form.uploaded_video')}}</span></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row pb-3 d-none" id="divAudio">--}}
{{--                                <div class="file-upload">--}}
{{--                                    <div class="image-upload-wrap">--}}
{{--                                        <input class="file-upload-input ipf" name="audio" type='file' accept="audio/*" />--}}
{{--                                        <div class="drag-text">--}}
{{--                                            <h3 id="txt">{{__('form.audio_title')}}</h3>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="file-upload-content2">--}}
{{--                                        <audio id="audios" controls>--}}
{{--                                            <source src="" type="audio/*">--}}
{{--                                        </audio>--}}
{{--                                        <div class="image-title-wrap">--}}
{{--                                            <button type="button" class="remove-image">{{__('form.remove')}} <span class="image-title">{{__('form.uploaded_audio')}}</span></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div id="allMediaFiles" class="d-none">
                            <div class="form-group row pb-3">
                                <div class="file-upload">
                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="file" id="allfileupload" type='file' accept="image/*, audio/*, video/*" />
                                        <div class="drag-text">
                                            <h3>{{__('form.media_title')}}</h3>
                                        </div>
                                    </div>
                                    <div class="d-none text-center" id="filePreview">
{{--                                        <img class="file-upload-image" src="#" alt="your image" />--}}
                                        <div class="image-title-wrap">
                                            <button type="button" class="remove-image" id="removeMediaFile">{{__('form.remove')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.questions_type_level')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-5">
                                <select class="form-control custom-select" name="questionType" id="category" required>
                                    <option value="">{{__('form.question_type')}}</option>
                                    @foreach($quizCategory as $qc)
                                    <option value="{{$qc->id}}" id="cat_{{$qc->id}}" {{$loop->first?'selected':''}}>{{$lang=='gb'?$qc->name:$qc->bn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control custom-select" name="difficulty" id="difficulty" required>
{{--                                    <option value="">{{__('form.question_type')}}</option>--}}
                                    @foreach($difficulty as $dc)
                                        <option value="{{$dc->id}}" id="diff_{{$dc->id}}" {{$loop->first?'selected':''}}>{{$lang=='gb'?$dc->name:$dc->bn_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_en')}} :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control txtareaValidation" id="question" placeholder="{{__('form.question_placeholder')}}" name="question"></textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="question" class="col-sm-3 text-right control-label col-form-label">{{__('form.question_bn')}} :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="bdquestion" placeholder="{{__('form.question_placeholder')}}" name="questionbd"></textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="category" class="col-sm-3 text-right control-label col-form-label">{{__('form.topic')}}<span class="text-danger" style="font-size: 1.5rem;">*</span> :</label>
                            <div class="col-sm-7">
                                <div class="myadmin-dd dd" id="nestable" style="width: 100% !important;">
                                    <ol class="dd-list">
                                        <li class="dd-item" id="parentdd">
                                            <div class="dd-handle-new">
                                                <strong class="selectedTopic">{{__('form.select_topic')}}</strong>
                                            </div>
                                            <ol class="dd-list">
                                                @foreach($category as $c)
                                                <li class="dd-item">
                                                    <div class="dd-handle-new topicls" data-cid="{{$c->id}}"> {{$lang=='gb'?$c->name:$c->bn_name}} </div>
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
                            <div class="col-sm-2 d-none" id="showQ">
                                <div class="btn btn-sm rounded-lg border border-secondary p-2" id="showQButton">{{$lang == 'gb' ? 'View Questions' : 'প্রশ্নসমুহ দেখুন'}}</div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center" id="textImagePanel">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="textOpt" value="textOpt" name="textOrImage" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="textOpt">{{__('form.optTxt')}}</label>
                                    </div>
                                </label>
                                <label class="btn btn-info">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="imageOpt" value="imageOpt" name="textOrImage" class="custom-control-input">
                                        <label class="custom-control-label" for="imageOpt">{{__('form.image')}}</label>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label optionTitle">{{__('form.option')}} {{$lang=='gb'? '1' : '১' }} :</label>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
                            </div>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="{{__('form.option_bn_placholder')}}">
                            </div>
                            <div class="col-sm-2 optionImage">
{{--                                <input type="file" class="form-control" name="optionimg[]" accept="image/png, image/gif, image/jpeg">--}}
                                <div class="form-group">
                                    <input type="file" id="optionOne" class="input-file changeFile" name="optionimg[]" accept="image/*">
                                    <div class="btn btn-tertiary js-labelFile">
                                        <label for="optionOne" class="d-flex flex-column">
                                            <span class="js-fileName">
                                                <i class="icon fa fa-check"></i> {{__('form.choose_file')}}
                                            </span>
                                            <small class="">({{__('form.video_image_audio')}})</small>
                                        </label>
                                    </div>
                                    <label for="optionOne" class="d-none img-label">
{{--                                        <img class="img-preview js-labelFilepreview" src="" alt="">--}}
                                    </label>
                                    <div class="d-none text-center">
                                        <i class="ti-close removePreview" style="color:red;cursor:pointer;"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                            </div>
                        </div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label optionTitle"> {{__('form.option')}} {{$lang=='gb'? '2' : '২' }} :</label>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
                            </div>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="{{__('form.option_bn_placholder')}}">
                            </div>
                            <div class="col-sm-2 optionImage">
{{--                                <input type="file" class="form-control" name="optionimg[]" accept="image/png, image/gif, image/jpeg">--}}
                                <div class="form-group">
                                    <input type="file" id="optionTwo" class="input-file changeFile" name="optionimg[]" accept="image/*">
                                    <div class="btn btn-tertiary js-labelFile">
                                        <label for="optionTwo" class="d-flex flex-column">
                                            <span class="js-fileName"><i class="icon fa fa-check"></i> {{__('form.choose_file')}}</span>
                                            <small class="">({{__('form.video_image_audio')}})</small>
                                        </label>
                                    </div>
                                    <label for="optionTwo" class="d-none img-label">
{{--                                        <img class="img-preview js-labelFilepreview" src="" alt="">--}}
                                    </label>
                                    <div class="d-none text-center"><i class="ti-close removePreview" style="color:red;cursor:pointer;"></i></div>
                                </div>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                            </div>
                        </div>
                        <div id="newOne"></div>
                        <div class="form-group row pb-3">
                            <label for="option1" class="col-sm-4 text-right control-label col-form-label">
                                <a class="waves-effect waves-light" id="createNew" href="">{{__('form.new_option')}}</a>
                            </label>
                        </div>
                        <div class="form-group row  pb-3 pl-5">
                            <label for="option1" class="col-sm-4 text-right control-label col-form-label">
                                <input type="checkbox" class="filled-in chk-col-indigo material-inputs" id="explenation">
                                <label style="font-size: .9rem;" for="explenation">{{__('form.ans_explenation')}}</label>
                            </label>
                        </div>
                        <div class="form-group row pb-3 exl" style="display: none;">
                            <label for="question" class="col-sm-2 text-right control-label col-form-label">{{__('form.explenation')}} :</label>
                            <div class="col-sm-5">
                                <textarea class="form-control txtareaValidation" placeholder="{{__('form.explenaton_en_placeholder')}}" name="explenation"></textarea>
                            </div>
                            <div class="col-sm-5">
                                <textarea class="form-control" placeholder="{{__('form.explenaton_bn_placeholder')}}" name="bdexplenation"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light smt">{{__('msg.createQuestion')}}</button>
                            <a class="btn btn-success waves-effect waves-light text-white" href="{{url('question/list')}}">{{__('form.goto_list')}}</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="qModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$lang == 'gb' ? 'Questions' : 'প্রশ্নসমুহ'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center" id="custom_input_text">

                </div>
                <div id="viewQData">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{$lang== 'gb' ? 'Close' : 'বন্ধ করুন'}}</button>
            </div>
        </div>
    </div>
</div>

<!-- Media Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Media/Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="container">
                                <div id="media_body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center py-2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{$lang== 'gb' ? 'Close' : 'বন্ধ করুন'}}</button>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    // $(document).ready(function () {
    //     alert('load alert')
    //     $('#search_keyword').focus();
    // })
    $.noConflict();
    $(function() {
        $(document).on('click', '.mediaQ', function () {
            $('#media_body').empty()
            const fileType = $(this).attr('data-fileType')
            const fileLink = $(this).attr('data-fileLink')
            if (fileType == 'video') {
                var video = document.createElement('video');
                video.id = 'video_q_file'
                video.src = '/'+ fileLink
                video.controls = true
                video.className = 'width-video-100'
                $('#media_body').prepend(video)
            }
            if (fileType == 'image') {
                var img = document.createElement("img");
                // img.className = 'file-upload-image'
                img.className = 'width-video-100'
                img.src = '/' + fileLink
                $('#media_body').prepend(img)
            }
            if (fileType == 'audio') {
                var audio = document.createElement('audio');
                audio.src = '/' + fileLink
                audio.controls = true
                audio.id = 'audio_q_file'
                audio.className = 'width-video-100'
                $('#media_body').prepend(audio)
            }
            $('#mediaModal').modal('show')
        })
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
            let numb = 2

            $('#createNew').on('click', function(e) {
                numb++
            e.preventDefault();
            var data = '';
            data += `<div class="form-group row pb-3">
                            <label for="option1" class="col-sm-3 text-right control-label col-form-label"><i class="ti-close remove" style="color:red;cursor:pointer;"></i> <label class="optionTitle">{{__('form.option')}} ${numb}:</label></label>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" pattern="^[a-zA-Z0-9 ]+$" name="option[]" placeholder="{{__('form.option_en_placholder')}}">
                            </div>
                            <div class="col-sm-3 optdiv">
                                <input type="text" class="form-control inpoption" name="optionbd[]" placeholder="{{__('form.option_bn_placholder')}}">
                            </div>
                             <div class="col-sm-2 optionImage">
                                 <div class="form-group">
                                    <input type="file" id="option${numb}" class="input-file changeFile" name="optionimg[]" accept="image/*">
                                    <div class="btn btn-tertiary js-labelFile">
                                        <label for="option${numb}" class="d-flex flex-column">
                                            <span class="js-fileName"><i class="icon fa fa-check"></i> {{__('form.choose_file')}}</span>
                                            <small class="">({{__('form.video_image_audio')}})</small>
                                        </label>
                                    </div>
                                     <label for="option${numb}" class="d-none img-label">
                                    </label>
                                    <div class="d-none text-center"><i class="ti-close removePreview" style="color:red;cursor:pointer;"></i></div>
                                </div>
                            </div>
                            <div class="col-sm-1 bt-switch">
                                <input type="hidden" name="ans[]" class="hi" value="0">
                                <input type="checkbox" class="chk" name="answer[]" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" />
                            </div>
                        </div>`;
            $('#newOne').append(data);
            $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
                numberSerial()
            const checkValue = $('input[name="sentenceOrfile"]:checked').val();
            if(checkValue == 'sentence') {
                const checkValue = $('input[name="textOrImage"]:checked').val();
                if (checkValue == 'textOpt') {
                    $('.optdiv').show()
                    $('.optionImage').hide()
                }
                else {
                    $('.optdiv').hide()
                    $('.optionImage').show()
                }
                // $('.optionImage').show()
            } else{
                $('.optionImage').hide()
            }
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('.row').remove();
            numberSerial()
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
                        $('.file-upload-content2').hide();


                        $('.image-title').html(input.files[0].name);
                    };
                } else if(type == 'video') {
                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();
                        // $('.file-upload-image').attr('src', e.target.result);
                        var video = $('#videos')[0];
                        video.src = e.target.result;
                        $('.file-upload-content').hide();
                        $('.file-upload-content1').show();
                        $('.file-upload-content2').hide();


                        $('.image-title').html(input.files[0].name);
                    };

                    // var video = $('#divVideo video')[0];
                    // video.src = videoFile;
                    // video.load();
                    // video.play();
                } else if (type == 'audio') {
                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();
                        // $('.file-upload-image').attr('src', e.target.result);
                        var audio = $('#audios')[0];
                        audio.src = e.target.result;
                        $('.file-upload-content').hide();
                        $('.file-upload-content1').hide();
                        $('.file-upload-content2').show();

                        $('.image-title').html(input.files[0].name);
                    }
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
            $('.file-upload-content2').hide();
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
            $('#allMedia').removeClass('d-none')
            $('#divImage').addClass('d-none');
            $('#divVideo').removeClass('d-none');
            $('#divAudio').addClass('d-none');
            $('.optionImage').hide();
            // changeVI('Drag and drop a Video file or select add Video', 'video/*');
        })
        $('#image').on('change', function() {
            $('#allMedia').removeClass('d-none')
            $('#divImage').removeClass('d-none');
            $('#divVideo').addClass('d-none');
            $('#divAudio').addClass('d-none');
            $('.optionImage').hide();
            // changeVI('Drag and drop a Image file or select add Image', 'image/*');
        })
        $('#audio').on('change', function() {
            $('#allMedia').removeClass('d-none')
            $('#divImage').addClass('d-none');
            $('#divVideo').addClass('d-none');
            $('#divAudio').removeClass('d-none');
            $('.optionImage').hide();
            // changeVI('Drag and drop a Image file or select add Image', 'image/*');
        })
        $('#txt').on('change', function() {
            $('#allMedia').addClass('d-none')
            $('#divImage').addClass('d-none');
            $('#divVideo').addClass('d-none');
            $('#divAudio').addClass('d-none');
            $('.optionImage').show();
            // changeVI('Drag and drop a Image file or select add Image', 'image/*');
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
        function getAllQuestions(id) {
            $.ajax({
                url: "{{url('question-list')}}/" + id,
                type: "GET",
                success: function(data) {
                    // if (data != '') {
                    //     $('.subtopicDiv').show();
                    //     $("#showsubtopic").empty().append(data);
                    // } else {
                    //     $('.subtopicDiv').hide();
                    // }
                    $('#viewQData').html(data)
                    setTimeout(() => {
                        $('#search_keyword').focus()
                    }, 200)
                },
            })
        }

        $(document).on('click','#cancel_q', function () {
            $('#bdquestion').val('')
            $('#question').val('')
            $('#qModal').modal('hide')
        })

        $(document).on('click', '.topicls', function() {

            // $(this).hasClass('activeli') ? $(this).removeClass('activeli') : [$('.topicls').removeClass('activeli'), $(this).addClass('activeli'), $('#selectedCid').val($(this).attr('data-cid')), $('#selectedTopic').html($(this).text())];
            // alert($(this).attr('data-cid'));
            const id = $(this).attr('data-cid');
            getAllQuestions(id)
            $('#qModal').modal('show')
            $('#showQ').removeClass('d-none')
            $('#showQButton').attr( 'data-cid', id)
            $('#custom_input_text').empty();
            if ($('#bdquestion').val() != ''){
                $('#custom_input_text').append(`<div data-cid='${id}' class="btn col-sm-4 border border-secondary rounded-lg customQ mx-1">${$('#bdquestion').val()}</div>`)
            }
            if ($('#question').val() != ''){
                $('#custom_input_text').append(`<div data-cid='${id}' class="btn col-sm-4 border border-secondary rounded-lg customQ mx-1">${$('#question').val()}</div>`)
            }
            if ($('#bdquestion').val() != '' || $('#question').val() != '') {
                const add = '{{$lang}}' == 'gb'? 'Add' : 'যুক্ত করুন'
                const cancel = '{{$lang}}' == 'gb'? 'Cancel' : 'বাতিল করুন'
                $('#custom_input_text').append(
                    `<div class="btn col-sm-1 border border-secondary rounded-lg mx-1" data-dismiss="modal">
                        <span >${add}</span>
                    </div>
                     <div class="btn col-sm-1 border border-secondary rounded-lg mx-1" id="cancel_q">
                        <span>${cancel}</span>
                    </div>`
                )
            }
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
        $('#showQButton').on('click', function () {
            const id = $(this).attr('data-cid');
            $('#custom_input_text').empty();
            if ($('#bdquestion').val() != ''){
                $('#custom_input_text').append(`<div data-cid='${id}' class="btn col-sm-4 border border-secondary rounded-lg customQ mx-1">${$('#bdquestion').val()}</div>`)
            }
            if ($('#question').val() != ''){
                $('#custom_input_text').append(`<div data-cid='${id}' class="btn col-sm-4 border border-secondary rounded-lg customQ mx-1">${$('#question').val()}</div>`)
            }
            if ($('#bdquestion').val() != '' || $('#question').val() != '') {
                const add = '{{$lang}}' == 'gb'? 'Add' : 'যুক্ত করুন'
                const cancel = '{{$lang}}' == 'gb'? 'Cancel' : 'বাতিল করুন'
                $('#custom_input_text').append(
                    `<div class="btn col-sm-1 border border-secondary rounded-lg mx-1" data-dismiss="modal">
                        <span >${add}</span>
                    </div>
                     <div class="btn col-sm-1 border border-secondary rounded-lg mx-1" id="cancel_q">
                        <span>${cancel}</span>
                    </div>`
                )
            }
            getAllQuestions(id)
            $('#qModal').modal('show')
        })
        $(document).on('click','.refreash_btn', function () {
            const id = $(this).attr('data-cid');
            getAllQuestions(id)
        })
        $(document).on('click','#search_btn', function () {
            const cid = $(this).attr('data-cid');
            const value = $('#search_keyword').val()
            searchQuestionsByKeyword(cid, value)
        })
        $(document).on('keydown','#search_keyword', function (e) {
            var id = e.which
            // var id = e.key || e.which || e.keyCode || 0;
            console.log('event',id)

            const cid = $(this).attr('data-cid');
            const value = $('#search_keyword').val()
            if (id == 13) {
                searchQuestionsByKeyword(cid, value)
                return false;
            }
        })
        $(document).on('click','.customQ', function () {
            const cid = $(this).attr('data-cid')
            const value = $(this).text()
            searchQuestionsByKeyword(cid,value)
        })
        function searchQuestionsByKeyword(cid, value) {
            if(value == '') {
                let msg = ''
                if('{{$lang}}' == 'gb') {
                    msg =  'Search input is empty'
                } else {
                    msg = 'অনুসন্ধান ইনপুট খালি '
                }
                alertMessage(msg)
                return
            }
            $.ajax({
                url: "{{url('question-list-with-keyword')}}/" + cid + '/' + value,
                type: "GET",
                success: function(data) {
                    $('#viewQData').html(data)
                    setTimeout(() => {
                        $('#search_keyword').focus()
                    }, 200)
                }
            })
        }
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
    // var loadFile = function(event) {
    //     var output = document.getElementById('output');
    //     output.src = URL.createObjectURL(event.target.files[0]);
    //     output.onload = function() {
    //         URL.revokeObjectURL(output.src) // free memory
    //     }
    // };
    $('input[type=radio][name=textOrImage]').change(function() {
        if (this.value == 'textOpt') {
            $('.optdiv').show()
            $('.optionImage').hide()
        }
        else {
            $('.optdiv').hide()
            $('.optionImage').show()
        }
    })

    $('input[type=radio][name=sentenceOrfile]').change(function() {
        if (this.value == 'sentence') {
            $('#textImagePanel').show()
            $('#allMediaFiles').addClass('d-none')
            $('.optionImage').show();
            const checkValue = $('input[name="textOrImage"]:checked').val();
            if (checkValue == 'textOpt') {
                $('.optdiv').show()
                $('.optionImage').hide()
            }
            else {
                $('.optdiv').hide()
                $('.optionImage').show()
            }
        }
        else {
            $('#textImagePanel').hide()
            $('#allMediaFiles').removeClass('d-none')
            $('.optionImage').hide();
            $('.optdiv').show()
        }
    });
    $(document).on('change', '#allfileupload', function (event) {

        if (event.target.files[0]) {
            const fileType = ['image', 'video', 'audio']
            if(fileType.includes(event.target.files[0].type.split('/')[0])) {
                const size = Math.round(event.target.files[0].size/1024)
                if(event.target.files[0].type.split('/')[0] == 'image'){
                    // console.log('size..', size)
                    if(size <= 100){
                        var img = document.createElement("img");
                        img.className = 'file-upload-image'
                        img.src = URL.createObjectURL(event.target.files[0]);
                        $('#filePreview').prepend(img)
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
                        var video = document.createElement('video');
                        video.src = URL.createObjectURL(event.target.files[0]);
                        video.controls = true
                        video.width = 400
                        $('#filePreview').prepend(video)
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
                        var audio = document.createElement('audio');
                        audio.src = URL.createObjectURL(event.target.files[0]);
                        audio.controls = true
                        $('#filePreview').prepend(audio)
                        audio.onload = function() {
                            URL.revokeObjectURL(audio.src) // free memory
                        }
                    } else {
                        // alert('File Size less than 500KB')
                        alertMessage('File Size less than 500KB')
                        return;
                    }
                }
                $('#fileType').val(event.target.files[0].type.split('/')[0])
                $(this).parent().addClass('d-none')
                $('#filePreview').removeClass('d-none')
            } else {
                // alert('File format is not correct')
                alertMessage('File format is not correct')
                return
            }
        }
    })
    $(document).on('click', '#removeMediaFile', function (event) {
        $('#allfileupload').val(null)
        $(this).parent().parent().parent().find('.image-upload-wrap').removeClass('d-none')
        $('#filePreview').addClass('d-none')
        const whichTag =  $('#filePreview')[0].firstChild
        if(whichTag.tagName == 'AUDIO' || whichTag.tagName == 'VIDEO') {
            whichTag.pause()
        }
        $('#filePreview')[0].firstChild.remove()

    })
    $(document).on('change', '.changeFile', function (event) {
        // console.log('event file', event.target.files.length > 0, event.target.files[0].type.split('/')[0])
        if (event.target.files[0]) {
            const size = Math.round(event.target.files[0].size/1024)
            if(event.target.files[0].type.split('/')[0] == 'image'){
                if (size <= 100) {
                    $(this).next().addClass('d-none');
                    $(this).next().next().removeClass('d-none');
                    $(this).next().next().next().removeClass('d-none');
                    var output = $(this).siblings('.img-label')[0]
                    if(output.firstElementChild != null) {
                        output.firstElementChild.remove()
                    }
                    var img = document.createElement("img");
                    img.className = 'img-preview js-labelFilepreview'
                    img.src = URL.createObjectURL(event.target.files[0]);
                    output.prepend(img)
                    img.onload = function() {
                        URL.revokeObjectURL(img.src) // free memory
                    }
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
    $(document).on('click', '.removePreview', function (event) {
        const parent = $(this).parent().parent().find('.changeFile')
        parent.next().removeClass('d-none')
        parent.next().next().addClass('d-none')
        parent.val(null)
        $(this).parent().addClass('d-none')
        // console.log('img-label', $(this).parent().siblings('.img-label')[0].firstElementChild.tagName)
        const whichTag = $(this).parent().siblings('.img-label')[0].firstElementChild
        if(whichTag.tagName == 'AUDIO' || whichTag.tagName == 'VIDEO') {
            whichTag.pause()
        }
    })
    $(document).on('switchChange.bootstrapSwitch', '#textOrfile', function(event, state) {
        if (state == true) {
            $(this).closest("div.bt-switch").find(".hi").val('1');
        } else {
            $(this).closest("div.bt-switch").find("input[name='ans[]']").val('0');
        }
    });
    function alertMessage(title){
        Swal.fire({
            position: 'top-end',
            type: 'error',
            title: title,
            showConfirmButton: false,
            timer: 1500
        })
    }
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

</script>
@endsection
