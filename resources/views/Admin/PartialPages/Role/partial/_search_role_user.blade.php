@php
    $lang = App::getLocale();
@endphp
<div class="table-responsive" style="overflow-x: hidden">

    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                @if($user_role->count() > 0)
                    <table class="table table-striped table-bordered" >
                        <thead>
                        <tr role="row">
                            <th style="width: 10%;">{{__('form.sl')}}</th>
                            <th style="width: 20%;">{{__('form.user_name')}}</th>
                            <th style="width: 30%;">{{__('form.email')}}</th>
                            <th style="width: 20%;">{{__('form.role')}}</th>
                            <th style="width: 20%;">{{__('form.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_role as $ur)
                            @if($ur->roleuser && $ur->roleuser->role->id != 1)
                                <tr>
                                    <td>{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                    <td>{{$ur->name}}</td>
                                    <td>{{$ur->email}}</td>
                                    <td>{{$ur->roleuser->role->role_name}}</td>
                                    <td style="text-align: center; ">
                                        <a class="edit" href="" data-id="{{$ur->roleuser->id}}" data-role="{{$ur->roleuser->role->id}}" data-user="{{$ur->id}}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="delete text-danger" style="cursor: pointer;" data-id="{{$ur->roleuser->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('form.sl')}}</th>
                            <th>{{__('form.user_name')}}</th>
                            <th>{{__('form.email')}}</th>
                            <th>{{__('form.role')}}</th>
                            <th>{{__('form.action')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                    {{$user_role->links()}}
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
