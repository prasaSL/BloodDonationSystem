@extends('layout')
@section('content')
<div class="position-relative">
    <div class="position-absalute position-absolute top-0 start-50 translate-middle-x">
    <div class="card"  id="profile">
        <div class="card-header text-center">
            <h5 class="card-title fs-2">Profile</h5>
            <small class="text-muted fs-6">
                @if (auth()->user()->role == 'donor')
                    Donor
                @elseif (auth()->user()->role == 'administrator')
                Administrator
                @elseif (auth()->user()->role == 'lab_technician')
                    Lab Technician
                @elseif (auth()->user()->role == 'blood_bank_staff')
                    Blood Bank Staff
                @elseif (auth()->user()->role == 'hospital_staff')
                   Hospital Staff
                @elseif (auth()->user()->role == 'recipient')
                    Recipient
                @elseif (auth()->user()->role == 'volunteer_coordinator')
                    Volunteer Coordinator
                @elseif (auth()->user()->role == 'dispatcherr')
                  Dspanatcher
                @else
                Auditor
                    
                @endif



            </small>
        </div>
      
       
      
        
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">Name</span>  <span>{{ auth()->user()->Fname }}   {{ auth()->user()->Lname }}</span>    </div>
                <div class="col card"><span class="fw-bolder"> Email </span><span> {{ auth()->user()->email}} </span>  </div>
            </div>
        </div>
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">NIC</span>  <span>{{ auth()->user()->national_id}}</span>    </div>
                <div class="col card"><span class="fw-bolder"> date of birth </span><span> {{ auth()->user()->date_of_birth}}</span>  </div>
            </div>
        </div>
           
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">Contact Number</span>  <span>{{ auth()->user()->phone_number}}</span>    </div>
                <div class="col card"><span class="fw-bolder">Blood Type </span><span> {{ auth()->user()->blood_type}} </span>  </div>
            </div>
        </div>
        @if (auth()->user()->role == 'donor')
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">Health History</span>  <span>{{ auth()->user()->health_history}}</span>    </div>
                <div class="col card"><span class="fw-bolder">Address </span><span> {{ auth()->user()->address}} </span>  </div>
            </div>
        </div>
            
        @endif
       
          @if (Auth()->user()->role == 'hospital_staff')
          @if (Auth()->user()->hospital_id == null)
          <div class="card">
            <div class="row fs-5 mx-1"></div>
                <div class="col card ">
               <span class="fw-bolder">Hospital Name</span>  <span>  </span>    </div>
                <div class="col card"><span class="fw-bolder">Hospital location </span><span>  </span>  </div>
            </div>
          @else
          <div class="card">
            <div class="row fs-5 mx-1"></div>
                <div class="col card ">
               <span class="fw-bolder">Hospital Name</span>  <span>{{ $hospital->name}}  </span>    </div>
                <div class="col card"><span class="fw-bolder">Hospital location </span><span> {{ $hospital->location}} </span>  </div>
            </div>

          @endif
            @endif

          @if (Auth()->user()->role == 'blood_bank_staff')
            @if (Auth()->user()->blood_bank_id == null)
            <div class="card">
                <div class="row fs-5 mx-1"></div>
                    <div class="col card ">
                   <span class="fw-bolder">Blood Bank Name</span>  <span>  </span>    </div>
                    <div class="col card"><span class="fw-bolder"> location </span><span>  </span>  </div>
                </div>
            @else
            <div class="card">
                <div class="row fs-5 mx-1"></div>
                    <div class="col card ">
                   <span class="fw-bolder">Blood Bank Name</span>  <span>{{ $blood_bank->b_name}}   </span>    </div>
                    <div class="col card"><span class="fw-bolder"> location </span><span> {{ $blood_bank->location}}  </span>  </div>
                </div>
    
          @endif 
          @endif

       <a href="{{ route('profileEdit' ) }}" class="btn btn-primary">Edit</a>
      </div>
    </div>


</div>


@endsection