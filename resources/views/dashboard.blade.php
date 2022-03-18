<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

            <div class="row">
                <h1 class="my-2 fs-4 fw-bold text-center">JAE Shortener</h1>
                <form action="{{ route('url.shorten') }}" method="POST" class="my-2">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="url" class="form-control" placeholder="URL Shortener">
                        <button class="btn btn-outline-secondary" type="submit">Shorten</button>
                    </div>
                </form>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">URL Key</th>
                            <th scope="col">URL Destination</th>
                            <th scope="col">Short URL</th>
                            <th scope="col">Visitors</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urls as $key => $item)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $item->url_key }}</td>
                            <td>{{ $item->destination_url }}</td>
                            <td>{{ $item->default_short_url }}</td>
                            <td>{{ $item->visits->count() }}</td>
                        </tr>                        
                        @endforeach  
                    </tbody>
                </table>
            </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
