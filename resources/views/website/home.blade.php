@extends('layouts.website')
@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-color: black;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto ">
                <div class="row" style="margin-top: 100px">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mx-auto px-5 lg:max-w-screen-sm">
                                @foreach($posts as $post)
                                    <a class="no-underline transition block border border-lighter w-full mb-10 p-5 rounded post-card" href="{{ route('post', $post->id) }}">
                                        <div class="block h-post-card-image bg-cover bg-center bg-no-repeat w-full h-48 mb-5"
                                             style="background-image: url('{{ $post->getMedia()->first()->getUrl() }}')">
                                        </div>
                                        <div class="flex flex-col justify-between flex-1">
                                            <div>
                                                <h2 class="font-sans leading-normal block mb-6">
                                                    {{ $post->title }}
                                                </h2>

                                                <p class="leading-normal mb-6 font-serif leading-loose">
                                                    {!! Str::of($post->content)->words(25) !!}
                                                </p>
                                            </div>

                                            <div class="flex items-center text-sm text-dark">
                                                <span class="ml-2">{{ optional($post->user)->name }}</span>
                                                <span class="ml-auto">{{ $post->updated_at->format('Y/m/d') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="uppercase flex items-center justify-center flex-1 py-5 font-sans">
                                @if(!$posts->onFirstPage())
                                    <a href="{{ $posts->previousPageUrl() }}" rel="next" class="block no-underline text-dark hover:text-black px-5">More Recent Articles</a>
                                @endif
                                @if($posts->hasMorePages())
                                    <a href="{{ $posts->nextPageUrl() }}" rel="next" class="block no-underline text-dark hover:text-black px-5">Check More Articles</a>
                                @endif

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
