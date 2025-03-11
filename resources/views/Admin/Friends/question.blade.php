@extends('Admin.Layout.dashboard')
@section('content')
  <div class="card">
    <form action="{{ route('similar.question.store') }}" method="POST" id="formFriendRequest">
      @csrf
      <input type="text" name="question" >

      <button type="submit">Submit</button>
    </form>
  </div>
@endsection


