@extends('layout')

@section('content')
<h1>Donor Registration</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('D_register.post') }}">
    @csrf
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text"  class="form-control" id="fname"  placeholder="Enter First Name" name="Fname">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text"  class="form-control" id="lname"  placeholder="Enter Last Name" name="Lname">
    </div>
    <div class="form-group">
        <label for="Email1">Email address</label>
        <input type="email"  class="form-control" id="Email1"  placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="phon_no">Phone Number</label>
        <input type="text"  class="form-control" id="phom_no"  placeholder="Enter Phone Number" name="phnNo">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date"  class="form-control" id="dob"  placeholder="Enter Date of Birth" name="dob">
    </div>
    <div class="form-group">
        <label for="NIC">National ID</label>
        <input type="text"  class="form-control" id="NIC"  placeholder="National ID " name="NIC">
    </div>
    
    
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text"  class="form-control" id="address"  placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
        <label for="health_history">health history</label>
        <input type="text"  class="form-control" id="health_history"  placeholder="health historys" name="hh">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password"  class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter Password" name="password1">
    </div>
    <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password"  class="form-control" id="cpassword" aria-describedby="emailHelp" placeholder="Enter Confirm Password" name="password2">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection