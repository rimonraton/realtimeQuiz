@php $lang = App::getLocale(); @endphp
<div class="table-responsive" style="overflow-x: hidden">
    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                @if($category->count() > 0)
                    <table class="table table-striped table-bordered" >
                        <thead>
                        <tr role="row">
                            <th style="width: 0px;">{{__('form.sl')}}</th>
                            <th style="width: 0px;">{{__('form.topic_en')}}</th>
                            <th style="width: 0px;">{{__('form.topic_bn')}}</th>
                            <th style="width: 0px;">{{__('form.publish')}}</th>
                            <th style="width: 0px;">{{__('form.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $c)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                <td id="name_{{$c->id}}">{{$c->name}}</td>
                                <td id="bn_name_{{$c->id}}">{{$c->bn_name}}</td>
                                <td class="text-center">
                                    @if(Permission::can('categoryPublished'))
                                    <div class="bt-switch">
                                        <input type="checkbox" class="chk" data-id="{{$c->id}}"  data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$c->is_published ==1?"checked":""}} />
                                    </div>
                                    @else
                                        <div class="bt-switch">
                                            <input type="checkbox"  data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" disabled {{$c->is_published ==1?"checked":""}} />
                                        </div>
                                    @endif
                                </td>
                                <td style="text-align: center; ">
                                    @if(Permission::can('question.updateCategory'))
                                    <a class="edit" id="btn_{{$c->id}}" href="" data-id="{{$c->id}}" data-name="{{$c->name}}" data-bangla="{{$c->bn_name}}" data-st="{{$c->sub_topic_id}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    @endif
                                    @if(Permission::can('question.deleteCategory'))
                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$c->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.topic_en')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.topic_bn')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.publish')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{$category->links()}}
                @else
                    <div class="text-center">
                        <p>
                            {{__('form.no_data_found')}}
                        </p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
</script>
