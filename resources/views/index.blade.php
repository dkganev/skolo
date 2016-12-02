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
          margin-bottom: 30px;
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

        .colorgraph {
          height: 7px;
          border-top: 0;
          background: #c4e17f;
          border-radius: 5px;
          background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
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
    </style>

</head>
<body style="height: 1200px;">

<div class = "container">
  <div class="wrapper">
    <form action="{{ url('/') }}" method="post" name="Login_Form" class="form-signin">
      {{ csrf_field() }}
      
      <h3 class="form-signin-heading"><span id="cms">Control Monitoring System</span></h3>
        <hr class="colorgraph"><br>
        
        <input type="text" class="form-control" name="name" placeholder="Username" required="" autofocus="" />

        @if($errors->has('user'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif

        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif

        <button class="btn btn-lg btn-danger btn-block"  name="Submit" value="Login" type="Submit">Login</button>            
    </form>         
  </div>
</div>
<!-- JavaScripts -->
<script src="jquery-3.1.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</body>
</html>
