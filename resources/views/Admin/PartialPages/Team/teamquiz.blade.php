@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp

@section('css')
    <style>
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
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a type="button" class="btn btn-info btn-rounded float-right" href="{{url('quiz/create')}}" >{{__('form.create_quiz')}}</a>
                <h4 class="card-title text-center">{{__('form.quiz')}}</h4>
                <hr>


                <div class="row justify-content-center">
                    <!-- col -->
                    @foreach($quizzes as $q)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card bg-light-primary h-100 ">
                            <div class="card-body">
                                <h5 class="card-title text-center font-20">{{$lang=='gb'?$q->quiz_name:$q->bd_quiz_name}}</h5>
                                <div  class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class=" flex-column">
{{--                                            <h3 class="font-20 text-center">{{$q->quiz_name}}</h3>--}}
{{--                                            <p class="text-white">25th Jan</p>--}}
                                            <div class="text-white mt-2 text-center">
                                                @foreach(App\Team::whereIn('id',explode(',',$q->team_ids))->get() as $team)
                                                <span class="badge badge-secondary">{{$lang=='gb'?$team->name:$team->bn_name}}</span>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div id="shareBtn{{ $q->id }}" class="show_share shareBtnDiv"></div>
                                <a class="shareBtn pointer small btn btn-outline-purple" data-id="{{ $q->id }}">
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
@endsection

@section('js')
<script>
    $('.shareBtn').on('click', function(e){
        e.stopPropagation();
        let id = $(this).attr('data-id');
        $('.loading'+id).addClass('spinner-grow spinner-grow-sm');

        let hasShow = $('#shareBtn'+id).hasClass('show_share');
        let url = "{{ url('/Challenge') }}/" + id + "/{{ Auth::id() }}/share";
        let iframe ='<iframe id="shareFrame'+id+'" src="'+url+'" frameborder="0" class="iframe-size"></iframe>';

        $('.show_share').empty();
        $('#shareBtn'+id).append(iframe);

        $('#shareFrame'+id).on('load', function(){
            $('.loading'+id).removeClass('spinner-grow spinner-grow-sm');
        });

    });

</script>
@endsection
