@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Course</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Course</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf
					<div class="row">
                        
                            <div class="col-md-4 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Course Name</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="cname"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12 mt-20">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Fee</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" min="1000" name="fee"  required>
                                    </div>
                                </div>
                            </div>
                            
                           <div class="col-md-3 col-sm-12 mt-20">
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



                            
                            <div class="col-md-2 col-sm-12 text-right">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add Course</button>
                                </div>
                            </div>
                        

					</div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Courses</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Course name</th>
									<th>Batch</th>
									<th>Fee</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $batch)
								<tr>
									<td class="table-plus">{{ $batch->cname }}</td>
                                    <td class="table-plus">
                                        <ul>
                                            @foreach($batch->bid as $item)
                                                <li>{{ getBatch($item)->bname }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="table-plus">{{ $batch->fee }}</td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('course.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form action="{{ route('course.destroy', $batch->id) }}" method="POST">
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