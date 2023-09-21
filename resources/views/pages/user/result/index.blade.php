@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Result</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Result</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">My result</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Marks</th>
                                    <th>Type</th>
									<th>Date</th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($results as $result)
                                <tr>
                                    @if ( $result->marks === null)
                                        <td class="table-plus">{{ 'Instructor not update' }}</td>
                                    @else
                                        <td class="table-plus">{{ ($result->marks/$result->total_question) * 100  }}</td>
                                    @endif
									
									<td>{{ $result->type }}</td>
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
 