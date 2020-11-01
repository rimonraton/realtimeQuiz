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
                    <a href="{{ url('singleGame/'.$exam->id . '/'. Auth::id()) }}"
                       class="btn btn-sm btn-outline-primary">Practice</a>
                    <a class="btn btn-sm btn-outline-success " href="{{ url('game/'.$exam->id . '/'. Auth::id()) }}">Play</a>
                  </div>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
                {{ $exams->links() }}
        </div>
    
    </div>    

    {{-- <div class="row justify-content-center ml-0">

            <div class="stage">
              
                <div class="folder-wrap level-current scrolling">
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                <div class="folder-wrap level-down">
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                <div class="folder-wrap">
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                <div class="folder-wrap">
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                <div class="folder-wrap">
                    
                    <div class="tile folder">
                      <i class="mdi mdi-folder"></i>
                      <h3>Folder name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.folder -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                <div class="folder-wrap">
                    
                    <div class="tile form">
                      <i class="mdi mdi-file-document"></i>
                      <h3>Form name</h3>
                      <p>Something something</p>
                    </div><!-- .tile.form -->
                    
                </div><!-- .folder-wrap -->
                  
               
              
            </div>  
    </div>   --}}

</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Folder on click
      $('.folder').on( "click", function() {
        
          console.log( "Drill down" );
          $('.level-up').removeClass('level-up');
          $('.level-current').addClass('level-up');
          $('.level-current').removeClass('level-current');       
          $('.level-down').addClass('level-current');
          $('.level-down').removeClass('level-down').next().addClass('level-down');
        
      });
        
      // Back on Click
      $('.back').on( "click", function() {
        if(
          $('.level-current').is(':first-child')){
           console.log( "Current is top" );
        } 
        else {
          console.log( "Drill back up" );
          $('.level-down').removeClass('level-down')
          $('.level-current').addClass('level-down');
          $('.level-current').removeClass('level-current');
          $('.level-up').addClass('level-current');
          $('.level-up').removeClass('level-up').prev().addClass('level-up');
        }
        
      });
      
      
    });

</script>
