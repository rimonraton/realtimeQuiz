@php $lang = App::getLocale(); @endphp
<div class="card w-100">
    <div class="card-body">
        <ul class="nav nav-tabs mb-3">
            @foreach($questions as $q)
            {{--@if($q->questions->count() > 0)--}}
                @if($q->questions->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)
            <li class="nav-item">
                <a href="#home{{$q->id}}" data-toggle="tab" aria-expanded="true" class="nav-link {{$loop->first?'active':''}}">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">{{$lang=='gb'?$q->name:$q->bn_name}}</span>
                </a>
            </li>
            @endif
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($questions as $q)
{{--                @if($q->questions->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)--}}
            @can('QM',\App\Question::class)
                    @if(auth()->user()->roleuser->role->role_name === 'Quiz Master')
                        <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">

                            @php
                                $questionCat = $q->questions()->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->paginate(20);
                                if($page>1){
                                    $page--;
                                }
                                $Qnumber = $page * 20;
                            @endphp
                           <div class="row justify-content-center">
                            @foreach($questionCat as $qq)
                                <div class="checkbox checkbox-info col-2">
                                    <input type="checkbox" name="questions[]" value="{{$qq->id}}" id="chc{{$qq->id}}" class="material-inputs chk qchk child{{$q->id}}">
                                    <label for="chc{{$qq->id}}">{{$bang->bn_number($loop->iteration + $Qnumber)}}</label>
                                </div>
                            @endforeach
                           </div>
                            <div class="row mt-4 justify-content-center">
                                {{$questionCat->links()}}
                            </div>
                        </div>
                    @else
                        <div class="tab-pane {{$loop->first?'active':''}}" id="home{{$q->id}}">
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6 pb-2">--}}
{{--                                    <input type="checkbox" value="" id="child{{$q->id}}" class="material-inputs checkAll">--}}
{{--                                    <label for="child{{$q->id}}">{{__('form.check_all')}}</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            @php
                                $questionCat = $q->questions()->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->paginate(100);
                            @endphp
                            <div class="row justify-content-center" v-else>
                            @foreach($questionCat as $qq)
                                <div class="border border-secondary p-2 m-1 rounded-lg text-center">
                                    <input type="checkbox" name="questions[]" value="{{$qq->id}}" id="chc{{$qq->id}}" class="material-inputs chk child{{$q->id}}">
                                    <label for="chc{{$qq->id}}" class="ml-2"></label>
                                </div>
                            @endforeach
                                </div>
{{--                            <div class="table-responsive" style="overflow-x: hidden">--}}
{{--                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-12 pt-3">--}}
{{--                                            <div class="table-responsive">--}}
{{--                                                <table class="table table-striped table-bordered">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr role="row">--}}
{{--                                                        <th style="width: 10%;">{{__('form.sl')}}</th>--}}
{{--                                                        <th style="width: 10%;">{{__('form.action')}}</th>--}}
{{--                                                        <th style="width: 40%;">{{__('form.question_en')}}</th>--}}
{{--                                                        <th style="width: 40%;">{{__('form.question_bn')}}</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    @php--}}
{{--                                                        $questionCat = $q->questions()->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->paginate(10);--}}
{{--                                                    @endphp--}}
{{--                                                    @foreach($questionCat as $qq)--}}
{{--                                                        <tr>--}}
{{--                                                            <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>--}}
{{--                                                            <td class="text-center">--}}
{{--                                                                <!-- <div class="col-md-12"> -->--}}
{{--                                                                <input type="checkbox" name="questions[]" value="{{$qq->id}}" id="chc{{$qq->id}}" class="material-inputs chk child{{$q->id}}">--}}
{{--                                                                <label for="chc{{$qq->id}}"></label>--}}
{{--                                                                <!-- </div> -->--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                {{$qq->question_text}}--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                {{$qq->bd_question_text}}--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
{{--                                                    @endforeach--}}
{{--                                                    </tbody>--}}
{{--                                                    <tfoot>--}}
{{--                                                    <tr>--}}
{{--                                                        <th>{{__('form.sl')}}</th>--}}
{{--                                                        <th>{{__('form.action')}}</th>--}}
{{--                                                        <th>{{__('form.question_en')}}</th>--}}
{{--                                                        <th>{{__('form.question_bn')}}</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </tfoot>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-8">
                                    {{$questionCat->links()}}
                                </div>
                                <div class="col-md-4" >
                                    <div class="text-center loading" style="display: none;">
                                        <button class="btn btn-primary" type="button" disabled="">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            {{__('form.loading')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    @endif--}}
                    @endcan
                @endif
            @endforeach
        </div>
    </div> <!-- end card-body-->
</div>
