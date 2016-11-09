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
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap-datetimepicker.min.css" />
                           
    <script src="bootstrap/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body style="background-image: url('images/background.jpg'); ">

@include('layouts.alerts')
@include('layouts.navbar')

<div style="display:none;" id="content"></div>
@yield('content')

<script>

    function ajaxLoad(filename, content) {
        content = typeof content !== 'undefined' ? content : 'content';

        $.ajax({
            type: "GET",
            url: filename,
            success: function (data) {
                $("#" + content).css('display','none').html(data).hide().fadeIn(600);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        }).done(function() {
            $('select').selectpicker('refresh');
        });
    }

    $('li').on('click', function () {
      // $('li').removeClass('active');
      // $(this).addClass('active');
      $(this).addClass('active').siblings().removeClass('active');
    });

</script>


<script src="/js/main.js"></script>
</body>
</html>