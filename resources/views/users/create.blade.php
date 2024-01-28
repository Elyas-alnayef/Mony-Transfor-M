<x-app>
    <x-slot name="header"><x-header></x-header></x-slot>
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
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                  </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <label for="role" class="form-label">Choose the user role</label>
                 <select class="form-control" id="role" name="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>  
                    <option value="Manager">Manager</option>  
                </select>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>
        </div>
    </x-slot>

</x-app>
