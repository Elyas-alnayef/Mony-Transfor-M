<div class="container">
    <header class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{route('archive.index')}}" class="nav-link">Achive</a></li>
            <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="{{route('exchange')}}" class="nav-link">Exchange</a></li>
        </ul>
          @if (Auth::check())
          <ul class="nav nav-pills">
            <li class="nav-item ml-auto   "><a href="#" class="nav-link" 
              onclick="event.preventDefault(); document.getElementById('logout').submit();"
                >Logout</a></li>
              <form  id="logout" action="{{route('logout')}}" method="post" style="display: none">
              @csrf
              </form>
          </ul>
          @else
          <ul class="nav nav-pills">
            <li class="nav-item ml-auto "><a href="{{route('login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{route('registerget')}}" class="nav-link">Register</a></li>
          </ul>   
          @endif
       
       
    </header>
</div>
