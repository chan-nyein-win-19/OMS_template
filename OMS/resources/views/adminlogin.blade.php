<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    <h1 align="center">Office Management System</h1>
    <div class ="container box">
        <h3 align ="center">Login Form</h3></br>

        @if(isset(Auth::user()->employeeid))
            <script>window.location="/adminlogin/successlogin";</script>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ url('/adminlogin/checklogin')}}">
        @csrf
            <div class="form-group">
                <label>Admin ID</label>
                <input type="text" name="employeeid" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"/>
            </div>

            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary" value="Login"/>
                
                <input type="sumit" name="cancel" class="btn btn-danger" value="Cancel"/>
            </div>

    </form>
    </div>

</body>
</html>