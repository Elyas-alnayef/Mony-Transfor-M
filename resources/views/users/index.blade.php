<x-app>
  <x-slot name="title">All Users</x-slot>
  <x-slot name="content">
    <a href="{{route('users.create')}}" class="card  shadow-xl mx-3  mt-n6 btn btn-outline-primary" style="width: 100%; margin-bottom: 24px;">Create New</a>
      @forelse ($users as $user)
          <div class="card card-body shadow-xl mx-3  mt-n6" style="width: 100%; margin-bottom: 24px; background-color: rgba(230, 227, 227, 0.377);  backdrop-filter: blur(10px);">
              <div class="d-flex">
                  <!-- Left side for user image -->
                  <div class="col-md-4 d-flex justify-content-center align-items-center">
                      <img src="{{asset('assets/media/man.png')}}" alt="User Image" class="img-fluid">
                  </div>
                  <!-- Right side for user details -->
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">{{$user->name}}</h5>
                          <div>
                              <p><span style="font-weight: 600;margin-right:30px;">Email</span><span>{{$user->email}}</span></p>
                              <p><span style="font-weight: 600;margin-right:30px;">Rule</span> <span>{{$user->role}}</span></p>
                              <p><span style="font-weight: 600;margin-right:30px;">Created At</span> <span>{{$user->created_at->format('Y-M-D')}}</span></p>
                          </div>
                          <div class="btn-group">
                              <a href="{{route('users.show',$user)}}" class="btn btn-sm btn-outline-secondary">View</a>
                              @can('update', $user)
                              <a href="{{route ('users.edit',$user) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                              <form action="{{route('users.destroy',$user)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                              </form>
                              @endcan
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @empty
      @endforelse
      <a href="{{route('users.create')}}" rel="noopener noreferrer">Create new user</a>
  </x-slot>
</x-app>
