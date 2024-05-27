<header>
    <div class="container-fluid bg-header">
        <div id="bg-text">
            <span>HỆ THỐNG THÔNG TIN TRƯỜNG ĐẠI HỌC</span>
        </div>
        <span id="navbar">
            <a href="{{ route('user.post.form') }}">Trang chủ</a> |
            <a href="{{ route('user.logout.submit') }}">Thoát</a> |
            <a href="">Hỏi đáp</a> |
            <a href="">Trợ giúp</a>
        </span>
        <div id="box_user">
            <div id="PageHeader1_Panel1">
                <p class="mt-2 mb-2">
                    <span id="PageHeader1_lblUserFullName" class="pr-2">
                        @php
                            use App\Models\Student;
                            $name = Auth::guard('user')->user();
                            if ($name !== null) {
                                $studentId = $name->student_id;
                                $student = Student::where('student_id', $studentId)->first();
                                $first_name = $student->first_name;
                                $last_name = $student->last_name;
                                $msv = $student->student_code;
                                echo $first_name . ' ' . $last_name.' ('.$msv.')';
                            }
                        @endphp
                    </span>
                    <span id="PageHeader1_lblRoleTitle">
                        Vai trò :
                    </span>
                    <span id="PageHeader1_lblUserRole">Sinh viên</span>
                </p>
            </div>
        </div>
    </div>
</header>
