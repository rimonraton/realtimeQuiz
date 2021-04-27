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
                                                <th style="width: 40%;">{{__('Challange Name')}}</th>
                                                <th style="width: 20%;">{{__('User ')}}</th>
                                                <th style="width: 18%;">{{__('Number of Questions')}}</th>
                                                <th style="width: 12%;">{{__('Publish')}}</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($challange as $ch)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ch->name}}</td>
                                                <td>{{$ch->user->name}}</td>
                                                <td>{{$ch->quantity}}</td>
                                                <td>
                                                    <div class="bt-switch">
                                                        <input type="checkbox" class="chk" data-id="{{$ch->id}}"  data-on-text="{{__('form.yes')}}" data-off-text="{{__('form.no')}}" data-size="normal" {{$ch->is_published ==1?"checked":""}} />
                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach


                                            </tbody>
                                            <tfoot>
                                            <tr class="text-center">
                                                <th>{{__('form.sl')}}</th>
                                                <th>{{__('Challange Name')}}</th>
                                                <th>{{__('User ')}}</th>
                                                <th>{{__('Number of Questions ')}}</th>
                                                <th>{{__('Publish')}}</th>
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
    </script>

@endsection
