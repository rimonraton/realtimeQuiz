<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Template chage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background: url("{{asset('mobiletemplate/images/cover.png')}}");
      background: white;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: right;
    }
    .avatar {
      vertical-align: middle;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 1px solid gray;
    }
    .f-8 {
      font-size: .8rem;
    }
    .practice{
      background: rgb(255,233,223);
      background: linear-gradient(90deg, rgba(255,233,223,1) 0%, rgba(182,214,91,1) 100%);
      color: #318076;
      border-radius: 10px;
      padding: 10px;
      width: 160px;
      height: 70px;
      font-size: 1.2rem;
    }
    .team{
      background: rgb(118,165,189);
      background: linear-gradient(90deg, rgba(118,165,189,1) 0%, rgba(132,211,255,1) 100%);
      color: white;
      border-radius: 10px;
      padding: 10px;
      width: 160px;
      height: 100px;
      font-size: 1.2rem;
      position: relative;
    }
    .team-icon {
      position: absolute;
      right: 15px;
      bottom: 10px;
    }
    .challenge{
      background: rgb(224,224,224);
      background: linear-gradient(157deg, rgba(224,224,224,1) 0%, rgba(27,162,172,1) 100%);
      color: #287D84;
      border-radius: 10px;
      padding: 10px;
      width: 160px;
      height: 140px;
      font-size: 1.2rem;
      position: relative;

    }
    .challenge-icon {
      position: absolute;
      bottom: 10px;
      right: 15px;
      width: 60px;
    }
    .quizMaster{
      background: rgb(255,255,255);
      background: linear-gradient(157deg, rgba(255,255,255,1) 0%, rgba(55,179,164,1) 100%);
      color: #467B99;
      border-radius: 10px;
      padding: 10px;
      width: 160px;
      height: 110px;
      font-size: 1.2rem;
      position: relative;
    }
    .quizMaster-icon {
      position: absolute;
      bottom: 10px;
      right: 15px;
      width: 80px;
    }
    .circle-category {
      background: transparent;
      padding: 30px 0px;
    }
    .circle {
      width: 60px;
      height: 60px;
      border-radius: 100%;
      background: white;
    }
    .circle i {
      font-size: 25px;
    }
    .circle-text {
      padding-top: 10px;
      font-size: .65rem;
      font-weight: bold;
    }
    .text-brain {
      color: #f3b5b8;
    }
    .history-img {
      width: 210px;
      position: relative;
      margin-right: 15px;
    }
    .bg-img {
      position: absolute;
      width: 100%;
      height: 120px;
      border-radius: 15px;
    }
    .history{
      height: 170px;
    }
    .history-text {
      background: rgb(198,231,255);
      background: linear-gradient(157deg, rgba(198,231,255,.4) 0%, rgba(96,129,153,.4) 100%);
      position: absolute;
      width: 100%;
      height: 120px;
      border-radius: 15px;
      padding: 10px;
      color: white;
    }
    .highlight {
      background: rgb(134,195,72);
      background: linear-gradient(157deg, rgba(134,195,72,.4) 0%, rgba(75,177,185,.4) 100%);
    }
    .history-title {
      font-size: .7rem;
      font-weight: 700;
    }
    .read-more {
      text-decoration: none;
      color: white;
      font-size: .8rem;
      font-weight: 500;
      position: absolute;
      bottom: 10px;
      right: 20px;
    }
    .vc {
      width: 100%;
      overflow: scroll;
      height: 130px;
    }
    .vs{
      width: 150%;
    }
    .floating-bottom {
      position: fixed;
      left: 3%;
      bottom: 10px;
      width: 94%;
      color: white;
      text-align: center;
      background: #F2F2F2;
      border-radius: 15px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
{{--    top bar--}}
    <nav class="d-flex justify-content-between p-3">
      <div class="d-flex align-items-center justify-content-center">
        <img src="{{asset('mobiletemplate/images/logo.png')}}" width="100px" alt="Logo">
      </div>
      <div class="d-flex align-items-center justify-content-end bg-dark-info w-100">
        <div class="avatar d-flex justify-content-center align-items-center">
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="p-2 d-flex flex-column f-8">
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
            <div class="d-flex flex-column justify-content-center align-items-center">
              <div class="circle d-flex justify-content-center align-items-center shadow">
                {!! $category->icon !!}
              </div>
              <div class="d-flex flex-wrap circle-text text-center">
                  {{ $category->bn_name }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
{{--    Circle Category End--}}

{{--    History section--}}
    <div class="history">
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
{{--    History section End--}}

{{--    Floating Bottom Menubar--}}

    <div class="floating-bottom d-flex justify-content-between shadow">
      <div>
        <i class="fa-regular fa-chart-bar text-secondary fa-2x"></i>
      </div>
      <div>
        <i class="fa-brands fa-wpexplorer text-secondary fa-2x"></i>
      </div>
      <div>
        <i class="fa-solid fa-house fa-2x text-primary"></i>
      </div>
      <div>
        <i class="fa-solid fa-bell text-secondary fa-2x"></i>
      </div>
      <div>
        <i class="fa-solid fa-gear text-secondary fa-2x"></i>
      </div>
    </div>

{{--    Floating Bottom Menubar End--}}



  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
