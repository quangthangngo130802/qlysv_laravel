@extends('LayoutUser.index')
@section('user_content')
    <section>
        <div class="container-fluid mt-5 p-0 home">
            <div class="row">
                <div class="col-3" style="padding-right: 0px;">
                    <div class="slidebar">
                        <ul>
                            <p class="header" style="height: 2rem;">DANH MỤC CHÍNH</p>

                            <li><a href="{{ route('user.studyRegister.form') }}">Sinh viên đăng ký học</a></li>
                            <li><a href="{{ route('user.studyTime.form') }}">Kết quả đăng ký học</a></li>

                            <li><a href="{{ route('user.studyMark.form') }}">Tra cứu điểm</a></li>
                            <li><a href="{{ route('user.changePassword.form') }}">Đổi mật khẩu</a></li>
                            <li><a href="{{ route('user.info.form') }}">Thông tin cá nhân</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-9" style="padding-left: 0px; text-center">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <form action="{{ route('user.info.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Họ tên:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $student->first_name }} {{ $student->last_name }}"
                                        style="pointer-events: none;">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Ngày sinh:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $student->date_of_birth }}" style="pointer-events: none;">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Giới tính:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $student->gender == 'male' ? 'Nam' : 'Nữ' }}" style="pointer-events: none;">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        name="address" value="{{ $student->address }}">
                                    @if ($errors->has('address'))
                                        <p class="error-message">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email" value="{{ $student->email }}">
                                    @if ($errors->has('email'))
                                        <p class="error-message">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Phone:</label>
                                    <input type="text" class="form-control" id="pwd" placeholder="Enter password"
                                        name="phone" value="{{ $student->phone }}">
                                    @if ($errors->has('phone'))
                                        <p class="error-message">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Lớp:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $student->class->class_name }} {{ $student->class->course->course_name }}"
                                        style="pointer-events: none;">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assetUser/js/change-password.js') }}"></script>
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
