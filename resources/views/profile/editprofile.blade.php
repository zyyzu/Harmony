<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $applicationName)</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript" defer></script>
</head>
<body>
<header>
    @include('layouts.nav')
</header>
<div class="container container-dash">
    <div class="row position-relative">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edycja profilu</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$userFirstName." ".$userLastName}}</h6>
                    <form action="{{route('user.editprofile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="inputBackground" class="form-label">Edytuj zdjęcie w tle</label>
                        <input class="form-control-file" type="file" id="inputBackground" name="inputBackground">
                            @error('inputBackground')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="inputAvatar" class="form-label">Edytuj zdjęcie profilowe</label>
                        <input class="form-control-file" type="file" id="inputAvatar" name="inputAvatar">
                            @error('inputAvatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="inputName" class="form-label">Imię</label>
                        <input class="form-control" type="text" name="inputName" id="inputName" value="{{$userFirstName}}">
                            @error('inputName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="inputLastName" class="form-label">Nazwisko</label>
                        <input class="form-control" type="text" name="inputLastName" id="inputLastName" value="{{$userLastName}}">
                            @error('inputLastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <button type="submit">Zapisz zmiany</button>
                        @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
@endforeach
                    </form>
                </div>
              </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
</body>
</html>
