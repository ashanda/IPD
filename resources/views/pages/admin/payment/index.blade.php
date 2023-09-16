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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                                    <th>Next Pay Date</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $usersWithPayments as $usersWithPayment)
								<tr>
									
									<td class="table-plus"> <a href="{{ $usersWithPayment->document }}" target="blank"><i class="micon dw dw-binocular"></i> </a></td>
                                    <td class="table-plus">{{ $usersWithPayment->fname.' '.$usersWithPayment->lname }}</td>
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach(json_decode($usersWithPayment->batch) as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
									<td class="table-plus">{{ $usersWithPayment->fname.' '.$usersWithPayment->lname }}</td>
                                    <td class="table-plus">{{ $usersWithPayment->fname.' '.$usersWithPayment->lname }}</td>
									@if ($batch->status === 1)
									<td><span class="badge badge-success">Active</span></td>		
									@elseif($batch->status === 2)
									<td><span class="badge badge-warning">Pending</span></td>
                                    @else
									<td><span class="badge badge-denger">Reject</span></td>
									@endif
									<td>
                                    <td class="table-plus"></td>
                                    <td>
									<div class="row">
										<div class="col">
											<form action="{{ route('tute.destroy', $usersWithPayment->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-link"><i class="dw dw-delete-3"></i> Delete</button>
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
 @endsection