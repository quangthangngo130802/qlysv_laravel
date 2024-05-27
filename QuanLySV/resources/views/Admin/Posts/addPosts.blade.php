@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Posts</h4>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.form') }}">Posts</a></li>
                        <li class="breadcrumb-item active"><a>Add Posts</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">

                                <form class="form-valide" action="{{ route('admin.addPosts.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-1">
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="val-username"> Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="posts_title">
                                                    @if ($errors->has('posts_title'))
                                                        <p class="error-message">{{ $errors->first('posts_title') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="val-suggestions">Suggestions
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-10">
                                                    <textarea id="ckeditor1" class="form-control valid" id="val-suggestions" name="posts_content" rows="5"
                                                        aria-describedby="val-suggestions-error" aria-invalid="false"></textarea>
                                                    @if ($errors->has('posts_content'))
                                                        <p class="error-message">{{ $errors->first('posts_content') }}</p>
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
                                        <div class="col-xl-1">
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

    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
