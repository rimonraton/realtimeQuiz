@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                {{-- <h2 class="q_num text-right text-muted">Moderator Mode</h2> --}}

                <div class="card-body px-sm-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <moderator :id="{{ $id }}" :uid="{{ $uid }}" :questions="{{ $questions }}" :user="{{ $user }}"></moderator>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
