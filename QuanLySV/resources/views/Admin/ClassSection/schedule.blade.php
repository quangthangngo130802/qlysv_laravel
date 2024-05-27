@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Schedule</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li class="breadcrumb-item active"><a>Add Schedule</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text-center m-4" style="color: black; font-weight:bold; font-size: 18px">
                            {{ $sed->classSection->semesterSubject->subject->subject_name }} ({{ $sed->classSection->class_section_code }})
                            {{ $sed->start_date }}/{{ $sed->end_date }}
                        </div>
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.addClassSectionSchedule.submit', ['start_end_date_id'=>$sed->start_end_date_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Time
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="schedule_time">
                                                    @if ($errors->has('schedule_time'))
                                                        <p class="error-message">{{ $errors->first('schedule_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Day
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="schedule_day">
                                                        <option value=""></option>
                                                        <option value="2">Thứ 2</option>
                                                        <option value="3">Thứ 3</option>
                                                        <option value="4">Thứ 4</option>
                                                        <option value="5">Thứ 5</option>
                                                        <option value="6">Thứ 6</option>
                                                        <option value="7">Thứ 7</option>
                                                    </select>
                                                    @if ($errors->has('schedule_day'))
                                                        <p class="error-message">{{ $errors->first('schedule_day') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Classroom
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="classroom_id">
                                                        <option value=""></option>
                                                        @foreach ($classroom as $item)
                                                            <option value="{{ $item->classroom_id }}">
                                                                {{ $item->room_name }}-{{ $item->building_name }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('classroom_id'))
                                                        <p class="error-message">{{ $errors->first('classroom_id') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-currency">
                                                </label>
                                                <div class="col-lg-9">
                                                    <button type="submit" style="float: right;"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
