@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Batch</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Batch</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('batch.update', $findData->id) }}" method="POST">
                            @csrf
                             @method('PUT')
					<div class="row">
                        
                            <div class="col-md-6 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Batch Name</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" value="{{ $findData->bname }}" name="bname" placeholder="Don't use same batch name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select form-control" name="status" required>
                                            <option value="Publish">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Update Batch</button>
                                </div>
                            </div>
                        

					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Batches</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Status</th>
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $batch)
								<tr>
									<td class="table-plus">{{ $batch->bname }}</td>
									@if ($batch->status === 1)
									<td><span class="badge badge-success">Plublish</span></td>		
									@else
									<td><span class="badge badge-warning">Unplublish</span></td>
									@endif
									<td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('batch.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form action="{{ route('batch.destroy', $batch->id) }}" method="POST">
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