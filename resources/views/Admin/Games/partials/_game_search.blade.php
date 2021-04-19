@php $lang = App::getLocale(); @endphp
<div class="table-responsive" style="overflow-x: hidden">

    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr role="row">
                        <th style="width: 0px;">{{__('form.sl')}}</th>
                        <th style="width: 0px;">{{__('form.game_mode_en')}}</th>
                        <th style="width: 0px;">{{__('form.game_mode_bn')}}</th>
                        <th style="width: 0px;">{{__('form.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($game as $g)
                        <tr>
                            <td class="sorting_1">{{$lang=='bd'?$bang->bn_number($loop->iteration):$loop->iteration}}</td>
                            <td>{{$g->gb_game_name}}</td>
                            <td>{{$g->bd_game_name}}</td>
                            <td style="text-align: center; ">
                                <a class="edit" href="" data-id="{{$g->id}}" data-gb="{{$g->gb_game_name}}" data-bd="{{$g->bd_game_name}}" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="delete" style="cursor: pointer;" data-id="{{$g->id}}" title="Remove">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">{{__('form.sl')}}</th>
                        <th rowspan="1" colspan="1">{{__('form.game_mode_en')}}</th>
                        <th rowspan="1" colspan="1">{{__('form.game_mode_bn')}}</th>
                        <th rowspan="1" colspan="1">{{__('form.action')}}</th>
                    </tr>
                    </tfoot>
                </table>
            {{$game->links()}}
            <!-- <div class="text-center">
                                    <p>
                                        No Data Found..
                                    </p>
                                </div> -->
            </div>
        </div>

    </div>
</div>
