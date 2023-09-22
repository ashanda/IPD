@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Notice</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Notice</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('notice.store') }}" method="POST">
                            @csrf
					<div class="row">

						<div class="col-md-12 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Notice</label>
								<div class="col-sm-12 col-md-10">

									<input class="form-control" type="text" name="notice" required>
								</div>
							</div>
						</div>

						<div class="col-md-5 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Batch</label>
								<div class="col-sm-8">
									<select class="selectpicker form-control" name="bid[]" data-style="btn-outline-secondary" multiple>
										@foreach ($batchData as $batch)
										<option value="{{ $batch->id }}">{{ $batch->bname }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 mt-20">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Expire Date</label>
								<div class="col-sm-8">
									<input class="form-control date-picker" name="expire_date" placeholder="Select Date" type="text" required>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 text-right">
							<div class="dropdown">
								<button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add Notice</button>
							</div>
						</div>


					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Notice</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="uniqueTableId">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Notice</th>
									<th>Expire Date</th>
                                    <th>Batch</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $notice)
								<tr>
									<td class="table-plus">{{ $notice->notice }}</td>
                                    <td class="table-plus">{{ $notice->expire_date }}</td>
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach($notice->bid as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
                                    <td class="table-plus">{{ $notice->valid_date }}</td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('notice.edit', $notice->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form" action="{{ route('notice.destroy', $notice->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-link" onclick="showDeleteConfirmation()">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
			// Function to show the SweetAlert confirmation dialog
			function showDeleteConfirmation() {
				Swal.fire({
					title: 'Are you sure?',
					text: 'You will not be able to recover this notice!',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'Cancel'
				}).then((result) => {
					if (result.isConfirmed) {
						// If the user confirms, submit the form for batch deletion
						document.getElementById('delete-form').submit();
					}
				});
			}
	</script>
@endsection

		@endsection