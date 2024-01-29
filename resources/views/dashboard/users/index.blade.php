@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Create new User</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Article Count</th>
                    <th scope="col">Total Article Views</th>
                    <th scope="col">Comment Count</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->articles->count() }}</td>
                        <td>{{ $user->articles->pluck('views')->sum() }}</td>
                        <td>{{ $user->comments->count() }}</td>
                        <td>
                            @if ($user->is_admin)
                                Admin
                            @else
                                Pengguna
                            @endif
                        </td>
                        <td>
                            {{-- <a href="/dashboard/categories/{{ $user->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a> --}}
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            {{-- <form method="post" action="/dashboard/categories/{{ $user->slug }}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
