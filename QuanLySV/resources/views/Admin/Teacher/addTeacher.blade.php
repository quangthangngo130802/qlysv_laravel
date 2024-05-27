@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Teacher</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.teacher.form') }}">Teacher</a></li>
                        <li class="breadcrumb-item active"><a>Add Teacher</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.addTeacher.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Teacher code
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="teacher_code">
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
                                                    <input type="text" class="form-control" name="teacher_name">
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
                                                    <input type="text" class="form-control" name="teacher_email">
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
                                                    <input type="text" class="form-control" name="teacher_address">
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
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('teacher_avatar'))
                                                        <p class="error-message">
                                                            {{ $errors->first('teacher_avatar') }}</p>
                                                    @endif
                                                </div>
                                                <script>
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
                                                        <option value=""></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
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
                                                        <option value=""></option>
                                                        <option value="Lecturers">Lecturers</option>
                                                        <option value="Dean">Dean</option>
                                                        <option value="Deputy_dean">Deputy_dean</option>
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
                                                            <option value="{{ $item->department_id }}">
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
                                                        name="teacher_date_of_birth">
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
                                                    <input type="text" class="form-control" name="teacher_phone">
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
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete-students.js') }}"></script>
@endsection
