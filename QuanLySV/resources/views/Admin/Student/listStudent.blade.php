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
                        <h4>Student List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.student.form') }}">Student</a></li>
                        <li class="breadcrumb-item active"><a>Student List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Add'])
                                    <a href="{{ route('admin.addStudent.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Student</Span></a>
                                    <a href="{{ route('admin.importStudents.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-import"></i> Import</Span></a>
                                    <a href="{{ route('admin.exportStudents.submit') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-export"></i> Export</Span></a>
                                @endhasRole
                                @hasRole(['Delete', 'Admin'])
                                    <a style="display: none" id="delete-student-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div style="width: 350px">
                                <form action="{{ route('admin.searchStudent.submit') }}" method="GET">
                                    <select class="form-control" id="val-skill" name="searchBy"
                                        style="float: left; max-width: 100px; margin-right:10px">
                                        <option value="1">Code</option>
                                        <option value="2">Name</option>
                                        <option value="3">DOB</option>
                                        <option value="4">Gender</option>
                                        <option value="5">Address</option>
                                        <option value="6">Phone</option>
                                        <option value="7">Class</option>
                                        <option value="8">Email</option>
                                    </select>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example"
                                        placeholder="Search by ...">
                                </form>
                            </div>
                        </div>
                        <div style="margin-left: 20px">
                            <form action="{{ route('filter.student.submit') }}" method="POST">
                                @csrf
                                <div style="float: left; margin-right: 20px">
                                    <label for="">Khóa:</label>
                                    <select class="form-control" id="val-skill" name="course" style="width: 200px; ">
                                        <option value=""></option>
                                        @foreach ($course as $item)
                                            <option value="{{ $item->course_id }}"
                                                @if (isset($c)) {{ $c == $item->course_id ? 'selected' : '' }} @endif>
                                                {{ $item->course_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="float: left; margin-right: 20px">
                                    <label for="">Khoa:</label>
                                    <select class="form-control" id="faculty" onchange="getMajor()" name="faculty"
                                        style="width: 200px; ">
                                        <option value=""></option>
                                        @foreach ($faculty as $item)
                                            <option value="{{ $item->faculty_id }}"
                                                @if (isset($f)) {{ $f == $item->faculty_id ? 'selected' : '' }} @endif>
                                                {{ $item->faculty_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (isset($m))
                                    <input type="hidden" id="minput" value="{{ $m }}">
                                @endif
                                @if (isset($cl))
                                    <input type="hidden" id="clinput" value="{{ $cl }}">
                                @endif
                                <div style="float: left; margin-right: 20px">
                                    <label for="">Chuyên ngành:</label>
                                    <select class="form-control" id="major" onchange="getClass()" name="major"
                                        style="width: 200px; ">
                                        <option value=""></option>

                                        @foreach ($major as $item)
                                            <option value="{{ $item->major_id }}"
                                                @if (isset($m)) {{ $m == $item->major_id ? 'selected' : '' }} @endif>
                                                {{ $item->major_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <label for="">Lớp:</label>
                                    <select class="form-control" id="classs" name="class" style="width: 200px; ">
                                        <option value=""></option>
                                        @foreach ($class as $item)
                                            <option value="{{ $item->class_id }}"
                                                @if (isset($cl)) {{ $cl == $item->class_id ? 'selected' : '' }} @endif>
                                                {{ $item->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Lọc <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
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
                                                <th>DOB</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                {{-- <th>Email</th> --}}
                                                <th>Phone</th>
                                                <th>Avatar</th>
                                                <th>Class</th>
                                                <th>Course</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($students as $student)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="studentValue-{{ $student->student_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="student-checked" type="checkbox"
                                                            name="studentsChecked[]" value="{{ $student->student_id }}">
                                                    </td>
                                                    <td>{{ $student->student_code }}</td>
                                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                    <td>{{ $student->date_of_birth }}</td>
                                                    <td>{{ $student->gender }}</td>
                                                    <td>{{ $student->address }}</td>
                                                    {{-- <td>{{ $student->email }}</td> --}}
                                                    <td>{{ $student->phone }}</td>
                                                    <td>{{ $student->student_avatar }}</td>
                                                    <td>{{ $student->class->class_name }}</td>
                                                    <td>{{ $student->class->course->course_name }}</td>
                                                    <td><span><a href="{{ route('admin.updateStudent.form', ['student_id' => $student->student_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                            </a></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $students->links() }}
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
    <script src="{{ asset('assetAdmin/js/a/getquery.js') }}"></script>
@endsection
