@extends('layouts.admin')
@section('Heading')
	<button type="button"  onclick="window.location.href='{{route('job.create')}}'" class="btn btn-info btn-rounded m-t-10 float-right"><span class="fas fa-plus"></span> Add Job</button>
	<h3 class="text-themecolor">Jobs</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
		<li class="breadcrumb-item active">Hiring</li>
		<li class="breadcrumb-item active">Jobs</li>
	</ol>
@stop
@section('content')
<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h6 class="card-subtitle"></h6>

					<div class="table">
						<table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">
							<thead>
							@if($jobs->count() > 0)
							<tr>
								<th> Title</th>
								<th> City</th>
								<th> Actions </th>
							</tr>
							</thead>

							<tbody>
							 @foreach($jobs as $job)
							<tr>
								<td>{{$job->title}}</td>
								<td>{{$job->city}}</td>
								<td class="text-nowrap">
									<a class="btn btn-info btn-sm" href="{{route('job.edit',['id'=>$job->id])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fas fa-pencil-alt text-white "></i></a>

									<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm-delete{{ $job->id }}"> <i class="fas fa-window-close text-white"></i></a>
									
									<div class="modal fade" id="confirm-delete{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<form action="{{ route('job.destroy' , $job->id )}}" method="post">
													<input name="_method" type="hidden" value="DELETE">
													{{ csrf_field() }}
													<div class="modal-header">
														Are you sure you want to delete this Job?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														<button  type="submit" class="btn btn-danger btn-ok">Delete</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach @else
								<p class="text-center"> No job found.</p>
							@endif

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop