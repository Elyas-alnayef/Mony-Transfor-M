
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
            <form action="{{route('points.update',$point)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$point->name}}">
                  </div>
                <div class="form-group">
                  <label for="Country">Country</label>
                  <input type="text" class="form-control" id="Country" name="country" placeholder="Country"  value="{{$point->country}}">
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="address" placeholder="Address"  value="{{$point->address}}">
                  </div>
                <div class="form-group">
                    <label for="current_balance">Current Balance</label>
                    <input type="text" class="form-control" id="current_balance" name="current_balance" placeholder="current balance"  value="{{$point->current_balance}}">
                  </div>
                  <br>
                  <select class="form-control" id="manager" name="manager">
                    @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}">{{$manager->name}}</option>  
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">save</button>
              </form>
        </div>
    </x-slot>

</x-app>