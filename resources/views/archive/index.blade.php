<x-app >
  <x-slot name="title">Archives</x-slot>
    <x-slot name="content">
      <a href="{{route('archive.create')}}" class="card  shadow-xl mx-3  mt-n6 btn btn-outline-primary" style="width: 100%; margin-bottom: 24px;">Create New</a>
      @foreach ($allarchives as $t_archive)
      @if ($t_archive->deleted==0)
<div class="card card-body shadow-xl mx-3  mt-n6" style="width: 100%;  background-color: rgba(230, 227, 227, 0.377);  backdrop-filter: blur(10px);">
  <div class="d-flex">
      <!-- Left side for user image -->
      <div class="col-md-4 d-flex justify-content-center align-items-center">
          <img src="{{asset('assets/media/exchange.png')}}" alt="User Image" class="img-fluid">
      </div>
      <!-- Right side for user details -->
      <div class="col-md-8">
          <div class="card-body">
              <div>
                  <p><span style="font-weight: 600;margin-right:30px;">Send From</span><span>{{ optional($t_archive->t_point)->name}}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">To</span> <span>{{ optional($t_archive->receiver)->name }}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">Total</span> <span>{{$t_archive->total_amount}}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">Process Number</span> <span>{{$t_archive->un_number}}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">Status</span> <span>{{$t_archive->status}}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">To User</span> <span>{{ optional($t_archive->user)->name}}</span></p>
                  <p><span style="font-weight: 600;margin-right:30px;">Created At</span> <span>{{$t_archive->created_at->format('Y-M-D')}}</span></p>
              </div>
              <div class="btn-group">
                  <a href="{{route('archive.show',$t_archive->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                  @can('update', $t_archive)
                  <a href="{{route ('archive.edit',$t_archive->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form action="{{route('archive.destroy',$t_archive->id)}}" method="post">
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
      <br>
      @endif
      @endforeach
    </x-slot>
</x-app>