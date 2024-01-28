<x-app >
    <x-slot name="header">
      <x-header></x-header>
    </x-slot>
    <x-slot name="content">
        @forelse ($users as $user)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <h6>{{$user->name}}</h6>
              <br>
              <p class="card-text">{{$user->email}}</p>
              <br>
              <p class="card-text">{{$user->role}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('users.show',$user)}}"class="btn btn-sm btn-outline-secondary">View</a>
                  <a href="{{route ('users.edit',$user) }}"class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form action="{{route('users.destroy',$user)}}" method="post">
                    @method('DELETE')
                    @csrf
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </div>
                <small class="text-body-secondary">{{$user->created_at}}</small>
              </div>
            </div>
          </div>
        </div>
        <br>
        @empty
            
        @endforelse
        <a href="{{route('users.create')}}"  rel="noopener noreferrer">create new user</a>

    </x-slot>
</x-app>