<!DOCTYPE html>
<html lang="en" style="background-image: url('images/bgr1.png')!important;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Control Monitoring System</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"> 
    <style>
        .wrapper {    
            margin-top: 80px;
            margin-bottom: 20px;
        }

        .form-signin {
          max-width: 420px;
          padding: 30px 38px 66px;
          margin: 0 auto;
          background-color: #eee;
          border: 1px dotted rgba(0,0,0,0.1);  
          }

        .form-signin-heading {
          text-align:center;
          margin: 0 0 50px 0
        }

        .form-control {
          position: relative;
          font-size: 16px;
          height: auto;
          padding: 10px;
        }

        input[type="text"] {
          margin-bottom: 0px;
          border-bottom-left-radius: 0;
          border-bottom-right-radius: 0;
        }

        input[type="password"] {
          margin-bottom: 20px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }

        #cms {
            color: #474747;
            font-weight: bold;
        }

        body {
          background: rgba(0,0,0,1) !important;
          background: -moz-linear-gradient(left, rgba(0,0,0,1) 0%, rgba(89,89,89,0.95) 16%, rgba(102,102,102,0.72) 82%, rgba(0,0,0,0.66) 99%, rgba(0,0,0,0.66) 100%)!important;
          background: -webkit-gradient(left top, right top, color-stop(0%, rgba(0,0,0,1)), color-stop(16%, rgba(89,89,89,0.95)), color-stop(82%, rgba(102,102,102,0.72)), color-stop(99%, rgba(0,0,0,0.66)), color-stop(100%, rgba(0,0,0,0.66)))!important;
          background: -webkit-linear-gradient(left, rgba(0,0,0,1) 0%, rgba(89,89,89,0.95) 16%, rgba(102,102,102,0.72) 82%, rgba(0,0,0,0.66) 99%, rgba(0,0,0,0.66) 100%)!important;
          background: -o-linear-gradient(left, rgba(0,0,0,1) 0%, rgba(89,89,89,0.95) 16%, rgba(102,102,102,0.72) 82%, rgba(0,0,0,0.66) 99%, rgba(0,0,0,0.66) 100%)!important;
          background: -ms-linear-gradient(left, rgba(0,0,0,1) 0%, rgba(89,89,89,0.95) 16%, rgba(102,102,102,0.72) 82%, rgba(0,0,0,0.66) 99%, rgba(0,0,0,0.66) 100%)!important;
          background: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(89,89,89,0.95) 16%, rgba(102,102,102,0.72) 82%, rgba(0,0,0,0.66) 99%, rgba(0,0,0,0.66) 100%)!important;
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#000000', GradientType=1 );
        }

        form#form {
          background: rgba(222,140,159,0.73);
          background: -moz-linear-gradient(top, rgba(222,140,159,0.73) 0%, rgba(196,114,133,0.65) 12%, rgba(245,106,138,0.47) 38%, rgba(240,0,56,0.26) 69%, rgba(214,28,71,0.05) 100%);
          background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(222,140,159,0.73)), color-stop(12%, rgba(196,114,133,0.65)), color-stop(38%, rgba(245,106,138,0.47)), color-stop(69%, rgba(240,0,56,0.26)), color-stop(100%, rgba(214,28,71,0.05)));
          background: -webkit-linear-gradient(top, rgba(222,140,159,0.73) 0%, rgba(196,114,133,0.65) 12%, rgba(245,106,138,0.47) 38%, rgba(240,0,56,0.26) 69%, rgba(214,28,71,0.05) 100%);
          background: -o-linear-gradient(top, rgba(222,140,159,0.73) 0%, rgba(196,114,133,0.65) 12%, rgba(245,106,138,0.47) 38%, rgba(240,0,56,0.26) 69%, rgba(214,28,71,0.05) 100%);
          background: -ms-linear-gradient(top, rgba(222,140,159,0.73) 0%, rgba(196,114,133,0.65) 12%, rgba(245,106,138,0.47) 38%, rgba(240,0,56,0.26) 69%, rgba(214,28,71,0.05) 100%);
          background: linear-gradient(to bottom, rgba(222,140,159,0.73) 0%, rgba(196,114,133,0.65) 12%, rgba(245,106,138,0.47) 38%, rgba(240,0,56,0.26) 69%, rgba(214,28,71,0.05) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#de8c9f', endColorstr='#d61c47', GradientType=0 );
        }

        button#login-button {
          color: #fff;
          border: none;
          font-weight: bold;

          background: rgba(184,7,48,0.7);
          background: -moz-linear-gradient(top, rgba(184,7,48,0.7) 0%, rgba(143,2,34,0.67) 18%, rgba(158,0,37,0.64) 30%, rgba(143,2,34,0.62) 44%, rgba(143,2,34,0.59) 57%, rgba(112,4,30,0.56) 75%, rgba(150,0,35,0.51) 100%);
          background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(184,7,48,0.7)), color-stop(18%, rgba(143,2,34,0.67)), color-stop(30%, rgba(158,0,37,0.64)), color-stop(44%, rgba(143,2,34,0.62)), color-stop(57%, rgba(143,2,34,0.59)), color-stop(75%, rgba(112,4,30,0.56)), color-stop(100%, rgba(150,0,35,0.51)));
          background: -webkit-linear-gradient(top, rgba(184,7,48,0.7) 0%, rgba(143,2,34,0.67) 18%, rgba(158,0,37,0.64) 30%, rgba(143,2,34,0.62) 44%, rgba(143,2,34,0.59) 57%, rgba(112,4,30,0.56) 75%, rgba(150,0,35,0.51) 100%);
          background: -o-linear-gradient(top, rgba(184,7,48,0.7) 0%, rgba(143,2,34,0.67) 18%, rgba(158,0,37,0.64) 30%, rgba(143,2,34,0.62) 44%, rgba(143,2,34,0.59) 57%, rgba(112,4,30,0.56) 75%, rgba(150,0,35,0.51) 100%);
          background: -ms-linear-gradient(top, rgba(184,7,48,0.7) 0%, rgba(143,2,34,0.67) 18%, rgba(158,0,37,0.64) 30%, rgba(143,2,34,0.62) 44%, rgba(143,2,34,0.59) 57%, rgba(112,4,30,0.56) 75%, rgba(150,0,35,0.51) 100%);
          background: linear-gradient(to bottom, rgba(184,7,48,0.7) 0%, rgba(143,2,34,0.67) 18%, rgba(158,0,37,0.64) 30%, rgba(143,2,34,0.62) 44%, rgba(143,2,34,0.59) 57%, rgba(112,4,30,0.56) 75%, rgba(150,0,35,0.51) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b80730', endColorstr='#960023', GradientType=0 );
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#960023', GradientType=0 );
        }
    </style>

</head>
<body style="height: 1200px;">

<div class = "container">
  <div class="wrapper">
    <form id="form" action="{{ url('/') }}" method="post" name="Login_Form" class="form-signin" autocomplete="off">
      {{ csrf_field() }}
      
      <h3 class="form-signin-heading"><span style="color:white;" id="cms">Control Monitoring System</span></h3>
        
        <input type="text" class="form-control" name="name" placeholder="Username" required autofocus />

        @if($errors->has('user'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif

        <input type="password" class="form-control" name="password" placeholder="Password" required />
        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif

        <button id="login-button" class="btn btn-lg btn-default btn-block"  name="Submit" value="Login" type="Submit">
            Login
        </button>
    </form>
  </div>
</div>
<!-- JavaScripts -->
<script src="jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</body>
</html>
