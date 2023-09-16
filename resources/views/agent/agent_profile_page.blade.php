@extends('agent.agent_dashboard')
@section('agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 

	<div class="page-content">
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div>
                    <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="profile">
                    <span class="h4 ms-3 ">{{$profileData->username}}</span>
                  </div>
                  
                </div>
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{$profileData->name}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{$profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{$profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                  <p class="text-muted">{{$profileData->address}}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="github"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">
								<h6 class="card-title">Update Agent Profile</h6>
								<form method="POST" action="{{route('agent.profile.store')}}" class="forms-sample" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="exampleInputUsername1">Username</label>
										<input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">name</label>
										<input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input type="text" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->email}}">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="text" name="password" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->password}}">
									</div>
									
									<div class="form-group">
										<label for="exampleInputPassword1">Phone</label>
										<input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->phone}}">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Address</label>
										<input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->address}}">
									</div>
									<div class="mb3">
										<label for="exampleInputPassword1">Photo</label>
										<input class="form-control" name="photo" type="file" id="image">
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail"> </label>
										<img id="ShowImage" class="wd-80 rounded-circle"src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="profile">
									</div>
									<div class="form-check form-check-flat form-check-primary">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input">
											Remember me
										<i class="input-frame"></i></label>
									</div>
									<button type="submit" class="btn btn-primary mr-2">Save Change</button>
									<button class="btn btn-light">Cancel</button>
								</form>
              </div>
            </div>

            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          
          <!-- right wrapper end -->
        </div>

			</div>
			<script type="text/javascript">
				$(document).ready(function(e){
					$('#image').change(function(e){
					var reader=new FileReader();
					reader.onload=function(e){
						$('#showImage').attr('src',e.target.result);
					}
					reader.readAsDataURL(e.target.files['0']);
					});
				});
			</script>



@endsection