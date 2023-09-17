@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Certificate</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Certificate</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Certificate</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="uniqueTableId">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Certificate Status</th>
									<th class="table-plus datatable-nosort">Student</th>
									<th class="table-plus datatable-nosort">Action</th>
								
								</tr>
							</thead>
							<tbody>
								@foreach ( $data as $batch)
								<tr>
									<td class="table-plus">{{ $batch->status }}</td>
                                    <td class="table-plus">{{ $batch->fname .' '.$batch->lname}}</td>
                                    <td class="table-plus">
                                    <form action="{{ route('certificates.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="index_number" value="{{ $batch->index_number }}">
                                        <button type="submit" class="btn btn-link">Issue Certificate</button>
                                    </form>
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


@endsection
 