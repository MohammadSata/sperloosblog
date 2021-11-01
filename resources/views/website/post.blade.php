@extends('layouts.website')
@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-color: black;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto ">
                <div class="row" style="margin-top: 100px">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mx-auto px-5 lg:max-w-screen-sm mt-20">
                                <h1 class="mb-5 font-sans">{{ $post->title }}</h1>

                                <div class="flex items-center text-sm text-dark">
                                    <span>{{ $post->updated_at->format('Y-m-d') }}</span>
                                    —
                                    <a href="#" class="text-muted">#{{ $post->user->name }}</a>
                                </div>

                                <div class="mt-5 leading-loose flex flex-col justify-center items-center post-body font-serif">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('css')
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
@endsection
