<x-app >
    <x-slot name="header">
      <x-header></x-header>
    </x-slot>
    <x-slot name="content">
      @foreach ($allarchives as $t_archive)
      @if ($t_archive->deleted==0)
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <h6>{{ optional($t_archive->t_point)->name}}</h6>
            <br>
            <p class="card-text">{{ optional($t_archive->receiver)->name }}</p>
            <br>
            <p class="card-text">{{$t_archive->total_amount}}</p>
            <br>
            <p class="card-text">{{$t_archive->un_number}}</p>
            <br>
            <p class="card-text">{{$t_archive->status}}</p>
            <br>
            <p class="card-text">{{ optional($t_archive->user)->name}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{route('archive.show',$t_archive->id)}}"class="btn btn-sm btn-outline-secondary">View</a>
                <a href="{{route ('archive.edit',$t_archive->id) }}"class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{route('archive.destroy',$t_archive->id,)}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </div>
              <small class="text-body-secondary">{{$t_archive->created_at}}</small>
            </div>
          </div>
        </div>
      </div>
      <br>
      @endif
      @endforeach
      
      <a href="{{route('archive.create')}}"  rel="noopener noreferrer">create new archive</a>
    </x-slot>
</x-app>