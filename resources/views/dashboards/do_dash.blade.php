@extends('layout')

@section('content')
<div class="container ">
    
    
    <div class="row" id="uprow">
        <div class="col-auto mt-20"><form id="locationForm">
            <div class="row g-1">
                @csrf
                <div class="col-auto">
                    <input type="text" name="location" id="location" class="form-control" placeholder="Enter your location" value="{{ $donor ? $donor->location : '' }}">
                </div>
                <div class="col-auto">
                    <button type="button" onclick="two()" class="btn btn-secondary">Location</button>
                </div>
                
            </div>
        </form>
       
    </div>
        <div class="col-auto">
            <p id="currentDateTime"></p>
        </div>
    </div>
    
    <div class="row " id="map" >
        <div id="googleMap" style="width:80%;height:25rem;" ></div>
    </div>
   
    
    
    

    <script>
     document.addEventListener("DOMContentLoaded", function () {
   

   // Update time and date every second
   setInterval(updateDateTime, 1000);
   updateDateTime(); // Call initially to set the initial content
});

function updateDateTime() {
   var currentDateTime = new Date();
   var formattedDateTime = currentDateTime.toLocaleString();
   document.getElementById('currentDateTime').innerText = formattedDateTime;
}

    console.log(location);

        function two(){
            updateLocation();
            getNearbyHospitals();
        }
    
     
        function myMap() {
            var mapProp= {
              center:new google.maps.LatLng(51.508742,-0.120850),
              zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    
        document.addEventListener("DOMContentLoaded", function () {
            // Set up Google Places Autocomplete
            var locationInput = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(locationInput);
    
            // Set the initial location value
            var initialLocation = "{{ $donor ? $donor->location : '' }}";
            locationInput.value = initialLocation;


            getNearbyHospitals();
        });
    
        function updateLocation() {
            var locationValue = document.getElementById('location').value;
    
            // Make an Ajax request
            $.ajax({
                url: '{{ route('update.location') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    location: locationValue
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    var errorMessage = 'Failed to update location. Please try again.';
    
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
    
                    alert(errorMessage);
                }
            });
        }
        
    
        function getNearbyHospitals() {
            var locationValue = document.getElementById('location').value;
            
           
         
    
            // Use the Geocoding API to get the coordinates of the location
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': locationValue }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var userLocation = results[0].geometry.location;
    
                    // Create a map centered on the user's location
                    var map = new google.maps.Map(document.getElementById("googleMap"), {
                        center: userLocation,
                        zoom: 15
                    });
    
                    // Add a marker for the user's location
                    var marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Your Location'
                    });
    
                    // Use the Places API to find nearby hospitals
                    var service = new google.maps.places.PlacesService(map);
                    service.nearbySearch({
                        location: userLocation,
    radius: 50000, // Adjust radius as needed
  
    keyword: ['Blood bank']
                    }, function (results, status) {
                        if (status === google.maps.places.PlacesServiceStatus.OK) {
                            for (var i = 0; i < results.length; i++) {
                                var place = results[i];
                                // Add markers for nearby hospitals
                                // if (place.name.toLowerCase().includes("blood Bank")) {
                            // Add markers for general hospitals
                            var hospitalMarker = new google.maps.Marker({
                                position: place.geometry.location,
                                map: map,
                                title: place.name
                                
                            });
                        // }
                        // Check for phone number availability
                        var phoneNumber = place.formatted_phone_number || "Phone number not available";

                        // Create info window with place name and phone number
                         var infoWindow = new google.maps.InfoWindow({
                                content: "<b>" + place.name + "</b><br>Phone: " + phoneNumber
                           
                         });

                     // Open info window on marker click
                      hospitalMarker.addListener('click', function() {
                    infoWindow.open(map, hospitalMarker);
                               });
                            }
                           
                        }
                    });

    
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        
    </script>

    
@endsection
