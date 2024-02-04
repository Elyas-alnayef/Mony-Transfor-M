<x-app>
    <x-slot name="title">Today Summary</x-slot>
    <x-slot name="content">
        @forelse ($points as $point)
            <div class="mx-4">
                <div class="card-header">
                    Point Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $point->name }}</h5>
                    <p class="card-text">
                        <strong>Country:</strong> {{ $point->country }}<br>
                        <strong>Address:</strong> {{ $point->address }}<br>
                        <strong>Current Balance:</strong> {{ $point->current_balance }}<br>
                        <strong>Manager ID:</strong> {{ $point->manager_id }}
                    </p>
                </div>
            </div>

            @can('update', $point)
                <h2 class="title text-center">Archive</h2>
                        <div class="table-responsive card card-body shadow-xl mx-3 mx-md-4 mt-n6" style="width: 100%">
                            <table class="table table-bordered table-striped w-100">
                                <thead class="thead-light text-center">
                                <tr>
                                    <th>Send From</th>
                                    <th>TO</th>
                                    <th>Total</th>
                                    <th>UNQ Number</th>
                                    <th>Status</th>
                                    <th>To User</th>
                                    <th>Date</th>
                                    <th></th>

                                    <!-- Add more table headings based on your data -->
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archives as $archive)
                                         @if ($point->id == $archive->sender_id or $point->id == $archive->receiver_id)
                                            <tr class="text-center">
                                                <td>{{ $archive->sender_id }}</td>
                                                <td>{{ $archive->receiver_id }}</td>
                                                <td>{{ $archive->total_amount }}</td>
                                                <td>{{ $archive->un_number }}</td>
                                                <td>{{ $archive->status }}</td>
                                                <td>{{ $archive->user_id }}</td>
                                                <td>{{ $archive->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('archive.show', $archive->id) }}"
                                                    class="btn btn-sm btn-outline-secondary">View</a>
                                                    <a href="{{ route('archive.edit', $archive->id) }}"
                                                    class="btn btn-sm btn-outline-secondary">Edit</a>
                                                    <form style="display: inline-block"
                                                        action="{{ route('archive.destroy', $archive->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <!-- Add more table cells based on your data -->
                                            </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                <br>
            @endcan

        @empty
        @endforelse
        <br>
    </x-slot>
</x-app>
