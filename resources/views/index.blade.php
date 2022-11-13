@extends('layouts.guest')

@section('title', 'Home')
@section('content')
    <header>
        <img src="{{ asset('/storage/images/municipal-hall.png') }}" width="100%" height="400px" alt="">
    </header>
    <h1 class="text-center mt-4">Welcome! E-budget Mo: Budget <br> Monitoring and Tracking System</h1>
    {{-- <p class="text-center">
        <a href="{{ route('login') }}" class="btn btn-warning">click here to login</a>
    </p> --}}
    <div class="row justify-content-center align-center mt-5">
        <div class="col-6">
            <a href="{{ route('login.loginMayor') }}" class="btn btn-warning fw-bold w-100 my-2 text-uppercase">Mayor
                Portal</a>
            <a href="{{ route('login.loginBudget') }}" class="btn btn-warning fw-bold w-100 my-2 text-uppercase">Budget
                Portal</a>
            <a href="{{ route('login.loginAccounting') }}"
                class="btn btn-warning fw-bold w-100 my-2 text-uppercase">Accounting Portal</a>
            <a href="{{ route('login.loginTreasury') }}" class="btn btn-warning fw-bold w-100 my-2 text-uppercase">Treasury
                Portal</a>
            <a href="{{ route('login.loginAdmin') }}" class="btn btn-warning fw-bold w-100 my-2 text-uppercase">Admin
                Portal</a>
        </div>
    </div>
@endsection
