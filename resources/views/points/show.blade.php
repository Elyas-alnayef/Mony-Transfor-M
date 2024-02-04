<x-app>
    <x-slot name="title">Point Details</x-slot>
    <x-slot name="content">
<div class="container mt-5">
    <h2>Manager</h2>
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
          <div class="card-body">
            <h6>{{$manager->name}}</h6>
            <br>
            <p class="card-text">{{$manager->email}}</p>
            <br>
            <p class="card-text font-weight-bold">{{$manager->created_at}}</p>
            </div>
          </div>
        <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>                
                <th>Adress</th>
                <th>Current Balance</th>
                <th>Created At</th>
                <th>Manager</th>



            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$point->id}}</td>
                <td>{{$point->name}}</td>
                <td>{{$point->country}}</td>
                <td>{{$point->address}}</td>
                <td>{{$point->current_balance}}</td>
                <td>{{$point->created_at}}</td>
                <td>{{$point->manager_id}}</td>
            </tr>
            <!-- Add more rows as needed with actual data -->
        </tbody>
    </table>
    <br>
    <h2>Archive</h2>
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
    </x-slot>

</x-app>
