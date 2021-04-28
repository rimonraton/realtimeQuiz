@extends('Admin.Layout.dashboard')
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title text-center">{{__('msg.challenge')}}
                    </h4>

                    <hr>
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
                                                <th style="width: 20%;">{{__('form.user_name')}}</th>
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
                                                <td>{{$ch->user->name}}</td>
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
                                                <th>{{__('form.user_name')}}</th>
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
{{--                    @foreach($challange_testing as $cr)--}}
{{--                    <div class="table-responsive" style="overflow-x: hidden">--}}
{{--                        <h5>{{$cr->role_name}}</h5>--}}
{{--                        <hr>--}}
{{--                        @foreach($cr->users as $cru)--}}
{{--                        {{$cru->id}}--}}
{{--                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        @if( count($cru->challange))--}}
{{--                                            <table  class="table table-striped table-bordered">--}}
{{--                                                <thead>--}}
{{--                                                <tr role="row" class="text-center">--}}
{{--                                                    <th style="width: 10%;">{{__('form.sl')}}</th>--}}
{{--                                                    <th style="width: 40%;">{{__('Challange Name')}}</th>--}}
{{--                                                    <th style="width: 20%;">{{__('User ')}}</th>--}}
{{--                                                    <th style="width: 18%;">{{__('Number of Questions')}}</th>--}}
{{--                                                    <th style="width: 12%;">{{__('Publish')}}</th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}
{{--                                                @foreach($cru->challange as $ch)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$loop->iteration}}</td>--}}
{{--                                                        <td>{{$ch->name}}</td>--}}
{{--                                                        <td>{{$ch->user->name}}</td>--}}
{{--                                                        <td>{{$ch->quantity}}</td>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="bt-switch">--}}
{{--                                                                <input type="checkbox" class="chk" data-id="{{$ch->id}}"  data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$ch->is_published ==1?"checked":""}} />--}}
{{--                                                            </div>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                                </tbody>--}}
{{--                                                <tfoot>--}}
{{--                                                <tr class="text-center">--}}
{{--                                                    <th>{{__('form.sl')}}</th>--}}
{{--                                                    <th>{{__('Challange Name')}}</th>--}}
{{--                                                    <th>{{__('User ')}}</th>--}}
{{--                                                    <th>{{__('Number of Questions ')}}</th>--}}
{{--                                                    <th>{{__('Publish')}}</th>--}}
{{--                                                </tr>--}}
{{--                                                </tfoot>--}}
{{--                                            </table>--}}
{{--                                        @endif--}}

{{--                                        {{$challange->links()}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('js')

    <script>
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        $(document).on('switchChange.bootstrapSwitch', '.chk', function(event, state) {
            var id = $(this).attr('data-id');
            if (state == true) {

                publishedOrNot(id, 1);
                // $(this).prop('checked', true);
            } else {
                publishedOrNot(id, 0);
                // $(this).removeProp('checked');

            }
        });
        function publishedOrNot(id, value) {
            $.ajax({
                url: "{{url('challange-Published')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'value': value
                },
                success: function(data) {
                    Swal.fire({
                        text: data,
                        type: 'success',
                        timer: 1000,
                        showConfirmButton: false
                    })
                }
            })
        }
        $(document).on('click', ".delete", function() {
            Swal.fire({
                title: "{{__('form.are_you_sure')}}",
                text: "{{__('form.no_revert')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:"{{__('form.cancel')}}",
                confirmButtonText: '{{__('form.yes_delete_it')}}!'
            }).then((result) => {
                if (result.value) {
                    var $this = $(this);
                    var id = $this.attr('data-id');
                    $.ajax({
                        url: "{{url('delete_challange')}}/" + id,
                        type: "GET",
                        success: function(data) {
                            $this.closest("tr").remove();
                            Swal.fire({
                                text: data,
                                type: 'success',
                                timer: 1000,
                                showConfirmButton: false
                            })
                        }
                    })

                }
            })
        });
    </script>

@endsection
