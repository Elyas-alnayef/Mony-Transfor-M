<x-app >
  <x-slot name="title">All Points</x-slot>
    <x-slot name="content">
      <a href="{{route('points.create')}}" class="card  shadow-xl mx-3  mt-n6 btn btn-outline-primary" style="width: 100%; margin-bottom: 24px;">Create New</a>
      @foreach ($points as $point)
       @can('update', $point)
          <div class="card card-body shadow-xl mx-3  mt-n6" style="width: 100%;  background-color: rgba(230, 227, 227, 0.377);  backdrop-filter: blur(10px);">
            <div class="d-flex">
                <!-- Left side for user image -->
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{asset('assets/media/bank.png')}}" alt="User Image" class="img-fluid">
                </div>
                <!-- Right side for user details -->
                <div class="col-md-8">
                    <div class="card-body">
                        <div>
                            <p><span style="font-weight: 600;margin-right:30px;">Office name</span><span>{{$point->name}}</span></p>
                            <p><span style="font-weight: 600;margin-right:30px;">Country</span> <span>{{$point->country}}</span></p>
                            <p><span style="font-weight: 600;margin-right:30px;">Office Adress</span> <span>{{$point->address}}</span></p>
                            <p><span style="font-weight: 600;margin-right:30px;">Manager Id</span> <span>{{$point->manager_id}}</span></p>
                            <p><span style="font-weight: 600;margin-right:30px;">Current Balance</span> <span>{{$point->current_balance}}</span></p>
                            <p><span style="font-weight: 600;margin-right:30px;">Created At</span> <span>{{$point->created_at->format('Y-M-D')}}</span></p>
                        </div>
                        <div class="btn-group">
                          <a href="{{route('points.show',$point)}}"class="btn btn-sm btn-outline-secondary">View</a>
                          <a href="{{route ('points.edit',$point) }}"class="btn btn-sm btn-outline-secondary">Edit</a>
                          <a href="{{route ('archive.create') }}"class="btn btn-sm btn-outline-primary">New transformation</a>
                          <form action="{{route('points.destroy',$point)}}" method="post">
                            @method('DELETE')
                            @csrf
                          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <br>
        @endcan
      @endforeach
    </x-slot>
</x-app>