@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Student</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.student.form') }}">Student</a></li>
                        <li class="breadcrumb-item active"><a>Update Student</a></li>
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
                                    action="{{ route('admin.updateStudent.submit', ['student_id' => $student->student_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Student code
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="student_code"
                                                        value="{{ $student->student_code }}">
                                                    @if ($errors->has('student_code'))
                                                        <p class="error-message">{{ $errors->first('student_code') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">First name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="first_name"
                                                        value="{{ $student->first_name }}">
                                                    @if ($errors->has('first_name'))
                                                        <p class="error-message">{{ $errors->first('first_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Last name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="last_name"
                                                        value="{{ $student->last_name }}">
                                                    @if ($errors->has('last_name'))
                                                        <p class="error-message">{{ $errors->first('last_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-email">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ $student->email }}">
                                                    @if ($errors->has('email'))
                                                        <p class="error-message">{{ $errors->first('email') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Address
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ $student->address }}">
                                                    @if ($errors->has('address'))
                                                        <p class="error-message">{{ $errors->first('address') }}</p>
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
                                                            <input type="file" name="student_avatar"
                                                                class="custom-file-input" id="avatarInput"
                                                                accept=".jpg, .png">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <input type="hidden" name="old_student_avatar" value="{{ $student->student_avatar }}">
                                                    </div>
                                                    @if ($errors->has('student_avatar'))
                                                        <p class="error-message">
                                                            {{ $errors->first('student_avatar') }}</p>
                                                    @endif
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        var defaultFileName = "{{ $student->student_avatar }}";
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
                                                    <select class="form-control" id="val-skill" name="gender">
                                                        <option value=""></option>
                                                        <option value="male"
                                                            {{ $student->gender == 'male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="female"
                                                            {{ $student->gender == 'female' ? 'selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('gender'))
                                                        <p class="error-message">{{ $errors->first('gender') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Class
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="val-skill" name="class_id">
                                                        <option value=""></option>
                                                        @foreach ($class as $item)
                                                            <option value="{{ $item->class_id }}"
                                                                {{ $student->class_id == $item->class_id ? 'selected' : '' }}>
                                                                {{ $item->class_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('class_id'))
                                                        <p class="error-message">{{ $errors->first('class_id') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-currency">Date of birth
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" name="date_of_birth"
                                                        value="{{ $student->date_of_birth }}">
                                                    @if ($errors->has('date_of_birth'))
                                                        <p class="error-message">{{ $errors->first('date_of_birth') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $student->phone }}">
                                                    @if ($errors->has('phone'))
                                                        <p class="error-message">{{ $errors->first('phone') }}</p>
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
