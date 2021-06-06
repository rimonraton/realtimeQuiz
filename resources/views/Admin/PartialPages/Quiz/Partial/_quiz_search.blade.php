@php $lang = App::getLocale(); @endphp
@if($role ==='Quiz Master')
    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table  class="table table-striped table-bordered">
                        <thead>
                        <tr role="row" class="text-center">
                            <th style="width: 10%;">{{__('form.sl')}}</th>
                            <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                            <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                            <th style="width: 15%;">{{__('form.noq')}}</th>
                            @if($role ==='Participant')
                                <th style="width: 15%;">{{__('form.publish')}}</th>
                            @else
                                <th style="width: 15%;">{{__('form.publish')}}</th>
                                <th style="width: 10%;">{{__('form.action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz as $qs)
                            <tr class="text-center">
                                <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>
                                <td>@if($qs->quiz_name){{$qs->quiz_name}}@endif </td>

                                <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>
                                <td> <span class="badge badge-info">{{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}</span></td>
                                @if($role==='Participant')
                                    <td>
                                        <span class="badge badge-info">{{$qs->status ==1?__('form.yes'):__('form.no')}}</span></td>
                                @else
                                    <td>
                                        @can('readOrwrite',$qs)
                                            <div class="bt-switch">
                                                <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />
                                            </div>
                                        @else
                                            <div class="bt-switch">
                                                <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />
                                            </div>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('viewQuestion',\App\Quiz::class)
                                            <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>
                                        @endcan
                                        @can('update',$qs)
                                            <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('readOrwrite',$qs)
                                            <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                        @else
                                            <a class="disabled"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="disabled"><i class="fas fa-trash"></i></a>
                                        @endcan
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('form.sl')}}</th>
                            <th>{{__('form.quiz_name_en')}}</th>
                            <th>{{__('form.quiz_name_bn')}}</th>
                            <th>{{__('form.noq')}}</th>
                            @if($role==='Participant')
                                <th>{{__('form.publish')}}</th>
                            @else
                                <th>{{__('form.publish')}}</th>
                                <th>{{__('form.action')}}</th>
                            @endif
                        </tr>
                        </tfoot>
                    </table>
                    {{$quiz->links()}}
                </div>
            </div>
        </div>

    </div>
@else
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                @foreach($games as $q)
                    @if($q->quiz->where('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)
                        <li class="nav-item">
                            <a href="#home{{$q->id}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$loop->first?'active':''}}">
                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">{{$lang=='gb'?$q->gb_game_name:$q->bd_game_name}}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div class="tab-content">
                {{--            {{$questions->count()}}--}}
                @foreach($games as $q)
                    @if($q->quiz->where('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)
                        <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">
                            <div class="" style="overflow-x: hidden">

                                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 pt-3">
                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr role="row" class="text-center">
                                                        <th style="width: 10%;">{{__('form.sl')}}</th>
                                                        <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                                                        <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                                                        <th style="width: 15%;">{{__('form.noq')}}</th>
                                                        @if($role ==='Participant')
                                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                                        @else
                                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                                            <th style="width: 10%;">{{__('form.action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $questionCat = $q->quiz()->where('category_id', $id)->whereIn('user_id',$admin_users)->paginate(5);
                                                    @endphp
                                                    @foreach($questionCat as $qs)
                                                        <tr class="text-center">
                                                            <td>{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>
                                                            <td>@if($qs->quiz_name){{$qs->quiz_name}}@endif </td>

                                                            <td>@if($qs->bd_quiz_name){{$qs->bd_quiz_name}} @endif</td>
                                                            <td> <span class="badge badge-info">{{$lang=='bd'?$bang->bn_number(count(explode(",", $qs->questions))):count(explode(",", $qs->questions))}} {{__('form.qus')}}</span></td>
                                                            @if($role==='Participant')
                                                                <td>
                                                                    <span class="badge badge-info">{{$qs->status ==1?__('form.yes'):__('form.no')}}</span></td>
                                                            @else
                                                                <td>
                                                                    @can('readOrwrite',$qs)
                                                                        <div class="bt-switch">
                                                                            <input type="checkbox" class="chk" data-id="{{$qs->id}}" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$qs->status ==1?"checked":""}} />
                                                                        </div>
                                                                    @else
                                                                        <div class="bt-switch">
                                                                            <input type="checkbox" data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled />
                                                                        </div>
                                                                    @endcan
                                                                </td>
                                                                <td>
                                                                    @can('viewQuestion',\App\Quiz::class)
                                                                        <a class="view" style="cursor: pointer; color:teal;" data-question="{{$qs->quiz_name}}" data-id="{{$qs->id}}" title="View"><i class="fas fa-eye"></i></a>
                                                                        {{--                                                @endcan--}}
                                                                        {{--                                                @can('update',$qs)--}}
                                                                        <a class="edit" href="{{url('quiz/'.$qs->id.'/edit')}}" style="cursor: pointer; color:black;" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                                                    @endcan
                                                                    @can('readOrwrite',$qs)
                                                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                                                    @else
                                                                        <a class="disabled"><i class="fas fa-pencil-alt"></i></a>
                                                                        <a class="disabled"><i class="fas fa-trash"></i></a>
                                                                    @endcan
                                                                </td>
                                                            @endif

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr role="row" class="text-center">
                                                        <th style="width: 10%;">{{__('form.sl')}}</th>
                                                        <th style="width: 25%;">{{__('form.quiz_name_en')}}</th>
                                                        <th style="width: 25%;">{{__('form.quiz_name_bn')}}</th>
                                                        <th style="width: 15%;">{{__('form.noq')}}</th>
                                                        @if($role ==='Participant')
                                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                                        @else
                                                            <th style="width: 15%;">{{__('form.publish')}}</th>
                                                            <th style="width: 10%;">{{__('form.action')}}</th>
                                                        @endif
                                                    </tr>

                                                    </tfoot>
                                                </table>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {{$questionCat->links()}}
                                                </div>
                                                {{--                                            <div class="col-md-4" >--}}
                                                {{--                                                <div class="text-center loading" style="display: block;">--}}
                                                {{--                                                    <button class="btn btn-primary" type="button" disabled="">--}}
                                                {{--                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>--}}
                                                {{--                                                        {{__('form.loading')}}--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach

            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
@endif
<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
</script>
