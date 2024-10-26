@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 p-0">
            <practice :id="{{ $id }}"
            	:questions="{{ $questions }}"
            	:user="{{ $user }}"
            	:gmsg="{{ $gmsg }}"
            	:quiz="{{ $quiz }}"
            	></practice>
        </div>
    </div>
@endsection
