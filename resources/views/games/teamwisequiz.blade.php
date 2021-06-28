@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ $type }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <team-moderator :id="{{ $id }}"
                    :uid="{{ $uid }}"
                    :questions="{{ $questions }}"
                    :user="{{ $user }}"
                    :gmsg="{{ $gmsg }}"
                    :teams="{{$team}}"
                    :topics="{{$topic}}">
                    </team-moderator>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


