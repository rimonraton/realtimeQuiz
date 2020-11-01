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
                    {{-- <a class="btn btn-sm btn-outline-success " href="{{ url('game/'.$exam->id . '/'. Auth::id()) }}">Start</a> --}}
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
      
  });

</script>
