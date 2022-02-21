<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/storage/OMS/login/bootstrap.min.css') }}">

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
        span{
            color:red;
        }
    </style>
</head>
<body>
    <div class="mb-4">
        @yield('content')
    </div>
</body>
</html>
