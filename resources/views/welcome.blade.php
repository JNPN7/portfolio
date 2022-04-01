<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juhel Phanju</title>
    
    <!-- Logo -->
    <link rel="icon" type="image/png" href="{{ url('images/jplogo.png') }}">

    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    @if (Session::has('success'))
        <div class="col-md-12 alert alert-success disappear" role="alert" style="margin-top: 0; margin-bottom: 0;">
            <strong>Success: </strong>{{ Session::get('success') }}
        </div>
    @endif
    @include('../includes/home')

    @include('../includes/nav')

    <div class="sized-box"></div>
    
    @include('../includes/about')

    @include('../includes/portfolio')
    
    <div class="sized-box"></div>
    
    @include('../includes/blog')
    

    <div class="sized-box"></div>
    
    @include('../includes/contact')
    
    @include('../includes/footer')
    
    
    <script src="{{  URL::asset('assets/js/scripts.js') }}"> </script>
    
    <script src="{{  URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{  URL::asset('assets/js/bootstrap.min.js') }}"></script>

    
</body>
</html>