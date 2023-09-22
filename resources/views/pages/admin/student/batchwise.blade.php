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
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Students</h4>
                    <div class="form-group">
                        <label for="batchFilter">Filter by Batch:</label>
                        <select id="batchFilter" class="form-control">
                            <option value="">All</option>
                            @foreach ($allBatch as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->bname }}</option>
                            @endforeach
                        </select>
                    </div>
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
                            @foreach ($students as $student)
                            <tr data-batches="{{ json_encode($student->batch) }}">
                                <td class="table-plus">{{ $student->fname.' '.$student->lname }}</td>
                                <td class="table-plus">{{ $student->email }}</td>
                                <td class="table-plus">{{ $student->batch_name }}</td>
                                <td class="table-plus">{{ $student->contact_number }}</td>


                                @if ($student->status === 1)
                                <td><span class="badge badge-success">Publish</span></td>
                                @else
                                <td><span class="badge badge-warning">Unplublish</span></td>
                                @endif
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a class="dropdown-item" href="{{ route('student.edit', $student->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
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
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendors/scripts/advanced-components.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#batchFilter').on('change', function() {
            const selectedBatch = $(this).val();

            $('table.data-table tbody tr').each(function() {
                const studentBatches = JSON.parse($(this).data('batches'));
                const shouldShow = selectedBatch === '' || studentBatches.includes(parseInt(selectedBatch));
                $(this).toggle(shouldShow);
            });
        });
    });
</script>
@endsection