@extends('layout')

@section('title','Registration')

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
    <form  action='{{route('registration.post')}}' method="POST" class="ms-auto me-auto mt-3" style='width: 500px'>
        @csrf

        <div class="mb-3">
            {{-- form-label unsures that the label are styled according to bootstraps original  --}}
          <label class="form-label">Fullname</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            {{-- form-label unsures that the label are styled according to bootstraps original  --}}
          <label class="form-label">Email address</label>
          <input type="email" class="form-control"   name="email">
         
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" >
        </div>
        <div class="mb-3">
          <label class="form-label">Role_id</label>
          <input type="text" class="form-control" name="role_id" >
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


</div>



@endsection


    


