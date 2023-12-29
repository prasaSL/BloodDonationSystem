@extends('layout')

@section('content')



<section class="vh-100" style="background-color: #fac9c9;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
               
               
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                 
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #f1b193;"></i>
                   
                    </div>
<div class="container ">
  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    
        <div class="col  ">
            <div class="card ">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="row fs-4 m-4">
                        <div class="col"> <label for="exampleInputEmail1">Email address</label></div>
                        <div class="col"><input type="email" class="form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email"></div>
                       
                        
                            
                    </div>
                    <div class="row fs-3 m-4 ">
                        <div class="col"><label for="exampleInputPassword1">Password</label></div>
                        <div class="col"><input type="password" class="form-control-lg" id="exampleInputPassword1" placeholder="Password"
                            name="password"></div>
                        
                           
                    </div>
            
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
