@extends('LayoutUser.index')
@section('user_content')
    <div style="height: 200px">

        <form action="{{ route('user.resetpassword.submit') }}" method="POST" style="margin-top: 184px; margin-left: 400px">
            @csrf
            <div class="mb-2" style="">
                <label class="form-label">Password:</label>
                <input style="background-color: #F8F8F3; color: black" type="text" class="form-control w-50" id="email"
                    placeholder="Enter email" name="password">
            </div>
            <div class="mb-2" style="">
                <label class="form-label">Confirm Password:</label>
                <input style="background-color: #F8F8F3; color: black" type="text" class="form-control w-50"
                    id="email" placeholder="Enter email" name="password2">
            </div>
            <input type="hidden" name="token" value="{{ $token }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
