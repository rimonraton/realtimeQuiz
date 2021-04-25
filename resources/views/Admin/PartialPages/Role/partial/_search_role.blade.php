@php $lang = App::getLocale(); @endphp
<div class="table-responsive" style="overflow-x: hidden">

    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                @if($roles->count() > 0)
                    <table class="table table-striped table-bordered" >
                        <thead>
                        <tr role="row">
                            <th style="width: 10%;">{{__('form.sl')}}</th>
                            <th style="width: 35%;">{{__('form.role_name')}}</th>
                            <th style="width: 35%;">{{__('form.role_name_bn')}}</th>
                            <th style="width: 20%;">{{__('form.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $role)
                            <tr>
                                <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                <td>{{$role->role_name}}</td>
                                <td>{{$role->bn_role_name}}</td>
                                <td style="text-align: center; ">
                                    <a class="edit" href="" data-id="{{$role->id}}" data-name="{{$role->role_name}}" data-bn_name="{{$role->bn_role_name}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="delete text-danger" style="cursor: pointer;" data-id="{{$role->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('form.sl')}}</th>
                            <th>{{__('form.role_name')}}</th>
                            <th>{{__('form.role_name_bn')}}</th>
                            <th>{{__('form.action')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{$roles->links()}}
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
