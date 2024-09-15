@extends('backend.auth.layout')


@section('content')

<form action="{{ route('validotp') }}" method="POST" id="login-form" autocomplete="off">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label">OTP</label>
                            <input type="hidden" name="id" id="id" value={{ session('id') }}>
                            <input class="form-control" placeholder="Enter your otp" type="text" name="otp"
                                id="otp">
                            @error('otp')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <a href="{{ route('login') }}"class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <label class="form-check-label ">
                                    Back to login
                                </label>
                            </a>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block w-100">Submit</button>
</form>

@endsection