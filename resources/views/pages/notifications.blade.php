@extends('layout')

@section('content')


<div class="container">
    <h1>Notification</h1>
    @if (auth()->user()->role != 'donor')
        <a href="{{ route('CreateNotification') }}" class="btn btn-primary">Create Notification</a>
    @endif
     @if (count($notifications) > 0 || $notifications != null) 
    @foreach($notifications as $n)

    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $n->title }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">  <small>@ {{ $n->Fname}}  {{ $n->Lname}}  </small>
            <small>{{ $n->role}}</small></h6>
          <p class="card-text">{{ $n->body }}</p>
        
        </div>
      </div>
    
@endforeach

 @else    

<div> you have no notifications </div>
        
     @endif 
   
</div>
@endsection