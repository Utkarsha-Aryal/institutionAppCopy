@extends('backend.auth.layout')


@section('content')

@if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

<form action="{{route('checkuser')}}" method="POST"  id="login-form"  class="ms-auto me-auto mt-3" style='width: 500px'>
        @csrf
        
        <div class="mb-3">
            {{-- form-label unsures that the label are styled according to bootstraps original  --}}
            @if (empty($email))
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" placeholder="Enter your email" type="text" name="email"
                                    id="email">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        @endif
        
        </div>
    
         
           
           <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



      <script>
        $("#login-form").validate({
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter email"
                }
            },
        });

      @endsection
