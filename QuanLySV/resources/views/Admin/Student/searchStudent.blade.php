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
                        <h4>Student Search List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.student.form') }}">Student</a></li>
                        <li class="breadcrumb-item active"><a>Student Search List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addStudent.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Student</Span></a>
                                    <a href="{{ route('admin.importStudents.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-import"></i> Import</Span></a>
                                    <a href="{{ route('admin.exportStudents.submit') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-export"></i> Export</Span></a>
                                    <a style="display: none" id="delete-student-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div>
                                <form action="{{ route('admin.searchStudent.submit') }}" method="GET">
                                    <select class="form-control" id="val-skill" name="searchBy"
                                        style="float: left; max-width: 100px; margin-right:10px">
                                        <option value="1" {{ $searchBy == 1 ? 'selected' : '' }}>Code</option>
                                        <option value="2" {{ $searchBy == 2 ? 'selected' : '' }}>Name</option>
                                        <option value="3" {{ $searchBy == 3 ? 'selected' : '' }}>DOB</option>
                                        <option value="4" {{ $searchBy == 4 ? 'selected' : '' }}>Gender</option>
                                        <option value="5" {{ $searchBy == 5 ? 'selected' : '' }}>Address</option>
                                        <option value="6" {{ $searchBy == 6 ? 'selected' : '' }}>Phone</option>
                                        <option value="7" {{ $searchBy == 7 ? 'selected' : '' }}>Class</option>
                                        <option value="8" {{ $searchBy == 8 ? 'selected' : '' }}>Email</option>
                                    </select>
                                    <input type="text" name="keyword" value="{{ $keyword }}" class="search-input"
                                        aria-controls="example">
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    @if (@isset($error))
                                        <p class="error-p">{{ $error }}</p>
                                    @else
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
                                                                name="studentsChecked[]"
                                                                value="{{ $student->student_id }}">
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
                                                                    class="mr-4" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit"><i
                                                                        class="fa-solid fa-pen-to-square"></i>
                                                                </a><a href="javascript:void()" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"><i
                                                                        class="fa-solid fa-trash"></i></a></span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>
                                            {{ $students->appends(['keyword' => $keyword, 'searchBy' => $searchBy])->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
