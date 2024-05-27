@extends('LayoutUser.index')
@section('user_content')
    <section>
        <div class="container-fluid mt-5 p-0 home" >
            <table id="tblMain" height="70%" width="100%" align="center" border="0">
                <tbody>
                    <tr>
                        <td valign="middle" align="center">
                            <div style="WIDTH: auto" align="center">
                                <div id="pnlLogin" style="height:200px;width:70%;">

                                    <table id="boxlogin-t">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="tableborderLogin" style="MARGIN-TOP: 0px !important" height="100"
                                        cellspacing="0" cellpadding="0" width="487" border="0">
                                        <tbody>
                                            <tr>
                                                <td valign="middle" align="center">
                                                    <form action="{{ route('user.login.submit') }}" method="POST">
                                                        @csrf

                                                        <table id="Table2" cellspacing="1" cellpadding="0"
                                                            border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="labelHeader" align="right">Tài khoản&nbsp;:
                                                                    </td>
                                                                    <td>
                                                                        <input name="email" type="text"
                                                                            id="txtUserName">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="labelHeader" align="right">Mật khẩu :</td>
                                                                    <td>
                                                                        <input name="password" type="password"
                                                                            id="txtPassword" onblur="md5(this);">
                                                                    </td>
                                                                </tr>
                                                                <tr><td></td>
                                                                    <td class="labelHeader" align="left">
                                                                        <input type="submit" name="btnSubmit"
                                                                            value="Đăng nhập" id="btnSubmit">&nbsp;
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="labelHeader" colspan="2" align="center">
                                                                        <span id="lblErrorInfo" style="color:Red;">
                                                                            @if (session()->has('error') && ($error = session('error')))
                                                                                {{ $error }}
                                                                            @endif
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="labelHeader" colspan="2" align="center"><a style="color: #0066cc"
                                                                            href="{{ route('user.forgotpasssword.form') }}">[ Quên mật khẩu ]</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="boxlogin-b" style="MARGIN-TOP: 0px !important">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="WIDTH: 488px" align="center"></div><input name="hidUserId" type="hidden"
                                id="hidUserId"><input name="hidUserFullName" type="hidden" id="hidUserFullName"><input
                                name="hidTrainingSystemId" type="hidden" id="hidTrainingSystemId">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
