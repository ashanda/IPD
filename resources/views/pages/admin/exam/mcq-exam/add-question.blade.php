@extends('layouts.app')

@section('content')
@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				       <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h3>Add questions</h3>
                </div>
                <div class="float-end">
                    <a href="{{ route('mcq-exam.show',$exam->id) }}" class="btn btn-lg btn-dark">Back to questions list</a>
                </div>
            </div>
            <div class="card-body">

                @if ($question_count < $exam->exam_question)
                    <form method="POST" action="{{ route('add_question_db') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="hidden" name='exam_id' value="{{ $exam->id }}" required>
                                    <label class="form-label" for="">Question</label>
                                    <textarea class="form-control form-control-lg" name="question" id="" rows="2" required></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="">Upload</label>
                                    <input class="form-control form-control-lg" type="file" name="document">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <input class="form-control form-control-lg" name="ans_1" type="text" required="required" class="form-control" id="ans_1" placeholder="Answer 1" value="" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <input class="form-control form-control-lg" name="ans_2" type="text" required="required" class="form-control" id="ans_2" placeholder="Answer 2" value="" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <input class="form-control form-control-lg" name="ans_3" type="text" required="required" class="form-control" id="ans_3" placeholder="Answer 3" value="" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group mb-3">
                                    <input class="form-control form-control-lg" name="ans_4" type="text" required="required" class="form-control" id="ans_4" placeholder="Answer 4" value="" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group row mb-3">
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 text-end">
                                    <label for="mcq_id" class="form-label">Correct Answer:</label>
                                    <select name="ans" required="required" class="form-control form-control-lg" id="ans" tabindex="-98 " required>
                                        <option value="" hidden="yes">-Select-</option>
                                        <option value="1">Answer 1</option>
                                        <option value="2">Answer 2</option>
                                        <option value="3">Answer 3</option>
                                        <option value="4">Answer 4</option>
                                    </select>
                                    </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 text-end" style="margin-top: 32px;">
                                <button name="submit_btn" type="submit" class="btn btn-lg btn-success">Add New &amp; Next</button>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    @else
                    <h3 class="">No More added question</h3>
                    @endif

            </div>
        </div>
			</div>
@endsection