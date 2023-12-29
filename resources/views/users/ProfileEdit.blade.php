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
        <form action="{{ route('update.profile') }}" method="POST">
            @csrf
            @method('PUT')
       
      
        
        <div class="card">
            
            <div class="row fs-5 mx-1">
                <div class="col card ">

               <span class="fw-bolder">First Name</span>  
               <span>   <input type="text"  class="form-control" id="fname"  placeholder="Enter First Name" name="Fname" value="{{ auth()->user()->Fname }}"></span>  
              </div>
                <div class="col card"><span class="fw-bolder"> Last Name </span><span><input type="text"  class="form-control" id="fname"  placeholder="Enter First Name" name="Lname" value="{{ auth()->user()->Lname }}"></span>  </div>
            </div>
        </div>
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">NIC</span>  <span><input type="text"  class="form-control" id="NIC"  placeholder="National ID " name="NIC" value="{{ auth()->user()->national_id}}"></span>    </div>
                <div class="col card"><span class="fw-bolder"> date of birth </span><span> <input type="date"  class="form-control" id="dob"  placeholder="Enter Date of Birth" name="dob" value="{{ auth()->user()->date_of_birth}}"></span>  </div>
            </div>
        </div>
           
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col card ">
               <span class="fw-bolder">Contact Number</span>  <span><input type="text"  class="form-control" id="phom_no"  placeholder="Enter Phone Number" class="form-control" name="phnNo" value="{{ auth()->user()->phone_number}}"></span>    </div>
                
            </div>
        </div>
        @if (auth()->user()->role == 'donor')
        <div class="card">
            <div class="row fs-5 mx-1">
                <div class="col-sm-12 card ">
               <span class="fw-bolder">Health History</span>  <span><textarea   name="hh" class="form-control" id="health_history">{{ auth()->user()->health_history}}</textarea> </span>    </div>
                <div class="col card"><span class="fw-bolder">Address </span><span>  <input type="text"  class="form-control"  id="address"  placeholder="Enter Address" name="address" value="{{ auth()->user()->address}}"></span>  </div>
            </div>
        </div>
            
        @endif
       
          @if (Auth()->user()->role == 'hospital_staff')
          @if (Auth()->user()->hospital_id == null)
          <div class="card">
            <div class="row fs-5 mx-1"></div>
                <div class="col card ">
               <span class="fw-bolder">Hospital Name</span>  <span> <input type="text" id="Hname" class="form-control" name="hname"> </span>    </div>
                <div class="col card"><span class="fw-bolder">Hospital location </span><span> <input type="text" id="Hlocation" class="form-control" name="Hlocation"> </span>  </div>
            </div>
          @else
          <div class="card">
            <div class="row fs-5 mx-1"></div>
                <div class="col card ">
               <span class="fw-bolder">Hospital Name</span>  <span><input type="text" id="Hname" class="form-control" name="hname" value="{{ $hospital->name}}">  </span>    </div>
                <div class="col card"><span class="fw-bolder">Hospital location </span><span> <input type="text" id="Hlocation" class="form-control" name="Hlocation" value="{{ $hospital->location}}"> </span>  </div>
            </div>

          @endif
            @endif

          @if (Auth()->user()->role == 'blood_bank_staff')
            @if (Auth()->user()->blood_bank_id == null)
            <div class="card">
                <div class="row fs-5 mx-1"></div>
                    <div class="col card ">
                   <span class="fw-bolder">Blood Bank Name</span>  <span> <input type="text" name="BBname" class="form-control" id="BBname"> </span>    </div>
                    <div class="col card"><span class="fw-bolder"> location </span><span> <input type="text" name="BBlocation" class="form-control" id="BBlocation"> </span>  </div>
                </div>
            @else
            <div class="card">
                <div class="row fs-5 mx-1"></div>
                    <div class="col card ">
                   <span class="fw-bolder">Blood Bank Name</span>  <span> <input type="text" name="BBname" id="BBname" class="form-control" value="{{ $blood_bank->b_name}}">  </span>    </div>
                    <div class="col card"><span class="fw-bolder"> location </span><span> <input type="text" name="BBlocation" id="BBlocation" value="{{ $blood_bank->location}}"> </span>  </div>
                </div>
    
          @endif 
          @endif
                
       <a href="" class="btn btn-primary form-control">Edit</a>

        </form>
      </div>
    </div>


</div>

<script>
 document.addEventListener("DOMContentLoaded", function () {
        autoSearchBBank()
        autoSearchHospital()
    });


   function autoSearchBBank() {
    $(function () {
        var $sCenter = $('#BBname');
        var $sLocation = $('#BBlocation');

        $sCenter.autocomplete({
            source: '{{ route("SBBank") }}',
            select: function (event, ui) {
                $sCenter.val(ui.item.value);

                // Fetch and set the location based on the selected bank name
                $.ajax({
                    url: '{{ route("getLocation") }}',
                    type: 'GET',
                    data: { term: ui.item.value },
                    success: function (data) {
                        $sLocation.val(data.location); // Assuming 'location' is the column name
                    },
                    error: function () {
                        // Handle error if needed
                    }
                });

                return false;
            }
        });
    });
}

function autoSearchHospital() {
    $(function () {
        var $sCenter = $('#Hname');
        var $sLocation = $('#Hlocation');

        $sCenter.autocomplete({
            source: '{{ route("SHospital") }}',
            select: function (event, ui) {
                $sCenter.val(ui.item.value);

                // Fetch and set the location based on the selected bank name
                $.ajax({
                    url: '{{ route("getHLocation") }}',
                    type: 'GET',
                    data: { term: ui.item.value },
                    success: function (data) {
                        $sLocation.val(data.location); // Assuming 'location' is the column name
                    },
                    error: function () {
                        // Handle error if needed
                    }
                });

                return false;
            }
        });
    });
}
</script>


@endsection