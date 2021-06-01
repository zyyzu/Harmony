<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $applicationName)</title>
    <link rel="stylesheet" href="css/app.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript" defer></script>
</head>
<body>
<header>
    @include('layouts.nav')
</header>
<div class="container container-dash">
    <div class="row position-relative">
        <div class="banner-container col-sm-12 col-md-12 col-lg-12 col-xxl-12">
            <div id="bannerjs" class="banner-background text-center">
                <img src="{{$background_picture}}" alt="Background picture" class="background-picture">
            </div>
            <div id="profilepick_js" class="banner-profile-photo" >
                    <img id="profile_picture" src="{{ $profile_picture }}" alt="Profile picture" class="profile_picture_img">
                    <p id="profilepick_p" style="visibility: hidden;"><a href="{{route('user.editprofile.form')}}"><b>Zmień zjęcie profilowe</b><br><i class="fas fa-images"></i></a></p>
            </div>

            <div class="banner-info bg-primary">
                <p class="h2">{{ $userFirstName." ".$userLastName }}</p>
            </div>
        </div>

    </div>
    <div class="row">
        <aside class="col-sm-3">
            @yield('aside')
        </aside>
        <main class="col-md-9">
            @yield('mainblock')
        </main>
    </div>
</div>
</body>
</html>
