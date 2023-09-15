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
                    <h4 class="text-blue h4">Instructor</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Student name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>DOB</th>
                                <th>Batch</th>
                                <th>Registered</th>
                                <th>Status</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $batch)
                            <tr>
                                <td class="table-plus">{{ $batch->fname.' '.$batch->lname }}</td>
                                <td class="table-plus">{{ $batch->email }}</td>
                                <td class="table-plus">{{ $batch->contact_number }}</td>
                                <td class="table-plus">{{ $batch->dob }}</td>
                                <td class="table-plus">{{ $batch->batch }}</td>
                                <td class="table-plus">{{ $batch->created_at }}</td>
                                <td>
                                    @if ($batch->status === 1)
                                    <span class="badge badge-success">Plublish</span>
                                    @else
                                    <span class="badge badge-warning">Unplublish</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a class="dropdown-item" href="{{ route('instructor.edit', $batch->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('instructor.destroy', $batch->id) }}" method="POST">
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