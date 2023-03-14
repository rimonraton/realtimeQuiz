@php $lang = App::getLocale(); @endphp
<div class="card">
    <div class="card-body">
        @if($QwithO->question_text)
        <h5 class="card-title text-center p-2 border border-success rounded-lg">
            {{$QwithO->question_text}}
            @if($QwithO->difficulty)
                <span class="badge badge-pill {{$QwithO->difficulty->id == 1 ? 'badge-secondary' :($QwithO->difficulty->id == 2 ? 'badge-cyan' : 'badge-danger')}}">
                    {{ $QwithO->difficulty->name }}
                </span>
            @endif
        </h5>
        @endif
        @if($QwithO->bd_question_text)
        <h5 class="card-title text-center p-2 border border-primary rounded-lg">
            {{$QwithO->bd_question_text}}
            @if($QwithO->difficulty)
                <span class="badge badge-pill {{$QwithO->difficulty->id == 1 ? 'badge-secondary' :($QwithO->difficulty->id == 2 ? 'badge-cyan' : 'badge-danger')}}">
                    {{ $QwithO->difficulty->bn_name }}
                </span>
            @endif
        </h5>
            @endif
        <div class="form-group d-flex justify-content-center">
            @foreach($QwithO->options as $option)
                @if( $option->option)
            <label class="form-check-label p-2 m-1 border border-secondary rounded-lg" >{{$option->option}} <span class="text-success">{{$option->correct ? '✓' : ''}}</span></label>
                @endif
            @if($option->bd_option)
            <label class="form-check-label p-2 m-1 border border-secondary rounded-lg" >{{$option->bd_option}} <span class="text-success">{{$option->correct ? '✓' : ''}}</span></label>
                    @endif
            @endforeach
        </div>
    </div>
</div>
