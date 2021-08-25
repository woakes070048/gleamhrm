@extends('layouts.master')

@section('content')
<!-- Breadcrumbs Start -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Job</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('job') }}">Hiring</a></li>
          <li class="breadcrumb-item"><a href="{{ url('job') }}">Jobs</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumbs End -->

<!-- Error Message Section Start -->
@if ($errors->any())
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        @foreach ($errors->all() as $error)
                          <li><strong>Error!</strong> {{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" align="left">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> {{Session::get('error')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" align="left">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> {{Session::get('success')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Error Message Section End -->

<!-- Main Content Start -->
<div class="content">
  	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<button type="button" onclick="window.location.href='{{route('job.index')}}'" class="btn btn-info" title="Back"><i class="fas fa-chevron-left"></i><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Back</span></button>

						<hr>

						<form id="editJobForm" action="{{route('job.update',[$job->id])}}" method="post" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PUT">
							{{csrf_field()}}
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="control-label">Job Title</label>
										<input type="text" value="{{$job->title}}" name="title" class="form-control" placeholder="Enter Job Title">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="control-label">Designation</label>
										<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="designation_id">
											<option value="">Select Designation</option>
											@foreach($designations as $designation)
												<option value="{{$designation->id}}" @if($designation->id == $job->designation_id )selected @endif>{{$designation->designation_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="control-label">Branch</label>
										<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="branch_id">
											<option value="">Select Branch</option>
											@foreach($branches as $branch)
												<option value="{{$branch->id}}" @if($branch->id == $job->branch_id) selected @endif>{{$branch->name}} ({{$branch->address}})</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="control-label">Department</label>
										<select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="department_id">
											<option value="">Select Department</option>
											@foreach($departments as $department)
												<option value="{{$department->id}}" @if($department->id == $job->department_id )selected @endif>{{$department->department_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="control-label">Skills</label>
										<select multiple class="form-control custom-select" data-placeholder="Choose Skills" tabindex="1" name="skills[]">
											@foreach($skills as $skill)
												<option value="{{$skill->id}}" 	@foreach(json_decode($job->skill) as $key) @if($skill->id==$key) selected @endif
														@endforeach>{{$skill->skill_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="control-label"><bold>Description:</bold></label>
										<textarea class="textarea_editor form-control" name="description" rows="10" placeholder="Enter Description">{{$job->description}}</textarea>
									</div>
								</div>
							</div>

							<hr>
							
							<button type="submit" class="btn btn-primary" title="Update Job"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Update</span></button>
							<button type="button" onclick="window.location.href='{{route('job.index')}}'" class="btn btn-default" title="Cancel"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-window-close"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Cancel</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main Content End -->

<script>
	$(function () {
	  $('#editJobForm').validate({
	    rules: {
	      title: {
	        required: true,
	      },
	      designation_id: {
	        required: true
	      },
	      branch_id: {
	        required: true
	      },
	      department_id: {
	        required: true
	      },
	      description: {
	        required: true
	      }
	    },
	    messages: {
	      title: "Job title is required",
	      designation_id: "Designation is required",
	      branch_id: "Branch is required",
	      department_id: "Department is required",
	      description: "Description is required"
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	  });
	});
</script>
@stop