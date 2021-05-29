@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">{{__('form.quiz')}}</h4>
                <hr>
{{--                <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right" data-toggle="modal" data-target="#add-contact">{{__('form.add_team')}}</button>--}}

                <div class="row justify-content-center">
                    <!-- col -->
                    @foreach($quizzes as $q)
                    <div class="col-lg-3 col-md-6 mt-3">
                        <div class="card bg-light-primary h-100 ">
                            <div class="card-body">
                                <h5 class="card-title text-center font-20">{{$q->quiz_name}}</h5>
                                <div  class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class=" flex-column">
{{--                                            <h3 class="font-20 text-center">{{$q->quiz_name}}</h3>--}}
{{--                                            <p class="text-white">25th Jan</p>--}}
                                            <div class="text-white mt-2 text-center">
                                                @foreach(App\Team::whereIn('id',explode(',',$q->team_ids))->get() as $team)
                                                <span class="badge badge-secondary">{{$team->name}}</span>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a class="btn btn-outline-purple" href=""><i class="fas fa-share-alt"></i> {{ __('msg.share') }}</a>
                                <a class="btn btn-outline-inverse" href="">{{__('msg.start')}}</a>
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

</script>
@endsection
