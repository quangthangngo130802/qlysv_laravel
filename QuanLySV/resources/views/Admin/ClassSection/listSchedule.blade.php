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
                        <h4>Schedule List</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li class="breadcrumb-item active"><a>Schedule List</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-margin">
                            <div>
                                @hasRole(['Admin', 'Editor'])
                                    <a href="{{ route('admin.addClassSectionSchedule.form', ['start_end_date_id' => $sed->start_end_date_id]) }}"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-user-plus"></i> Add Schedule</Span></a>

                                    <a style="display: none" id="delete-schedule-btn"><Span class="btn btn-primary">
                                            <i class="fa-solid fa-trash-can"></i> Delete</Span></a>
                                @endhasRole
                            </div>

                            <div>
                                {{-- <form action="{{ route('admin.searchClass.submit') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                    <input type="text" name="keyword" class="search-input" aria-controls="example">
                                </form> --}}
                            </div>
                        </div>
                        <div class="text-center m-3" style="color: black; font-weight:bold; font-size: 18px">
                            {{ $sed->classSection->semesterSubject->subject->subject_name }} ({{ $sed->classSection->class_section_code }})
                            {{ $sed->start_date }}/{{ $sed->end_date }}
                            <a href="{{ route('admin.updateSed.form', ['start_end_date_id'=>$sed->start_end_date_id]) }}" class="ml-3 "><i class="fa-solid fa-wrench"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper">

                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr class="tr-color">
                                                <th>#</th>
                                                <th>Day</th>
                                                <th>Perio</th>
                                                <th>Classroom</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($schedule as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr id="scheduleValue-{{ $item->schedule_id }}"
                                                    class="green-hover
                                                    @if ($i % 2 == 0) tr-background @endif ">
                                                    <td><input class="schedule-checked" type="checkbox"
                                                            name="scheduleChecked[]"
                                                            value="{{ $item->schedule_id }}">
                                                    </td>
                                                    <td>{{ $item->schedule_day }}</td>
                                                    <td>{{ $item->schedule_time }}</td>


                                                    <td>{{ $item->classroom->room_name }}</td>
                                                    <td><span><a href="{{ route('admin.updateSchedule.form', ['schedule_id' => $item->schedule_id]) }}"
                                                                class="mr-4" data-toggle="tooltip" data-placement="top"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                            </a></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div>
                                        {{ $classSection->links() }}
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
@endsection
