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
                            <th style="width: 0px;">{{__('form.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $c)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$loop->iteration}}</td>
                                <td id="name_{{$c->id}}">{{$c->name}}</td>
                                <td id="bn_name_{{$c->id}}">{{$c->bn_name}}</td>
                                <td style="text-align: center; ">
                                    <a class="edit" id="btn_{{$c->id}}" href="" data-id="{{$c->id}}" data-name="{{$c->name}}" data-bangla="{{$c->bn_name}}" data-st="{{$c->sub_topic_id}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$c->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.topic_en')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.topic_bn')}}</th>
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
