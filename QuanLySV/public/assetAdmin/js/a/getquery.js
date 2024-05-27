$(document).ready(function () {
    getMajor();
});

function getMajor() {
    // Lấy giá trị của tỉnh/thành phố được chọn theo id
    var facultyId = $("#faculty").val();
    var m = $("#minput").val();
    // Gửi Ajax request để lấy danh sách quận/huyện từ server
    $.ajax({
        type: "GET",
        url: "/admin/student/get-major/" + facultyId,
        success: function (data) {

            // Thêm các option vào dropdown quận/huyện
            $("#major").empty();//Xóa all các option hiện tại
            $('#classs').empty();
            $("#major").append('<option></option>');
            $.each(data, function (index, major) {
                var selected = '';
                if (m == major.major_id) {
                    selected = 'selected';
                } else {
                    selected = '';
                }
                $("#major").append('<option ' + selected + ' value="' + major.major_id + '">' + major.major_name + '</option>');
            });
        }
    });

    // Gọi hàm để lấy danh sách phường/xã của quận/huyện mặc định   (tương tự như getDistricts)
    getClass();
}
function getClass() {
    // Lấy giá trị của tỉnh/thành phố được chọn theo id
    var majorId = $("#major").val();
    var cl = $("#clinput").val();
    // Gửi Ajax request để lấy danh sách quận/huyện từ server
    $.ajax({
        type: "GET",
        url: "/admin/student/get-class/" + majorId,
        success: function (data) {
            // Thêm các option vào dropdown quận/huyện
            $('#classs').empty();
            $("#classs").append('<option></option>');
            $.each(data, function (index, classs) {
                var selected = '';
                if (cl == classs.class_id) {
                    selected = 'selected';
                } else {
                    selected = '';
                }
                $("#classs").append('<option ' + selected + ' value="' + classs.class_id + '">' + classs.class_name + '</option>');
            });
        }
    });
}
