@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- Start -->
    @auth
    <h1>Success Login</h1>
    @endauth
    @if(isset(Auth::user()->employeeid))
    <div class="alert alert-danger success-block">
        <strong> Welcome {{ Auth::user()->username }} </strong>
        <br>
        <a href="{{ url('/adminlogin/logout') }}">logout</a>
    </div>
    <!-- else
    
        <script>window.location="/adminlogin";</script> -->
      
    @endif
    @endsection

</body>
</html>
