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
                        <h4>Semester Information</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.code.form') }}">Information</a></li>
                        <li class="breadcrumb-item active"><a>Information List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                {{-- @hasRole(['Admin', 'Editor']) --}}
                                <a href="{{ route('admin.addCode.form') }}"><Span class="btn btn-primary">
                                        <i class="fa-solid fa-user-plus"></i> Add</Span></a>

                                <a style="display: none" id="delete-code-btn"><Span class="btn btn-primary">
                                        <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                {{-- @endhasRole --}}
                            </div>

                            <div>
                                {{-- <form action="{{ route('admin.searchPosts.submit') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example">
                                </form> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr class="tr-color">
                                                <th>#</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Year</th>
                                                <th>Semester</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($data as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="codeValue-{{ $item->code_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="code-checked" type="checkbox" name="codeChecked[]"
                                                            value="{{ $item->code_id }}">
                                                    </td>
                                                    <td>{{ $item->start_date }}</td>
                                                    <td>{{ $item->end_date }}</td>
                                                    <td>{{ $item->year }}</td>
                                                    <td>{{ $item->semester }}</td>
                                                    <td>{{ $item->time }}</td>
                                                    <td>
                                                        <input type="checkbox" name="checked" class="checkOpenSemester"
                                                            data-open-semester="{{ $item->code_id }}"
                                                            {{ $item->on_off != 0 ? 'checked' : '' }} disabled>
                                                    </td>

                                                    <td><span><a href="{{ route('admin.updateCode.form', ['code_id' => $item->code_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                            </a></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $data->links() }}
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
