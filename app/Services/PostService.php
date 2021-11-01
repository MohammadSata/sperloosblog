<?php

namespace App\Services;

use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class PostService
{
    public function create(User $user, array $data = []): ?Post
    {
        return $user->posts()->create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);
    }

    public function associatingImage(Post $post, UploadedFile $image): void
    {
        $post->addMedia($image)
            ->preservingOriginal()
            ->toMediaCollection('default', 'posts');
    }

    public function dissociateImage(Post $post): void
    {
        $post->clearMediaCollection('default');
    }

    public function store(User $user, PostRequest $request): ?Post
    {
        $post = $this->create($user, $request->only(['title', 'content']));
        $this->associatingImage($post, $request->image);

        return $post;
    }
}
