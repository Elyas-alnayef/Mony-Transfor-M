<x-app>
    <x-slot name="title">Create New Point</x-slot>
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
            <form action="{{route('points.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                  </div>
                <div class="form-group">
                  <label for="Country">Country</label>
                  <input type="text" class="form-control" id="Country" name="country" placeholder="Country">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="address" placeholder="Address">
                  </div>
                <div class="form-group">
                    <label for="current_balance">Current Balance</label>
                    <input type="text" class="form-control" id="current_balance" name="current_balance" placeholder="current balance">
                  </div>
                  <br>
                </select>
                <label for="manager">Choose the Manager</label>
                <select class="form-control" id="manager" name="manager">
                    @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}">{{$manager->name}}</option>  
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
        </div>
    </x-slot>

</x-app>
