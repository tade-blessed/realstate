@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
	<div class="page-content">
        <div class="row profile-body">
          <!-- left wrapper start -->
         
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">
								<h6 class="card-title">Edit PropertyType</h6>
								<form method="POST" action="{{route('update.type')}}" class="forms-sample">
									@csrf
                                    <input type="hidden" name="id" value="{{$types->id}}">
									<div class="form-group">
										<label for="exampleInputUsername1">Type Name</label>
                                            <input type="text" name="type_name" class="form-control @error('type_name')is-invalid @enderror" value="{{$types->type_name}}">
                    @error('type_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
									</div>
                                    <div class="form-group">
										<label for="exampleInputUsername1">Type Icon</label>
                                            <input type="text" name="type_icon" class="form-control @error('type_icon')is-invalid @enderror" value="{{$types->type_icon}}">
                    @error('type_icon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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



@endsection