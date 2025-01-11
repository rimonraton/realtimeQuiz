<div class="col-md-4 col-sm-12 text-center mb-4 ">
    <div class="card shadow h-100 animate-fast animate__zoomIn animate__animated animate__delay-1s">
        <div class="d-flex justify-content-between py-1 px-2">
            @auth
            <div class="text-muted">
                @if($qz->progress->max('stars'))
                    @include('includes.stars.'.$qz->progress->max('stars'))
                @endif
            </div>
            @endauth
            <div class="d-flex pointer p-2"
                 title="{{ $qz->difficulty == 1? __('msg.easy') : ($qz->difficulty == 2? __('msg.intermediate') : __('msg.hard') ) }}"
                 data-placement="top"
                 data-toggle="tooltip">
                @include('includes.difficulty.'.$qz->difficulty)
            </div>
            <span class="text-muted">
                @php $qc = count(explode(',', $qz->questions)); @endphp
                {{ app()->getLocale() == 'bd'? $bang->bn_number($qc) . 'টি ' : $qc  }}
                {{ __('games.questions') }}
              </span>
        </div>
        <a href="{{ url('Practice/'. $qz->id . '/' . Auth::id()) }}" class="" >
            <div class="card-body py-0 ">
                <h5 class="my-3 text-primary">
                  {{ app()->getLocale() == 'bd'? $qz->bd_quiz_name : $qz->quiz_name }}
                </h5>
                <div id="shareBtn{{ $qz->id }}" class="show_share shareBtnDiv"></div>
            </div>
        </a>

        <div class="info d-flex justify-content-between py-1 px-2 mt-auto ">
            @auth
                <a class="lessonResult pointer " id="{{ $qz->id }}"
                   title="{{ __('msg.history') }}"
                   data-placement="top"
                   data-toggle="tooltip">
                    <i class="fas fa-user-clock"></i>
                    {{ $qz->progress->count() }}
                </a>
                <i class="fas fa-check text-success"></i>
            @endauth
        </div>
    </div>
</div>
