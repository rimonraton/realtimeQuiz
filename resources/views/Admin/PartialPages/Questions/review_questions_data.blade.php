@php $lang = App::getLocale(); @endphp
<div class="card">
{{--    <div class="row justify-content-center">--}}
{{--        <div class="input-group mb-3 col-sm-6">--}}
{{--            <input type="text" class="form-control" placeholder="{{ $lang == 'gb' ? 'Enter word & sentence for search' : 'শব্দ ও বাক্য দিয়ে খুজুন'}}" aria-label="Search" aria-describedby="basic-addon2" id="search_input_keyword">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-primary" type="button" data-tid="{{$id[0]}}" id="search_question_category">{{$lang == 'gb' ? 'Search' : 'খুজুন'}}</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="card-body">
        <div class="text-center verifyButton d-none" id="verifybtnDiv">
            <button class="p-1 border border-success rounded-lg bg-success text-white" data-tid="{{$id}}" id="verify">{{$lang == 'gb' ? 'Verify' : 'যাচাই করুন'}}</button>
        </div>
        <ul class="nav nav-tabs mb-3">
            @foreach($questions as $q)
            @if($q->questions->where('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)
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
{{--            {{$questions->count()}}--}}
            @foreach($questions as $q)
            @if($q->questions->whereIn('category_id', $id)->whereIn('user_id',$admin_users)->count() > 0)
            <div class="tab-pane {{$loop->first? 'active' : ''}}" id="home{{$q->id}}">
                <div class="" style="overflow-x: hidden">
                    <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 pt-3">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;">
                                                    <input type="checkbox" id="alloptionverify" name="allverify" class="material-inputs alloptionverify" >
                                                    <label for="alloptionverify"></label>
                                                </th>
                                                <th style="width: 10%;">{{__('form.created')}}</th>
                                                <th style="width: 6%;">{{__('form.file')}}</th>
                                                <th style="width: 30%;">{{__('form.question_en').'/'.__('form.question_bn')}}</th>
                                                <th style="width: 30%;">{{__('form.en_options') .'/'.__('form.bn_options')}}</th>
{{--                                                <th style="width: 10%;">{{__('form.bn_options')}}</th>--}}
                                                <th style="width: 20%;">{{__('form.file')}}</th>
                                                <th style="width: 3%;" class="text-center">{{__('form.action') .'/'.__('form.status')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            if ($keyword){
                                                $questionCat = $q->questions()
                                                ->where('status', 0)
                                                ->whereIn('user_id', $admin_users)
                                                ->where('question_text', 'like', '%' . $keyword . '%')
                                                ->orWhere('bd_question_text', 'like', '%' . $keyword . '%')
                                                ->where('category_id', $id)
                                                ->with('difficulty')
                                                ->orderBy('id','desc')
                                                ->paginate(10);
                                            } else{
                                                $questionCat = $q->questions()
                                                ->where('status', 0)
                                                ->where('category_id', $id)
                                                ->whereIn('user_id', $admin_users)
                                                ->with('difficulty')
                                                ->orderBy('id','desc')
                                                ->paginate(10);
                                            }
                                        @endphp
                                            @foreach($questionCat as $qs)
                                            <tr>
                                                <td>
{{--                                                    {{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}--}}
                                                    <input type="checkbox" id="optionveri{{$qs->id}}" class="material-inputs verifyelement" name="verified" value="{{$qs->id}}">
                                                    <label for="optionveri{{$qs->id}}"></label>
                                                </td>
                                                <td>
                                                    @if($qs->role)
                                                        {{$lang=='gb'?$qs->role->role->role_name:$qs->role->role->bn_role_name}}
                                                    @else
                                                        <span>__</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" id="fileavi_{{$qs->id}}">
                                                    @if($qs->fileType == 'image' || $qs->fileType == 'video' || $qs->fileType == 'audio')
                                                        @if($qs->fileType == 'image')
                                                            <img src="{{asset($qs->question_file_link)}}" alt="" width="150" height="100">
                                                        @elseif($qs->fileType == 'video')
                                                            <video width="150" height="100" controls>
                                                                <source src="{{asset($qs->question_file_link)}}" type="video/mp4">
                                                                <source src="{{asset($qs->question_file_link)}}" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @else
                                                            <audio controls style="width: 150px">
                                                                <source src="{{asset($qs->question_file_link)}}" type="audio/ogg">
                                                                <source src="{{asset($qs->question_file_link)}}" type="audio/mpeg">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @endif
                                                    @else
                                                    <span>__</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($qs->question_text)
                                                    <p id="eq_{{$qs->id}}" class="p-1 border border-success rounded-lg">{{$qs->question_text}}</p>
                                                    @endif
                                                    @if($qs->question_text && $qs->bd_question_text)
                                                            <hr>
                                                    @endif
                                                    @if($qs->bd_question_text)
                                                    <p id="bq_{{$qs->id}}" class="p-1 border border-primary rounded-lg">{{$qs->bd_question_text ? $qs->bd_question_text : ''}}</p>
                                                    @endif
                                                </td>
                                                <td class="text-center" >
                                                    <span id="eo_{{$qs->id}}">
                                                    @foreach($qs->options as $qo)
                                                        @if($qo->option)
                                                            <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;">
                                                                @if($qo->correct)
                                                                <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                                @endif
                                                               {{$qo->option}}
                                                            </span>
                                                        @else
                                                            -
                                                        @endif
                                                    @endforeach
                                                        </span>
                                                        <hr>
                                                    <span id="bo_{{$qs->id}}">
                                                        @foreach($qs->options as $qo)
                                                            @if($qo->bd_option)
                                                                <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;" >
                                                                @if($qo->correct)
                                                                        <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                                    @endif
                                                                    {{$qo->bd_option}}
                                                            </span>

                                                            @else
                                                                -
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </td>
{{--                                                <td id="bo_{{$qs->id}}">--}}
{{--                                                    @foreach($qs->options as $qo)--}}
{{--                                                        @if($qo->bd_option)--}}
{{--                                                            <span class="btn btn-sm m-1" style="border: #5378e8 1px solid;">--}}
{{--                                                                @if($qo->correct)--}}
{{--                                                                <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>--}}
{{--                                                                @endif--}}
{{--                                                                {{$qo->bd_option}}--}}
{{--                                                            </span>--}}

{{--                                                        @else--}}
{{--                                                            ---}}
{{--                                                    @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </td>--}}
                                                <td id="optImg_{{$qs->id}}">
{{--                                                    {{$qs->options->first()}}--}}
                                                    @foreach($qs->options as $qo)
                                                    @if($qo->flag == 'img')
                                                        <span class="btn btn-sm m-1 rounded-lg" style="border: #5378e8 1px solid;">
                                                            @if($qo->correct)
                                                            <i class="{{$qo->correct?'fa fa-check':''}}" style="color:#5378e8"></i>
                                                            @endif
                                                           <img src="{{asset($qo->img_link)}}" alt="" width="30px">
                                                        </span>
                                                    @else
                                                    -
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    @can('QuestionreadOrwrite',$qs)
                                                        <a class="edit" style="cursor: pointer; color:black;" data-id="{{$qs->id}}" title="edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <a class="delete" style="cursor: pointer;color:red;" data-id="{{$qs->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                                    @else
                                                        <a class="disabled"><i class="fas fa-pencil-alt"></i></a>
                                                        <a class="disabled"><i class="fas fa-trash"></i></a>
                                                    @endcan
                                                        <hr>
                                                    <span id="difficulty_{{$qs->id}}">
                                                         @if($qs->difficulty)
                                                            <span class="badge badge-pill bad {{$qs->difficulty->id == 1 ? 'badge-secondary' :($qs->difficulty->id == 2 ? 'badge-cyan' : 'badge-danger')}}">
                                                                {{$lang == 'gb' ? $qs->difficulty->name : $qs->difficulty->bn_name }}
                                                            </span>
                                                        @endif
                                                    </span>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="alloptionverify" name="allverify" class="material-inputs alloptionverify" >
                                                    <label for="alloptionverify"></label>
                                                </th>
                                                <th>{{__('form.created')}}</th>
                                                <th>{{__('form.file')}}</th>
                                                <th>{{__('form.question_en').'/'.__('form.question_bn')}}</th>
                                                <th>{{__('form.en_options').'/'.__('form.bn_options')}}</th>
{{--                                                <th>{{__('form.bn_options')}}</th>--}}
                                                <th>{{__('form.file')}}</th>
                                                <th>{{__('form.action') .'/'.__('form.status')}}</th>
                                            </tr>

                                        </tfoot>
                                    </table>


                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        {{$questionCat->links()}}
                                    </div>
                                    <div class="col-md-4" >
                                        <div class="text-center loading" style="display: block;">
                                            <button class="btn btn-primary" type="button" disabled="">
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                {{__('form.loading')}}
                                            </button>
                                        </div>
                                    </div>
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
<script>
    var table;
    $('.dataTable').DataTable({
        responsive: true,
        "ordering": false,
    });
</script>
