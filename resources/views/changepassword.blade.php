@extends('layouts.app')

@section('title', 'Change Password')
@section('content')
    <div class="container p-5 bg-white">
        <h4>Change Password
        </h4>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="current_password"
                            aria-describedby="helpId" placeholder="Current Password">
                        @error('current_password')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password"
                            aria-describedby="helpId" placeholder="New Password">
                        @error('new_password')
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                            aria-describedby="helpId" placeholder="Confirm Password">
                        @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-warning w-100" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
