<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    @include('libraries.style')
  
</head>
<body id="body" >
    @include('components.nav')
    <div class="container">
        @yield('content')
    </div>
    @include('components.footer')
    @include('libraries.scripts')
    
</body>
</html>