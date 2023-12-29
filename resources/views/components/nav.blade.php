<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Home</a>
      
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            @auth
                @if (auth()->user()->role == 'donor')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('schedule', ['user_id' => auth()->user()->id]) }}">shedule</a>
                </li>
                  
                @endif
                    
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ShowNotification') }}">Notification</a>
                </li>
               
                
              @endauth

             
          </ul>
      </div>

      @auth
          <div class="d-flex me-2 ">
              <div class="dropdown">
                  <a class="border border-black btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      
                      <span class="text-black">{{ auth()->user()->Fname }}  {{ auth()->user()->Lname }} </span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                      <li><a class="dropdown-item" href="{{ route('profileEdit') }}">Settings</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                  </ul>
              </div>
          </div>
      @else
          <div class="d-flex ">
              <a href="{{route('login') }}" class="btn btn-primary">Login</a>
              <a href="{{ route('D_register') }}" class="btn btn-primary ms-2">Register</a>
          </div>
      @endauth
  </div>
</nav>
