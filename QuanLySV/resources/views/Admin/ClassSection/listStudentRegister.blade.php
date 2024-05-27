@extends('LayoutAdmin.index')
@section('admin_content')
    @php
        $i = 0;
    @endphp

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>List of registered students</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li class="breadcrumb-item active"><a>List of registered students</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addStudentRegister.form', ['class_section_id'=> $class_section_id]) }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Student</Span></a>

                                    <a style="display: none" id="delete-class-section-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div>
                                <form action="{{ route('admin.searchClass.submit') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example">
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr class="tr-color">
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Process_points</th>
                                                <th>Test_score</th>
                                                <th>Final_grades</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($listStudent as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="classSectionValue-{{ $item->enrollmentDetail_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="class-section-checked" type="checkbox"
                                                            name="classSectionChecked[]"
                                                            value="{{ $item->enrollmentDetail_id }}">
                                                    </td>
                                                    <td>{{ $item->enrollment->student->student_code }}</td>
                                                    <td>{{ $item->enrollment->student->first_name }} {{ $item->enrollment->student->last_name }}</td>
                                                    <td>{{ $item->enrollment->student->class->class_name }}_{{ $item->enrollment->student->class->course->course_name }}</td>
                                                    <td>
                                                        @foreach ($listGrades as $gradesdetail)
                                                            @if ($gradesdetail->grades->student_id == $item->enrollment->student_id)
                                                                {{ $gradesdetail->process_points }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($listGrades as $gradesdetail)
                                                            @if ($gradesdetail->grades->student_id == $item->enrollment->student_id)
                                                                {{ $gradesdetail->test_score }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($listGrades as $gradesdetail)
                                                            @if ($gradesdetail->grades->student_id == $item->enrollment->student_id)
                                                                {{ $gradesdetail->final_grades }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><a href="{{ route('admin.formgrades.form', ['class_section_id'=>$item->class_section_id, 'student_id'=> $item->enrollment->student_id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{-- {{ $listStudent->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
