<x-app >
    <x-slot name="header">
      <x-header></x-header>
    </x-slot>
    <x-slot name="content"><div class="container mt-5">
        <h2>Archive Data</h2>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Total Amount</th>
                    <th>UN Number</th>
                    <th>Status</th>
                    <th>User</th>

                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $archive->id }}</td>
                        <td>{{  optional($archive->t_point)->name}}</td>
                        <td>{{ optional($archive->receiver)->name }}</td>
                        <td>{{ $archive->total_amount }}</td>
                        <td>{{ $archive->un_number }}</td>
                        <td>{{ $archive->status }}</td>
                        <td>{{optional($archive->user)->name }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
    
    </x-slot>
</x-app>