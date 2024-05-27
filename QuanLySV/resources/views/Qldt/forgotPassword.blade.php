@extends('LayoutUser.index')
@section('user_content')
    <div style="height: 200px">

        <form action="{{ route('user.forgotpasssword.submit') }}" method="POST" style="margin-top: 184px; margin-left: 400px">
            @csrf
            <errors-list>
                <ul role="alert" class="error-list">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="error" style="color: red">{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
            </errors-list>
            <div class="mb-2" style="">
                <label for="email" class="form-label">Email:</label>
                <input style="background-color: #F8F8F3; color: black" type="email" class="form-control w-50"
                    id="email" placeholder="Enter email" name="email">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
