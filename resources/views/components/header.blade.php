<div class="container">
    <header class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="{{route('archive.index')}}" class="nav-link">Achive</a></li>
            <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="{{route('exchange')}}" class="nav-link">Exchange</a></li>
        </ul>
        {{-- <ul class="nav nav-pills">
          <li class="nav-item ml-auto   "><a href="#" class="nav-link">welcome</a></li>
          <li class="nav-item ml-auto   "><a href="#" class="nav-link" 
          onclick="event.preventDefault(); document.getElementById('logout').submit();"
            >Logout</a></li>
            <form  id="logout" action="#" method="post" style="display: none">
            @csrf
            </form>
      </ul> --}}
        <ul class="nav nav-pills">
          <li class="nav-item ml-auto   "><a href="#" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Register</a></li>
        </ul> 
       
    </header>
</div>
