@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Semester</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.semester.form') }}">Semester</a></li>
                        <li class="breadcrumb-item active"><a>Update Semester</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide"
                                    action="{{ route('admin.updateSemester.submit', ['semester_id' => $semester->semester_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Semester Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="semester_name">
                                                        <option value="1"
                                                            {{ $semester->semester_name == '1' ? 'selected' : '' }}>1
                                                        </option>
                                                        <option value="2"
                                                            {{ $semester->semester_name == '2' ? 'selected' : '' }}>2
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('semester_name'))
                                                        <p class="error-message">{{ $errors->first('semester_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> School Year
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="school_year"
                                                        value="{{ $semester->school_year }}">
                                                    @if ($errors->has('school_year'))
                                                        <p class="error-message">{{ $errors->first('school_year') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Course
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="course_id">
                                                        <option></option>
                                                        @foreach ($course as $item)
                                                            <option value="{{ $item->course_id }}"
                                                                {{ $semester->course_id == $item->course_id ? 'selected' : '' }}>
                                                                {{ $item->course_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('course_id'))
                                                        <p class="error-message">{{ $errors->first('course_id') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Term
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="term" value="{{ $semester->term }}">
                                                    @if ($errors->has('term'))
                                                        <p class="error-message">{{ $errors->first('term') }}</p>
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
