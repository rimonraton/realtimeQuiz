@extends('layouts.app')

@section('content')
<div class="container p-1 p-md-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-1 p-md-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <moderator-new
                        :id="{{ $id }}"
                        :hostid="{{ $uid }}"
                        :questionsall="{{ $questions }}"
                        :user="{{ $user }}"
                        :gmsg="{{ $gmsg }}"
                        :teams="{{$team}}"
                        :topics="{{$topic}}"
                        :challenge="{{$quiz}}"
                    >
                    </moderator-new>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


