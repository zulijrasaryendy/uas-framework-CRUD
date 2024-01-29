@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Article</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/articles/{{ $article ->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title',$article->title) }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
         
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror"  id="slug" name="slug" required value="{{ old('slug',$article->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if(old('category_id',$article->category_id) == $category -> id)
                        <option value="{{ $category->id }}"selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endForeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Article image</label>
                @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" class="img-preview img-fluid mb-3 d-block" alt="">
                @else
                <img class="img-preview img-fluid mb-3" alt="">
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="formFile" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <p class="text-danger" >{{ $message }}</p>
                @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body',$article->body) }}">
                    <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage (){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
