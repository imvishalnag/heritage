<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.jpg')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <!-- datatable -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('backend/admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="{{asset('backend/admin/dist/css/custom.css')}}" rel="stylesheet">
  <!-- ckeditor -->
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
 
      <li class="nav-item">
        <a class="nav-link text-success" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-user" style="font-size: 130%;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <span>Welcome, {{ Auth::user()->name }}</span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Heritage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('heritage.upload-view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('heritage.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Publication
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('publication.upload-view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('publication.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Magazine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('magazine.upload-view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('magazine.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Current Issue
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('current_issue.upload-view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('current_issue.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Gallery
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('gallery.individual.upload-view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('gallery.individual.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    State cover
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{route('gallery.state.upload-view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Upload</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('gallery.state.show')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Tribe cover
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{route('gallery.state.tribe.upload-view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Upload</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('gallery.state.tribe.show')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          {{-- events --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('events.individual.upload_view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('events.individual.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Events Cover
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{route('events.cover.upload_view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Upload</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('events.cover.show')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Folk Tales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('folk_tales.upload_view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('folk_tales.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                YouTube Video
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('youtube_video.upload_view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('youtube_video.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Plan --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Plan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('plan.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Plan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('plan.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Member Subscription --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Member Subscription
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('member_subscription.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://heritagefoundation.org/">Heritage Foundation</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developed By</b> <a href="https://webinfotech.net.in/">Webinfotech</a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3 control-sidebar-content">
      <h6>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout Now &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
      </h6>
      <hr>
      <h6>
        <a href="#" id="password_change_btn">Change Password &nbsp;&nbsp;<i class="fas fa-edit"></i></a>
      </h6>
    </div>
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div> 
<div id="overlay"></div>
<div id="custom-progress-bar">
    <div id="custom-loader"> 
    </div>
    <div id="loader-text">
        <span>Uploading please wait...</span>
    </div>
</div>

<div class="password-change-cover">
  <div class="card card-primary password-change">
  <div class="card-header">
    <h3 class="card-title">Change Password</h3>
    <span class="close-cross"><i class="fa fa-window-close"></i></span>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="#" role="form" id="password-change-form">
    @method('PUT')
    @csrf
    <div class="card-body pb-0">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputFile">Password</label>
            <input  type="password" class="form-control" placeholder="Enter new password" name="password" required="" id="password">
            <i class="fa fa-eye show-password-eye"></i> 
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputFile">Confirm Password</label>
            <input  type="password" class="form-control" placeholder="Enter password again" name="confirmed" required="" id="confirm_password">
          </div>
          <p id="ajax-response" style="height: 24px;margin-bottom: 10px;"></p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>

<!-- ./wrapper -->
@yield('loader')
@yield('msg')

<!-- jQuery -->
<script src="{{asset('backend/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
  $('.close-cross').click(function() {
    $('.password-change').toggleClass('password-change-show');
    $('.password-change-cover').toggleClass('password-change-cover-show');
  });
  $('#password_change_btn').click(function() {
    $('.password-change-cover').toggleClass('password-change-cover-show');
    $('.password-change').toggleClass('password-change-show');
  });
  $('.show-password-eye').click(function() {
    var type = $('#password').attr('type');
    // alert(type);
    if (type == 'password') {
      $('#password').attr('type', 'text');
      $('.show-password-eye').removeClass('fa-eye');
      $('.show-password-eye').addClass('fa-eye-slash');
    } else {
      $('#password').attr('type', 'password');
      $('.show-password-eye').removeClass('fa-eye-slash');
      $('.show-password-eye').addClass('fa-eye');
    }
  });
    // this is the id of the form
$("#password-change-form").submit(function(e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var password   = $('#password').val();
  var c_password = $('#confirm_password').val();
  if (password != c_password) {
    $('#ajax-response').html("<span class='text-danger'>Passwords do not match!</span>");
    $("#password-change-form :input").prop("disabled", false);
    return false;
  }

  $("#password-change-form :input").prop("disabled", true);
     $.ajax({
      type: "POST",
      url: '{{route('password.reset')}}',
      data: {
         _token: "{{csrf_token()}}",
        "password":password,
        "confirm_password": c_password,
      },
      success: function(response){
        $('#ajax-response').html(response);
        $("#password-change-form :input").prop("disabled", false);
       }
    });

});
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('backend/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/admin/dist/js/demo.js')}}"></script>
{{-- custom js --}}
<script src="{{asset('backend/admin/dist/js/custom.js')}}"></script>
<!-- datatable -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@yield('script')
</body>
</html>
