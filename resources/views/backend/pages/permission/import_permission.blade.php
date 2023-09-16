@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
	<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
  <a href="{{route('export')}}" class="btn btn-inverse-info">Dowonload Xlsx</a> 

    </nav>
        <div class="row profile-body">
          <!-- left wrapper start -->
         
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">
								<h6 class="card-title">Import Permission</h6>
								<form id="myForm" method="POST" action="{{route('import')}}" class="forms-sample" enctype="multipart/form-data">
									@csrf
									<div class="form-group mb-3">
										<label for="exampleInputUsername1">Xlsx File Import</label>
                                            <input type="file" name="import_file" class="form-control">
								   </div>				
									<div class="form-check form-check-flat form-check-primary">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input">
											Remember me
										<i class="input-frame"></i></label>
									</div>
									<button type="submit" class="btn btn-inverse-warning">Upload</button>
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