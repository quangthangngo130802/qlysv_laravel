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
                        <h4>Subject Search List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.student.form') }}">Subject</a></li>
                        <li class="breadcrumb-item active"><a>Subject Search List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addSubject.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Subject</Span></a>

                                    <a style="display: none" id="delete-subject-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div style="width: 350px">
                                <form action="{{ route('admin.searchSubject.submit') }}" method="GET">
                                    <select class="form-control" id="val-skill" name="searchBy"  style="float: left; max-width: 100px; margin-right:10px">
                                        <option value="1">Code</option>
                                        <option value="2">Subject</option>

                                    </select>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example">
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
                                                    <th>Subject</th>
                                                    <th>Credits</th>
                                                    <th>Major</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($subjects as $item)
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    <tr id="subjectValue-{{ $item->subject_id }}"
                                                        class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                        <td><input class="subject-checked" type="checkbox"
                                                                name="subjectChecked[]" value="{{ $item->subject_id }}">
                                                        </td>
                                                        <td>{{ $item->subject_code }}</td>
                                                        <td>{{ $item->subject_name }}</td>
                                                        <td>{{ $item->subject_credit }}</td>
                                                        <td>{{ $item->major->major_name }}</td>
                                                        <td><span><a href="{{ route('admin.updateSubject.form', ['subject_id' => $item->subject_id]) }}"
                                                                    class="mr-4" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit"><i
                                                                        class="fa-solid fa-pen-to-square"></i>
                                                                </a></span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>
                                            {{ $subjects->appends(['keyword' => $keyword])->links() }}
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
