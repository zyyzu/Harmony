<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', $applicationName)</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/unloged/unloged.css">
</head>
<body>
<header id="unloged-header" class="container-fluid">
    <p class="h1"><b><span class="align-middle">{{ $applicationName }} - Serwis społecznościowy</span></b></p>
</header>
<main class="row text-center">
    @yield('content')
</main>
<footer id="unloged-footer" class="fixed-bottom">
    Harmony 2021 &copy;
</footer>
</body>
</html>
