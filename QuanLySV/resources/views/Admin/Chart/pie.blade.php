@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Class Section</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classSection.form') }}">Class Section</a></li>
                        <li class="breadcrumb-item active"><a>Add Class Section</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label pr-0 text-center" for="val-skill">Course
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-2 pl-0 ">
                                                <select class="form-control" id="course_id" name="course_id">
                                                    @foreach ($course as $item)
                                                        <option value="{{ $item->course_id }}">
                                                            {{ $item->course_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="chart py-4">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="genderChart" width="432" height="130" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assetAdmin/js/a/pie-chart.js') }}"></script>
@endsection
