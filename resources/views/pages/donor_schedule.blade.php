@extends('layout')

@section('content')
@if (auth()->user()->eligibility_status == 1)
<div class="container">
    <h1>Donor Schedule</h1>

    <div class="row">
        <div class="col">
            <h3>Schedule</h3>
            <table class="table table-striped">
                @csrf
                <thead>
                    <tr>
                        <th scope="col-2">Date</th>
                        <th scope="col-2">Time</th>
                        <th scope="col-2">Center</th>
                        <th scope="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                 
                 
                            <tr id="schedule_row" style="display: none">
                                <td   ><label id= 'date' class="col-2"  ></label></td>
                                <td  ><label  id = 'time' class="col-2"></label></td>
                                <td  ><label   id="center" class="col-2"></label></td>
                                
                            </tr>
                        
                   
                        <tr id= "scheduleForm" >
                            <td><input type="date" name="date" id="s-date" class="form-control"></td>
                            <td><input type="time" name="time" id="s-time" class="form-control"></td>
                            <td><input type="text" name="center" id="s-center" class="form-control"></td>
                            @if (auth()->user()->eligibility_status == 1)
                                <td id="she"><button type="button" id="scheduleBtn" onclick="getSchedule()" class="btn btn-primary">Schedule</button></td>
                            @else
                                <td id="she"><button type="button" id="scheduleBtn" onclick="getSchedule()" class="btn btn-primary" disabled>Schedule</button></td>
                                
                            @endif
                            
                            <td id="can">
                                <div id="e1" style="display: none">
                                    <div class="bg-success  p-2 rounded-lg" >
                                        <p>requst successfully.</p>
                                        <button type="button" onclick="delateSchedule()" class="btn btn-danger" >cancel</button></td>
                                    </div>
                                    <div id="e2" style="display: none">
                                        <div class="bg-success  p-2 rounded-lg" >
                                            <p>requst Acsept.</p>
                                            <button type="button" onclick="delateSchedule()" class="btn btn-danger" >cancel</button></td>
                                        </div>
                                    <div id="e3" style="display: none">

                                        <div class="bg-danger  p-2 rounded-lg" >
                                            <p>requst rejected</p>
                                            <button type="button" onclick="delateSchedule()" class="btn btn-danger" >cancel</button></td>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <table class="table table-striped " id="bankdetail" >
                            <thead>
                                <tr>
                                    <th scope="col-4">Blood bank name</th>
                                    <th scope="col-4">location</th>
                                    <th scope="col-4">contact</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                <td class="col-4"><label id= 'b_name'   ></label></td>
                                <td class="col-4"><label  id = 'location' ></label></td>
                                <td class="col-4"><label   id="phone" ></label></td>

                                <tr id="no" style="display: none" ></tr>
                                
                            </tbody>

                        
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
  setInterval(shedulelist(), 1000);
    function shedulelist(){
        $.ajax({
            type:'GET',
            url:'{{ route('schedule_list') }}',
            success:function(response){
                console.log(response);
                if(response.success){
                    showshedule(response.sch ,response.blo);
                }else{
                    document.getElementById('no').style.display = "block";
                    document.getElementById('no').innerHTML = "No Schedule found";
                }
            },



        });



    }

function showshedule(shedule , BBank ){
        
       if (shedule.time < new Date().toLocaleTimeString()) {
        delateSchedule();
       }
       else{

        document.getElementById('s-date').innerHTML = shedule.date;
        document.getElementById('s-time').innerHTML = shedule.time;
        document.getElementById('s-center').innerHTML = BBank.b_name+"<br>"+BBank.location+"<br>"+BBank.phone;
        document.getElementById('no').style.display = "none";
        document.getElementById('she').style.display = "none";
        document.getElementById('bankdetail').style.display = "inline-block";

        document.getElementById('b_name').innerHTML = BBank.b_name;
        document.getElementById('location').innerHTML = BBank.location;
        document.getElementById('phone').innerHTML = BBank.phone;

        if (shedule.is_approved==null) {
            document.getElementById('e1').style.display = "block";
        } else if(shedule.is_approved==1) {
            document.getElementById('e2').style.display = "block"    
        }
        else{
            document.getElementById('e1').style.display = "block";
        }
    }

    }
    function getSchedule() {
       
        var date = document.getElementById('s-date').value;
        var time = document.getElementById('s-time').value;
        var center = document.getElementById('s-center').value;
            $.ajax({
                type: "POST",
                url: '{{ route('schedule.post') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "date": date,
                    "time": time,
                    "center": center,
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                       
                        showshedule(response.scheduless ,response.bloodBank);

                        // You can add further actions upon successful schedule creation
                    } else {
                        alert('Schedule creation failed.');
                        // You can handle failure scenarios here
                    }
                },
                error: function (response) {
                    console.log(response);
                    alert('An error occurred while creating the schedule.');
                    // You can handle error scenarios here
                }
            });

    
    }

    function delateSchedule() {
       
    var user_id = {{  auth()->user()->id }};
    $.ajax({
                type: "POST",
                url: '{{ route('delate-schedule') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": user_id,
                 
                }, success: function (response) {
                    console.log(response);
                    if (response.success) {
                        document.getElementById('no').style.display = "block";
        document.getElementById('she').style.display = "block";
                        document.getElementById('can').style.display = "none";
                            document.getElementById('b_name').innerHTML = "";
                            document.getElementById('location').innerHTML = "";
                            document.getElementById('phone').innerHTML = "";
                            document.getElementById('s-date').value = "";
                            document.getElementById('s-time').value = "";
                            document.getElementById('s-center').value = "";
                        shedulelist();

                      
                    } else {
                        console.log(response);
                    }
                },
                error: function (response) {
                    console.log(response);
                 
                    
                }
            });
    
    }
   
    document.addEventListener("DOMContentLoaded", function () {
        autoSearchBBank()
    });

   function autoSearchBBank(){
    $(function () {
        $('#s-center').autocomplete({
            source: '{{ route("SBBank") }}',
        });
    });



   }
</script>

@else
  
    <h1>you not eligibl for donate blood</h1>
    <br>
    @php
        $lastDonationDate = auth()->user()->last_donation_date;
    $eligibleDate = \Carbon\Carbon::parse($lastDonationDate)->addDays(90)->format('Y-m-d');

    @endphp
     <h2>you can donate blood after {{$eligibleDate}} </h2>
@endif
@endsection
