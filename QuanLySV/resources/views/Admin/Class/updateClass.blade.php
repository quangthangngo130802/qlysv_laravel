@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Class</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.class.form') }}">Class</a></li>
                        <li class="breadcrumb-item active"><a>Update Class</a></li>
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
                                    action="{{ route('admin.updateClass.submit', ['class_id' => $class->class_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Class Code
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="class_code"
                                                        value="{{ $class->class_code }}">
                                                    @if ($errors->has('class_code'))
                                                        <p class="error-message">{{ $errors->first('class_code') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Class Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="class_name"
                                                        value="{{ $class->class_name }}">
                                                    @if ($errors->has('class_name'))
                                                        <p class="error-message">{{ $errors->first('class_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Major
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="major_id">
                                                        <option value=""></option>
                                                        @foreach ($major as $item)
                                                            <option value="{{ $item->major_id }}"
                                                                {{ $class->major_id == $item->major_id ? 'selected' : '' }}>
                                                                {{ $item->major_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('major_id'))
                                                        <p class="error-message">{{ $errors->first('major_id') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">HomeroomTeacher
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="homeroom_teacher">
                                                        <option value=""></option>
                                                        @foreach ($teacher as $item)
                                                            <option value="{{ $item->teacher_id }}"
                                                                {{ $class->homeroom_teacher == $item->teacher_id ? 'selected' : '' }}>
                                                                {{ $item->teacher_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('homeroom_teacher'))
                                                        <p class="error-message">{{ $errors->first('homeroom_teacher') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Course
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="course_id">
                                                        <option value=""></option>
                                                        @foreach ($course as $item)
                                                            <option value="{{ $item->course_id }}"
                                                                {{ $class->course_id == $item->course_id ? 'selected' : '' }}>
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
