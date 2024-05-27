$(document).ready(function () {
    toastSuccessOnLoad();
    toastErrorOnLoad();
    updateClassSection();
    //Start_end_date
    $('#deleteSed-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                $('#deleteSed').submit();
            }
        });
    });
    //term
    $('.term-checked').change(function () {
        if ($('.term-checked:checked').length > 0) {
            $('#delete-term-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-term-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-term-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteTerm();
            }
        });
    });
    //code
    $('.code-checked').change(function () {
        if ($('.code-checked:checked').length > 0) {
            $('#delete-code-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-code-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-code-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteCode();
            }
        });
    });
    //student
    $('.student-checked').change(function () {
        if ($('.student-checked:checked').length > 0) {
            $('#delete-student-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-student-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-student-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteStudent();
            }
        });
    });
    //teacher
    $('.teacher-checked').change(function () {
        if ($('.teacher-checked:checked').length > 0) {
            $('#delete-teacher-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-teacher-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-teacher-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteTeacher();

            }
        });
    });
    //faculty
    $('.faculty-checked').change(function () {
        if ($('.faculty-checked:checked').length > 0) {
            $('#delete-faculty-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-faculty-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-faculty-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteFaculty();
            }
        });
    });
    //major
    $('.major-checked').change(function () {
        if ($('.major-checked:checked').length > 0) {
            $('#delete-major-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-major-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-major-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteMajor();
            }
        });
    });
    //posts
    $('.posts-checked').change(function () {
        if ($('.posts-checked:checked').length > 0) {
            $('#delete-posts-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-posts-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-posts-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deletePosts();
            }
        });
    });
    //classroom
    $('.classroom-checked').change(function () {
        if ($('.classroom-checked:checked').length > 0) {
            $('#delete-classroom-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-classroom-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-classroom-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteClassroom();
            }
        });
    });
    //class
    $('.class-checked').change(function () {
        if ($('.class-checked:checked').length > 0) {
            $('#delete-class-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-class-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-class-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteClass();
            }
        });
    });
    //subject
    $('.subject-checked').change(function () {
        if ($('.subject-checked:checked').length > 0) {
            $('#delete-subject-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-subject-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-subject-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteSubject();
            }
        });
    });
    //course
    $('.course-checked').change(function () {
        if ($('.course-checked:checked').length > 0) {
            $('#delete-course-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-course-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-course-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteCourse();
            }
        });
    });
    //semester
    $('.semester-checked').change(function () {
        if ($('.semester-checked:checked').length > 0) {
            $('#delete-semester-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {

            $('#delete-semester-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-semester-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteSemester();
            }
        });
    });
    //semester-subject
    $('.semesterSubject-checked').change(function () {
        if ($('.semesterSubject-checked:checked').length > 0) {
            $('#delete-semesterSubject-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {

            $('#delete-semesterSubject-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-semesterSubject-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteSemesterSubject();
            }
        });
    });
    //class-section
    $('.class-section-checked').change(function () {
        if ($('.class-section-checked:checked').length > 0) {
            $('#delete-class-section-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {

            $('#delete-class-section-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-class-section-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteClassSection();
            }
        });
    });
    //schedule
    $('.schedule-checked').change(function () {
        if ($('.schedule-checked:checked').length > 0) {
            $('#delete-schedule-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {

            $('#delete-schedule-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-schedule-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteSchedule();
            }
        });
    });
    //admin
    $('.admin-checked').change(function () {
        if ($('.admin-checked:checked').length > 0) {
            $('#delete-admin-btn').show(); // Hiển thị nút button khi có ít nhất một checkbox được chọn
        } else {
            $('#delete-admin-btn').hide(); // Ẩn nút button khi không có checkbox được chọn
        }
    });
    $('#delete-admin-btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xử lý khi người dùng đồng ý
                deleteAdmin();
            }
        });
    });
});
function deleteTerm() {  //xóa sinh viên ajax
    var selectedItems = $("input[name='termChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/term/delete',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#termValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete term a foreign key constraint fails'));
        }
    });
}
function deleteCode() {  //xóa sinh viên ajax
    var selectedItems = $("input[name='codeChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/code/delete',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#codeValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete code a foreign key constraint fails'));
        }
    });
}
function deleteSchedule() {  //xóa sinh viên ajax
    var selectedItems = $("input[name='scheduleChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/class-section/delete-schedule',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#scheduleValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete schedule a foreign key constraint fails'));
        }
    });
}

