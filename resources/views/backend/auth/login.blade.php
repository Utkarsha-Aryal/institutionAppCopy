@extends('backend.auth.layout')

@section('title','Login')




@section('content')

<div class="container">
    <div class="nt-5">
        @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>

            @endforeach

        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>


        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
{{-- ms-auto margin start auto me-auto margin end auto  mt-margin top mb- margin bottom  --}}
<!-- This will take to the authmanager Controller were the login will happen -->
    <form action='{{route('login.post')}}' method="POST" class="ms-auto me-auto mt-3" style='width: 500px'>
        @csrf
        
        <div class="mb-3">
            {{-- form-label unsures that the label are styled according to bootstraps original  --}}
          <label class="form-label">Email address</label>
          <input type="email" class="form-control"   name="email">
        
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" >
        </div>
      
           <a href="{{route('forgotpassword')}}"
             class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 text-end">
               <label class="form-check-label ">
                Forgot Password
              </label>
           </a>
           <br>
           <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


</div>



@endsection


    


