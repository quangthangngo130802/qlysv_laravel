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
                    <table id="Table3" cellspacing="0" cellpadding="0" width="100%" border="0">
                        <tbody>
                            <tr>
                                <td rowspan="2" valign="top" width="90%" height="100%">
                                    <table id="Table9" cellspacing="0" cellpadding="0" width="100%" height="100%">
                                        <tbody>
                                            <tr>
                                                <td style="FILTER:progid:DXImageTransform.Microsoft.Gradient(startColorStr='#0a6cce', endColorStr='#ffffff', gradientType='1')"
                                                    align="center"><span class="cssPageTitle">Đổi mật khẩu</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><a id="GoHome1_ibnGoHome" href="javascript:__doPostBack('GoHome1$ibnGoHome','')"
                                        style="color:White;">Trang chủ</a>
                                </td>
                                <td><a id="Signout2_ibnLogout" href="javascript:__doPostBack('Signout2$ibnLogout','')"
                                        style="color:White;">Thoát</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellspacing="0" cellpadding="0" align="center" class="tableblue" style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>

                                    <table id="tbldangnhapmain" cellspacing="1" cellpadding="0" width="500"
                                        border="0" style="margin: 10px auto;">
                                        <tbody>
                                            <form id="changepassword" action="{{ route('user.changePassword.submit') }}"
                                                method="Post">
                                                @csrf
                                                <tr valign="top">
                                                    <td style="WIDTH: 125px" valign="top" width="125"
                                                        class="labelHeader">
                                                        Mật khẩu cũ :</td>
                                                    <td valign="top">
                                                        <input name="txtOldPassword" type="password" id="txtOldPassword"
                                                            style="width:120px;">
                                                        <span id="RequiredFieldValidator1" style="display:none;">Thiếu mật
                                                            khẩu cũ</span>
                                                    </td>
                                                </tr>
                                                <tr valign="top">
                                                    <td style="WIDTH: 125px" valign="top" width="125"
                                                        class="labelHeader">
                                                        Mật khẩu mới
                                                        :</td>
                                                    <td valign="top">
                                                        <input name="txtNewPassWord" type="password" id="txtNewPassWord"
                                                            style="width:120px;">
                                                        <span id="RequiredFieldValidator2" style="display:none;">Thiếu mật
                                                            khẩu mới</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="WIDTH: 125px" valign="top" width="125"
                                                        class="labelHeader">
                                                        Gõ
                                                        lại mật
                                                        khẩu mới :</td>
                                                    <td valign="top">
                                                        <input name="txtRetypePassWord" type="password"
                                                            id="txtRetypePassWord" style="width:120px;">
                                                        <span id="RequiredFieldValidator3" style="display:none;">Chưa xác
                                                            nhận mật khẩu mới</span>
                                                        <span id="CompareValidator1" style="display:none;">Mật khẩu mới
                                                            không trùng nhau</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="WIDTH: 125px" valign="top" width="125" height="20"
                                                        class="labelHeader"></td>
                                                    <td valign="top">
                                                        <input type="button" name="btnChapNhan" value="Đổi mật khẩu"
                                                            id="btnChapNhan">
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
