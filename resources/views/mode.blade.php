@extends('layouts.app')
<style type="text/css">
  
    .card:hover{
       box-shadow: 0 0 3px #007bff;
    }
    .row{
        width: 100%;
    }


    .folder-wrap{
      display: flex;
      flex-wrap:wrap;
    }
    
    .tile{
        border-radius: 3px;
        width: calc(20% - 17px);
        margin-bottom: 23px;
        text-align: center;
        border: 1px solid #eeeeee;
        transition: 0.2s all cubic-bezier(0.4, 0.0, 0.2, 1);
        position: relative;
        padding: 35px 16px 25px;
        margin-right: 17px;
        cursor: pointer;
    }
    .tile:hover{
      box-shadow: 0px 7px 5px -6px rgba(0, 0, 0, 0.12);
    }
    .tile i{
        color: #00A8FF;
        height: 55px;
        margin-bottom: 20px;
        font-size: 55px;
        display: block;
        line-height: 54px;
        cursor: pointer;
    }
    .tile i.mdi-file-document{
      color:#8fd9ff;
    }

    /* Transitioning */
    .folder-wrap{
      position: absolute;
      width: 100%;
      transition: .365s all cubic-bezier(.4,0,.2,1);
      pointer-events: none;
      opacity: 0;
      top: 0;
    }
    .folder-wrap.level-up{
      transform: scale(1.2);
        
    }
    .folder-wrap.level-current{
      transform: scale(1);
      pointer-events:all;
      opacity:1;
      position:relative;
      height: auto;
      overflow: visible;
    }
    .folder-wrap.level-down{
      transform: scale(0.8);  
    }
    .iframe-size{
      width: 90vw;
      height: 90vh;
      left: 3vw;
    }
    .hide_share{
      position: absolute;
      left: 3%;
      top: -25px;
      height: 40px;
      width: 300px;
      overflow: hidden;
      transition: .3s linear;
      opacity: 0;
      visibility: hidden;
    }
    .show_share {
      position: absolute;
      left: 3%;
      top: -25px;
      height: 40px;
      width: 300px;
      overflow: hidden;
      transition:  .5s linear;
      opacity: 1;

    }
</style>
@section('content')
<div class="container">
    {{-- <button class="btn btn-secondary btn-sm m-3 back">Back to Main</button> --}}
    <div class="row justify-content-center ml-0">
        @foreach($exams as $exam)
            <div class="col-md-4 col-sm-12 text-center">
                <div class="card my-3">
                  <div class="card-body text-secondary">
                    <h5 class="card-title">{{ __('msg.quiz') }}</h5>
                    <p class="card-text">{{ $exam->exam_name }}</p>
                    <a href="{{ url('Mode/' . $type . '/'. $exam->id . '/' . Auth::id()) }}"
                       class="btn btn-sm btn-outline-success">{{ __('msg.start') }}</a>
                    <a class="btn btn-sm btn-outline-info shareBtn" data-id="{{ $exam->id }}">{{ __('msg.share') }}</a>
                    @if($type == 'Challenge')
                      <div id="shareBtn{{ $exam->id }}" class="hide_share shareBtnDiv">
                        <iframe src="{{ url('Mode/' .$type. '/' .$exam->id . '/' . Auth::id() . '/share') }}" frameborder="0" class="iframe-size"></iframe>
                      </div>
                    @endif

                    {{-- <iframe id="shareBtn{{ $exam->id }}" class="hide" src="{{ url('Mode/' .$type. '/' .$exam->id . '/' . Auth::id() . '/share') }}" frameborder="0" style="position: absolute; top: 25%; left: 2%; width: 96%; background: transparent;"></iframe> --}}
                  </div>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
                {{ $exams->links() }}
        </div>
    
    </div>    

</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
      $('.shareBtn').on('click', function(){
        let id = $(this).attr('data-id');
        let hasShow = $('#shareBtn'+id).hasClass('show_share');

        $('.shareBtnDiv').removeClass('show_share').addClass('hide_share');
        if(hasShow){ return; }
        $('#shareBtn'+id).removeClass('hide_share').addClass('show_share');
      });
  });

</script>
