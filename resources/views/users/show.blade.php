<x-app>
    <x-slot name="title">User : {{Auth::user()->name}}</x-slot>
    <x-slot name="content">
        
<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Email</th>                
                <th>Name</th>
                <th>created_at</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        </tbody>
    </table>
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
