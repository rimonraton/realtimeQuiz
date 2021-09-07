@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp

@section('css')
    <style>
        .my-card
        {
            position:absolute;
            border-radius:50%;
            text-align :center;

        }
        .iframe-size{
            width: 90vw;
            height: 90vh;
            left: 3vw;
        }
        .hide_share{
            position: absolute;
            left: 3%;
            top: -25px;
            height: 40px;
            width: 300px;
            overflow: hidden;
            transition: .3s linear;
            opacity: 0;
            visibility: hidden;
        }
        .show_share {
            position: absolute;
            left: -17px;
            height: 40px;
            width: 300px;
            overflow: hidden;
            transition: .5s linear;
            opacity: 1;
            bottom: -25px;
        }
        .pointer{
            cursor: pointer;
            text-decoration: none !important;
        }
        a:not([href]):hover{
            color: white !important;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" class="btn btn-info btn-rounded float-right" href="{{url('game_quiz_create')}}" >{{__('form.create_quiz')}}</a>
                <h4 class="card-title text-center">{{__('form.quiz')}}</h4>
                <hr>
                <div class="row justify-content-center">
                    <!-- col -->
                    @foreach($quizzes as $q)
                    <div class="col-lg-3 col-md-6 mt-3" id="qcard_{{$q->id}}">
                        <div class="card bg-light-primary h-100 ">
                            <div class="d-flex justify-content-between">
{{--                                <div><a style="cursor: pointer" class="m-1 quizinfo" data-id="{{$q->id}}" data-toggle="tooltip" data-placement="top" title="{{$lang=='gb'?'Info':'তথ্য'}}"><i class="fas fa-info text-info"></i></a></div>--}}
                                <div>
                                    <a style="cursor: pointer" class="m-1 deleteQuiz" data-id="{{$q->id}}" data-toggle="tooltip" data-placement="top" title="{{$lang == 'gb'?'Delete':'মুছুন'}}">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-center font-20">
{{--                                    {{$lang=='gb'?$q->quiz_name:$q->bd_quiz_name}}--}}
                                    @if($lang=='gb')
                                        @if(!is_null($q->quiz_name))
                                            {{$q->quiz_name}}
                                        @else
                                            {{$q->bd_quiz_name}}
                                        @endif
                                    @else
                                        @if(!is_null($q->bd_quiz_name))
                                        {{$q->bd_quiz_name}}
                                        @else
                                        {{$q->quiz_name}}
                                        @endif
                                    @endif
                                </h5>
                                <div  class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class=" flex-column">
{{--                                            <h3 class="font-20 text-center">{{$q->quiz_name}}</h3>--}}
{{--                                            <p class="text-white">25th Jan</p>--}}
                                            <div class="text-white mt-2 text-center">
                                                @foreach(App\Team::whereIn('id',explode(',',$q->team_ids))->get() as $team)
                                                <span class="badge badge-secondary">
                                                    @if($lang=='gb')
                                                        @if(!is_null($team->name))
                                                            {{$team->name}}
                                                        @else
                                                            {{$team->bn_name}}
                                                        @endif
                                                    @else
                                                        @if(!is_null($team->bn_name))
                                                            {{$team->bn_name}}
                                                        @else
                                                            {{$team->name}}
                                                        @endif
                                                    @endif
                                                </span>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div id="shareBtn{{ $q->id }}" class="show_share shareBtnDiv"></div>
                                <a class="shareBtn pointer small btn btn-outline-info" data-id="{{ $q->id }}">
                                    <i class="fas fa-share-alt"></i> {{ __('msg.share') }}
                                    <div class="loading{{ $q->id }}"></div>
                                </a>
{{--                                <a class="btn btn-outline-purple" href=""><i class="fas fa-share-alt"></i> {{ __('msg.share') }}</a>--}}
                                <a class="btn btn-outline-inverse" href="{{url('Team/'.$q->id.'/'.auth()->user()->id)}}">{{__('msg.start')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Contact Popup Model -->
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{__('form.add_team_header')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" method="POST" action="{{url('createTeam')}}" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" name="name" placeholder="{{__('form.add_team_placholder')}}" >
                        </div>
                        <div class="col-md-6 m-b-20">
                            <input type="text" class="form-control" name="bn_name" placeholder="{{__('form.add_bn_team_placholder')}}" >
                        </div>
                    </div>
                    {{--                                    <div class="row">--}}
                    {{--                                        @foreach($admin_users as $au)--}}
                    {{--                                            @if($au->roleuser->role_id > 3)--}}
                    {{--                                                <div class="checkbox checkbox-info m-1 badge badge-light-danger col-md-5 col-sm-12">--}}
                    {{--                                                    <input type="checkbox" name="members[]" value="{{$au->id}}" id="chca_{{$au->id}}" class="material-inputs chk child{{$au->id}}">--}}
                    {{--                                                    <label for="chca_{{$au->id}}">{{$au->name}}</label>--}}
                    {{--                                                </div>--}}
                    {{--                                            @endif--}}
                    {{--                                        @endforeach--}}
                    {{--                                    </div>--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">{{__('form.save')}}</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{__('form.cancel')}}</button>
                    </div>

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Info -->
<div class="modal fade" id="quizInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quiz Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="text-info text-center mt-3"><h4>Cars</h4></div>
                                <div class="text-info text-center mt-2"><h1>234</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('.shareBtn').on('click', function(e){
        e.stopPropagation();
        let id = $(this).attr('data-id');
        $('.loading'+id).addClass('spinner-grow spinner-grow-sm');

        let hasShow = $('#shareBtn'+id).hasClass('show_share');
        let url = "{{ url('/Team') }}/" + id + "/{{ Auth::id() }}/share";
        {{--let url = "{{ url('/Team') }}/" + id + "/{{ Auth::id() }}";--}}
        let iframe ='<iframe id="shareFrame'+id+'" src="'+url+'" frameborder="0" class="iframe-size"></iframe>';

        $('.show_share').empty();
        $('#shareBtn'+id).append(iframe);

        $('#shareFrame'+id).on('load', function(){
            $('.loading'+id).removeClass('spinner-grow spinner-grow-sm');
        });

    });
    $(document).on('click', ".deleteQuiz", function() {
        Swal.fire({
            title: "{{__('form.are_you_sure')}}",
            text: "{{__('form.no_revert')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:"{{__('form.cancel')}}",
            confirmButtonText: '{{__('form.yes_delete_it')}}!'
        }).then((result) => {
            if (result.value) {
                var $this = $(this);
                var id = $this.attr('data-id');
                $.ajax({
                    url: "{{url('delete_team_quiz')}}/" + id,
                    type: "GET",
                    success: function(data) {
                        $('#qcard_' + id).remove();
                        Swal.fire({
                            text: '{{__('form.delete_success')}}',
                            type: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        })
                    }
                })

            }
        })
    });
    $(document).on('click','.quizinfo',function (){
        $('#quizInfo').modal('show');
        var $this = $(this);
        var id = $this.attr('data-id');
        $.ajax({
            url: "{{url('quiz_info')}}/" + id,
            type: "GET",
            success: function(data) {
                console.log(data);
                {{--Swal.fire({--}}
                {{--    text: '{{__('form.delete_success')}}',--}}
                {{--    type: 'success',--}}
                {{--    timer: 1000,--}}
                {{--    showConfirmButton: false--}}
                {{--})--}}
            }
        })
    })


</script>
@endsection
