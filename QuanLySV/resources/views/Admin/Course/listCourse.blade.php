@extends('LayoutAdmin.index')
@section('admin_content')
    @php
        $i = 0;
    @endphp
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            margin-left: 100px
        }

        .popup-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Course List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.course.form') }}">Course</a></li>
                        <li class="breadcrumb-item active"><a>Course List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <button onclick="openPopup()" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i>
                                        Add Course </button>
                                    <a style="display: none" id="delete-course-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr class="tr-color">
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Year Of Admission</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($courses as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="courseValue-{{ $item->course_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="course-checked" type="checkbox" name="courseChecked[]"
                                                            value="{{ $item->course_id }}">
                                                    </td>
                                                    <td>{{ $item->course_name }}</td>
                                                    <td>{{ $item->year_of_admission }}</td>
                                                    <td><span><a href="{{ route('admin.updateCourse.form', ['course_id' => $item->course_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                            </a></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $courses->links() }}
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
    <div id="productPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Add Course</h2>
            <form id="productForm" action="{{ route('admin.addCourse.submit') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">Course Name
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="course_name">
                        <div id="course_name"></div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">Year Of Admission
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control" name="year_of_admission">
                        <div id="yoa"></div>
                    </div>
                </div>
            </form>
            <button onclick="addCourse()" type="button" class="btn btn-primary"">Add</button>

        </div>
    </div>

    @if (session('success'))
        <input type="hidden" id="inputToastSuccess" value="{{ session('success') }}">
    @endif
    @if (session('error'))
        <input type="hidden" id="inputToastError" value="{{ session('error') }}">
    @endif

    <script src="{{ asset('assetAdmin/js/a/delete.js') }}"></script>
    <script src="{{ asset('assetAdmin/js/a/add-course-popup.js') }}"></script>
@endsection
