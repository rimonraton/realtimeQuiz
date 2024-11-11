@extends('layouts.app')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('extra/css/dropdown.css') }}"/>
  {{-- <link rel="stylesheet" href="{{ asset('extra/css/codehim-dropdown.css') }}"> --}}

  <style type="text/css">

    .card.shadow {
      max-height: 140px;
    }

    a:hover {
      text-decoration: none !important;
    }

    .iframe-size {
      width: 90vw;
      height: 90vh;
      left: 3vw;
    }

    .hide_share {
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
      transition: .5s linear;
      opacity: 1;

    }

    .pointer {
      cursor: pointer;
      text-decoration: none !important;
    }

    .stars {
      position: absolute;
      font-size: 10px;
    }

    .checked {
      color: gold;
    }


    .info .pointer {
      background: linear-gradient(to right, #6c757d, #6c757d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .card a:hover {
      background: linear-gradient(to right, #00d2ff, #3a7bd5);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .shadow {
      -moz-box-shadow: inset 0 0 10px #000000;
      -webkit-box-shadow: inset 0 0 10px #000000;
      box-shadow: inset 0 0 10px #000000;
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

    .glass {
      background: transparent;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
      border-radius: 15px;
    }


    .circle-left, .circle-right {
      background: white;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.1));
      height: 20rem;
      width: 20rem;
      position: absolute;
      border-radius: 50%;
    }

    .circle-center {
      background: white;
      background: linear-gradient(to left bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.1));
      position: absolute;
      height: 89vh;
      width: 100vh;
      -webkit-clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
      clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
      top: 11vh;
      left: 50vh;
    }

    .circle-left {
      bottom: -10%;
      left: 5%;
    }

    .circle-right {
      top: 1%;
      right: 5%;
    }

    .accordionView {
      position: absolute;
      top: 154px;
      right: 258px;
      z-index: 99999;
      width: 20%;
      /* padding: 12; */
      margin-right: 5%;
    }

    @media screen and ( max-width: 520px ) {
      /* li.page-item {
         display: none;
       }
       .page-item:first-child,
       .page-item:last-child,
       .page-item.active {
           display: block;
       }*/
      .accordionView {
        top: 163px;
        right: 70px;
        z-index: 99999;
        width: 66%;
        /* padding: 12; */
        /* margin-right: 124%; */
      }
    }

    /*@media screen and (min-width: 30em) {*/
    /*    .accordionView {*/
    /*        position: absolute;*/
    /*        top: 163px;*/
    /*        right: 70px;*/
    /*        z-index: 99999;*/
    /*        width: 66%;*/
    /*        !* padding: 12; *!*/
    /*        !* margin-right: 124%; *!*/
    /*    }*/
    /*}*/


  </style>

@stop
@php $lang = app()->getLocale(); @endphp
@section('content')
  <div class="container glass  animate__zoomIn ">
    <div class="row justify-content-center">
      <div class="btn-group " role="group" aria-label="Game Mode">
        <a href="{{ route('game.practice') }}" class="btn btn-outline-success">
          <i class="fas fa-address-card "></i>
          {{ __('msg.practice') }}
        </a>
        <a href="{{ route('game.challenge') }}" class="btn btn-outline-primary">
          <i class="fas fa-people-arrows "></i>
          {{ __('msg.challenge') }}
        </a>
        <a href="{{ route('game.moderator') }}" class="btn btn-outline-primary">
          <i class="fas fa-user "></i>
          {{ __('msg.quizmaster') }}
        </a>
        <a href="{{ route('game.team') }}" class="btn btn-outline-primary">
          <i class="fas fa-users "></i>
          {{ __('msg.team') }}
        </a>
      </div>
      <select id="quizCat" data-dropdown='{ "closeReset": false }'>
        <option>{{ __('games.select_category') }}</option>
        @foreach($categories as $category)
          @if(count($category->childs))
            <optgroup label="{{ $lang == 'bd' ? $category->bn_name : $category->name }}">
            @foreach($category->childs as $cc)
              @if(count($cc->childs))
                <optgroup label="{{ $lang == 'bd' ? $cc->bn_name : $cc->name }}">
                  @foreach($cc->childs as $ccs)
                    <option>{{ $lang == 'bd' ? $ccs->bn_name : $ccs->name  }}</option>
                  @endforeach
                </optgroup>
              @else
                <option>{{ $lang == 'bd' ? $cc->bn_name : $cc->name  }}</option>
                @endif

                @endforeach
                </optgroup>
                @else
                  <option>{{ $lang == 'bd' ? $category->bn_name : $category->name  }}</option>
                @endif
                @endforeach
      </select>

    </div>

    <div class="row justify-content-center mt-4 " id="quizlist">
      @foreach($quiz as $qz)
        @include('games.practice._quiz_card', ['qz'=> $qz])
      @endforeach

      <div class="justify-content-center mx-3 table-responsive">
        {{ $quiz->links() }}
      </div>
    </div>

  </div>
