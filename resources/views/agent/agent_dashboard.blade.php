<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent Pannel-Real Estate</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
    <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->
  <!-- Layout styles -->  
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo_1/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>
<body>backened
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
         @include('agent.body.sidebar')
        <!-- partial -->
    
        <div class="page-wrapper">
                    
            <!-- partial:partials/_navbar.html -->
              @include('agent.body.header')
            <!-- partial -->
            @yield('agent')

            <!-- partial:partials/_footer.html -->
           @include('agent.body.footer')
            <!-- partial -->
        
        </div>
    </div>

    <!-- core:js -->
    <script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{asset('backend/assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/template.js')}}"></script>
    <!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
  <script src="{{asset('backend/assets/js/datepicker.js')}}"></script>
    <!-- end custom js for this page -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info')}}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
</body>
</html>    