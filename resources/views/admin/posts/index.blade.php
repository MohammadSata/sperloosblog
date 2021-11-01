@extends('layouts.admin')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('shared.messages')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="text-white text-capitalize ps-3">Posts</h6>
                                    </div>
                                    @can('create', \App\Models\Post::class)
                                        <div class="col-6 text-end">
                                            <a href="{{ route('admin.posts.create') }}" class="btn btn-sm mb-0 me-1 bg-gradient-dark">New Post</a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $post->getMedia()->first()->getUrl('thumbnail') }}" class="avatar avatar-sm me-3 border-radius-lg">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ Str::of($post->title)->words(5) }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ Str::of($post->content)->words(10) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $post->created_at->format('Y/m/d H:i') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $post->updated_at->format('Y/m/d H:i') }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.posts.show', $post->id) }}" class="text-secondary font-weight-bold text-xs">
                                                    View
                                                </a>
                                                @can('update', $post)
                                                    | <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-secondary font-weight-bold text-xs">
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('delete', $post)
                                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