@endsection
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
<div class="circle-left animate__animated animate__rotateInUpLeft animate__slow"></div>
<div class="circle-right animate__animated animate__rotateInUpRight animate__slow"></div>
{{-- <div class="circle-center animate__animated animate__rotateIn animate__delay-1s"></div> --}}

@section('js')
  <script src="{{ asset('extra/js/jquery.dropdown.js') }}" defer></script>

  {{-- <script src="{{ asset('extra/js/codehim.dropdown.js') }}" defer></script> --}}

  {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
  <script defer>

    document.addEventListener('DOMContentLoaded', function () {
      $('#showCat').on('click', function () {
        console.log($('#accordion').hasClass('d-none'))
        if ($('#accordion').hasClass('d-none')) {
          $('#accordion').removeClass('d-none')
        } else {
          $('#accordion').addClass('d-none')
        }


      })
      $('[data-toggle="tooltip"]').tooltip();
      $('.shareBtn').on('click', function () {
        let id = $(this).attr('data-id');
        $('.loading' + id).addClass('spinner-grow spinner-grow-sm');

        let hasShow = $('#shareBtn' + id).hasClass('show_share');
        let url = '{{ url('/Mode/') }}/' + id + '/{{ Auth::id() }}' + '/share';
        let iframe = '<iframe id="shareFrame' + id + '" src="' + url + '" frameborder="0" class="iframe-size"></iframe>';

        $('.show_share').empty();
        $('#shareBtn' + id).append(iframe);

        $('#shareFrame' + id).on('load', function () {
          $('.loading' + id).removeClass('spinner-grow spinner-grow-sm');
        });

      });

      $('#lesson').on('click', function () {
        $('#lessonModal').modal();
      });

      $(document).on('click', '.lessonResult', function () {
        var id = $(this).attr('id');
        $.ajax({
          url: '{{ url('getProgress') }}/' + id,
          type: "GET",
          success: function (data) {
            $('#lesson_id').text(id);
            $('#resultData').empty();
            $('#resultData').append(data);
            $('#resultModal').modal();
          }
        });
      });

      $('#quizCat').dropdown();

      @if($selected_category)
        $('#quizCat').val("{!! $lang == 'bd' ? $selected_category->bn_name : $selected_category->name !!}").trigger('change');
      @endif


      $('#quizCat').on('dropdown.select', function (e, item) {
        console.log('item = > ' + JSON.stringify(item));
        $.ajax({
          url: "{{ url('getCategory') }}/" + item.value,
          type: "GET",
          success: function (data) {
            $('#quizlist').html(data);
            // $('body .pagination a').addClass('nothind..');
          }
        });

      });

      $('[data-toggle="tooltip"]').tooltip();
      // $(".dropdown-items").CodehimDropdown();
      $('body').on('click', '.newone .pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
          url: url,
          type: "GET",
          beforeSend: function () {
            // $('.loading').show();
            // $('#msg').hide();
            // $('#viewData').hide();
            console.log('BEFORE');
          },
          success: function (data) {
            console.log(data);
            if (data != '') {
              $('#quizlist').html(data);
            } else {

              $('#quizlist').html(
                `<div class="text-center">
                            <p>Data not available.</p>
                            </div>`
              );

            }
            console.log(data);
          },
          complete: function () {
            // $('.loading').hide();
            // $('#showCategory').show();
            console.log('COMPLETE');

          }
        })
        // window.history.pushState("", "", url);
      });
    });

  </script>

@endsection


