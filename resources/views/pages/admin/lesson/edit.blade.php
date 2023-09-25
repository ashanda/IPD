@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Lesson</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Lesson</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				
                	<div class="page-header">
                        <form action="{{ route('lesson.update', $findData->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="row">
                        
                            <div class="col-md-6 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lesson Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $findData->lesson_name }}" name="lesson_name"  required>
                                    </div>
                                </div>
                            </div>
                          
                              <div class="col-md-2 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Batch</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker form-control" name="bid[]" data-style="btn-outline-secondary" multiple>
                                            @foreach ($batchData as $batch)
                                                 <option value="{{ $batch->id }}" 
                                                            {{ in_array($batch->id, $findData->bid) || in_array($batch->id, old('bid', [])) ? 'selected' : '' }}>
                                                        {{ $batch->bname }}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
							<div class="col-md-3 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Publish Date</label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker" value="{{ $findData->publish_date }}" name="publish_date" placeholder="Select Date" type="text" required>
                                    </div>
                                </div>
                            </div>
					     </div>

					<div class="row">
						<div class="col-md-6 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Video Link</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="vlink" value="{{ $findData->vlink }}" required>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Start time</label>
								<div class="col-sm-8">
									<input class="form-control time-picker td-input" value="{{ $findData->start_time }}" placeholder="Select time" name="start_time" type="text" readonly="" required>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">End time</label>
								<div class="col-sm-8">
									<input class="form-control time-picker td-input" value="{{ $findData->end_time }}" placeholder="Select time" name="end_time" type="text" readonly="" required>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-9">
									<select class="custom-select form-control" name="status" required>
										<option value="1">Publish</option>
										<option value="0">Unpublish</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-12 mt-20">
							<div class="form-group row">

								<label class="col-sm-4 col-form-label">Cover</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="cover" value="{{ $findData->cover }}">
										<label class="custom-file-label">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 text-right">
							<div class="dropdown">
								<button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Update Lesson</button>
							</div>
						</div>


					</div>
				</form>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Lessons</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Lesson name</th>
								<th>Link</th>
								<th>Publish date</th>
								<th>Start time</th>
								<th>End time</th>
								<th>Status</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ( $data as $batch)
							<tr>
								<td class="table-plus">{{ $batch->lesson_name }}</td>
								<td class="table-plus"> <a href="{{ $batch->vlink }}" target="blank"><i class="micon dw dw-binocular"></i> </a></td>

								<td class="table-plus">{{ $batch->publish_date }}</td>
								<td class="table-plus">{{ $batch->start_time }}</td>
								<td class="table-plus">{{ $batch->end_time }}</td>

								@if ($batch->status === 1)
								<td><span class="badge badge-success">Publish</span></td>
								@else
								<td><span class="badge badge-warning">Unplublish</span></td>
								@endif
								<td>
								<td class="table-plus"></td>
								<td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('lesson.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form-{{ $batch->id }}" action="{{ route('lesson.destroy', $batch->id) }}" method="POST">
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
					text: 'You will not be able to recover this lesson!',
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