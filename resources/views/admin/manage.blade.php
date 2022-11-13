@extends('layouts.app')

@section('title', 'Manage Users')
@section('content')

    <div class="container p-5 bg-white">
        <div class="row mb-3">
            <div class="col">
                <h4>Users</h4>
            </div>
            <div class="col text-end">
                <a href="{{ route('admin.user.create') }}" class="btn btn-warning">Add User</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm text-center align-item-center">
                <thead class="table-dark text-uppercase">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>username</th>
                        <th width="15%">role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($all_user as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" id="role_id">
                                    @csrf
                                    @method('PATCH')
                                    <select
                                        class="form-select form-select-sm" name="role" id="role"
                                        onchange="this.form.submit()">
                                        <option @if ($user->role === '1') selected @endif value="1">
                                            Mayor
                                        </option>
                                        <option @if ($user->role === '2') selected @endif value="2">Budget
                                        </option>
                                        <option @if ($user->role === '3') selected @endif value="3">
                                            Accounting</option>
                                        <option @if ($user->role === '4') selected @endif value="4">Treasury
                                        </option>
                                        <option @if ($user->role === '5') selected hidden @endif value="5">
                                            User
                                        </option>
                                        <option @if ($user->role === '6') selected hidden @endif value="6">
                                            Administrator
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <th>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-cente">No Users Yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
