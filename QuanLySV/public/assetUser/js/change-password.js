$(document).ready(function () {
    $('#btnChapNhan').click(function () {
        var txtOldPassword = $('#txtOldPassword').val();
        var txtNewPassWord = $('#txtNewPassWord').val();
        var txtRetypePassWord = $('#txtRetypePassWord').val();

        if (txtOldPassword == '') {
            $('#RequiredFieldValidator1').show();
        } else {
            $('#RequiredFieldValidator1').hide();
        }
        if (txtNewPassWord == '') {
            $('#RequiredFieldValidator2').show();
        } else {
            $('#RequiredFieldValidator2').hide();
        }
        if (txtRetypePassWord == '') {
            $('#RequiredFieldValidator3').show();
        } else {
            $('#RequiredFieldValidator3').hide();
            if (txtNewPassWord != txtRetypePassWord) {
                $('#CompareValidator1').show();
            } else {
                $('#CompareValidator1').hide();
            }
        }

        if (txtOldPassword != '' && txtNewPassWord != '' && txtRetypePassWord != '' && txtNewPassWord == txtRetypePassWord) {
            $('#changepassword').submit();
        }
    })
});
function changePassword() {
    var txtOldPassword = $('#txtOldPassword').val();
    var txtNewPassword = $('#txtNewPassword').val();

    // Tạo đối tượng dữ liệu để gửi đi
    var requestData = {
        txtOldPasswordValue: txtOldPassword,
        txtNewPasswordValue: txtNewPassword,
        _token: $('meta[name="csrf-token"]').attr('content')
    };

    // Gửi yêu cầu AJAX
    // $.ajax({
    //     method: 'POST',
    //     url: '/qldt/change-password', // Đổi thành URL thích hợp của bạn
    //     data: requestData,
    //     success: function (response) {
    //         // Xử lý phản hồi từ máy chủ
    //         if (response.success) {
    //             // Hiển thị thông báo thành công
    //             alert('Đổi mật khẩu thành công!');
    //         } else {
    //             // Hiển thị thông báo lỗi
    //             alert('Đổi mật khẩu thất bại: ' + response.error);
    //         }
    //     },
    //     error: function (jqXHR, textStatus, errorThrown) {
    //         // Xử lý lỗi trong quá trình gửi yêu cầu
    //         alert('Đã xảy ra lỗi: ' + errorThrown);
    //     }
    // });
}

function toastSuccess(message) {
    var toast =
        `<div id="toast__l">
        <div class="toast__l toast__success">
            <div class="toast__icon">
                <i class="fas fa-circle-check"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title"> Success</h3>
                <p class="toast__msg">${message}</p>
            </div>
        </div>
    </div>`;
    return toast;
}

function toastError(error) {
    var toast =
        `<div id="toast__l">
        <div class="toast__l toast__error">
            <div class="toast__icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title"> Error</h3>
                <p class="toast__msg">${error}</p>
            </div>
        </div>
    </div>`;
    return toast;
}
