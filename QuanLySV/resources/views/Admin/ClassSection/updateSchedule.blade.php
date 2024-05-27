@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Schedule</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.classSectionSchedule.form', ['start_end_date_id' => $schedule->start_end_date_id]) }}">Schedule</a>
                        </li>
                        <li class="breadcrumb-item active"><a>Update Schedule</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide"
                                    action="{{ route('admin.updateSchedule.submit', ['schedule_id' => $schedule->schedule_id]) }}"
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
                                                    <input type="text" class="form-control" name="schedule_time"
                                                        value="{{ $schedule->schedule_time }}">
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
                                                    <select class="form-control" id="val-skill" name="schedule_day"
                                                        value="{{ $schedule->schedule_day }}">

                                                        <option value="2"
                                                            {{ $schedule->schedule_day == '2' ? 'selected' : '' }}>Thứ 2
                                                        </option>
                                                        <option value="3"
                                                            {{ $schedule->schedule_day == '3' ? 'selected' : '' }}>Thứ 3
                                                        </option>
                                                        <option value="4"
                                                            {{ $schedule->schedule_day == '4' ? 'selected' : '' }}>Thứ 4
                                                        </option>
                                                        <option value="5"
                                                            {{ $schedule->schedule_day == '5' ? 'selected' : '' }}>Thứ 5
                                                        </option>
                                                        <option value="6"
                                                            {{ $schedule->schedule_day == '6' ? 'selected' : '' }}>Thứ 6
                                                        </option>
                                                        <option value="7"
                                                            {{ $schedule->schedule_day == '7' ? 'selected' : '' }}>Thứ 7
                                                        </option>
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
                                                        @foreach ($classroom as $item)
                                                            <option
                                                                value="{{ $item->classroom_id }} {{ $item->classroom_id == $schedule->classroom_id ? 'selected' : '' }}">
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
