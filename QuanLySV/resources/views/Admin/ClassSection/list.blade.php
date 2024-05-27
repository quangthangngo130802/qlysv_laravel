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
                        <h4>Class Section List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li class="breadcrumb-item active"><a>Class Section List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addClassSection.form') }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Class Section</Span></a>

                                    <a style="display: none" id="delete-class-section-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div>
                                <form action="{{ route('admin.searchClass.submit') }}" method="GET">
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
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Time</th>
                                                <th>Capacity <i class="fa-solid fa-wrench"></i></th>
                                                <th>Semester</th>
                                                <th>Term</th>
                                                <th>Register</th>
                                                <th>Credit</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($classSection as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="classSectionValue-{{ $item->class_section_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="class-section-checked" type="checkbox"
                                                            name="classSectionChecked[]"
                                                            value="{{ $item->class_section_id }}">
                                                    </td>
                                                    <td>{{ $item->class_section_code }}</td>
                                                    <td>{{ $item->class_section_name }}</td>
                                                    <td>
                                                        @foreach ($item->startEndDate as $startEndDate)
                                                            <p style=" margin-bottom:0px">
                                                                <a
                                                                    href="{{ route('admin.classSectionSchedule.form', ['start_end_date_id' => $startEndDate->start_end_date_id]) }}">{{ $startEndDate->start_date }}
                                                                    /
                                                                    {{ $startEndDate->end_date }}
                                                                </a>
                                                            </p>
                                                            @foreach ($startEndDate->schedule as $schedule)
                                                                <p
                                                                    style="color: black; margin-left:10px; margin-bottom:0px">
                                                                    T{{ $schedule->schedule_day }} period
                                                                    {{ $schedule->schedule_time }} |
                                                                    {{ $schedule->classroom->room_name }}-{{ $schedule->classroom->building_name }}
                                                                </p>
                                                            @endforeach
                                                        @endforeach
                                                    </td>
                                                    <td contenteditable class="editable"
                                                        data-class-section-id="{{ $item->class_section_id }}">
                                                        {{ $item->class_section_capacity }}</td>
                                                    <td>{{ $item->code->year }}_{{ $item->code->semester }}</td>
                                                    <td>{{ $item->term->name }}</td>
                                                    <td><a
                                                            href="{{ route('admin.listStudentRegister.form', ['class_section_id' => $item->class_section_id]) }}">{{ $registrationNumbers[$item->class_section_id] }}</a>
                                                    </td>
                                                    <td>{{ $item->semesterSubject->subject->subject_credit }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $classSection->links() }}
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
