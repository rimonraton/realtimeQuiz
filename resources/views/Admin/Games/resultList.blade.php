@extends('Admin.Layout.dashboard')
@section('css')
@endsection
@php $lang = App::getLocale(); @endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        Results
                    </h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr role="row">
                                <th style="width: 10%;">{{__('form.sl')}}</th>
                                <th style="width: 30%;">Challenge</th>
                                <th style="width: 30%;">Users</th>
                                <th style="width: 50%;">Attend At</th>
                                <th style="width: 10%;" class="text-center">{{__('form.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($results as $result)
                                @php $users = collect(json_decode($result->users)); @endphp
                                <tr>
                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                    <td>{{$result->challenge->name}}</td>
                                    <td>
                                        @foreach($users as $user)
                                            {{ $user->name . ( $loop->last? '': ',' ) }}
                                        @endforeach
                                    </td>
                                    <td>{{$result->created_at->diffForHumans()}}</td>
                                    <td class="text-center">
                                        <a href="{{url('challengeShareResult/'.$result->link.'/details')}}" class="edit" style="cursor: pointer; color:black;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 10%;">{{__('form.sl')}}</th>
                                <th style="width: 30%;">Challenge</th>
                                <th style="width: 30%;">Users</th>
                                <th style="width: 50%;">Attend At</th>
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

</script>
@endsection
