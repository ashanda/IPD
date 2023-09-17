@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Tute</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tute</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('tute.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="row">
                        
                            <div class="col-md-6 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="title"  required>
                                    </div>
                                </div>
                            </div>
                           
                            
                           <div class="col-md-3 col-sm-12 mt-20">
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
					     </div>

						 <div class="row">
							<div class="col-md-6 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="description"  required>
                                    </div>
                                </div>
                            </div>
							
						 </div>

						 <div class="row">
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
								<input type="file" class="custom-file-input" name="document" required>
								<label class="custom-file-label">Choose file</label>
								</div>
						
							</div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add Tute</button>
                                </div>
                            </div>
                        

					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Tute</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Tute title</th>
									<th>Document</th>
									<th>Batch</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $batch)
								<tr>
									<td class="table-plus">{{ $batch->title }}</td>
									<td class="table-plus"> <a href="{{ $batch->document }}" target="blank"><i class="micon dw dw-binocular"></i> </a></td>
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach(json_decode($batch->bid) as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
									
									@if ($batch->status === 1)
									<td><span class="badge badge-success">Plublish</span></td>		
									@else
									<td><span class="badge badge-warning">Unplublish</span></td>
									@endif
									<td>
                                    <td class="table-plus"></td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('tute.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form action="{{ route('tute.destroy', $batch->id) }}" method="POST">
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