@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body" style="min-height: 100px;">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Import Teacher</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.teacher.form') }}">Teacher</a></li>
                        <li class="breadcrumb-item active"><a>Import Teacher</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.importTeachers.submit') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12" style="margin:20px">
                                            <div class="form-group row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-6">
                                                    <div class="header-import mb-5">
                                                        <h4>Add students from excel file</h4>
                                                        <p>Data processing (Download sample file:
                                                            <a style="color: #006fa9"
                                                                href="{{ route('admin.templateTeacherExport.submit') }}">Excel
                                                                2003</a>)
                                                        </p>
                                                    </div>
                                                    <div class="input-group mb-4">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="import-teachers"
                                                                class="custom-file-input" id="avatarInput" accept=".xlsx">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                    </div>

                                                    <div style="text-align: center" class="mb-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa-solid fa-file-circle-check"></i> Submit</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3"></div>

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
