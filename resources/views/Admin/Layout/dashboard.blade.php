<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
  <title>{{ config('app.name', 'Gyankosh') }}</title>
  <link href="{{asset('css/theme-admin.css')}}" rel="stylesheet">
{{--  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}


  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"> -->
  @yield('css')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
<![endif]-->
</head>

<body>

  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @include('Admin.Partial.top_header')
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      @include('Admin.Partial.sidemenu')
      <!-- End Sidebar scroll-->
      <!-- Bottom points-->
      <div class="sidebar-footer">
      </div>
      <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
          <h3 class="text-themecolor mb-0">Dashboard 2</h3>
          <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard 2</li>
          </ol>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
          <div class="d-flex mt-2 justify-content-end">
            <div class="d-flex mr-3 ml-2">
              <div class="chart-text mr-2">
                <h6 class="mb-0"><small>THIS MONTH</small></h6>
                <h4 class="mt-0 text-info">$58,356</h4>
              </div>
              <div class="spark-chart">
                <div id="monthchart"></div>
              </div>
            </div>
            <div class="d-flex ml-2">
              <div class="chart-text mr-2">
                <h6 class="mb-0"><small>LAST MONTH</small></h6>
                <h4 class="mt-0 text-primary">$48,356</h4>
              </div>
              <div class="spark-chart">
                <div id="lastmonthchart"></div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        @yield('content')
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
        @php
            $lang = App::getLocale();
        @endphp
      <footer class="footer">
        © <span id="year">{{$lang=='gb'?'2021':$bang->bn_number(2021)}}</span>
          {{__('msg.companyName')}}
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- customizer Panel -->
  <!-- ============================================================== -->
  <aside class="customizer">
    <!-- <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a> -->
    <div class="customizer-body">
      <ul class="nav customizer-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi-star-circle font-20"></i></a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <!-- Tab 1 -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="p-3 border-bottom">
            <!-- Sidebar -->
            <h5 class="font-medium mb-2 mt-2">Layout Settings</h5>
            <div class="checkbox checkbox-info mt-3">
              <input type="checkbox" name="theme-view" class="material-inputs" id="theme-view">
              <label for="theme-view"> <span>Dark Theme</span> </label>
            </div>
            <div class="checkbox checkbox-info mt-2">
              <input type="checkbox" class="sidebartoggler material-inputs" name="collapssidebar" id="collapssidebar">
              <label for="collapssidebar"> <span>Collapse Sidebar</span> </label>
            </div>
            <div class="checkbox checkbox-info mt-2">
              <input type="checkbox" name="sidebar-position" class="material-inputs" id="sidebar-position">
              <label for="sidebar-position"> <span>Fixed Sidebar</span> </label>
            </div>
            <div class="checkbox checkbox-info mt-2">
              <input type="checkbox" name="header-position" class="material-inputs" id="header-position">
              <label for="header-position"> <span>Fixed Header</span> </label>
            </div>
            <div class="checkbox checkbox-info mt-2">
              <input type="checkbox" name="boxed-layout" class="material-inputs" id="boxed-layout">
              <label for="boxed-layout"> <span>Boxed Layout</span> </label>
            </div>
          </div>
          <div class="p-3 border-bottom">
            <!-- Logo BG -->
            <h5 class="font-medium mb-2 mt-2">Logo Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin1"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin2"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin3"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin4"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin5"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin6"></a></li>
            </ul>
            <!-- Logo BG -->
          </div>
          <div class="p-3 border-bottom">
            <!-- Navbar BG -->
            <h5 class="font-medium mb-2 mt-2">Navbar Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin1"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin2"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin3"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin4"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin5"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin6"></a></li>
            </ul>
            <!-- Navbar BG -->
          </div>
          <div class="p-3 border-bottom">
            <!-- Logo BG -->
            <h5 class="font-medium mb-2 mt-2">Sidebar Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin1"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin2"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin3"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin4"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin5"></a></li>
              <li class="theme-item list-inline-item mr-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin6"></a></li>
            </ul>
            <!-- Logo BG -->
          </div>
        </div>

      </div>
    </div>
  </aside>
  <div class="chat-windows"></div>
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="{{ asset('js/theme-admin.js') }}" type="text/javascript"></script>


  <script>
    $(function() {
      $('.lang').on('click', function() {
        if ($(this).attr('aria-expanded') == 'false') {
          $(this).children('i').removeClass('fa-angle-down');
          $(this).children('i').addClass('fa-angle-up');
        } else {
          $(this).children('i').removeClass('fa-angle-up');
          $(this).children('i').addClass('fa-angle-down');

        }
      })
    })
  </script>
  @yield('js')
</body>

</html>
