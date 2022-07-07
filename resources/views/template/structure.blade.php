<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang | Fides Sports Club</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend&family=Montserrat:wght@300;400;500&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/asset/env.css">
    <link rel="stylesheet" href="/asset/landing.css">
    <link rel="stylesheet" href="/asset/about.css">
    <link rel="stylesheet" href="/asset/service.css">
    <link rel="stylesheet" href="/asset/register.css">
    <link rel="stylesheet" href="/asset/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
@include('component.navbar')
    @yield('content')
@include('component.footer')
</body>
</html>