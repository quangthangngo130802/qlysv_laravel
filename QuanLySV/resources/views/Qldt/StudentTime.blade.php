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
                    <br>
                    <table id="Table4" class="tableborder" border="0" cellspacing="1" cellpadding="0" width="100%"
                        height="95%">
                        <tbody>
                            <tr>
                                <td valign="top">
                                    <table id="Table1" border="0" cellspacing="1" cellpadding="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <form action="{{ route('user.studyTime.submit') }}" method="POST">
                                                    @csrf
                                                    <td class="labelContent" colspan="2">Học kỳ :
                                                        <select name="drpSemester" id="drpSemester" cursorshover="true">
                                                            @foreach ($code as $item)
                                                                <option value="{{ $item->code_id }}"
                                                                    @if (session()->has('code') && ($code = session('code'))) {{ $code->code_id == $item->code_id ? 'selected' : '' }} @endif>
                                                                    {{ $item->semester }}_{{ $item->year }}
                                                                </option>
                                                            @endforeach
                                                        </select>&nbsp;
                                                        <span class="labelContent">Ðợt học :</span>
                                                        <select name="drpTerm" id="drpTerm" cursorshover="true">
                                                            @foreach ($term as $item)
                                                                <option value="{{ $item->term_id }}"
                                                                    @if (session()->has('term') && ($term = session('term'))) {{ $term->term_id == $item->term_id ? 'selected' : '' }} @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="submit" name="btnView" value="Check" id="btnView">
                                                    </td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="Table11" border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="listtitle" height="30" align="center"><span
                                                        id="lblStudent">{{ $studentValue->student_code }} -
                                                        {{ $studentValue->first_name }}
                                                        {{ $studentValue->last_name }} - Ngành
                                                        {{ $studentValue->class->major->major_name }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="listtitle" height="25" align="center">Kết quả đăng ký học
                                                    @if (session()->has('code') && ($code = session('code')))
                                                        <span id="lblSemester">Học kỳ {{ $code->semester }} Năm
                                                            học {{ $code->year }} Đợt học
                                                            {{ $term->name }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="Table2" border="0" cellspacing="1" cellpadding="0" width="100%"
                                        height="90%">
                                        <tbody>
                                            <tr>
                                                <td class="tableborder">
                                                    <div
                                                        style="OVERFLOW: auto; WIDTH: 100%; HEIGHT: 87%; overflow: hidden;">
                                                        <table cellspacing="0" cellpadding="0" rules="all"
                                                            id="gridRegistered"
                                                            style="border-color:RosyBrown;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;">
                                                            <tbody>
                                                                <tr class="DataGridFixedHeader" align="center"
                                                                    style="height:20px;">
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:4%; border-width: 1px;">
                                                                        STT</td>
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:25%; ">
                                                                        <label><b cursorshover="true">Lớp học
                                                                                phần</b></label>
                                                                    </td>
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:9%; ">
                                                                        <label><b cursorshover="true">Học
                                                                                phần</b></label>
                                                                    </td>
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px; border-width: 1px;">
                                                                        <label><b>Thời gian</b></label>
                                                                    </td>

                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:5%; border-width: 1px;">
                                                                        <label><b>Sĩ số</b></label>
                                                                    </td>
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:5%; border-width: 1px;">
                                                                        <label><b>Số ÐK</b></label>
                                                                    </td>
                                                                    <td class="cssListHeader" align="center"
                                                                        style="color:White;font-weight:bold;height:20px;width:4%; border-width: 1px;">
                                                                        <label><b>Số TC</b></label>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody id="creditTable">
                                                                @if (session()->has('enrollmentDetail') && ($enrollmentDetail = session('enrollmentDetail')))
                                                                    @php
                                                                        $i = 1;
                                                                    @endphp
                                                                    @foreach ($enrollmentDetail as $item)
                                                                        <tr class="cssListItem {{ $i % 2 != 0 ? '' : 'colortd' }}"
                                                                            style="height:20px; border-width: 1px;">
                                                                            <td align="center" class="cssListItemtd">
                                                                                @php
                                                                                    echo $i;
                                                                                    $i++;
                                                                                @endphp
                                                                            </td>
                                                                            <td class="cssListItemtd"
                                                                                style=" font-weight:bold; ">
                                                                                {{ $item->classSection->class_section_name }}({{ $item->classSection->class_section_code }})
                                                                            </td>
                                                                            <td class="cssListItemtd">
                                                                                <span
                                                                                    id="gridRegistered_lblCourseCode_0">{{ $item->classSection->semesterSubject->subject->subject_code }}</span>
                                                                            </td>
                                                                            <td class="cssListItemtd">
                                                                                @foreach ($item->classSection->startEndDate as $startEndDate)
                                                                                    <span
                                                                                        id="gridRegistered_lblLongTime_0">Từ
                                                                                        {{ $startEndDate->start_date }} đến
                                                                                        {{ $startEndDate->end_date }}:
                                                                                        @foreach ($startEndDate->schedule as $schedule)
                                                                                            <br>&nbsp;&nbsp;&nbsp;
                                                                                            <b>Thứ
                                                                                                {{ $schedule->schedule_day }}
                                                                                                tiết
                                                                                                {{ $schedule->schedule_time }}
                                                                                                |
                                                                                                {{ $schedule->classroom->room_name }}-{{ $schedule->classroom->building_name }}</b>
                                                                                        @endforeach
                                                                                        <br>
                                                                                    </span>
                                                                                @endforeach
                                                                            </td>
                                                                            <td class="cssListItemtd" align="center">
                                                                                {{ $item->classSection->class_section_capacity }}
                                                                            </td>
                                                                            <td class="cssListItemtd" align="center">
                                                                                @if (session()->has('registrationNumbers') && ($registrationNumbers = session('registrationNumbers')))
                                                                                    <span
                                                                                        id="gridRegistered_lblCurrentStudent_0">{{ $registrationNumbers[$item->class_section_id] }}</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="gridRegistered_lblCourseCredit_0" align="center">
                                                                                {{ $item->classSection->semesterSubject->subject->subject_credit }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                            <tbody>
                                                                <tr align="center" style="height:20px;">
                                                                    <td class="cssListItemtd">&nbsp;</td>
                                                                    <td class="cssListItemtd" align="center">
                                                                        <b>Tổng</b>
                                                                    </td>
                                                                    <td class="cssListItemtd">&nbsp;</td>
                                                                    <td class="cssListItemtd">&nbsp;</td>
                                                                    <td class="cssListItemtd">&nbsp;</td>
                                                                    <td class="cssListItemtd">&nbsp;</td>

                                                                    <td id="totalCredits" align="center"
                                                                        style="font-weight:bold;">
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#003399" height="3"></td>
                                            </tr>
                                            <tr>
                                                <td height="1"><span id="lblTermTuition" class="labelContent"></span>
                                                </td>
                                            </tr>
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
    <script src="{{ asset('assetUser/js/study-register.js') }}"></script>

    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif
    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
