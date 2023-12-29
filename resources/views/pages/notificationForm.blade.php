@extends('layout')

@section('content')
<div class="container" id="page">
    <h1>Notification</h1>

    <form  id="nform">
        @csrf

        <label for='reciver'>Reciver</label>
        <select class="form-control" id="reciver" name="reciver">
            <option value="all" selected>All</option>
            <option value="donor">Donor</option>
            <option value="hospital_staff">Hospital Staff</option>
            <option value="recipient">Recipient</option>
            <option value="blood_bank_staff">Blood Bank Staff</option>
            <option value="lab_technician">Lab Technician</option>
            <option value="volunteer_coordinator">Volunteer Coordinator</option>
            <option value="dispatcher">Dispatcher</option>
            <option value="auditor">Auditor</option>
        </select>
        <label for='emaganecy'>Priority </label>
        <select class="form-control" id="emaganecy" name="emaganecy" >
            <option value="0" selected>Normal</option>
            <option value="1">Emaganecy</option>
        </select>
        <label for='topic'>Topic</label>
        <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter Topic">
        <label for='message'>Message</label>
        <textarea class="form-control" id="message" name="message" placeholder="Enter Message">
        </textarea>
        <label for='ep_date'>Expire Date</label>
        <input type="date" class="form-control" id="ep_date" name="ep_date" placeholder="Enter Expire Date">

       

        <button type="button" class="btn btn-primary" onclick="sendNotification()">POST</button>


    </form>
    <div class="toast-container position-fixed bottom-0 end-0 p-3"  id="note" >
        <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-body">
           Post Notification Successfully
          </div>
        </div>
      </div>
      

</div>

<table class="table table-striped">
    <thead>
        <tr>
           
          
            <th scope="col">Receiver Type</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Emergency</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($notifications as $n)
        <tr>
            <td>{{ $n->receiver_type }}</td>
            <td>{{ $n->title }}</td>
            <td>{{ $n->body }}</td>
            <td>{{ $n->expiry_date }}</td>
            <td>{{ $n->emergency }}</td>
            <td>{{ $n->created_at }}</td>
            <td>
                <form action="{{ route('deleteNotification', ['id' => $n->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    <script>

function sendNotification() {
    var receiver_type = document.getElementById( 'reciver' ).value;
    var title = document.getElementById( 'topic').value;
    var body = document.getElementById('message').value;
    var expiry_date = document.getElementById('ep_date').value;
    var emergency = document.getElementById('emaganecy').value;
    var sender_id = {{ auth()->user()->id }};
    
    var data = {
        "_token": "{{ csrf_token() }}",
    'receiver_type': receiver_type,
    'title': title,
    'body': body,
    'expiry_date': expiry_date,
    'emergency': emergency,
    'sender_id': sender_id
};

    $.ajax({
        type: "POST",
        url: "{{ route('PostNotification') }}", 
        data: data,
        success: function(data) {
            document.getElementById('nform').reset();
            const toastLiveExample = document.getElementById('liveToast');
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastBootstrap.show()

           
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText; 
            console.error(errorMessage);
           
            alert('An error occurred while sending the notification. Please try again.');
        }
    });
}

function getNotification() {
    var user_id = {{ auth()->user()->id }};
    $.ajax({
        type: "POST",
        url: "{{ route('getNotificationById') }}", 
        data: {
            "_token": "{{ csrf_token() }}",
            "user_id": user_id
        },
        success: function(data) {
            console.log(data);
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText; 
            console.error(errorMessage);
           
            alert('An error occurred while getting the notification. Please try again.');
        }
    });
}

        
</script>



@endsection