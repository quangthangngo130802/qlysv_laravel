@extends('LayoutUser.index')
@section('user_content')
    <section>
        <div class="container-fluid mt-4 p-0 home">
            <table id="Table3" cellspacing="0" cellpadding="0" width="100%" border="0">
                <tbody>
                    <tr>
                        <td valign="top" width="90%" height="100%" rowspan="2">
                            <table id="Table9" height="100%" cellspacing="0" cellpadding="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="FILTER:progid:DXImageTransform.Microsoft.Gradient(startColorStr='#0a6cce', endColorStr='#ffffff', gradientType='1')"
                                            align="center"><span class="cssPageTitle">Ðăng ký môn học</span></td>
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td id="tdParameter" class="tableblue">
                            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="labelHeader" width="150" height="20"><span
                                                id="lblMinCreditTitle">Số
                                                TC tối thiểu cần ĐK:</span></td>
                                        <td class="labelContent" width="100"><span id="lblMinCredit">0</span></td>
                                        <td class="labelHeader" width="230"><span id="lblMaxCreditTitle">Số TC tối đa
                                                được phép ĐK:</span></td>
                                        <td class="labelContent" width="120"><span id="lblMaxCredit">Không hạn
                                                chế</span><span id="lblSecondFieldMaxCredit"></span>

                                        </td>
                                        <td class="labelHeader" width="140">&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td class="labelHeader" width="150"></td>
                                        <td class="labelContent" width="100"></td>
                                        <td class="labelHeader" width="230"></td>
                                        <td class="labelContent" width="120">
                                        </td>
                                        <td class="labelHeader" width="140"></td>
                                        <td class="labelContent"></td>
                                    </tr>

                                    <tr>
                                        <td class="labelHeader" width="150" height="20"><span
                                                id="lblHanCheSoSVToiDa">Hạn chế số SV tối đa :</span></td>
                                        <td class="labelContent" width="100"><span id="lblMaxStudent">Có</span></td>
                                        <td class="labelHeader" width="230"><span id="lableMultiField">Cho phép đ.ký
                                                ngoài ngành :</span></td>
                                        <td class="labelContent" width="120"><span id="lblMultiField">Không</span></td>
                                        <td colspan="2" class=""><span class="labelHeader"><span
                                                    id="lableDailyRgsDuration">Hạn đăng ký : </span></span>

                                            <span id="lblStartHourTitle" class="labelContent">{{ $code->time }}, </span>
                                            <span id="lblDuration" class="labelContent">{{ $code->start_date }} -&gt;
                                                {{ $code->end_date }}</span>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="labelHeader" height="20"></td>
                                        <td class="labelContent"></td>
                                        <td colspan="4" class=""><span id="lblTuitionTerm" class="labelContent"
                                                style="color:Green;"></span><span id="lblStudentAcountBalance"
                                                class="labelContent" style="color:Red;"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="hidMode" type="hidden" id="hidMode" value="0"
                                style="WIDTH: 28px; HEIGHT: 19px" size="1">
                            <table cellspacing="1" cellpadding="0" width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td class="labelHeader" width="130" style="color:red"><span
                                                id="lblTKB">Thời
                                                khóa biểu khóa :</span></td>
                                        <td width="100px"><select name="drpAcademicYear"
                                                onchange="javascript:setTimeout('__doPostBack(\'drpAcademicYear\',\'\')', 0)"
                                                id="drpAcademicYear">
                                                <option selected="selected" value="18E4C2D57E3B4621805476D912F962C4">K63
                                                </option>

                                            </select></td>
                                        <td class="labelHeader" width="50" style="color:red"><span
                                                id="lableField">Ngành
                                                :</span></td>
                                        <td width="100px"><select name="drpField"
                                                onchange="javascript:setTimeout('__doPostBack(\'drpField\',\'\')', 0)"
                                                id="drpField">
                                                <option selected="selected" value="36E0D94B3AE842FEB692AC231A7C434A">K61
                                                    - Công nghệ thông tin CQ</option>

                                            </select>

                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                </tbody>
            </table>
            <table id="Table1" cellspacing="0" cellpadding="0" width="100%" border="0" class="mt-4">
                <tbody>
                    <tr>
                        <td class="listtitle" align="center" height="30"><span
                                id="lblStudent">{{ $studentValue->student_code }} - {{ $studentValue->first_name }}
                                {{ $studentValue->last_name }} Lớp: {{ $studentValue->class->class_name }} - Ngành
                                {{ $studentValue->class->major->major_name }} -
                                {{ $studentValue->class->course->course_name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><span id="lblStudyRankTitle" class="labelHeader">Tình trạng học lực:
                            </span><span id="lblStudyRank" class="labelContent" style="color:Red;"></span></td>
                    </tr>
                    <tr>
                        <td class="listtitle" align="center" height="30" style="FONT-SIZE: 17pt; COLOR: darkgreen">
                            <span id="lblTitle">Danh sách lớp học phần có thể đăng ký học kỳ 2 năm học 2023_2024 đợt học
                                2</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="labelHeader" height="20"><span id="lableGuid">Những lớp học phần
                                thuộc
                                cùng một dải màu liên tiếp dạy cùng một học phần, chỉ được chọn không quá 1 lớp</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                <tbody>
                                    <form action="{{ route('user.listClass.submit') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td class="labelHeader" width="90"><span id="lblSelectCourse">Chọn học
                                                    phần:</span></td>
                                            <td width="250">
                                                <select name="semester_subject_id" id="drpCourse" cursorshover="true">
                                                    <option value="">Chọn học phần để hiển thị các lớp học</option>
                                                    @foreach ($listSubject as $item)
                                                        <option value="{{ $item->semester_subject_id }}">
                                                            {{ $item->subject->subject_name }}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td class="labelHeader" width="100"><span id="labelDate">Chọn ngày học
                                                    :</span>
                                            </td>
                                            <td><select name="drpWeekDay" id="drpWeekDay">
                                                    <option value="0">Cả tuần</option>
                                                    <option value="2">Thứ 2</option>
                                                    <option value="3">Thứ 3</option>
                                                    <option value="4">Thứ 4</option>
                                                    <option value="5">Thứ 5</option>
                                                    <option value="6">Thứ 6</option>
                                                    <option value="7">Thứ 7</option>
                                                    <option value="8">Chủ nhật</option>

                                                </select>
                                                <input type="submit" name="btnViewCourseClass" value="Hiển thị lớp"
                                                    id="btnViewCourseClass" style="color:Red;font-weight:bold;width:80px;"
                                                    cursorshover="true">
                                            </td>
                                            <td align="right"><input type="submit" name="btnViewFilterCourseClass"
                                                    value="Lọc lớp không trùng thời gian" id="btnViewFilterCourseClass"
                                                    style="color:Red;font-weight:bold;width:170px;"></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td height="20"><span id="lblCourseTuition" class="labelContent"
                                                style="color:DarkGreen;"></span>
                                            <span id="lblCourseTuitionKP" class="labelContent"
                                                style="color:DarkGreen;"></span>
                                        </td>
                                        <td align="right">
                                            <span id="lblTotalCredit" class="labelContent"
                                                style="color:Blue; padding-right: 10px;">Bạn đã
                                                đăng ký 3 TC trên tổng số tối thiểu 0 TC</span>
                                            <span id="lblSemesterTotalCredit" class="labelContent"
                                                style="color:DarkGreen;"></span>

                                        </td>
                                        <td align="right" width="80px"><input type="submit" name="btnResult"
                                                value="In kết quả" id="btnResult"
                                                style="color:Red;font-weight:bold;width:80px;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="tableborder" height="300">
                            <div style="OVERFLOW: auto; WIDTH: 100%; HEIGHT: 100%">
                                <table cellspacing="0" cellpadding="0" rules="all" id="gridRegistration"
                                    style="border-color:RosyBrown;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                                    <tbody>
                                        <tr class="DataGridFixedHeader" align="center" style="color:White;height:20px;">
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:3%;">
                                                <label><b>STT</b></label>
                                            </td>
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:5%;">Chọn</td>
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:27%;">
                                                <label><b cursorshover="true">Lớp học phần</b></label>
                                            </td>
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:9%;">
                                                <label><b>Học phần</b></label>
                                            </td>
                                            <td class="cssListHeader" style="color:White;font-weight:bold;height:20px;">
                                                <label><b cursorshover="true">Thời gian</b></label>
                                            </td>

                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:6%;">
                                                <label title="Số SV tối da được phép đăng ký"><b>Sĩ số</b></label>
                                            </td>
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:6%;">
                                                <label title="Số SV đã đăng ký"><b>Ðã ÐK</b></label>
                                            </td>
                                            <td class="cssListHeader"
                                                style="color:White;font-weight:bold;height:20px;width:6%;">
                                                <label title="Số SV đã đăng ký"><b>Số TC</b></label>
                                            </td>
                                        </tr>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (session()->has('listClass') && ($listClass = session('listClass')))
                                            <form id="formdangky" action="{{ route('user.studyRegister.submit') }}"
                                                method="POST">
                                                @csrf
                                                @foreach ($listClass as $item)
                                                    <tr class="cssRangeItem3" style="height:20px;">
                                                        <td align="center">@php
                                                            echo $i;
                                                            $i++;
                                                        @endphp</td>
                                                        <td align="center">
                                                            <input type="radio" id="rdiSelect" name="radiodangky"
                                                                value="{{ $item->class_section_id }}"
                                                                cursorshover="true">
                                                            <br>
                                                        </td>
                                                        <td style="font-weight:bold;">
                                                            <span
                                                                id="gridRegistered_lblCourseClass_0">{{ $item->class_section_name }}({{ $item->class_section_code }})</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                id="gridRegistered_lblCourseCode_0">{{ $item->semesterSubject->subject->subject_code }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($item->startEndDate as $startEndDate)
                                                                <span id="gridRegistered_lblLongTime_0">Từ
                                                                    {{ $startEndDate->start_date }} đến
                                                                    {{ $startEndDate->end_date }}:
                                                                    @foreach ($startEndDate->schedule as $schedule)
                                                                        <br>&nbsp;&nbsp;&nbsp;
                                                                        <b>Thứ {{ $schedule->schedule_day }} tiết
                                                                            {{ $schedule->schedule_time }} |
                                                                            {{ $schedule->classroom->room_name }}-{{ $schedule->classroom->building_name }}</b>
                                                                    @endforeach
                                                                    <br>
                                                                </span>
                                                            @endforeach
                                                        </td>

                                                        <td align="center">
                                                            <span
                                                                id="gridRegistered_lblExpectationStudent_0">{{ $item->class_section_capacity }}</span>

                                                        </td>
                                                        <td align="center">
                                                            @if (session()->has('registrationNumbers') && ($registrationNumbers = session('registrationNumbers')))
                                                                <span
                                                                    id="gridRegistered_lblCurrentStudent_0">{{ $registrationNumbers[$item->class_section_id] }}</span>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <span
                                                                id="gridRegistered_lblCourseCredit_0">{{ $item->semesterSubject->subject->subject_credit }}</span>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </form>
                                        @endif

                                        @if (session()->has('changeClassSection') && ($changeClassSection = session('changeClassSection')))
                                            <form id="formdoilop" action="{{ route('user.updateChangeClass.submit') }}"
                                                method="POST">
                                                @csrf
                                                @foreach ($changeClassSection as $item)
                                                    <tr class="cssRangeItem3" style="height:20px;">
                                                        <td align="center">@php
                                                            echo $i;
                                                            $i++;
                                                        @endphp</td>
                                                        @if (session()->has('class_section_id') && ($class_section_id = session('class_section_id')))
                                                            <input type="hidden" name="class_section_id_old"
                                                                value="{{ $class_section_id }}">
                                                        @endif
                                                        <td align="center">
                                                            <input type="radio" id="rdiSelect" name="radiodangky"
                                                                value="{{ $item->class_section_id }}"
                                                                cursorshover="true">
                                                            <br>
                                                        </td>
                                                        <td style="font-weight:bold;">
                                                            <span
                                                                id="gridRegistered_lblCourseClass_0">{{ $item->class_section_name }}({{ $item->class_section_code }})</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                id="gridRegistered_lblCourseCode_0">{{ $item->semesterSubject->subject->subject_code }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($item->startEndDate as $startEndDate)
                                                                <span id="gridRegistered_lblLongTime_0">Từ
                                                                    {{ $startEndDate->start_date }} đến
                                                                    {{ $startEndDate->end_date }}:
                                                                    @foreach ($startEndDate->schedule as $schedule)
                                                                        <br>&nbsp;&nbsp;&nbsp;
                                                                        <b>Thứ {{ $schedule->schedule_day }} tiết
                                                                            {{ $schedule->schedule_time }} |
                                                                            {{ $schedule->classroom->room_name }}-{{ $schedule->classroom->building_name }}</b>
                                                                    @endforeach
                                                                    <br>
                                                                </span>
                                                            @endforeach
                                                        </td>

                                                        <td align="center">
                                                            <span
                                                                id="gridRegistered_lblExpectationStudent_0">{{ $item->class_section_capacity }}</span>

                                                        </td>
                                                        <td align="center">
                                                            @if (session()->has('registrationNumbers') && ($registrationNumbers = session('registrationNumbers')))
                                                                <span
                                                                    id="gridRegistered_lblCurrentStudent_0">{{ $registrationNumbers[$item->class_section_id] }}</span>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <span
                                                                id="gridRegistered_lblCourseCredit_0">{{ $item->semesterSubject->subject->subject_credit }}</span>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </form>
                                        @endif
                                    </tbody>
                                </table><span id="lblAvailableCourseClass" class="listTitle"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#003399" height="3"></td>
                    </tr>
                </tbody>
            </table>
            <table id="Table2" cellspacing="0" cellpadding="0" width="100%" border="0" class="tableblue">
                <tbody>
                    <tr>
                        <td style="WIDTH: 100%" align="right" width="100%" height="30" class="labelContent">
                            <a onclick="ShowOtherTermRgs(1);return false;" id="lnkViewOtherTermRgs"
                                href="javascript:__doPostBack('lnkViewOtherTermRgs','')">Hiển thị các lớp đã đăng ký đợt
                                trước</a>
                            <input name="hidFieldId" type="hidden" id="hidFieldId" style="WIDTH: 28px; HEIGHT: 19px"
                                size="1" value="36E0D94B3AE842FEB692AC231A7C434A">
                            <input name="hidSemester" type="hidden" id="hidSemester" style="WIDTH: 28px; HEIGHT: 19px"
                                size="1" value="2023_2024_2">
                            <input name="hidTerm" type="hidden" id="hidTerm" style="WIDTH: 28px; HEIGHT: 19px"
                                size="1" value="2">
                            <input name="hidCourseId" type="hidden" id="hidCourseId" style="WIDTH: 28px; HEIGHT: 19px"
                                size="1">
                            <input name="hidMultiStudyType" type="hidden" id="hidMultiStudyType"
                                style="WIDTH: 28px; HEIGHT: 19px" size="1">
                            <input name="hidMaxPeriod" type="hidden" id="hidMaxPeriod"
                                style="WIDTH: 28px; HEIGHT: 19px" size="1">
                            <input name="hidCourseTuition" type="hidden" id="hidCourseTuition"
                                style="WIDTH: 28px; HEIGHT: 19px" size="1">
                            <input name="hidMaxPeriodMode" type="hidden" id="hidMaxPeriodMode"
                                style="WIDTH: 28px; HEIGHT: 19px" size="1"><span id="labelGuidReg"> lớp trên cột
                                "Chọn"
                                rồi nhấn nút "Ðăng ký", xem kết quả bên dưới) </span>
                            &nbsp;
                            &nbsp;
                            <input id="btnUpgradeMark" type="button" value="Đổi lớp" onclick="formdoilop();"
                                style="font-weight: bold; display: inline; visibility: visible;">
                            <input id="btnUpgradeMark" type="button" value="Đăng ký" onclick="formdangky();"
                                style="font-weight: bold; display: inline; visibility: visible;">
                        </td>
                    </tr>
                    <tr>
                        <td class="listtitle" align="center" width="100%" style="FONT-SIZE: 17pt; COLOR: darkgreen">
                            <span id="labelListCourseClassReg">Danh sách lớp học phần đã đăng ký</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="100%"></td>
                    </tr>
                </tbody>
            </table>
            <table id="Table4" cellspacing="1" cellpadding="0" width="100%" border="0">
                <tbody>
                    <tr>
                        <td class="tableborder" height="300">
                            <div style="OVERFLOW: auto; WIDTH: 100%; HEIGHT: 100%">
                                <table cellspacing="0" cellpadding="0" rules="all" id="gridRegistered"
                                    style="border-color:RosyBrown;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                                    <tbody>
                                        <tr class="DataGridFixedHeader" align="center" style="height:20px;">
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:3%;">STT</td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:5%;">Hủy</td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:27%;">
                                                <label><b cursorshover="true">Lớp học phần</b></label>
                                            </td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:9%;">
                                                <label><b cursorshover="true">Học phần</b></label>
                                            </td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;">
                                                <label><b cursorshover="true">Thời gian</b></label>
                                            </td>

                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:6%;">
                                                <label><b cursorshover="true">Sĩ số</b></label>
                                            </td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:6%;">
                                                <label><b>Ðã ÐK</b></label>
                                            </td>
                                            <td class="cssListHeader" align="center"
                                                style="color:White;font-weight:bold;height:20px;width:5%;">
                                                <label><b>Số TC</b></label>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tbody id="creditTable">
                                        @if (isset($enrollmentDetail))
                                            @foreach ($enrollmentDetail as $item)
                                                <tr class="cssRangeItem3" style="height:20px;">
                                                    <td align="center">1</td>
                                                    <td align="center">
                                                        <input id="gridRegistered_chkDelete_0" type="checkbox"
                                                            name="gridRegistered$ctl02$chkDelete">

                                                        <br>
                                                        <a id="gridRegistered_lnkDoiLop_0"
                                                            href="{{ route('user.changeClass.form', ['class_section_id' => $item->classSection->class_section_id]) }}"
                                                            style="font-weight:bold;">Đổi lớp</a>
                                                    </td>
                                                    <td style="font-weight:bold;">
                                                        <span
                                                            id="gridRegistered_lblCourseClass_0">{{ $item->classSection->class_section_name }}({{ $item->classSection->class_section_code }})</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            id="gridRegistered_lblCourseCode_0">{{ $item->classSection->semesterSubject->subject->subject_code }}</span>
                                                    </td>
                                                    <td>
                                                        @foreach ($item->classSection->startEndDate as $startEndDate)
                                                            <span id="gridRegistered_lblLongTime_0">Từ
                                                                {{ $startEndDate->start_date }} đến
                                                                {{ $startEndDate->end_date }}:
                                                                @foreach ($startEndDate->schedule as $schedule)
                                                                    <br>&nbsp;&nbsp;&nbsp;
                                                                    <b>Thứ {{ $schedule->schedule_day }} tiết
                                                                        {{ $schedule->schedule_time }} |
                                                                        {{ $schedule->classroom->room_name }}-{{ $schedule->classroom->building_name }}</b>
                                                                @endforeach
                                                                <br>
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td align="center">
                                                        <span
                                                            id="gridRegistered_lblExpectationStudent_0">{{ $item->classSection->class_section_capacity }}</span>
                                                    </td>
                                                    <td align="center">
                                                        <span
                                                            id="gridRegistered_lblCurrentStudent_0">{{ $registrationNumber[$item->class_section_id] }}</span>
                                                    </td>
                                                    <td align="center">
                                                        <span
                                                            class="gridRegistered_lblCourseCredit_0">{{ $item->classSection->semesterSubject->subject->subject_credit }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tbody>
                                        <tr class="cssRangeItem4" align="center" style="height:20px;">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td align="center">
                                                <b>Tổng</b>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td align="center" style="font-weight:bold;" id="totalCredits"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#003399" height="3"></td>
                    </tr>
                </tbody>
            </table>
            <table id="Table5" cellspacing="1" cellpadding="0" width="100%" border="0" class="tableblue">
                <tbody>
                    <tr>
                        <td><input type="button" value="In thời khóa biểu" onclick="ViewTimeTable();"
                                style="VISIBILITY: hidden">&nbsp;<input type="button" value="In học phí"
                                onclick="ViewTuitionReport();" style="VISIBILITY: hidden">&nbsp;<input type="button"
                                value="In bảng đăng ký" onclick="ViewRegistable();" style="VISIBILITY: hidden"></td>
                        <td align="right" width="100%" height="30" class="labelContent"><span id="lableGuidCan">
                                lớp đã
                                đăng ký trên cột "Hủy" rồi nhấn nút) </span></td>
                    </tr>
                </tbody>
            </table>
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
