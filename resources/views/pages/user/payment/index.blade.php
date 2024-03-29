@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>My payments</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">My payments</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">My payments</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Amount</th>
                                    <th>Status</th>
                                    <th>Type</th>
									<th>Valid Date</th>
                                    <th>Approve Date</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($results as $result)
                                <tr>
                                    <td class="table-plus" >{{ $result->amount }}</td>
                                    @if ( $result->status === 1)
                                    @php
                                      $status = '<span class="badge badge-success">Active</span>';
                                    @endphp
                                        
                                    @elseif ( $result->status === 2)
                                     @php
                                      $status = '<span class="badge badge-primary">Pending</span>';
                                    @endphp
                                       
                                    @else
                                    @php
                                      $status = '<span class="badge badge-denger">Reject</span>';
                                    @endphp
                                        
                                    @endif
									<td >{!! $status !!}</td>
									<td>{{ $result->payment_type }}</td>
                                    <td>{{ $result->expired_date }}</td>
									<td>{{ $result->updated_at }}</td>
								</tr>
                                @endforeach
															
							</tbody>
						</table>
					</div>
				</div>

				
			</div>



     @endsection           
@section('scripts')


@endsection
 