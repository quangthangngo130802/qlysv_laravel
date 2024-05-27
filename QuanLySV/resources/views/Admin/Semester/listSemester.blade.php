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
                        <h4>Semester List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.semester.form') }}">Semester</a></li>
                        <li class="breadcrumb-item active"><a>Semester List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Add'])
                                    <a href="{{ route('admin.addSemester.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Semester</Span></a>
                                @endhasRole
                                @hasRole(['Admin', 'Delete'])
                                    <a style="display: none" id="delete-semester-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>
                            {{-- LÀM LỌC THEO KHÓA, THEO NĂM --}}
                            {{-- <div>
                                <form action="{{ route('admin.searchStudent.submit') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example">
                                </form>
                            </div> --}}
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr class="tr-color">
                                                <th>#</th>
                                                <th>Semester</th>
                                                <th>Open</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($semester as $item)
                                                @php
                                                    $i++;
                                                @endphp

                                                <tr id="semesterValue-{{ $item->semester_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="semester-checked" type="checkbox"
                                                            name="semesterChecked[]" value="{{ $item->semester_id }}">
                                                    </td>
                                                    <td>{{ $item->semester_name }}</td>


                                                    <td>
                                                        <form id="IsOpenForRegistration-{{ $item->semester_id }}"
                                                            action="{{ route('admin.updateSemesterCheckbox.submit', ['semester_id' => $item->semester_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="checkbox" name="checked" class="checkOpenSemester"
                                                                data-open-semester="{{ $item->semester_id }}"
                                                                {{ $item->IsOpenForRegistration != 0 ? 'checked' : '' }}>

                                                        </form>
                                                    </td>
                                                    <td>
                                                        <script>
                                                            function IsOpenForRegistration(semester_id) {
                                                                document.getElementById('IsOpenForRegistration-' + semester_id).submit();
                                                            }
                                                        </script>
                                                        <span><a href="{{ route('admin.listSemesterSubject.form', ['semester_id' => $item->semester_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="List Subject in Semester"><i
                                                                    class="fa-solid fa-circle-info"></i>
                                                            </a></span>
                                                        <span><a href="{{ route('admin.updateSemester.form', ['semester_id' => $item->semester_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                            </a></span>
                                                        <span><a style="display: none"
                                                                onclick="IsOpenForRegistration('{{ $item->semester_id }}')"
                                                                id="openSemester-{{ $item->semester_id }}" class="mr-4"
                                                                data-toggle="tooltip" data-placement="top" title="Save"><i
                                                                    class="fa-solid fa-floppy-disk"></i>
                                                            </a></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $semester->links() }}
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
    <script src="{{ asset('assetAdmin/js/a/open-semester.js') }}"></script>
@endsection
