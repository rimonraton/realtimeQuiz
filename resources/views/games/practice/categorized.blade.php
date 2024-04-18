@foreach($quiz as $qz)
    @include('games.practice._quiz_card', ['qz', $qz])
@endforeach

<div class="row justify-content-center my-3 newone">
  {{ $quiz->links() }}
</div>
