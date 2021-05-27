<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
    <div class="col-md-4">
        <a class="navbar-brand" href="{{route('user.wall')}}">{{ $applicationName }}</a>
    </div>
    <div class="col-md-4">
        <form class="d-flex">
            <input class="form-control w-100" type="search" placeholder="Szukaj w serwisie" aria-label="Search">&nbsp;&nbsp;
            <button class="btn btn-success" type="submit">Szukaj</button>
          </form>
    </div>
    <div class="col-md-4">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('user.profile.own') }}"><i class="fas fa-user"></i> {{ $userFirstName }} {{ $userLastName }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" data-toggle="dropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i> Opcje
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: center;">
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Wyloguj') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

        </ul>
    </div>

    <!--<div class="container-fluid">
      <a class="navbar-brand" href="#">{{ $applicationName }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('user.wall')}}">Tablica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.profile.own')}}">Mój profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ustawienia</a>
          </li>
        </ul>
      </div>
    </div>-->
  </nav>
