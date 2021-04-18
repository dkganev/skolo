<html>
    <head>
        <meta charset="utf-8">
        <meta name="  description" content="">
        <meta name="autor" content="Dimitar Ganev">
        
        <title>{{ $title ?? 'Todo Manager' }}</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/shkolo/public/css/shkolo.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
    </head>
    <body>
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner">
                <div class="page-logo">
                    <a href="https://app.shkolo.bg/"><img src="/shkolo/public/img/logo.png" alt="logo" class="img-responsive hidden-sm" id="logo-img"></a><div class="menu-toggler sidebar-toggler hide"></div>
                </div>
            </div>
        </div>
        
        
        {{ $slot }}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/shkolo/public/js/shkolo.js"></script>

    </body>
</html>