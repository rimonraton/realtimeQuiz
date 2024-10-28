@extends('layouts.app')

@section('content')
    <practice :id="{{ $id }}"
      :questions="{{ $questions }}"
      :user="{{ $user }}"
      :gmsg="{{ $gmsg }}"
      :quiz="{{ $quiz }}"
      ></practice>
@endsection
