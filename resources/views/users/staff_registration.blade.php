@extends('layout')

@section('content')
<div class="container">
<h1>staff registration</h1>
<div class="row">
<div class="col-8">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('staff_registration.post') }}">
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
        <label for="NIC">National ID</label>
        <input type="text"  class="form-control" id="NIC"  placeholder="National ID " name="NIC">
    </div>
    <div class="form-group">
        <label for="role">role</label>
        <select class="form-control" id="role" name="role">
            <option value="hospital_staff" selected >Hospital Staff</option>
            <option value="administrator">Admin</option>
            <option value="donor">Donor</option>
            <option value="recipient">Recipient</option>
            <option value="blood_bank_staff">Blood Bank Staff</option>
            <option value="lab_technician">Lab Technician</option>
            <option value="volunteer_coordinator">Volunteer Coordinator</option>
            <option value="'dispatcher'">Dispatcher</option>
            <option value=auditor>Auditor</option>
            
        </select>
    
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
</div>
</div>
</div>

@endsection