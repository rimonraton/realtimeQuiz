@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 pxs-0">
            <div class="card">
                {{-- <div class="card-header">{{ $type }}</div> --}}

                <div class="card-body pxs-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <challenge
                        :challenge="{{ $challenge }}"
                        :hostid="{{ $uid }}"
                        :quizquestions="{{ $questions }}"
                        :user="{{ $user }}"
                        :gmsg="{{ $gmsg }}"
                    ></challenge>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
