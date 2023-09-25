@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Expence</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Expence</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('expence.update',$findData->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
					<div class="row">
                        
                            <div class="col-md-5 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-md-3 col-form-label">Reason</label>
                                    <div class="col-sm-8 col-md-9">
                                        <input class="form-control" type="text" value="{{ $findData->expence_title }}" name="expence_title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-md-3 col-form-label">Amount</label>
                                    <div class="col-sm-8 col-md-9">
                                        <input class="form-control" type="number" value="{{ $findData->amount }}" step="0.00" min="10" name="amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Update Expence</button>
                                </div>
                            </div>
                        

					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Expences</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="uniqueTableId">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Reason</th>
									<th>Amount(Rs)</th>
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $expence)
								<tr>
									<td class="table-plus">{{ $expence->expence_title }}</td>
                                    <td class="table-plus">{{ $expence->amount }}</td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('expence.edit', $expence->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form-{{ $expence->id }}" action="{{ route('expence.destroy', $expence->id) }}" method="POST">
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
    function showDeleteConfirmation(batchId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this expence!',
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
 