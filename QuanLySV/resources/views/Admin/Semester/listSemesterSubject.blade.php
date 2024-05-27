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
                        <h4>Semester {{ $semester->semester_name }}</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.semester.form') }}">Semester</a></li>
                        <li class="breadcrumb-item active"><a>List of subjects in the semester</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Add'])
                                    <a href="{{ route('admin.addSemesterSubject.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Subject</Span></a>
                                @endhasRole
                                @hasRole(['Admin', 'Delete'])
                                    <a style="display: none" id="delete-semesterSubject-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
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
                                                <th>Subject</th>
                                                <th>Credits</th>
                                                <th>Major</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($listSemesterSubject as $item)
                                                @php
                                                    $i++;
                                                @endphp

                                                <tr id="semesterSubjectValue-{{ $item->semester_subject_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="semesterSubject-checked" type="checkbox"
                                                            name="semesterSubjectChecked[]" value="{{ $item->semester_subject_id }}">
                                                    </td>
                                                    <td>{{ $item->subject->subject_code }}</td>
                                                    <td>{{ $item->subject->subject_name }}</td>
                                                    <td>{{ $item->subject->subject_credit }}</td>
                                                    <td>{{ $item->subject->major->major_name }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div>
                                        {{ $semester->links() }}
                                    </div> --}}
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
