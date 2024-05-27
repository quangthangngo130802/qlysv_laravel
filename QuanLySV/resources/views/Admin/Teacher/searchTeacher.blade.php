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
                        <h4>Teacher Search List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.teacher.form') }}">Teacher</a></li>
                        <li class="breadcrumb-item active"><a>Teacher Search List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addTeacher.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Teacher</Span></a>
                                    <a href="{{ route('admin.importTeachers.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-import"></i> Import</Span></a>
                                    <a href="{{ route('admin.exportTeacher.submit') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-file-export"></i> Export</Span></a>
                                    <a style="display: none" id="delete-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div style="width: 350px">
                                <form action="{{ route('admin.searchTeacher.submit') }}" method="GET">
                                    <select class="form-control" id="val-skill" name="searchBy"
                                        style="float: left; max-width: 100px; margin-right:10px">
                                        <option value="1" {{ $searchBy == 1 ? 'selected' : '' }}>Code</option>
                                        <option value="2" {{ $searchBy == 2 ? 'selected' : '' }}>Name</option>
                                        <option value="3" {{ $searchBy == 3 ? 'selected' : '' }}>Email</option>
                                        <option value="4" {{ $searchBy == 4 ? 'selected' : '' }}>Phone</option>
                                        <option value="5" {{ $searchBy == 5 ? 'selected' : '' }}>Address</option>
                                        <option value="6" {{ $searchBy == 6 ? 'selected' : '' }}>DOB</option>
                                        <option value="7" {{ $searchBy == 7 ? 'selected' : '' }}>Faculty</option>
                                        <option value="8" {{ $searchBy == 8 ? 'selected' : '' }}>Title</option>
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
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>DOB</th>
                                                    <th>Gender</th>
                                                    <th>Faculty</th>
                                                    <th>Title</th>
                                                    <th>Avatar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($teachers as $teacher)
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    <tr id="studentValue-{{ $teacher->teacher_id }}"
                                                        class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                        <td><input class="student-checked" type="checkbox"
                                                                name="studentsChecked[]"
                                                                value="{{ $teacher->teacher_id }}">
                                                        </td>
                                                        <td>{{ $teacher->teacher_code }}</td>
                                                        <td>{{ $teacher->teacher_name }}</td>
                                                        <td>{{ $teacher->teacher_email }}</td>
                                                        <td>{{ $teacher->teacher_phone }}</td>
                                                        <td>{{ $teacher->teacher_address }}</td>
                                                        <td>{{ $teacher->teacher_date_of_birth }}</td>
                                                        <td>{{ $teacher->teacher_gender }}</td>
                                                        <td>{{ $teacher->faculty->faculty_name }}</td>
                                                        <td>{{ $teacher->teacher_title }}</td>
                                                        <td>{{ $teacher->teacher_avatar }}</td>
                                                        <td><span><a href="{{ route('admin.updateTeacher.form', ['teacher_id' => $teacher->teacher_id]) }}"
                                                                    class="mr-4" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit"><i
                                                                        class="fa-solid fa-pen-to-square"></i>
                                                                </a></span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div>
                                            {{ $teachers->appends(['keyword' => $keyword, 'searchBy' => $searchBy])->links() }}
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
    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
@endsection
