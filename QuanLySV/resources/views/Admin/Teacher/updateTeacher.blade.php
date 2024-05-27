@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Teacher</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.teacher.form') }}">Teacher</a></li>
                        <li class="breadcrumb-item active"><a>Update Teacher</a></li>
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
                                    action="{{ route('admin.updateTeacher.submit', ['teacher_id' => $teacher->teacher_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Teacher code
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="teacher_code"
                                                        value="{{ $teacher->teacher_code }}">
                                                    @if ($errors->has('teacher_code'))
                                                        <p class="error-message">{{ $errors->first('teacher_code') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Teacher name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="teacher_name"
                                                        value="{{ $teacher->teacher_name }}">
                                                    @if ($errors->has('teacher_name'))
                                                        <p class="error-message">{{ $errors->first('teacher_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-email">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="teacher_email"
                                                        value="{{ $teacher->teacher_email }}">
                                                    @if ($errors->has('teacher_email'))
                                                        <p class="error-message">{{ $errors->first('teacher_email') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Address
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="teacher_address"
                                                        value="{{ $teacher->teacher_address }}">
                                                    @if ($errors->has('teacher_address'))
                                                        <p class="error-message">{{ $errors->first('teacher_address') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-currency">Avatar
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="teacher_avatar"
                                                                class="custom-file-input" id="avatarInput"
                                                                accept=".jpg, .png">
                                                            <label class="custom-file-label"></label>
                                                            <input type="hidden" name="old_teacher_avatar" value="{{ $teacher->teacher_avatar }}">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('teacher_avatar'))
                                                        <p class="error-message">
                                                            {{ $errors->first('teacher_avatar') }}</p>
                                                    @endif
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        var defaultFileName = "{{ $teacher->teacher_avatar }}";
                                                        $('.custom-file-label').text(defaultFileName);
                                                    })
                                                    // Lắng nghe sự kiện khi người dùng chọn tệp tin
                                                    document.getElementById("avatarInput").addEventListener("change", function(event) {
                                                        // Lấy tên của tệp tin đã chọn
                                                        var fileName = event.target.files[0].name;
                                                        // Hiển thị tên của tệp tin trong label
                                                        $('.custom-file-label').text(fileName);

                                                    });
                                                </script>

                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Gender
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="val-skill" name="teacher_gender">
                                                        <option value="Male"
                                                            {{ $teacher->teacher_gender == 'Male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="Female"
                                                            {{ $teacher->teacher_gender == 'Female' ? 'selected' : '' }}>
                                                            Female
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('teacher_gender'))
                                                        <p class="error-message">{{ $errors->first('teacher_gender') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="val-skill" name="teacher_title">
                                                        <option value="Lecturers"
                                                            {{ $teacher->teacher_title == 'Lecturers' ? 'selected' : '' }}>
                                                            Lecturers</option>
                                                        <option value="Dean"
                                                            {{ $teacher->teacher_title == 'Dean' ? 'selected' : '' }}>Dean
                                                        </option>
                                                        <option value="Deputy_dean"
                                                            {{ $teacher->teacher_title == 'Deputy_dean' ? 'selected' : '' }}>
                                                            Deputy_dean</option>
                                                    </select>
                                                    @if ($errors->has('teacher_title'))
                                                        <p class="error-message">{{ $errors->first('teacher_title') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Department
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="val-skill" name="department_id">
                                                        <option value=""></option>
                                                        @foreach ($department as $item)
                                                            <option value="{{ $item->department_id }}"
                                                                {{ $teacher->department_id == $item->department_id ? 'selected' : '' }}>
                                                                {{ $item->department_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('department_id'))
                                                        <p class="error-message">{{ $errors->first('department_id') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-currency">Date of birth
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control"
                                                        name="teacher_date_of_birth"
                                                        value="{{ $teacher->teacher_date_of_birth }}">
                                                    @if ($errors->has('teacher_date_of_birth'))
                                                        <p class="error-message">
                                                            {{ $errors->first('teacher_date_of_birth') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="teacher_phone"
                                                        value="{{ $teacher->teacher_phone }}">
                                                    @if ($errors->has('teacher_phone'))
                                                        <p class="error-message">{{ $errors->first('teacher_phone') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
