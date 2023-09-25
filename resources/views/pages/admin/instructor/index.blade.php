@extends('layouts.app')

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Instructor</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Instructor</li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
			<div class="page-header">
				<form action="{{ route('instructor.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">

						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">First name</label>
								<input type="hidden" name="index_number" value="{{ substr(Illuminate\Support\Str::uuid(), 0, 10) }}" required>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="fname" required>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Last Name</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="lname" required>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Batch</label>
								<div class="col-sm-8">
									<select class="selectpicker form-control" name="bid[]" data-style="btn-outline-secondary" multiple required>
										@foreach ($batchData as $batch)
										<option value="{{ $batch->id }}">{{ $batch->bname }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input class="form-control" name="email" placeholder="Email" type="email" required>
								</div>
							</div>
						</div>



						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Contact Number</label>
								<div class="col-sm-8">
									<input class="form-control" type="tel" name="cnumber" required>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Password</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Password" name="password" type="password" required>
								</div>
							</div>
						</div>




						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8">
									<select class="custom-select form-control" name="status" required>
										<option value="1">Publish</option>
										<option value="2">Unpublish</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">

								<label class="col-sm-4 col-form-label">Document</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="cover">
										<label class="custom-file-label">Choose file</label>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-4 col-sm-12 text-right">
							<div class="dropdown">
								<button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add Instructor</button>
							</div>
						</div>


					</div>
				</form>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Instructor</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Instructor name</th>
								<th>Email</th>
								<th>Batch</th>
								<th>Contact</th>
								<th>Status</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $data as $batch)
							<tr>
								<td class="table-plus">{{ $batch->fname.' '.$batch->lname }}</td>
								<td class="table-plus">{{ $batch->email }}</td>
								<td class="table-plus">
									<ul>


										@foreach(json_decode($batch->batch) as $item)
										
										<li>{{ getBatch($item)->bname }}</li>
										@endforeach


									</ul>
								</td>
								<td class="table-plus">{{ $batch->contact_number }}</td>


								@if ($batch->status === 1)
								<td><span class="badge badge-success">Publish</span></td>
								@else
								<td><span class="badge badge-warning">Unplublish</span></td>
								@endif
								<td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('instructor.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form-{{ $batch->id }}" action="{{ route('instructor.destroy', $batch->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-link" onclick="showDeleteConfirmation({{ $batch->id }})">
													<i class="dw dw-delete-3"></i> Delete
												</button>
											</form>
										</div>
									</div>
								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		@endsection
		@section('scripts')
		<script src="{{ asset('vendors/scripts/advanced-components.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
			// Function to show the SweetAlert confirmation dialog
			function showDeleteConfirmation(batchId) {
				Swal.fire({
					title: 'Are you sure?',
					text: 'You will not be able to recover this instructor!',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'Cancel'
				}).then((result) => {
					if (result.isConfirmed) {
						// If the user confirms, submit the form for batch deletion
						document.getElementById('delete-form-' + batchId).submit();
					}
				});
			}
		</script>
	 @endsection