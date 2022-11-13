<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .nav-link:hover {
            background-color: rgb(255, 255, 255);
            color: black !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="row" style="height: 98vh;">
            <div class="col-3 p-0" style="max-width: 300px">
                @if (Auth::user()->role === '1')
                    <div
                        class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-warning h-100 w-100">
                    @elseif (Auth::user()->role === '2')
                        <div
                            class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-info h-100 w-100">
                        @elseif (Auth::user()->role === '3')
                            <div
                                class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-success h-100 w-100">
                            @elseif (Auth::user()->role === '4')
                                <div
                                    class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-danger h-100 w-100">
                                @elseif (Auth::user()->role === '5')
                                    <div
                                        class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-primary h-100 w-100">
                                    @elseif (Auth::user()->role === '6')
                                        <div
                                            class="side-nav d-flex flex-column flex-shrink-0 p-3 text-white fw-bold bg-dark h-100 w-100">
                @endif


                <div class="mx-auto align-items-center">
                    <img src="{{ asset('/storage/images/logo.png') }}" class="rounded w-100" alt="">
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    @if (Auth::user()->role != '6')
                        <li class="nav-item">
                            <a href="{{ route('purchaseRequest.index') }}" class="nav-link text-white fw-bold">
                                <i class="bi bi-plus"></i>
                                Purchase Request
                            </a>
                        </li>
                        @if (Auth::user()->role === '1')
                            <li>
                                <a href="{{ route('mayor.rpq.create') }}" class="nav-link text-white fw-bold">
                                    <i class="bi bi-plus"></i>
                                    Request for Price
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('mayor.aq.create') }}" class="nav-link text-white fw-bold">
                                    <i class="bi bi-plus"></i>
                                    Abstract of Quotation
                                </a>
                            </li>
                            <li>
                                <a href="" class="nav-link text-white fw-bold">
                                    <i class="bi bi-plus"></i>
                                    Purchase Order
                                </a>
                            </li>
                            <li>
                                <a href="" class="nav-link text-white fw-bold">
                                    <i class="bi bi-plus"></i>
                                    Acceptance & Inspection
                                </a>
                            </li>
                            <li>
                                <a href="" class="nav-link text-white fw-bold">
                                    <i class="bi bi-plus"></i>
                                    Requisition & Issue Slip
                                </a>
                            </li>
                            <hr>
                        @endif
                        <li>
                            <a href="{{ route('documentStatus') }}" class="nav-link text-white fw-bold">
                                <i class="bi bi-card-list"></i>
                                Document Status
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role === '1' || Auth::user()->role === '3' || Auth::user()->role === '2')
                        <li>
                            <a href="{{ route('manageR.index') }}" class="nav-link text-white fw-bold">
                                <i class="bi bi-bell"></i>
                                Manage Request
                            </a>
                        </li>
                    @elseif (Auth::user()->role === '4' || Auth::user()->role === '5')
                        <li>
                            <a href="" class="nav-link text-white fw-bold">
                                <i class="bi bi-bell-fill me-1"></i>
                                Check Release
                            </a>
                        </li>
                    @elseif (Auth::user()->role === '6')
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link text-white fw-bold active"
                                aria-current="page">
                                <i class="bi bi-person-fill me-1"></i>
                                Manage Users
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('user.edit') }}" class="nav-link text-white fw-bold" aria-current="page">
                            <i class="bi bi-gear-fill me-1"></i>
                            Change Password
                        </a>
                    </li>
                    <hr>
                    <li>
                        @guest
                        @else
                            <a class="nav-link text-white fw-bold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left me-1"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="d-flex position-absolute" style="z-index:9999;right: 2%; margin-top: 1rem">
            @if (Session::has('alert'))
                <div class="alert alert-{{ explode('|', Session::get('alert'))[0] ?? 'info' }} alert-dismissible show"
                    role="alert">
                    <i class="fa fa-exclamation-triangle text-dark me-1" aria-hidden="true"></i>
                    <strong>{{ explode('|', Session::get('alert'))[1] }} !</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col p-0">
            @include('layouts.assets.navbar')
            <main>
                <div class="container mt-5 px-5 py-3">
                    @if (Auth::user()->role === '1')
                        <h2 class="text-center">Mayor</h2>
                    @elseif (Auth::user()->role === '2')
                        <h2 class="text-center">Budget</h2>
                    @elseif (Auth::user()->role === '3')
                        <h2 class="text-center">Accounting</h2>
                    @elseif (Auth::user()->role === '4')
                        <h2 class="text-center">Treasury</h2>
                    @elseif (Auth::user()->role === '5')
                        <h2 class="text-center"></h2>
                    @elseif (Auth::user()->role === '6')
                        <h2 class="text-center">Administrator</h2>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    </div>
</body>

</html>
