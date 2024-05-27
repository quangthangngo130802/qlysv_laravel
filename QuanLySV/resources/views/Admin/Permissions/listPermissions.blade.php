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
                                <a href="{{ route('admin.addAdmin.form') }}"><Span class="btn btn-primary">
                                        <i class="fa-solid fa-user-plus"></i> Add Account</Span></a>

                                <a style="display: none" id="delete-admin-btn"><Span class="btn btn-primary">
                                        <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                            </div>

                            <div>
                                <form action="{{ route('admin.searchAdmin.submit') }}" method="GET">
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Avatar</th>
                                                <th>Admin</th>
                                                <th>Add</th>
                                                <th>Editor</th>
                                                <th>Delete</th>
                                                <th>Write</th>
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
                                                                {{ $admin->hasRole(['Admin']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="addChecked"
                                                                {{ $admin->hasRole(['Add']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="editorChecked"
                                                                {{ $admin->hasRole(['Editor']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="deleteChecked"
                                                                {{ $admin->hasRole(['Delete']) ? 'checked' : '' }}></td>
                                                        <td><input type="checkbox" name="writeChecked"
                                                                {{ $admin->hasRole(['Write']) ? 'checked' : '' }}></td>
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
                                        {{ $admins->links() }}
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
