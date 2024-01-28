<x-app >
    <x-slot name="header">
      <x-header></x-header>
    </x-slot>
    <x-slot name="content">
      @forelse ($points as $point)
      @can('update', $point)
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <h6>{{$point->name}}</h6>
            <br>
            <p class="card-text">{{$point->country}}</p>
            <br>
            <p class="card-text">{{$point->address}}</p>
            <br>
            <p class="card-text">{{$point->manager_id}}</p>
            <br>
            <p class="card-text font-weight-bold">{{$point->current_balance}}</p>
            <div class="d-flex justify-content-between align-items-center">
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
              <small class="text-body-secondary">{{$point->created_at}}</small>
            </div>
          </div>
        </div>
      </div>
      <br>
      @endcan
      @empty
      @endforelse
      <br>
      <a href="{{route('points.create')}}" >create new point</a>
    </x-slot>
</x-app>