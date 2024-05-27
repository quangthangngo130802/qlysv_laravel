@extends('LayoutUser.index')
@section('user_content')
    <section>
        <div class="container-fluid mt-5 p-0 home">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"><label class="form-control-lable" cursorshover="true">Mã sinh viên:</label>
                    </div>
                    <div class="col-md-2"><span id="lblStudentCode"
                            class="form-control-lable-value">{{ $studentValue->student_code }}</span>
                    </div>
                    <div class="col-md-1"><label class="form-control-lable">Họ tên:</label></div>
                    <div class="col-md-3"><span id="lblStudentName"
                            class="form-control-lable-value">{{ $studentValue->first_name }}
                            {{ $studentValue->last_name }}</span></div>
                    <div class="col-md-2"><label class="form-control-lable">Trạng thái:</label></div>
                    <div class="col-md-2"><span id="lblstudentstatus" class="form-control-lable-value">ĐANG HỌC</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label class="form-control-lable" cursorshover="true">Khóa:</label></div>
                    <div class="col-md-2"><span id="lblAy"
                            class="form-control-lable-value">{{ $studentValue->class->course->course_name }}</span></div>
                    <div class="col-md-1"><label class="form-control-lable">Ngành:</label></div>
                    <div class="col-md-3">
                        <span id="lblAy"
                            class="form-control-lable-value">{{ $studentValue->class->major->major_name }}</span>
                    </div>
                    <div class="col-md-2"><label class="form-control-lable">Lớp:</label></div>
                    <div class="col-md-2"><span id="lblAdminClass"
                            class="form-control-lable-value">{{ $studentValue->class->class_name }}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><label class="form-control-lable" cursorshover="true">Chọn học kỳ:</label>
                    </div>


                    <div class="col-md-2">
                        {{-- form chọn học kỳ --}}
                        <form id="chonhocky" action="{{ route('user.studyMarkCode.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" id="code_id" name="code_id" value="">
                        </form>
                        <select name="drpHK" onchange="chonhocky(this.value)" id="drpHK" class="form-control"
                            cursorshover="true">
                            <option value="">---</option>
                            @foreach ($result as $item)
                                @if (session()->has('code_id') && ($code_id = session('code_id')))
                                    <option {{ $code_id == $item->code_id ? 'selected' : '' }} value="{{ $item->code_id }}">
                                        {{ $item->year }}_{{ $item->semester }}</option>
                                @else
                                    <option value="{{ $item->code_id }}">{{ $item->year }}_{{ $item->semester }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <script>
                        function chonhocky(code_id) {
                            $('#code_id').val(code_id);
                            $('#chonhocky').submit();
                        }
                    </script>
                    <div class="col-md-1"><label class="form-control-lable" cursorshover="true">Lọc:</label></div>
                    <div class="col-md-7"><select name="drpFilter"
                            onchange="javascript:setTimeout('__doPostBack(\'drpFilter\',\'\')', 0)" id="drpFilter"
                            class="form-control" style="font-weight:bold;" cursorshover="true">
                            <option selected="selected" value="1">Xem những học phần đã có điểm và nằm trong chương
                                trình học</option>
                            <option value="2">Xem những học phần đã có điểm nhưng chưa ĐẠT và nằm trong chương trình
                                học
                            </option>
                            <option value="3">Xem những học phần đã có điểm và ĐẠT và nằm trong chương trình học
                            </option>
                            <option value="4">Xem những học phần nằm trong chương trình học nhưng chưa học</option>
                            <option value="5">Tất cả các học phần đã có điểm</option>
                            <option value="6">Xem các học phần nằm trong CTĐT và được công nhận là môn tính điểm xét
                                tốt
                                nghiệp</option>

                        </select></div>
                </div>
                <input name="hidSymbolMark" type="hidden" id="hidSymbolMark" value="0"> <input name="hidFieldId"
                    type="hidden" id="hidFieldId" value="36E0D94B3AE842FEB692AC231A7C434A">
                <input name="hidFieldName" type="hidden" id="hidFieldName" value="Công nghệ thông tin CQ"> <input
                    name="hidStudentId" type="hidden" id="hidStudentId" value="8c4a51bedb5844b88d337cd7df7345fd">
                <div class="row">
                    <div class="col-md-12"><label class="form-control-lable-value" cursorshover="true">BẢNG ĐIỂM TRUNG
                            BÌNH HỌC
                            TẬP NĂM HỌC, HỌC KỲ, TOÀN KHÓA:</label></div>
                </div>
            </div>
            <table class="tableborder" id="tblSumMark" cellspacing="0" cellpadding="0" width="100%" border="0">
                <tbody>
                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" rules="all" id="grdResult"
                                style="border-color:RosyBrown;border-width:1px;border-style:Solid;width:100%;border-collapse:collapse;Z-INDEX: 0">
                                <tbody>
                                    <tr align="center" style="color:White;height:20px;">
                                        <td class="cssListHeader" align="center" style="width:12%;">Năm học</td>
                                        <td class="cssListHeader" align="center" style="width:6%;">Học kỳ</td>
                                        <td class="cssListHeader" align="center" style="width:8%;">TBC Hệ 10</td>
                                        <td class="cssListHeader" align="center" style="width:8%;">TBC Hệ4</td>
                                        <td class="cssListHeader" align="center" style="width:8%;">Số TC</td>
                                    </tr>
                                    @php
                                        $a = 0;
                                    @endphp
                                    @foreach ($result as $item)
                                        @php
                                            $a++;
                                        @endphp
                                        <tr class="cssListItem {{ $a % 2 != 0 ? '' : 'colortd' }}" style="height:20px;">
                                            <td align="center">{{ $item->year }}</td>
                                            <td align="center">{{ $item->semester }}</td>
                                            <td align="center">
                                                <span id="grdResult_lblDTBCN1_0">{{ $item->tbc_he10 }}</span>
                                            </td>
                                            <td align="center">
                                                <span id="grdResult_lblDTBC4N1_0">{{ $item->tbc_he4 }}</span>
                                            </td>
                                            <td align="center">
                                                <span id="grdResult_lblSoTCN1_0">{{ $item->total_credit }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="cssListItem {{ $a % 2 != 0 ? 'colortd' : '' }}" style="height:20px;">
                                        <td align="center">Toàn khóa</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">
                                            <span id="grdResult_lblDTBCN1_12">{{ $tbc10 }}</span>
                                        </td>
                                        <td align="center">
                                            <span id="grdResult_lblDTBC4N1_12">{{ $tbc4 }}</span>
                                        </td>
                                        <td align="center">
                                            <span id="grdResult_lblSoTCN1_12">{{ $total_credit }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 mt-4"><label class="form-control-lable-value" cursorshover="true">BẢNG ĐIỂM CHI
                        TIẾT:</label></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="tableborder" id="tblMarkDetail" cellspacing="0" cellpadding="0" width="100%"
                        border="0">
                        <tbody>
                            <tr>
                                <td class="tableborder" height="300" valign="top">
                                    <div id="divData">
                                        <table id="tblStudentMark" cellpadding="0" cellspacing="0" border="0"
                                            style="width: 100%;">
                                            <tbody>
                                                <tr class="DataGridFixedHeader" height="20">
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        nowrap="nowrap" class="cssListHeader DataGridFixedColumn">STT
                                                    </td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        nowrap="nowrap" class="cssListHeader DataGridFixedColumn">Mã học
                                                        phần</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        nowrap="nowrap" class="cssListHeader DataGridFixedColumn">Tên
                                                        học phần</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        nowrap="nowrap" class="cssListHeader DataGridFixedColumn">Số TC
                                                    </td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        nowrap="nowrap" class="cssListHeader DataGridFixedColumn">Lần
                                                        học</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        class="cssListHeader">Đánh giá</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        class="cssListHeader">DQT</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        class="cssListHeader">THI</td>
                                                    <td align="center" style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                        class="cssListHeader">TKHP</td>
                                                </tr>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @if (session()->has('listGrades') && ($listGrades = session('listGrades')))
                                                    @foreach ($listGrades as $item)
                                                        <tr height="20" class="{{ $i % 2 != 0 ? '' : 'colortd' }}">
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">@php
                                                                    echo $i;
                                                                    $i++;
                                                                @endphp
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject_code }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject_name }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject_credit }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                {{ $item->attempt_number }}<br>
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                {{ $item->final_grades >= 4 ? 'DAT' : 'HOCLAI' }}<br>
                                                            </td>

                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                {{ $item->process_points }}<br>
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                {{ $item->test_score }}<br>
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                {{ $item->final_grades }}<br>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    @foreach ($grades as $item)
                                                        <tr height="20" class="{{ $i % 2 != 0 ? '' : 'colortd' }}">
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">@php
                                                                    echo $i;
                                                                    $i++;
                                                                @endphp
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject->subject_code }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject->subject_name }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;" nowrap="nowrap"
                                                                class="cssListItem DataGridFixedColumn">
                                                                {{ $item->subject->subject_credit }}
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                @foreach ($item->gradesDetail as $gradesDetail)
                                                                    {{ $gradesDetail->attempt_number }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                @php
                                                                    $d = 0;
                                                                    foreach ($item->gradesDetail as $gradesDetail) {
                                                                        if ($gradesDetail->final_grades >= 4) {
                                                                            $d++;
                                                                        }
                                                                    }
                                                                    echo $d > 0 ? 'DAT' : 'HOCLAI';
                                                                @endphp
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                @foreach ($item->gradesDetail as $gradesDetail)
                                                                    {{ $gradesDetail->process_points }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                @foreach ($item->gradesDetail as $gradesDetail)
                                                                    {{ $gradesDetail->test_score }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td style="BORDER-RIGHT:RosyBrown 1px solid;"
                                                                class="cssListItem">
                                                                @foreach ($item->gradesDetail as $gradesDetail)
                                                                    {{ $gradesDetail->final_grades }}<br>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td colspan="13" height="1" bgcolor="#003399"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
