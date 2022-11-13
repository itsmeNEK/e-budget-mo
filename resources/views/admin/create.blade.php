@extends('layouts.app')

@section('title', 'Add Users')
@section('content')

    <div class="container p-5 bg-white">
        <h4>Add User</h4>
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" name="name" id="name"
                            placeholder="Name">
                        <label for="name">Name</label>
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="role" name="role"
                            aria-label="Floating label select example">
                            <option hidden>Select Role</option>
                            <option value="1">Mayor</option>
                            <option value="2">Budget</option>
                            <option value="3">Accounting</option>
                            <option value="4">Treasury</option>
                            <option value="5">User</option>
                        </select>
                        <label for="role">Role</label>
                    </div>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-warning">Add User</button>
            </div>
        </form>
    </div>
@endsection
