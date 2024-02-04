<x-app>
    <x-slot name="title">Point Details</x-slot>
    <x-slot name="content">
    <h2>Manager</h2><br>
    <div class="card card-body shadow-xl mx-3  mt-n6" style="width: 100%; margin-bottom: 24px; background-color: rgba(230, 227, 227, 0.377);  backdrop-filter: blur(10px);">
        <div class="d-flex">
            <!-- Left side for user image -->
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{asset('assets/media/man.png')}}" alt="User Image" class="img-fluid">
            </div>
            <!-- Right side for user details -->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$manager->name}}</h5>
                    <div>
                        <p><span style="font-weight: 600;margin-right:30px;">Email</span><span>{{$manager->email}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Role</span> <span>{{$manager->role}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Created At</span> <span>{{$manager->created_at->format('Y-M-D')}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body shadow-xl mx-3  mt-n6" style="width: 100%;  margin-bottom: 24px; background-color: rgba(230, 227, 227, 0.377);  backdrop-filter: blur(10px);">
        <div class="d-flex">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="{{asset('assets/media/bank.png')}}" alt="User Image" class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div>
                        <p><span style="font-weight: 600;margin-right:30px;">Office name</span><span>{{$point->name}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Country</span> <span>{{$point->country}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Office Adress</span> <span>{{$point->address}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Current Balance</span> <span>{{$point->current_balance}}</span></p>
                        <p><span style="font-weight: 600;margin-right:30px;">Created At</span> <span>{{$point->created_at->format('Y-M-D')}}</span></p>
                    </div>
                    <div class="btn-group">
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
        <div>
            <hr>
            <h2 style="text-align: center">Archive</h2>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Send</th>
                        <th>Recive</th>
                        <th>Total</th>                
                        <th>Status</th>
                        <th>Un_Number</th>
                        <th>User_ID</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archives as $archive)
                    <tr>
                        <td>{{$archive->sender_id}}</td>
                        <td>{{$archive->receiver_id}}</td>
                        <td>{{$archive->total_amount}}</td>
                        <td>{{$archive->status}}</td>
                        <td>{{$archive->un_number}}</td>
                        <td>{{$archive->user_id}}</td>
                        <td>{{$archive->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
       
    
      </div>
      
    </x-slot>

</x-app>
