@php $lang = App::getLocale(); @endphp
<div class="table-responsive" style="overflow-x: hidden">

    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                @if($quizcategory->count() > 0)
                    <table class="table table-striped table-bordered" >
                        <thead>
                        <tr role="row">
                            <th style="width: 0px;">{{__('form.sl')}}</th>
                            <th style="width: 0px;">{{__('form.question_type_en')}}</th>
                            <th style="width: 0px;">{{__('form.question_type_bn')}}</th>
                            <th style="width: 0px;">{{__('form.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizcategory as $qc)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                <td id="name_{{$qc->id}}">{{$qc->name}}</td>
                                <td id="bn_name_{{$qc->id}}">{{$qc->bn_name}}</td>
                                <td style="text-align: center; ">
                                    <a class="edit" href="" id="btn_{{$qc->id}}" data-id="{{$qc->id}}" data-name="{{$qc->name}}" data-bnname="{{$qc->bn_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$qc->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.question_type_en')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.question_type_bn')}}</th>
                            <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{$quizcategory->links()}}
                @else
                    <div class="text-center">
                        <p>{{__('form.no_data_found')}}</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