function deleteStudent() {  //xóa sinh viên ajax
    var selectedItems = $("input[name='studentsChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/student/delete-student',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#studentValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete students a foreign key constraint fails'));
        }
    });
}

function deleteTeacher() {
    var selectedItems = $("input[name='teachersChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/teacher/delete-teacher',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#studentValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete teachers a foreign key constraint fails'));
        }
    });
}

function deleteAdmin() {
    var selectedItems = $("input[name='adminsChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/permissions/delete-admin',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#adminValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Admins a foreign key constraint fails'));
        }
    });
}
function deleteFaculty() {
    var selectedItems = $("input[name='facultysChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/faculty/delete-faculty',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#facultyValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Facultys a foreign key constraint fails'));
        }
    });
}
function deleteMajor() {
    var selectedItems = $("input[name='majorsChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/major/delete-major',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#majorValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Facultys a foreign key constraint fails'));
        }
    });
}
function deletePosts() {
    var selectedItems = $("input[name='postsChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/posts/delete-posts',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#postsValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Posts a foreign key constraint fails'));
        }
    });
}
function deleteClassroom() {
    var selectedItems = $("input[name='classroomChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/classroom/delete-classroom',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#classroomValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Classroom a foreign key constraint fails'));
        }
    });
}
function deleteClass() {
    var selectedItems = $("input[name='classChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/class/delete-class',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#classValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Class a foreign key constraint fails'));
        }
    });
}
function deleteSubject() {
    var selectedItems = $("input[name='subjectChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/subject/delete-subject',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#subjectValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Class a foreign key constraint fails'));
        }
    });
}
function deleteCourse() {
    var selectedItems = $("input[name='courseChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/course/delete-course',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#courseValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Course a foreign key constraint fails'));
        }
    });
}
function deleteSemester() {
    var selectedItems = $("input[name='semesterChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/semester/delete-semester',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#semesterValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Course a foreign key constraint fails'));
        }
    });
}
function deleteSemesterSubject() {
    var selectedItems = $("input[name='semesterSubjectChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/semester/delete-semester-subject',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#semesterSubjectValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Course a foreign key constraint fails'));
        }
    });
}
function deleteClassSection() {
    var selectedItems = $("input[name='classSectionChecked[]']:checked").map(function () {
        return $(this).val();
    }).get();

    $.ajax({
        method: 'POST',
        url: '/admin/class-section/delete',
        data: {
            selected_items: selectedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $('#toast__hong').html(toastSuccess(response.success));
                // Xóa hàng dữ liệu tương ứng khi xóa thành công
                for (var i = 0; i < selectedItems.length; i++) {
                    $("#classSectionValue-" + selectedItems[i]).remove();
                }
            } else {
                $('#toast__hong').html(toastError(response.error));
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
            $('#toast__hong').html(toastError('Cannot delete Class Section a foreign key constraint fails'));
        }
    });
}
function updateClassSection(){
    $(".editable").on("blur", function () {
        var classSectionId = $(this).data('class-section-id');
        var capacityValue = $(this).text().trim();

        $.ajax({
            type: 'POST',
            url: "/admin/class-section/update/" + classSectionId,
            data: {
                capacity_value: capacityValue,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $('#toast__hong').html(toastSuccess(response.success));
                } else {
                    $('#toast__hong').html(toastError(response.error));
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Xử lý lỗi nếu yêu cầu Ajax không thành công bound data
                location.reload();
                $('#toast__hong').html(toastError('Cannot be left blank & must be of type int'));

            }
        });
    });

}
function toastSuccessOnLoad() {
    var inputToast = document.getElementById('inputToastSuccess');
    if (inputToast) { //Nếu tồn tại thì lấy value
        var inputValue = inputToast.value;
        $('#toast__hong').html(toastSuccess(inputValue));
    }
}
function toastErrorOnLoad() {
    var inputToast = document.getElementById('inputToastError');
    if (inputToast) {
        var inputValue = inputToast.value;
        $('#toast__hong').html(toastError(inputValue));
    }
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
