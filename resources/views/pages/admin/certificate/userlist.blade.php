@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Certificate</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Certificate</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Certificate</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="uniqueTableId">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Certificate Status</th>
									<th class="table-plus datatable-nosort">Student</th>
									<th class="table-plus datatable-nosort">Action</th>
								
								</tr>
							</thead>
							<tbody>
								@php
									$processedIndexes = [];
									@endphp

									@foreach ($data as $batch)
										@if (!in_array($batch->index_number, $processedIndexes))
											<tr>
												@php
													if (certificateStatus($batch->index_number) == null) {
														$status = 'Not Issued';
													} else {
														$status = 'Issued';
													}
												@endphp
												<td class="table-plus">{{ $status }}</td>
												<td class="table-plus">{{ user_data($batch->index_number)->fname .' '.user_data($batch->index_number)->lname }}</td>
												<td class="table-plus">
													<form action="{{ route('certificates.store') }}" method="POST">
														@csrf
														<input type="hidden" name="index_number" value="{{ $batch->index_number }}">
														<button type="submit" class="btn btn-link">Issue Certificate</button>
													</form>
												</td>
											</tr>
											@php
											// Add the processed index to the array
											$processedIndexes[] = $batch->index_number;
											@endphp
										@endif
									@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

 @endsection           
@section('scripts')


@endsection
 