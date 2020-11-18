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
  .hide {
    position: fixed;
    z-index: 99999;
    width: 100vw;
    height: 10vh;
    transition: .3s ease;
    bottom: 0px;
    left: -110vw;.
    background: #C9D6FF;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E2E2E2, #C9D6FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  }
  .show{
    position: fixed;
    z-index: 99999;
    width: 100vw;
    height: 10vh;
    transition: .3s ease;
    bottom: 0px;
    left: 0;.
    background: #C9D6FF;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E2E2E2, #C9D6FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  }
  .cross {
    color: red;
    font-size: 2rem;
    position: absolute;
    right: 15px;
    cursor: pointer;
  }
  .iframe-size{
    width: 90vw;
    height: 90vh;
    left: 3vw;
  }

</style>
@section('content')
<div class="container">
    {{-- <button class="btn btn-secondary btn-sm m-3 back">Back to Main</button> --}}
    <div class="row justify-content-center ml-0">
        @foreach($exams as $exam)
            <div class="col-md-4 col-sm-12 text-center">
                <div class="card border-secondary mb-3">
                  <div class="card-body text-secondary">
                    <h5 class="card-title">Quiz</h5>
                    <p class="card-text">{{ $exam->exam_name }}</p>
                    <a href="{{ url('Mode/' . $type . '/'. $exam->id . '/' . Auth::id()) }}"
                       class="btn btn-sm btn-outline-success">Start</a>
                       {{-- <div class="shareBtnDiv"></div> --}}
                    <a class="btn btn-sm btn-outline-info shareBtn" data-id="{{ $exam->id }}">Share</a>
                  </div>
                </div>
            </div>
           @if($type == 'Challenge')
            <div id="shareBtn{{ $exam->id }}" class="hide">
              <span class="cross">X</span>
              <iframe src="{{ url('Mode/' .$type. '/' .$exam->id . '/' . Auth::id() . '/share') }}" frameborder="0" class="iframe-size">
                      
                    </iframe>
            </div>
                    
                    
                    @endif
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
        let sh = $('#shareBtn'+id).attr('class');
        $('#shareBtn'+id).removeClass('show').addClass('hide');
        if(sh == 'show'){
          return;
        }
          $('#shareBtn'+id).removeClass('hide').addClass('show');
      });


      $('.cross').on('click', function(){
        $(this).parent().removeClass('show').addClass('hide');
        console.log('cross Clicked');
      });
      


  });

</script>
