@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Admin Account</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.form') }}">Permission</a></li>
                        <li class="breadcrumb-item active"><a>Add Admin Account</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.addAdmin.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-email">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="admin_email">
                                                    @if ($errors->has('admin_email'))
                                                        <p class="error-message">{{ $errors->first('admin_email') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="admin_password">
                                                    @if ($errors->has('admin_password'))
                                                        <p class="error-message">{{ $errors->first('admin_password') }}</p>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="admin_name">
                                                    @if ($errors->has('admin_name'))
                                                        <p class="error-message">{{ $errors->first('admin_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Phone
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="admin_phone">
                                                    @if ($errors->has('admin_phone'))
                                                        <p class="error-message">{{ $errors->first('admin_phone') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-currency">Avatar
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="admin_avatar"
                                                                class="custom-file-input" id="avatarInput"
                                                                accept=".jpg, .png">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('admin_avatar'))
                                                        <p class="error-message">
                                                            {{ $errors->first('admin_avatar') }}</p>
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

    <script src="{{ asset('assetAdmin/js/a/delete-students.js') }}"></script>
@endsection
