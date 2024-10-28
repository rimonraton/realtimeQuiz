<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Template chage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('css/qwiz/template.css')}}">
</head>
<body>
  <div class="container">
{{--    top bar--}}
    <nav class="d-flex justify-content-between p-3">
      <div class="d-flex align-items-center justify-content-center">
        <img src="{{asset('mobiletemplate/images/logo.png')}}" width="100px" alt="Logo">
      </div>
      <div class="d-flex align-items-center justify-content-end bg-dark-info w-100">

        <div class="d-flex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-user"></i>
          </div>
          <div class="p-2 d-flex flex-column f-8">
            <!-- Example single danger button -->

            <span>
              @if (strlen($user->name) > 15)
                {{ substr($user->name, 0, 15) . '...' }}
              @else
                {{ $user->name }}
              @endif
            </span>
            <span>
              <i class="fa-regular fa-star text-warning"></i>
            </span>
          </div>
        </div>

        <div class="dropdown-menu p-0">
          <a class="dropdown-item" href="{{url('/profile')}}">
            <i class="fa-solid fa-user text-info"></i>
            Profile
          </a>
          <span class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-sign-in-alt text-danger"></i>
            Logout
          </span>
        </div>
        <div class="p-2 d-flex flex-column">
          <span class="py-1">
            <img src="{{asset('mobiletemplate/images/qr.png')}}" width="20px" alt="QR">
          </span>
          <span>
            <img src="{{asset('mobiletemplate/images/chat.png')}}" width="20px" alt="Chat">
          </span>
        </div>

      </div>
    </nav>
{{--    top bar End--}}

    <div class="pl-3">
      <p class="mb-0">Hey <strong>{{ $user->name }},</strong></p>
      <p>ready for some fun?</p>
    </div>
{{--   games--}}
    <div class="d-flex justify-content-around align-items-start mt-4">
      <a href="{{route('game.practice')}}" class="text-decoration-none">
        <div class="practice d-flex justify-content-between py-2">
        <span>
          Practice
        </span>
          <img src="{{asset('mobiletemplate/images/practice.png')}}" alt="" class="pt-3 pb-1">
        </div>
      </a>
      <a href="{{route('game.team')}}" class="text-decoration-none">
        <div class="team">
          <span>
            Team
          </span>
          <span class="team-icon">
            <i class="fa-solid fa-users fa-3x"></i>
          </span>
        </div>
      </a>
    </div>
    <div class="d-flex justify-content-around align-items-end">
      <a href="{{route('game.challenge')}}" class="text-decoration-none">
        <div class="challenge">
        <span>
          Challenge
        </span>
        <img src="{{asset('mobiletemplate/images/challenge_icon.png')}}" alt="" class="pt-3 pb-1 challenge-icon">
      </div>
      </a>
      <a href="{{route('game.moderator')}}" class="text-decoration-none">
        <div class="quizMaster d-flex justify-content-between py-2">
          <span>
            Quiz Master
          </span>
          <img src="{{asset('mobiletemplate/images/quizmaster_icon.png')}}" alt="" class="pt-3 pb-1 quizMaster-icon">
        </div>
      </a>

    </div>
{{--    games End--}}
{{--    Circle Category--}}
    <div class="container circle-category">
      <div class="row d-flex">
        @foreach($categories as $category)
          <div class="col mb-4">
            <a href="{{url('/Practice?category='.$category->id)}}" class="text-dark">
              <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="circle d-flex justify-content-center align-items-center shadow">
                  {!! $category->icon !!}
                </div>
                <div class="d-flex flex-wrap circle-text text-center">
                    {{ $category->bn_name }}
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
{{--    Circle Category End--}}

{{--    History section--}}
    <div class="history mb-5">
      <p>TODAY IN HISTORY</p>
      <div class="vc">
        <div class="vs d-flex">
          <div class="history-img">
            <img class="bg-img" src="{{asset('mobiletemplate/images/history.png')}}" alt="">
            <div class="history-text highlight">
              <h4 class="history-title">Bangladesh Liberation War (1971)</h4>
              <a href="#" class="read-more">Read More</a>
            </div>
          </div>
          <div class="history-img">
            <img class="bg-img" src="{{asset('mobiletemplate/images/history2.png')}}" alt="">
            <div class="history-text">
              <h4 class="history-title">Boston Tea Party (1773)</h4>
              <a href="#" class="read-more">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Bottom Footer-->
    <div class="bottom section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="copyright">
              <p>
                ©
                <span>{{date('Y')}}</span>
                <a href="#" class="transition">
                  Darco Technologies Limited
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-padding"></div>
    <!--Bottom Footer-->
{{--    History section End--}}

{{--    Floating Bottom Menubar--}}

    <div class="floating-bottom d-flex justify-content-between shadow">
      <div>
        <span class="bottomMenu" data-message="Leader Board not yet available.">
          <i class="fa-regular fa-chart-bar text-secondary fa-2x"></i>
        </span>
      </div>
      <div>
        <span class="bottomMenu" data-message="Options not yet available.">
          <i class="fa-brands fa-wpexplorer text-secondary fa-2x"></i>
        </span>

      </div>
      <div>
        <span class="bottomMenu" data-message="Go to Home">
          <i class="fa-solid fa-house fa-2x text-primary"></i>
        </span>
      </div>
      <div>
         <span class="bottomMenu" data-message="You have no notification.">
          <i class="fa-solid fa-bell text-secondary fa-2x"></i>
        </span>
      </div>
      <div>
         <span class="pointer" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fa-solid fa-sign-in-alt text-secondary fa-2x"></i>
        </span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </div>

{{--    Floating Bottom Menubar End--}}

{{--Modals--}}
    <div id="myModal" class="modal fade text-left" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <button type="button" class="close" id="closeModal" data-dismiss="modal" style="color: red;">&times;</button>
            <h4 class="mt-5" id="moadalMessage"></h4>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script>
    $(function (){
      $(".bottomMenu").click(function (){
        $("#moadalMessage").html($(this).data('message'));
        $("#myModal").modal('show');
      });

    });
  </script>

</body>
</html>
