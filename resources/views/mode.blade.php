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

.task {
  box-shadow: 0 0 2px #007bff;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  /*perspective: 800px;*/
  transform-style: preserve-3d;
}

.abstract,
.details {
  width: 100%;
  padding: 15px 30px;
  position: relative;
}
.task:hover .abstract,
.task:hover .details {
  /*background: #fafafa;*/
}

.abstract {
  transition: 0.3s ease all;
}

.details {
  background: linear-gradient(to left, #FF512F, #DD2476);
  color:white;
  max-height: 0;
  padding: 0;
  overflow: hidden;
  visibility: visible;
  transform: rotateX(-180deg);
  transform-origin: top center;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: 0.3s transform ease;
}
.details:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 10%;
  right: 10%;
  height: 1px;
  background: grey;
}
.task:hover .details {
  max-height: none;
  overflow: visible;
  visibility: visible;
  transform: rotateX(0deg);
}

.details__inner {
  padding: 15px 30px;
}


</style>
@section('content')
<div class="container">
  <div class="row justify-content-center ml-0">
    <div class="btn-group" role="group" aria-label="Game Mode">
      <a href="{{ url('Mode/Practice') }}" class="btn btn-{{ $type =='Practice' ? 'success':'secondary' }}">
        <i class="fas fa-address-card text-white"></i>
        {{ __('msg.practice') }}
      </a>
      <a href="{{ url('Mode/Challenge') }}" class="btn btn-{{ $type =='Challenge' ? 'success':'secondary' }}">
        <i class="fas fa-people-arrows text-white"></i>
        {{ __('msg.challenge') }}
      </a>
      <a href="{{ url('Mode/Moderator') }}" class="btn btn-{{ $type =='Moderator' ? 'success':'secondary' }}">
        <i class="fas fa-user text-white"></i>
        {{ __('msg.moderator') }}
      </a>
      <a href="{{ url('Mode/Team') }}" class="btn btn-{{ $type =='Team' ? 'success':'secondary' }}">
        <i class="fas fa-users text-white"></i>
        {{ __('msg.team') }}
      </a>
    </div>
  </div>
  <div class="row justify-content-center ml-0 mb-5">
    @foreach($categories as $cat)
    <div class="col-md-4 col-sm-12 text-center">
      <div class="wrap my-3">
        <div class="task">
          <div class="abstract">
            <h3>Abstract</h3>
            <p>This is what you see by default.</p>
          </div>
          <div class="details">
            <div class="details__inner">
              <h3>Details</h3>
              <p>This additional content gets revealed on hover.</p>
            </div>
          </div>
        </div>
      </div>

     {{--  <div class="dropdowns">
        @if($cat->childs)
        @foreach($cat->childs as $cc)
        <div class="item collapses">{{ $cc->name }}</div>
        @endforeach
        @endif
        <div class="item collapses">{{ $cat->name }}</div>
      </div> --}}
    </div>
    @endforeach
  </div>

 {{--  <div class="row justify-content-center ml-0 mt-5">
      @foreach($quiz as $qz)
          <div class="col-md-4 col-sm-12 text-center">
              <div class="card my-3">
              <span class="text-muted text-right pr-2 position-absolute w-100">
                {{ count(explode(',', $qz->questions)) . ' questions. ' }}
              </span>
                <div class="card-body text-secondary">
                  <h5 class="card-title">{{ __('msg.quiz') }}</h5>
                  <h5 class="card-title">{{ $qz->quizCategory->name }}</h5>
                  <p class="card-text">{{ $qz->quiz_name }}</p>
                  
                  <a href="{{ url('Mode/' . $type . '/'. $qz->id . '/' . Auth::id()) }}"
                     class="btn btn-sm btn-outline-success">{{ __('msg.start') }}</a>
                  
                  @if($type != 'Practice')
                    <a class="btn btn-sm btn-outline-info shareBtn" data-id="{{ $qz->id }}">
                      {{ __('msg.share') }} 
                      <div class="loading{{ $qz->id }}"></div>
                    </a>
                    <div id="shareBtn{{ $qz->id }}" class="show_share shareBtnDiv">
                      
                    </div>
                  @endif
                </div>
              </div>
          </div>
      @endforeach
      <div class="row justify-content-center">
              {{ $quiz->links() }}
      </div>
  
  </div>     --}}

</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
      $('.shareBtn').on('click', function(){
        let id = $(this).attr('data-id');
        $('.loading'+id).addClass('spinner-grow spinner-grow-sm');

        let hasShow = $('#shareBtn'+id).hasClass('show_share');
        let url = '{{ url('/Mode/' .$type) }}/' + id + '/{{ Auth::id() }}' + '/share';
        let iframe ='<iframe id="shareFrame'+id+'" src="'+url+'" frameborder="0" class="iframe-size"></iframe>';

        $('.show_share').empty();
        $('#shareBtn'+id).append(iframe);

        $('#shareFrame'+id).on('load', function(){
          $('.loading'+id).removeClass('spinner-grow spinner-grow-sm');
        });

      });

    var dropdown = $('.dropdowns');
    $('.item').on('click', function() {
      $(this).toggleClass('collapses');

      if ($(this).parents().hasClass('dropped')) {
        $(this).parents().toggleClass('dropped');
      } else {
        setTimeout(()=> {
          $(this).parents().toggleClass('dropped');
        }, 150);
      }
    })

  });

</script>
