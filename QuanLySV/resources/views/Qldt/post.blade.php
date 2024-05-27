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
                <div class="col-9" style="padding-left: 0px;">
                    <div class="box_center">
                        <h4>
                            <span>Đại học chính quy
                                <a class="box_center_a pr-3" href="" >Xem tất cả</a>
                            </span>
                        </h4>
                        <div class="content">
                            <div class="post">
                                <div class="post-title mt-4">[Thông tin đáng chú ý]</div>
                                @foreach ($post as $item)
                                    <div class="post-content"><a
                                            href="{{ route('user.postDetail.form', ['id' => $item->posts_id]) }}">🌻{{ $item->posts_title }}
                                            elit. </a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="{{ asset('assetUser/js/study-register.js') }}"></script>
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif
    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
