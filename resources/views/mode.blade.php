@extends('layouts.app')
@section('css')
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('extra/css/dropdown.css') }}" /> --}}
<link rel="stylesheet" href="{{ asset('extra/css/codehim-dropdown.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style type="text/css">
  a:hover{
    text-decoration: none !important;
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

  .stars {
    position: absolute;
    font-size: 10px;
  }
  .checked {
    color: gold;
  }
  .pointer{
    cursor: pointer;
    text-decoration: none !important;
  }

  .info .pointer {
    background: linear-gradient(to right, #6c757d, #6c757d); 
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .card a:hover{
    background: linear-gradient(to right, #00d2ff, #3a7bd5);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .shadow {
    -moz-box-shadow:    inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow:         inset 0 0 10px #000000;
  }
  .close {
    position: absolute;
    right: 5px !important;
    color: red;
    top: 0px !important;
  }

  .close:hover {
    color: red !important;
  }
  .difficulty {
    position: absolute;
    left: 45%;
    top: 10px;
    padding: 5;
    height: auto;
  }
  .normal {
    background: #CAD3C8;
    width: 15px;
    height: 6px;
    margin-right: 5px;
    border-radius: 15px;
  }
  .easy {
    background: #009432;
    width: 15px;
    height: 6px;
    margin-right: 5px;
    border-radius: 15px;
  }
  .intermediate {
    background: #FFC312;
    width: 15px;
    height: 6px;
    margin-right: 5px;
    border-radius: 15px;
  }
  .hard {
    background: #e74c3c;
    width: 15px;
    height: 6px;
    margin-right: 5px;
    border-radius: 15px;
  }
  .main {
    background: linear-gradient(to right top, #65dfc9, #6cdbeb);
    min-height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .glass{
    background: white;
    background: linear-gradient(to right bottom, rgba(255,255,255, 0.7), rgba(255,255,255, 0.3));
    border-radius: 15px;
  }
  .circle-left,.circle-right{
    background: white; 
    background: linear-gradient(to right bottom, rgba(255,255,255, 0.9), rgba(255,255,255, 0.1));
    height: 20rem; 
    width: 20rem;
    position: absolute;
    border-radius: 50%;
  }
  .circle-left{
    bottom: -10%;
    left: 5%;
  }
  .circle-right{
    top: 1%;
    right: 5%;
  }
</style>

@stop

@section('content')
<div class="container glass animate__animated animate__backInRight animate__fast">
  <div class="row justify-content-center ">
    {{-- <div class="btn-group" role="group" aria-label="Game Mode">
      <a href="{{ url('Mode/Practice') }}" class="btn btn-{{ $type =='Practice' ? 'outline-success':'outline-primary' }}">
        <i class="fas fa-address-card "></i>
        {{ __('msg.practice') }}
      </a>
      <a href="{{ url('Mode/Challenge') }}" class="btn btn-{{ $type =='Challenge' ? 'outline-success':'outline-primary' }}">
        <i class="fas fa-people-arrows "></i>
        {{ __('msg.challenge') }}
      </a>
      <a href="{{ url('Mode/Moderator') }}" class="btn btn-{{ $type =='Moderator' ? 'outline-success':'outline-primary' }}">
        <i class="fas fa-user "></i>
        {{ __('msg.moderator') }}
      </a>
      <a href="{{ url('Mode/Team') }}" class="btn btn-{{ $type =='Team' ? 'outline-success':'outline-primary' }}">
        <i class="fas fa-users "></i>
        {{ __('msg.team') }}
      </a>
    </div> --}}
     {{--  <select id="quizCat" data-dropdown='{ "closeReset": false }'>
        <option>Select Quiz Category</option>
        @foreach($categories as $cat)
          @if(count($cat->childs))
            <optgroup label="{{ $cat->bn_name }}">
              @foreach($cat->childs as $cc)
                  <option id={{ $cc->id }}>{{ $cc->bn_name }}</option>
              @endforeach
            <optgroup/>
          @else 
          <option id={{ $cat->id }}>{{ $cat->bn_name }}</option>
          @endif
        @endforeach
      </select> --}}
      <div class="codehim-dropdown">
         <ul class="dropdown-items">
          <li>
            <a href="{{ url('Mode/Practice') }}" class="btn btn-sm btn-{{ $type =='Practice' ? 'outline-success':'outline-primary' }}">
              <i class="fas fa-address-card "></i>
              {{ __('msg.practice') }}
            </a>
          </li>
          <li>
            <a href="{{ url('Mode/Challenge') }}" class="btn btn-sm btn-{{ $type =='Challenge' ? 'outline-success':'outline-primary' }}">
              <i class="fas fa-people-arrows "></i>
              {{ __('msg.challenge') }}
            </a>
          </li>
          <li>
            <a href="{{ url('Mode/Moderator') }}" class="btn btn-sm btn-{{ $type =='Moderator' ? 'outline-success':'outline-primary' }}">
              <i class="fas fa-user "></i>
              {{ __('msg.moderator') }}
            </a>
          </li>
          <li>
            <a href="{{ url('Mode/Team') }}" class="btn btn-sm btn-{{ $type =='Team' ? 'outline-success':'outline-primary' }}">
              <i class="fas fa-users "></i>
              {{ __('msg.team') }}
            </a>
          </li>
          <li>
            <span class="dropdown-heading btn btn-sm btn-outline-primary">
              Select Game Category
            </span>
             <ul class="menu-items" >
                @foreach($categories as $cat)
                  @if(count($cat->childs))
                    <li class="has-child">
                      <span class="parent">{{ $cat->bn_name }}</span>
                      <ul>
                      @foreach($cat->childs as $cc)
                        <li> <a href="{{ url('Mode/'.$type.'/'.$cc->id) }}"> {{ $cc->bn_name }} </a></li>
                      @endforeach
                      </ul>
                    </li>
                  @else 
                  <li> <a href="{{ url('Mode/'.$type.'/'.$cat->id) }}"> {{ $cat->bn_name }}</a></li>
                  @endif
                @endforeach
             </ul>
          </li>

         </ul>
      </div>
      
      {{-- <nav class="codehim-dropdown">
         <ul class="dropdown-items ">
            <li class="btn btn-outline-primary">
              <span class="dropdown-heading">
               Select Game Category
              </span>
               <ul class="menu-items">
                  @foreach($categories as $cat)
                    @if(count($cat->childs))
                      <li class="has-child">
                         <span class="parent">{{ $cat->bn_name }}</span>
                         <ul>
                          @foreach($cat->childs as $cc)
                            <li> <a href="{{ url('Mode/'.$type.'/'.$cc->id) }}"> {{ $cc->bn_name }}</a></li>
                        @endforeach
                         </ul>
                      </li>
                    @else 
                    <li> <a href="{{ url('Mode/'.$type.'/'.$cat->id) }}"> {{ $cat->bn_name }}</a></li>
                    @endif
                  @endforeach
               </ul>
            </li>
            <li>
              <a href="{{ url('Mode/Practice') }}" class="btn btn-{{ $type =='Practice' ? 'outline-success':'outline-primary' }}">
                <i class="fas fa-address-card "></i>
                {{ __('msg.practice') }}
              </a>
            </li>
            <li>
              <a href="{{ url('Mode/Challenge') }}" class="btn btn-{{ $type =='Challenge' ? 'outline-success':'outline-primary' }}">
                <i class="fas fa-people-arrows "></i>
                {{ __('msg.challenge') }}
              </a>
            </li>
            <li>
              <a href="{{ url('Mode/Moderator') }}" class="btn btn-{{ $type =='Moderator' ? 'outline-success':'outline-primary' }}">
                <i class="fas fa-user "></i>
                {{ __('msg.moderator') }}
              </a>
            </li>
            <li>
              <a href="{{ url('Mode/Team') }}" class="btn btn-{{ $type =='Team' ? 'outline-success':'outline-primary' }}">
                <i class="fas fa-users "></i>
                {{ __('msg.team') }}
              </a>
            </li>
 
         </ul>
      </nav> --}}
  </div>

  <div class="row justify-content-center mt-md-4 ">
      @foreach($quiz as $qz)
        <div class="col-md-4 col-sm-12 text-center mb-4 ">
            <div class="card shadow h-100 small">
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

              <a href="{{ url('Mode/' . $type . '/'. $qz->id . '/' . Auth::id()) }}" class="" >
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
  
  </div>
  

  <div class="modal animate__animated animate__zoomIn" id="resultModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body" style="height: 90vh; overflow: auto;">
          <div class="panel panel-success">
            <div class="panel-heading">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              History
            </div>

            <div class="panel-body" id="resultData">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    

</div>
@endsection
<div class="circle-left animate__animated animate__rotateInUpLeft animate__delay-1s"></div>
<div class="circle-right animate__animated animate__rotateInUpRight animate__delay-1s"></div>

@section('js')
{{-- <script src="{{ asset('extra/js/jquery.dropdown.js') }}" defer></script> --}}

<script src="{{ asset('extra/js/codehim.dropdown.js') }}" defer></script>

<script defer>
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

    $('#lesson').on('click', function() {
      $('#lessonModal').modal();
    });

    $('.lessonResult').on('click', function() {
      var id = $(this).attr('id');
      $.ajax({
        url: '{{ url('getProgress') }}/' + id,
        type: "GET",
        success: function(data) {
          $('#lesson_id').text(id);
          $('#resultData').empty();
          $('#resultData').append(data);
          $('#resultModal').modal();
        }
      });
    });

    $('#quizCat').dropdown();
    $('.dropdown-text').click(function(){
      alert($(this).attr('id'));
    });

    $('[data-toggle="tooltip"]').tooltip();
    $(".dropdown-items").CodehimDropdown();

  });

</script>

@endsection

  
