
        <x-app>
            <x-slot name="title">Upadte User Credentials</x-slot>
            <x-slot name="content">
                <div class="container mt-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('users.update',$user)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value=" {{$user->name}}">
                          </div>
                          <label for="role">Choose the user role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="Admin"{{$user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Manager"{{$user->role === 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="User"{{$user->role === 'User' ? 'selected' : '' }}>User</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </x-slot>
        
        </x-app>