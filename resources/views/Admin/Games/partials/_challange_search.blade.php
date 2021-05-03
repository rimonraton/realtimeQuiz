@php $lang = App::getLocale(); @endphp
<div class="table-responsive" style="overflow-x: hidden">

    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    @if( count($challange))
                        <table  class="table table-striped table-bordered">
                            <thead>
                            <tr role="row" class="text-center">
                                <th style="width: 10%;">{{__('form.sl')}}</th>
                                <th style="width: 30%;">{{__('form.challenge_name')}}</th>
                                {{--                                                <th style="width: 20%;">{{__('form.user_name')}}</th>--}}
                                <th style="width: 18%;">{{__('form.noq')}}</th>
                                <th style="width: 12%;">{{__('form.publish')}}</th>
                                <th style="width: 10%;">{{__('form.action')}}</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($challange as $ch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ch->name}}</td>
                                    {{--                                                <td>{{$ch->user->name}}</td>--}}
                                    <td>{{$ch->quantity}}</td>
                                    <td class="text-center">
                                        <div class="bt-switch">
                                            <input type="checkbox" class="chk" data-id="{{$ch->id}}"  data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$ch->is_published ==1?"checked":""}} />
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="delete text-danger" style="cursor: pointer;" data-id="{{$ch->id}}" title="Remove"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <th>{{__('form.sl')}}</th>
                                <th>{{__('form.challenge_name')}}</th>
                                {{--                                                <th>{{__('form.user_name')}}</th>--}}
                                <th>{{__('form.noq')}}</th>
                                <th>{{__('form.publish')}}</th>
                                <th>{{__('form.action')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    @else
                        <p>No data found..</p>
                    @endif

                    {{$challange->links()}}
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
</script>
