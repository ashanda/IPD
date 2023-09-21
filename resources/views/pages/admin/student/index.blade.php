@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Student</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Student</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Students</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Student name</th>
                                <th>Email</th>
                                <th>Batch</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $students as $student)
                            <tr>
                                <td class="table-plus">{{ $student->fname.' '.$student->lname }}</td>
                                <td class="table-plus">{{ $student->email }}</td>
                                <td class="table-plus">{{ $student->batch_name }}</td>                              
                                <td class="table-plus">{{ $student->contact_number }}</td>
                                @if ($student->status === 1)
                                <td><span class="badge badge-success">Plublish</span></td>
                                @else
                                <td><span class="badge badge-warning">Unplublish</span></td>
                                @endif
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a class="dropdown-item" href="{{ route('student.edit', $student->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                        </div>
                                        <div class="col">
                                            <form id="delete-form" action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-link" onclick="showDeleteConfirmation()">
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
                    function showDeleteConfirmation() {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'You will not be able to recover this student!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If the user confirms, submit the form for batch deletion
                                document.getElementById('delete-form').submit();
                            }
                        });
                    }
            </script>


		@endsection