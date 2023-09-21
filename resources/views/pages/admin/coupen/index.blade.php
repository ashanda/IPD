@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Coupen</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Coupon</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('coupen.store') }}" method="POST">
                            @csrf
					<div class="row">
                        
                            <div class="col-md-4 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Coupon</label>
                                    <div class="col-sm-12 col-md-10">
                                        @php
                                            $uniqueString = generateRandomString(10);
                                        @endphp
                                        <input class="form-control" type="text" name="coupen" value="{{ $uniqueString }}" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Percentage</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" step="0" min="10" name="amount" required>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-12 mt-20">
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Valid Date</label>
                                    <div class="col-sm-8">
                                        <input class="form-control date-picker" name="valid_date" placeholder="Select Date" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add Coupon</button>
                                </div>
                            </div>
                        

					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Coupen</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="uniqueTableId">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Coupon</th>
									<th>Persentage</th>
                                    <th>Batch</th>
									<th>Valid Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $coupen)
								<tr>
									<td class="table-plus">{{ $coupen->coupon_code }}</td>
                                    <td class="table-plus">{{ $coupen->percentage }}</td>
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach(json_decode($coupen->bid) as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
                                    <td class="table-plus">{{ $coupen->valid_date }}</td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('coupen.edit', $coupen->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form" action="{{ route('coupen.destroy', $coupen->id) }}" method="POST">
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
            text: 'You will not be able to recover this coupon!',
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
 