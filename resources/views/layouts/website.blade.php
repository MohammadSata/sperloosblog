@extends('layouts.app')
@section('navbar')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
                            Home
                        </a>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('admin.dashboard') }}">
                                            <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('login') }}">
                                            <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                            Sign In
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                            @can('create', \App\Models\Post::class)
                                <ul class="navbar-nav d-lg-block d-none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm mb-0 me-1 bg-gradient-dark">New Post</a>
                                    </li>
                                </ul>
                            @endcan
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
@endsection
