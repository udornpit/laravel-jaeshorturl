@extends('admin.main')
@section('admin')

<div class="container">
    <div class="row">
        <h1 class="mt-5 mb-2 fs-3 fw-bold text-center text-white">URL Manager</h1>
        
        @if (session('admmsg'))
        <div class="alert alert-success alert-dismissible text-center fs-5 fw-bold fade show" role="alert" style="background-color: #d1e7ddb3;">
            {{ session('admmsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('admerr'))
        <div class="alert alert-danger alert-dismissible text-center fs-5 fw-bold fade show" role="alert" style="background-color: #f8d7dab3;">
            {{ session('admerr') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">URL Key</th>
                    <th scope="col">URL Destination</th>
                    <th scope="col">Short URL</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    @inject('users', 'App\Models\User')
                    <td>{{ $users->where('id', $item->user_id)->first()->name }}</td>
                    <td>{{ $item->url_key }}</td>
                    <td>{{ $item->destination_url }}</td>
                    <td>{{ $item->default_short_url }}</td>
                    <td>{{ $item->visits->count() }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}">
                        Edit
                        </button>

                        <a href="{{ route('admin.delete', $item->id) }}" role="button" class="btn btn-outline-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: rgb(255 255 255 / 75%);">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.update', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="key" class="form-label">URL Key</label>
                                        <input type="text" name="url" value="{{ $item->url_key }}" class="form-control" id="key">
                                    </div>
                                    <div class="mb-3">
                                        <label for="destination" class="form-label">Destination URL</label>
                                        <input type="text" name="destination" value="{{ $item->destination_url }}" class="form-control" id="destination">
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach  
            </tbody>
        </table>
    </div>
</div>
    
@endsection