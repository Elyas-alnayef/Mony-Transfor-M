<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-css.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Open Sans -google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet" />
    <!-- End Google fonts -->
    
</head>

<body>

  <div class="page d-flex">
      <!-- sidebar -->
      <div class="sidebar p-relative bg-white p-20">
          <h3 class="p-relative mt-0 text-c">EMS</h3>
          <ul class="text-cap">
            @if (Auth::check() and Auth::user()->role=='User')
              <li>
                  <a href="{{route('home')}}" class="active d-flex align-center fs-14 rad-6 p-10 c-black">
                      <i class="fa-solid fa-chart-bar fa-fw"></i>
                      <span>Home</span>
                  </a>
              </li>
              <li>
                  <a href="{{route('users.show',Auth::user()->id)}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                      <i class="fa-regular fa-user fa-fw"></i>
                      <span>Profile</span>
                  </a>
              </li>
              @elseif (Auth::check() and (Auth::user()->role=='Admin' or Auth::user()->role=='Manager'))
                      <li>
                        <a href="{{route('home')}}" class="active d-flex align-center fs-14 rad-6 p-10 c-black">
                            <i class="fa-solid fa-chart-bar fa-fw"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('users.show',Auth::user()->id)}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                            <i class="fa-regular fa-user fa-fw"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                      <a href="{{route('points.index')}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                        <i class="fa-solid fa-building-columns"></i>
                          <span>Points</span>
                      </a>
                    </li>
                    <li>
                        <a href="{{route('archive.index')}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                            <i class="fa-regular fa-folder-closed"></i>
                            <span>Archives</span>
                        </a>
                    </li>
                    <li>
                      <a href="{{route('users.index')}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                        <i class="fa-solid fa-users"></i>
                          <span>Users</span>
                      </a>
                  </li>
              @else
              @endif
              <li>
                  <a href="{{route('exchange')}}" class="d-flex align-center fs-14 rad-6 p-10 c-black">
                    <i class="fa-solid fa-dollar-sign"></i>
                      <span>Currncy Exchange</span>
                  </a>
              </li>
          </ul>
      </div>
      <!-- Start Head -->
      <div class="content bg-eee">
      <div class="head between-flex bg-white p-10">
          <div class="search p-relative">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="search" class="rad-6" placeholder=" type a keyword" />
          </div>
        </ul>
        @if (Auth::check())
        <ul class="nav nav-pills">
          <li class="nav-item ml-auto   "><a href="#" class="nav-link btn btn-danger" 
            onclick="event.preventDefault(); document.getElementById('logout').submit();"
              >Logout</a></li>
            <form  id="logout" action="{{route('logout')}}" method="post" style="display: none">
            @csrf
            </form>
        </ul>
        @else
        <ul class="nav nav-pills">
          <li class="nav-item ml-auto"><a href="{{route('login')}}" class="nav-link btn btn-primary">Login</a></li>
          <li class="nav-item ml-auto"><div style="width: 16px"></div></li>
          <li class="nav-item"><a href="{{route('registerget')}}" class="nav-link btn btn-primary">Register</a></li>
        </ul>   
        @endif
      </div>
      <!-- End Head -->
      <h1 class="p-relative">{{$title}}</h1> 
      <div class=" mx-4" style="padding-right:24px;">
        <!-- Start Wrapper -->
          {{$content}}
        </div>
      <!-- End Wrapper -->

    </body>
</html>
