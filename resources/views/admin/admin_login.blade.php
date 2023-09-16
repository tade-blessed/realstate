<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Login Pages</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo_2/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
  
  <style type="text/css">
 
  	.authlogin-left-wrapper{
  		width: 100%;
  		height: 100;
  		background-image: url{{asset('upload/user-login.webp')}};
  	}
  	
  </style>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="authlogin-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">Real<span>Estate</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method="post" action="{{ route('login')}}">
                    	@csrf
                      <div class="form-group">
                        <label for="login">Email/Name/Phone</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                        	Login
                         
                        </button>
                      </div>
                      <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>cd ..
	<!-- endinject -->
  <!-- custom js for this page -->
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