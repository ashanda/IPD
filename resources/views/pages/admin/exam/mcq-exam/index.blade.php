@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>MCQ Exam</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">MCQ Exam</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="page-header">
                <form action="{{ route('mcq-exam.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mt-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label">Title</label>
                                <div class="col-sm-12 col-md-9">
                                    <input class="form-control" type="text" name="title" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mt-20">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Batch</label>
                                <div class="col-sm-9">
                                    <select class="selectpicker form-control" name="bid[]" data-style="btn-outline-secondary" multiple required>
                                        @foreach ($batchData as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->bname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mt-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-4 col-form-label">Time Duration</label>
                                <div class="col-sm-12 col-md-8">
                                    <input name="lms_exam_time_duration" type="text" placeholder="Enter in minutes" class="form-control form-control-lg" pattern="\d*" value="" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label">Questions Per MCQ</label>
                                <div class="col-sm-12 col-md-9">
                                    <input name="lms_exam_question" type="text" class="form-control form-control-lg" pattern="\d*" value="" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label">Publish Date</label>
                                <div class="col-sm-12 col-md-9">
                                    <input class="form-control date-picker" name="publish_date" placeholder="Select Date" type="text" required="">
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4 col-sm-12 text-right">
                            <div class="dropdown">
                                <button type="submit" class="btn btn-primary dropdown-toggle no-arrow">Add MCQ Exam</button>
                            </div>
                        </div>


					    </div>
                    </form>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">MCQ Exam</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">MCQ Exam name</th>
									<th>Batch</th>
									<th>Duration</th>
                                    <th>Question</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $batch)
								<tr>
									<td class="table-plus">{{ $batch->title }}</td>
									
                                    <td class="table-plus">
                                        <ul>
                                            
                                             @foreach($batch->bid as $item)
												<li>{{ getBatch($item)->bname }}</li>
											 @endforeach
                                            
                                        </ul>
                                    </td>
									<td class="table-plus">{{ $batch->exam_time_duration }}</td>
                    <td class="table-plus"><a class="btn btn-info" href="{{ route('mcq-exam.show', $batch->id) }}">Add Questions</a></td>
                                    <td class="table-plus"></td>
                                    <td>
									<div class="row">
										<div class="col">
											<a class="dropdown-item" href="{{ route('mcq-exam.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
										</div>
										<div class="col">
											<form id="delete-form-{{ $batch->id }}" action="{{ route('mcq-exam.destroy', $batch->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-link" onclick="showDeleteConfirmation({{ $batch->id }})">
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
 <script src="{{ asset('vendors/scripts/advanced-components.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script>
    // Function to show the SweetAlert confirmation dialog
    function showDeleteConfirmation(batchId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this MCQ exam!',
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