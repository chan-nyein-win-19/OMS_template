<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> -->
    <link rel="stylesheet" href="{{ asset('/storage/OMS/login/bootstrap.min.css') }}">

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>

    <style type="text/css">
       
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        .btn{
            width:100px;
            height:45px;
        }
        h1,h3{
            color:darkblue;
        }
        
    </style>
</head>
<body>
    <div class="mb-4">
        @yield('content')
    </div>
</body>
</html>
