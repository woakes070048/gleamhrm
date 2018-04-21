@extends('layouts.admin') @section('title')  {{ config('app.name', 'HRM') }}|{{$title}} @endsection @section('content')

<div class="panel panel-default">
	<div class="panel-heading text-center">
		<b> Hired Applicants </b>
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<th> Image</th>
				<th> Name</th>
				<th> City</th>
				<th> Job Status </th>
				<th>Apllied for</th>
				<th> CV </th>
				<th>Actions</th>
			</thead>
			<tbody class="table-bordered table-hover table-striped">
				@if($applicants->count() > 0) @foreach($applicants as $applicant)
				<tr>
					<td>
						<img src="/{{$applicant->avatar}}" alt="" width="50px" width="50px">
					</td>
					<td>{{$applicant->name}}</td>
					<td>{{$applicant->city}}</td>
					<td> {{$applicant->job_status}}</td>
					<td>applicant job tilte goes here.</td>
					<td>
						<a href="/{{$applicant->cv}}">
							<img src="/uploads/applicants/cv/cv_icon.jpg" alt="" height="50px" width="50px">
						</a>
					</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Actions</button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>View</li>
								<li>
									<a href="{{route('applicant.retire',['id'=>$applicant->id])}}">retire</a>
								</li>
								<li>
									<a href="{{route ('applicant.delete',['id' =>$applicant->id])}}">Trash</a>
								</li>
							</ul>
						</div>
					</td>

				</tr>
				@endforeach @else
				<tr> No Applicant found.</tr>
				@endif

			</tbody>
		</table>
	</div>

	@stop