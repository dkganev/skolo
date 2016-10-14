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

</head>
<body style="background-image: url('images/background.jpg'); ">

    @include('layouts.alerts')
    @include('layouts.navbar')

    <div class="container">
        <div id="content"></div>
        <div class="loading"></div>

    </div>
        @yield('content')
    <script>
        function ajaxLoad(filename, content) {
            content = typeof content !== 'undefined' ? content : 'content';
            $('.loading').show(0);
            $.ajax({
                type: "GET",
                url: filename,

                success: function (data) {
                    //console.log(data);
                    $('.loading').delay(300).hide(0);
                    $("#" + content).html(data);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            }).done(function() {
                $('select').selectpicker('refresh');
            });
        }
    </script>
    <script src="/js/main.js"></script>
    <script >
        var var1 = "{{ URL::current() }}";
    </script>
</body>
</html>