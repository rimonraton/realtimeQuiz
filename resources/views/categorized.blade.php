@foreach($quiz as $qz)
    @include('_quiz_card', ['qz', $qz])
@endforeach

<div class="row justify-content-center my-3 newone">
  {{ $quiz->links() }}
</div>
