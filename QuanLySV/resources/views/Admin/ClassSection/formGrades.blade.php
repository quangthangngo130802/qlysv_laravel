@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Grades</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.listStudentRegister.form', ['class_section_id' => $classSection->class_section_id]) }}">Class
                                Section</a></li>
                        <li class="breadcrumb-item active"><a>Add Grades</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.updategrades.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="hidden" name="class_section_id"
                                                value="{{ $classSection->class_section_id }}">
                                                <input type="hidden" name="subject_id" value="{{ $classSection->semesterSubject->subject->subject_id }}">
                                            <input type="hidden" name="student_id" value="{{ $student->student_id }}">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Class Section
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" style="pointer-events: none;"
                                                        name="class_section_capacity"
                                                        value="{{ $classSection->class_section_name }} ({{ $classSection->class_section_code }})">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Student
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="class_section_capacity"
                                                        style="pointer-events: none;"
                                                        value="{{ $student->first_name }} {{ $student->last_name }} ({{ $student->student_code }})">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Process Points
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    @if (isset($gradesDetail))
                                                        <input type="text" class="form-control" name="process_points"
                                                            value="{{ $gradesDetail->process_points }}">
                                                    @else
                                                        <input type="text" class="form-control" name="process_points"
                                                            value="">
                                                    @endif

                                                    @if ($errors->has('process_points'))
                                                        <p class="error-message">
                                                            {{ $errors->first('process_points') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div
                                                class="form-group
                                                        row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Test Score
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    @if (isset($gradesDetail))
                                                        <input type="text" class="form-control" name="test_score"
                                                            value="{{ $gradesDetail->test_score }}">
                                                    @else
                                                        <input type="text" class="form-control" name="test_score"
                                                            value="">
                                                    @endif
                                                    @if ($errors->has('test_score'))
                                                        <p class="error-message">
                                                            {{ $errors->first('test_score') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Final Grades
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    @if (isset($gradesDetail))
                                                        <input type="text" class="form-control" name="final_grades"
                                                            value="{{ $gradesDetail->final_grades }}">
                                                    @else
                                                        <input type="text" class="form-control" name="final_grades"
                                                            value="">
                                                    @endif
                                                    @if ($errors->has('final_grades'))
                                                        <p class="error-message">
                                                            {{ $errors->first('final_grades') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-currency">
                                                </label>
                                                <div class="col-lg-9">
                                                    <button type="submit" style="float: right;"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
