@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Subject Class</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.subject.form') }}">Subject</a></li>
                        <li class="breadcrumb-item active"><a>Add Subject</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.addSubject.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-2">
                                        </div>
                                        <div class="col-xl-8">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Subject Code
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="subject_code">
                                                    @if ($errors->has('subject_code'))
                                                        <p class="error-message">{{ $errors->first('subject_code') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Subject Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="subject_name">
                                                    @if ($errors->has('subject_name'))
                                                        <p class="error-message">{{ $errors->first('subject_name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-username"> Credits
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="subject_credit">
                                                    @if ($errors->has('subject_credit'))
                                                        <p class="error-message">{{ $errors->first('subject_credit') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="val-skill">Major
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="val-skill" name="major_id">
                                                        <option value=""></option>
                                                        @foreach ($major as $item)
                                                            <option value="{{ $item->major_id }}">
                                                                {{ $item->major_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('major_id'))
                                                        <p class="error-message">{{ $errors->first('major_id') }}</p>
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
