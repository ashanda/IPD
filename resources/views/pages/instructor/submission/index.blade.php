@extends('layouts.app')

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">

			<div class="card-box mb-30">

				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Name</th>
								<th>Marks</th>
								<th>Document</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $data_row)
							<tr>
								<td class="table-plus">{{ user_data($data_row->index_number)->fname .' '.user_data($data_row->index_number)->lname }}</td>
								<td>{{ $data_row->marks }}</td>
								<td><a href="{{ asset('storage/'.$data_row->document) }}" target="_blank"><i class="micon dw dw-binocular"></i></a></td>
								<td>
									<!-- Button to trigger the update modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $data_row->id }}">Update</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<!-- Modal for updating marks -->
				@foreach($data as $data_row)
				<div class="modal fade" id="updateModal{{ $data_row->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="updateModalLabel">Update Marks</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- Form for updating marks -->
								<form action="{{ route('updatesubmisson', $data_row->id) }}" method="POST">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label for="marks">Marks:</label>
										<input type="number" class="form-control" id="marks" name="marks" value="{{ $data_row->marks }}">
									</div>
									<button type="submit" class="btn btn-primary">Save Changes</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>




		@endsection