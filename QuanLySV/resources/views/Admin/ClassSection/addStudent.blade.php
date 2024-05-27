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

                                <form class="form-valide" action="{{ route('admin.addStudentRegister.submit') }}"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="hidden" name="class_section_id" value="{{ $class_section_id }}">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Student
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="student_code" required>
                                                        <option value=""></option>
                                                        @foreach ($student as $item)
                                                            <option value="{{ $item->student_id }}">
                                                                {{ $item->student_code }} {{  $item->first_name }} {{  $item->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- @if ($errors->has('semester_subject_id'))
                                                        <p class="error-message">{{ $errors->first('semester_subject_id') }}
                                                        </p>
                                                    @endif --}}
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Capacity
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control"
                                                        name="class_section_capacity">
                                                    @if ($errors->has('class_section_capacity'))
                                                        <p class="error-message">
                                                            {{ $errors->first('class_section_capacity') }}</p>
                                                    @endif
                                                </div>
                                            </div> --}}

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
