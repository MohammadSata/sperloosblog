@extends('layouts.admin')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('shared.messages')
            <div class="row mt-4">
                <div class="col-lg-9 col-12 mx-auto position-relative">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                                <i class="material-icons opacity-10">event</i>
                            </div>
                            <h6 class="mb-0">Edit post</h6>
                        </div>
                        <div class="card-body pt-2">
                            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="input-group input-group-dynamic">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                                </div>
                                <label class="mt-4">Content</label>
                                <div id="editor">
                                    {!! old('content', $post->content) !!}
                                </div>
                                <input name="content" id="quill_content" type="hidden" value=""/>
                                <label class="mt-4">Image</label><br>
                                <p class="form-text text-muted ms-1">
                                    Enter this field if you want to change the photo.
                                </p>
                                <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                                <div class="row">
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" name="btn-submit" id="btn-submit" class="btn bg-gradient-dark m-0 ms-2">Update post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('css')
    <link href="{{ asset('assets/css/quill.snow.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/quill.min.js') }}"></script>
    <script type="text/javascript">
        if (document.getElementById('editor')) {
            var quill = new Quill('#editor', {
                theme: 'snow',
                name: 'content'
            });
            document.getElementById('quill_content').value = quill.container.firstChild.innerHTML;
            quill.on('text-change', function(delta, oldDelta, source) {
                document.getElementById('quill_content').value = quill.container.firstChild.innerHTML;
            });
        }
    </script>
@endsection
