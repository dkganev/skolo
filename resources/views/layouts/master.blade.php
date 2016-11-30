<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Control Monitoring System</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/w3.css">
    <link href="/css/flag-icon.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.css" />


    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- JQUERY -->
    <script src="jquery-3.1.1.js"></script>

    <!-- BOOSTRAP -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">

    <script src="bootstrap/js/bootstrap.js"></script>

    <!-- SELECT -->
    <link rel="stylesheet" type="text/css" href="boostrap-select/bootstrap-select.css">
    <script src="boostrap-select/bootstrap-select.js"></script>

    <!-- TABLE -->
    <link rel="stylesheet" type="text/css" href="bootstrap-table/bootstrap-table.css">

    <script src="bootstrap-table/bootstrap-table.js"></script>
    <script src="bootstrap-table/bootstrap-table-locale-all.js"></script>
    
    <!-- Export to Img -->
    <script type="text/javascript" src="js/html2canvas.js"></script>
    <script type="text/javascript" src="js/canvas2image.js"></script>
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap-datetimepicker.min.css" />
                           
    <script src="bootstrap/js/bootstrap-datetimepicker.min.js"></script>
       
</head>
<body style="height: 1500px;">

@include('layouts.alerts')
@include('layouts.navbar')

<div style="display:none; " id="content"></div>
@yield('content')

<script>
    function ajaxLoad(filename, content) {
        content = typeof content !== 'undefined' ? content : 'content';

        $.ajax({
            type: "GET",
            url: filename,
            contentType: false,
            success: function (data) {
                // window.location.hash = filename;
                $("#" + content).css('display','none').html(data).hide().fadeIn(600);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        }).done(function() {
            $('select').selectpicker('refresh');
        });
    }

    $('.breadcrumb li').on('click', function () {
      // $('li').removeClass('active');
      // $(this).addClass('active');
      $(this).addClass('active').siblings().removeClass('active');
    });

    function checkSession() {
        $.post('session/ajaxCheck', { '_token' : '{{ csrf_token() }}' }, function(data) {
            console.log(data);
            if (data == 'loggedOut') {
                // User was logged out. Redirect to login page
                document.location.href = '/';
            }
            else if (data != '') {
                swal({
                  title: "You will be logged out!",
                  text: "Session will expire soon.",
                  timer: 60000,
                  showConfirmButton: true,
                  confirmButtonText: 'Cancel'
                },function(isConfirm) {
                    if(isConfirm) {
                       document.location.reload();
                    }
                });
            }
        });
    }
    // Check Session Every 60 Seconds
    setInterval(checkSession, 60000);
</script>


<script src="/js/main.js"></script>

<script src="js-lib/sweet-alert/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="js-lib/sweet-alert/sweetalert.css">

</body>
</html>

<style>
    html {
        background-image: url('images/bgr1.png');
    }

    body {
        background: rgba(20,19,20,0.42);
background: -moz-linear-gradient(left, rgba(20,19,20,0.42) 0%, rgba(23,19,23,0.42) 0%, rgba(102,102,102,0.42) 11%, rgba(255,255,255,0.43) 28%, rgba(255,255,255,0.44) 74%, rgba(122,122,122,0.45) 87%, rgba(0,0,0,0.45) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(20,19,20,0.42)), color-stop(0%, rgba(23,19,23,0.42)), color-stop(11%, rgba(102,102,102,0.42)), color-stop(28%, rgba(255,255,255,0.43)), color-stop(74%, rgba(255,255,255,0.44)), color-stop(87%, rgba(122,122,122,0.45)), color-stop(100%, rgba(0,0,0,0.45)));
background: -webkit-linear-gradient(left, rgba(20,19,20,0.42) 0%, rgba(23,19,23,0.42) 0%, rgba(102,102,102,0.42) 11%, rgba(255,255,255,0.43) 28%, rgba(255,255,255,0.44) 74%, rgba(122,122,122,0.45) 87%, rgba(0,0,0,0.45) 100%);
background: -o-linear-gradient(left, rgba(20,19,20,0.42) 0%, rgba(23,19,23,0.42) 0%, rgba(102,102,102,0.42) 11%, rgba(255,255,255,0.43) 28%, rgba(255,255,255,0.44) 74%, rgba(122,122,122,0.45) 87%, rgba(0,0,0,0.45) 100%);
background: -ms-linear-gradient(left, rgba(20,19,20,0.42) 0%, rgba(23,19,23,0.42) 0%, rgba(102,102,102,0.42) 11%, rgba(255,255,255,0.43) 28%, rgba(255,255,255,0.44) 74%, rgba(122,122,122,0.45) 87%, rgba(0,0,0,0.45) 100%);
background: linear-gradient(to right, rgba(20,19,20,0.42) 0%, rgba(23,19,23,0.42) 0%, rgba(102,102,102,0.42) 11%, rgba(255,255,255,0.43) 28%, rgba(255,255,255,0.44) 74%, rgba(122,122,122,0.45) 87%, rgba(0,0,0,0.45) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#141314', endColorstr='#000000', GradientType=1 );
    }
</style>