@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payment</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Payment</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									
									<th>Slip</th>
                                    <th>Student name</th>
									<th>Batch</th>
                                    <th>Fee</th>
									<th>Discount</th>
                                    <th>Next Pay Date</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $usersWithPayments as $usersWithPayment)
								<tr>
									
									<td class="table-plus">
										 <a href="#" class="btn-block check-button" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"
										data-pid="{{ $usersWithPayment->id }}"
										data-slip="{{ asset('storage/' . $usersWithPayment->file_name) }}"
										data-amount="{{ $usersWithPayment->amount }}">
											Check
										</a>
										
									</td>
                                    <td class="table-plus">{{ $usersWithPayment->fname.' '.$usersWithPayment->lname }}</td>
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach(json_decode($usersWithPayment->batch_id) as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
									<td class="table-plus">{{ $usersWithPayment->amount }}</td>
									<td class="table-plus">{{ $usersWithPayment->discount }}</td>
                                    <td class="table-plus">{{ $usersWithPayment->expired_date }}</td>
									@if ($usersWithPayment->status === 1)
									<td><span class="badge badge-success">Active</span></td>		
									@elseif($usersWithPayment->status === 2)
									<td><span class="badge badge-warning">Pending</span></td>
                                    @else
									<td><span class="badge badge-denger">Reject</span></td>
									@endif
									
                                    
                                    <td>
									
											<form id="delete-form-{{ $usersWithPayment->id }}" action="{{ route('payment.destroy', $usersWithPayment->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-link" onclick="showDeleteConfirmation({{ $usersWithPayment->id }})">
													<i class="dw dw-delete-3"></i> Delete
												</button>
											</form>
									
									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">    
	<div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left side with image and zoom -->
                        <div class="col-md-6">
                            <img id="modal-image" class="img-fluid slip" alt="Image">
                            <div class="zoom-controls">
                                <button id="zoom-in" class="btn btn-primary">Zoom In</button>
                                <button id="zoom-out" class="btn btn-primary">Zoom Out</button>
                            </div>
                        </div>

                        <!-- Right side with the form -->
                        <div class="col-md-6">
                            <form action="{{ route('payment.update',1)}}" method="POST">
								@csrf
								@method('PUT')
                                <!-- Add your form fields here -->
								<input type="hidden" id="modal-pid" name="pid" value="">
								<input type="hidden" id="modal-amount" name='amount' value="">
								
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Payment slip expire date</label>
										<input class="form-control date-picker" placeholder="Select Date" name="expiredate" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Status</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Change Payment value</label>
										<input class="form-control" name="camount"  type="number">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
 @endsection           
 @section('scripts')
 <script src="{{ asset('vendors/scripts/advanced-components.js')}}"></script>
 <script>
		$(document).ready(function() {
			let zoomLevel = 100; // Initial zoom level (percentage)
			const $image = $('.modal-body img');

			$('#zoom-in').click(function() {
				zoomLevel += 10;
				$image.css('width', zoomLevel + '%');
			});

			$('#zoom-out').click(function() {
				zoomLevel -= 10;
				$image.css('width', zoomLevel + '%');
			});
		});

		
			$(document).ready(function() {
    // Use event delegation on a parent element that's always present in the DOM
    $('tbody').on('click', '.check-button', function() {
        var slip = $(this).data('slip');
        var pid = $(this).data('pid');
        var amount = $(this).data('amount');

        // Set the 'src' attribute of the image element with the retrieved 'data-slip' value
        $('#modal-image').attr('src', slip);
        $('#modal-pid').val(pid);
        $('#modal-amount').val(amount);
    });
});
 </script>		

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
			// Function to show the SweetAlert confirmation dialog
			function showDeleteConfirmation(batchId) {
				Swal.fire({
					title: 'Are you sure?',
					text: 'You will not be able to recover this payment!',
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