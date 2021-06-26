@extends('Admin.Layout.dashboard')
@section('css')
    <style>
        .tooltip-inner {
            background-color: gray;
        }

        .bs-tooltip-bottom .arrow::before {
            border-bottom-color: gray;
        }
        /*.tooltip-inner {*/
        /*    background-color: #00acd6 !important;*/
        /*    color: #fff;*/
        /*}*/
        .bs-tooltip-top .arrow::before, .bs-tooltip-auto[x-placement^="top"]
        .arrow::before {
            border-top-color: gray;
        }
    </style>
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        {{__('games.results')}}
                    </h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr role="row">
                                <th style="width: 10%;">{{__('form.sl')}}</th>
                                <th style="width: 30%;">{{__('games.challenge_name')}}</th>
                                <th style="width: 30%;">{{__('games.participants')}}</th>
                                <th style="width: 50%;">{{__('games.participation_time')}}</th>
                                <th style="width: 10%;" class="text-center">{{__('form.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($results as $result)
                                @php $users = collect(json_decode($result->results)); @endphp
                                <tr>
                                    <td class="sorting_1">{{$lang=='gb'?$loop->iteration:$bang->bn_number($loop->iteration)}}</td>
                                    <td>Name</td>
                                    <td>
                                        @foreach($users as $user)
{{--                                            {{ $user->name . ( $loop->last? '': ',' ) }}--}}
                                            <span class="badge badge-primary">{{$user->name}}</span>
                                        @endforeach
                                    </td>
                                    <td><span class="badge badge-info">{{$result->created_at->diffForHumans()}}</span> </td>
                                    <td class="text-center">
                                        <a href="{{url('challengeShareResult/'.$result->link.'/details')}}" class="edit" style="cursor: pointer; color:black;" data-toggle="tooltip" data-placement="top" title="{{__('games.view_result')}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($result)
                                            @if($result->host_id == Auth::id())
                                                <span href="" class="dlt_result" data-id="{{$result->id}}" style="cursor: pointer; color:black;" data-toggle="tooltip" data-placement="top" title="{{__('msg.delete')}}">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </span>
                                            @endif
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 10%;">{{__('form.sl')}}</th>
                                <th style="width: 30%;">{{__('games.challenge_name')}}</th>
                                <th style="width: 30%;">{{__('games.participants')}}</th>
                                <th style="width: 50%;">{{__('games.participation_time')}}</th>
                                <th style="width: 10%;" class="text-center">{{__('form.action')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('js')
<script>
$('.dlt_result').on('click',function (){
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url:"{{url('deleteresult')}}/" + id,
        type:"GET",
        success:function (data){

        }


    })
});
$(document).on('click', ".dlt_result", function() {
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
                url: "{{url('deleteresult')}}/" + id,
                type: "GET",
                success: function(data) {
                    // $(this).parent().parent().remove();
                    // alert($this.parent().parent());
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
