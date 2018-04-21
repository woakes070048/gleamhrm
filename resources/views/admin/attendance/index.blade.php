@extends('layouts.admin')
@section('title')
{{ config('app.name', 'HRM') }}|{{$title}}
@endsection
@section('content')

<div class="panel panel-default">
		<div class="panel-heading text-center">
			<div ><b style="text-align: center;" >Create Attendance</b></div>	
		</div>
		<div class="panel-body">
			<form action="{{route('employee.store')}}" method="post">
			   {{csrf_field()}}
			  <div class="form-group">
				<div class="col-md-7">
					<label for="name">Name:</label>
					@foreach($employees as $employee)
					<select class="form-control" name="employee">
					<option value={{$employee->id}}>{{$employee->fullname}}</option>
					</select>
					@endforeach
				</div>
			  </div>
			  <div class="form-group">
					<div class="col-md-7">
						<label for="delay">Delay</label>
						<input type="number" class="form-control" name="delay">
					</div>
			  </div>
			  <div class="form-group">
					<div class="col-md-7">
						<label for="checkintime">CheckInTime</label>
						<input type="text" class="form-control" name="checkintime">
					</div>
			  </div>
					
			  <div class="form-group">
					<div class="col-md-7">
						<label for="checkouttime">CheckOutTime</label>
						<input type="text" class="form-control" name="checkouttime">
					</div>
			  </div>
			  <div class="form-group">
					<div class="col-md-7">
						<label for="checkouttime">HoursLogged</label>
						<input type="text" class="form-control" name="checkouttime">
					</div>
			  </div>
			  <div class="form-group">
					<div class="col-md-7">
						<label for="hourslogged">HoursLogged</label>
						<input type="text" class="form-control" name="hourslogged">
					</div>
			  </div>	
			  <div class="form-group">
					<div class="col-md-5">
						<button class="btn btn-success" type="submit"> Create</button>
						
					</div>
			 </div>	

		
		</div>
		

</div>



@stop