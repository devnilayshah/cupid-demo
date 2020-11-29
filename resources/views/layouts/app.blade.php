<!DOCTYPE html>
<html>
<head>
    <title>CupidKnot -  @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="loader-overlay">
        <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading"><br>
        <span class="loader-text">Please wait...</span>
    </div>
    <div class="section-1-container section-container">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
</body>
</html>