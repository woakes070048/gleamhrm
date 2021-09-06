@extends('layouts.master')

@section('content')
<!-- Breadcrumbs Start -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create Role</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('rolespermissions') }}">Manage Roles</a></li>
          <li class="breadcrumb-item"><a href="{{ url('rolespermissions') }}">Roles and Permissions</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumbs End -->

<!-- Session Message Section Start -->
@include('layouts.partials.session-message')
<!-- Session Message Section End -->

<!-- Main Content Start -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    	<div>
							<a class="btn btn-info" href="{{route('roles_permissions')}}"><i class="fas fa-chevron-left"></i><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Back</span></a>
						</div>

						<hr>
						
						<form id="createRoleForm" action="{{route('roles_permissions.store')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row justify-content-between">
								<div class="col-6">
									<div class="form-group">
										<label class="control-label">Name</label>
										<input  type="text" name="name" placeholder="Enter name here" class="form-control" value="{{old('name')}}">
										<input type="hidden" name="status" value="1">
									</div>
								</div>
								<div class="col-6 mt-5 text-right">
									<label for="check_all"><input type="checkbox" class="mr-1" id="check_all"/>Select All</label>
								</div>
							</div>

							<hr class="mt-0">

							<div class="form-group row">
								@foreach ($all_controllers as $key => $row)
									<div class="col-md-12">
										<div class="row">
											<label class="col-12" for="{{$key}}"><input type="checkbox" class="check_all_sub mr-1" id="{{$key}}"><b>{{$key}}</b></label>
										</div>

										<hr class="mt-0">

										<div class="{{$key}} row">
											@foreach ($row as $route)
												<div class="col-lg-4 col-md-4 col-sm-4">
													<label class="font-weight-normal col-12" for="{{$key}}:{{$route}}"><input type="checkbox" class="mr-1" id="{{$key}}:{{$route}}" name="permissions[]" value="web:{{$key}}:{{$route}}">{{$route}}</label>
												</div>
											@endforeach
										</div>
										<br>
									</div>
								@endforeach
							</div>

							<hr>

							<button type="submit" class="btn btn-primary"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Create Role</span></button>
							<button type="button" onclick="window.location.href='{{route('roles_permissions')}}'" class="btn btn-default"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-window-close"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Cancel</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main Content End -->

<script>
	$(document).ready(function () {
	    $(function () {
		    $("#check_all").click(function(){
			    $('input:checkbox').not(this).prop('checked', this.checked);
			});
	    	$(".check_all_sub").click(function(){
			    $('div.'+ this.id +' input:checkbox').prop('checked', this.checked);
			});
	    });
	});

	$(function () {
	  $('#createRoleForm').validate({
	    rules: {
	      name: {
	        required: true,
	      }
	    },
	    messages: {
	      name: "Role name is required"
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
