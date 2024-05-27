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
                        <h4>Grant Permissions List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.form') }}">Grant Permissions</a></li>
                        <li class="breadcrumb-item active"><a>Grant Permissions List</a></li>
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
                                <form action="{{ route('admin.searchAdmin.submit') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Avatar</th>
                                                <th>Admin</th>
                                                <th>Editor</th>
                                                <th>Viewer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($admins as $admin)
                                                @php
                                                    $i++;
                                                @endphp
                                                <form action="{{ route('admin.assignRoles.submit') }}" method="POST">
                                                    @csrf
                                                    <tr id="adminValue-{{ $admin->admin_id }}"
                                                        class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                        <td><input class="admin-checked" type="checkbox"
                                                                name="adminsChecked[]" value="{{ $admin->admin_id }}">
                                                        </td>
                                                        <td>{{ $admin->admin_name }}</td>
                                                        <td>{{ $admin->admin_email }}</td>
                                                        <td>{{ $admin->admin_phone }}</td>
                                                        <td>{{ $admin->admin_avatar }}</td>
                                                        <td><input type="checkbox" name="adminChecked"
                                                                {{ $admin->hasRole(['admin']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="editorChecked"
                                                                {{ $admin->hasRole(['editor']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="viewChecked"
                                                                {{ $admin->hasRole(['viewer']) ? 'checked' : '' }}></td>
                                                        <input type="hidden" name="admin_id"
                                                            value="{{ $admin->admin_id }}">
                                                        <td><button type="submit" class="btn btn-info"><i
                                                                    class="fa-solid fa-floppy-disk"></i></button></td>
                                                    </tr>
                                                </form>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <div>
                                            {{ $admins->appends(['keyword' => $keyword])->links() }}
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
