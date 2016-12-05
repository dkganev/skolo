<!DOCTYPE html>
<html lang="en" id="app" style="background-image: url('images/bgr1.png')!important;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Control Monitoring System</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/flag-icon.css">
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
    
    <!-- Export to Img -->
    <script type="text/javascript" src="js/html2canvas.js"></script>
    <script type="text/javascript" src="js/canvas2image.js"></script>
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap-datetimepicker.min.css" />
                           
    <script src="bootstrap/js/bootstrap-datetimepicker.min.js"></script>

    <style>
      .modal strong {
        color: black !important;
      }
    </style>
</head>
<body style="height: 1200px; width: 100%;">

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