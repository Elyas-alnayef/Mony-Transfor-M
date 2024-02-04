<x-app>
    <x-slot name="title">Update Page</x-slot>
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
            <form action="{{route('archive.update',$archive->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="total">Total</label>
                  <input type="text" class="form-control" id="total" name="total"  placeholder="Enter total" value="{{$archive->total_amount}}">
                </div>
                <div class="form-group">
                    <label for="un_number">UN-Number</label>
                    <input type="text" class="form-control" id="un_number" name="un_number" placeholder="Enter unique number" value="{{$archive->un_number}}">
                  </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" id="status" name="status" placeholder="Enter status(delivered,waiting)" value="{{$archive->status}}">
                </div>
                <label for="send">Choose the send point </label>
                <select class="form-control" id="send" name="send">
                            @foreach ($points as $point)
                                <option value="{{ $point->id }}" {{ $point->id == optional($archive->t_point)->id ? 'selected' : '' }}>{{$point->name}}</option>  
                            @endforeach
                </select>
                <label for="receive">Choose the receive point</label>
                <select class="form-control" id="receive" name="receive">
                    @foreach ($points as $point)
                    <option value="{{ $point->id }}" {{ $point->id == optional($archive->receiver)->id ? 'selected' : '' }}>{{$point->name}}</option>  
                    @endforeach
                </select>

                <label for="user">Choose the user name</label>
                <select class="form-control" id="user" name="user">
                    @foreach ($users as $user)
                                <option value="{{$user->id}}" {{ $user->id == optional($archive->user)->id ? 'selected' : '' }}>{{$user->name}}</option>  
                    @endforeach
                 </select>
                 <br>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </x-slot>

</x-app>
