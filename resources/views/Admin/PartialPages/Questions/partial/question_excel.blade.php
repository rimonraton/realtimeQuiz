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
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{__('msg.createQuestion')}}</h4>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div>{{__('form.download_excel')}} <a href="{{url('export_questions')}}" download>{{__('form.dami_excel')}}</a>
                            {{__('form.custom_msg')}}</div>
{{--                        <a href="{{asset('dami.xlsx')}}" class="pl-2" download>Download Excel File</a>--}}
                    </div>
                    <hr>
                    <form class="form-horizontal r-separator" id="uploadForm" action="{{url('question_store_by_excel')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="file_url" id="file_url" class="form-control" required>
                        <div class="card-body">
                            <div class="form-group row pb-3" id="divImage">
                                <div class="file-upload">
                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" id="file_path" name="file" type='file' accept=".xlsx, .xls, .csv" />
                                        <div class="drag-text">
                                            <h3 id="txt">{{__('form.excel_title')}}</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
{{--                                        <img class="file-upload-image" src="#" alt="your image" />--}}
                                        <div class="image-title-wrap">
                                            <button type="button" class="remove-image">{{__('form.remove')}} <span class="image-title">{{__('form.uploaded_image')}}</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-info waves-effect waves-light smt">{{__('msg.createQuestion')}}</button>
                                <a class="btn btn-success waves-effect waves-light text-white" href="{{url('question/list')}}">{{__('form.goto_list')}}</a>
                            </div>
                        </div>

                    </form>
                    <iframe id="docView" src='' width='100%' height='565px' frameborder='0' class="d-none"> </iframe>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.noConflict();
        $(function() {
            // file upload

            $('.file-upload-input').on('change', function() {
                readURL(this, 'image');
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
                            $('.file-upload-content').show();

                            $('.image-title').html(input.files[0].name);
                            console.log("File Upload");
                            // $('#uploadForm').change();
                        };
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
                $('.image-upload-wrap').show();
                console.log('File Removed');
                deleteFile()
            }
            $('.image-upload-wrap').bind('dragover', function() {
                // alert('dragover');
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function() {
                // alert('dragleave');
                $('.image-upload-wrap').removeClass('image-dropping');
            });

            // $('#image').on('change', function() {
            //     $('#divImage').removeClass('d-none');
            //     $('#divVideo').addClass('d-none');
            //     console.log('File Upload');
            //
            //     // changeVI('Drag and drop a Image file or select add Image', 'image/*');
            // })

            function saveFile(input){
                // var file = $('#file_path')[0].files[0];
                // console.log(file);
                // var formData = new FormData();
                // formData.append('file_path',file);

                $.ajax({
                    url:"{{url('saveFile')}}",
                    type:"POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{
                        file_path:new FormData(input[0])
                    },
                    processData: false,
                    contentType: false,
                    cache: false,
                    // dataType: 'json',
                    success:function (data){
                        console.log(data);
                    }
                })
            }
            // $('.ipf').on('change',function (){
            //     console.log('Changes');
            // })
            // function changeVI(msg, type) {
            //     $('#txt').html(msg);
            //     $('.ipf').attr('accept', type);
            // }


            $('#uploadForm').on('change', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ url('saveFile') }}",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    processData: false,
                    success:function(data)
                    {
                        $('#docView').removeClass('d-none');
                        var url ="https://view.officeapps.live.com/op/embed.aspx?src=";
                        var file_url = "{{asset('/temp')}}/"+data;
                       $('#file_url').val(data);
                       $('#docView').attr('src',url + file_url);
                    }
                })
            });

            function deleteFile(){
                $.ajax({
                    url:"{{url('deleteFile')}}/" + $('#file_url').val(),
                    method:"GET",
                    success:function (data){
                        $('#docView').addClass('d-none');
                        $('#docView').attr('src','');
                        $('#file_url').val('');
                    }
                })
            }
        })
    </script>
@endsection
