@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Classroom</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.classroom.form') }}">Classroom</a></li>
                        <li class="breadcrumb-item active"><a>Update Classroom</a></li>
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
                                    action="{{ route('admin.updateClassroom.submit', ['classroom_id' => $classroom->classroom_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Building Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="building_name"
                                                        value="{{ $classroom->building_name }}">
                                                    @if ($errors->has('building_name'))
                                                        <p class="error-message">{{ $errors->first('building_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Room Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="room_name"
                                                        value="{{ $classroom->room_name }}">
                                                    @if ($errors->has('room_name'))
                                                        <p class="error-message">{{ $errors->first('room_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username">Capacity
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="capacity"
                                                        value="{{ $classroom->capacity }}">
                                                    @if ($errors->has('capacity'))
                                                        <p class="error-message">{{ $errors->first('capacity') }}</p>
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
