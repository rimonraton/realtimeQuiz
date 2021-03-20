@foreach($quiz as $qz)
<div class="col-md-4 col-sm-12 text-center mb-4 ">
    <div class="card shadow h-100 small animate__animated animate__zoomIn">
      <div class="d-flex justify-content-between py-1 px-2">
        <div class="text-muted">
          @if($qz->progress->count())
          @include('includes.stars.4')
          @else
          @include('includes.stars.0')
          @endif
        </div>
        <div class="d-flex pointer p-2"
            title="{{ $qz->difficulty == 1? __('msg.easy') : ($qz->difficulty == 2? __('msg.intermediate') : __('msg.hard') ) }}"
            data-placement="top"
            data-toggle="tooltip">
          @include('includes.difficulty.'.$qz->difficulty)
        </div>
        <span class="text-muted">
          {{ count(explode(',', $qz->questions)) . ' questions. ' }}
        </span>
      </div>

      <a href="{{ url('Mode' . $type . '/'. $qz->id . '/' . Auth::id()) }}" class="" >
        <div class="card-body py-0 ">
          <p class="my-3 text-primary">{{ $qz->quiz_name }}</p>
            <div id="shareBtn{{ $qz->id }}" class="show_share shareBtnDiv"></div>
        </div>
      </a>

      <div class="info d-flex justify-content-between py-1 px-2 mt-auto ">
        <a class="lessonResult pointer " id="{{ $qz->id }}"
          title="{{ __('msg.history') }}"
          data-placement="top"
          data-toggle="tooltip">
          <i class="fas fa-user-clock"></i>
          {{ $qz->progress->count() }}
        </a>
        @if($type != 'Practice')
        <a class="shareBtn pointer small " data-id="{{ $qz->id }}">
          <i class="fas fa-share-alt"></i> {{ __('msg.share') }}
          <div class="loading{{ $qz->id }}"></div>
        </a>
        @endif

        <i class="fas fa-check text-success"></i>
      </div>
    </div>
</div>
@endforeach

<div class="row justify-content-center my-3">
  {{ $quiz->links() }}
</div>
