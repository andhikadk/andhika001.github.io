@extends('layouts.main')

@section('container')

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h1 class="mb-3">{{ $post->title }}</h1>

        <p>By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

        @if ($post->image)
          <div style="max-height: 300px; overflow:hidden;" class="img-fluid">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
        @endif

        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>

        <a href="/posts" class="d-block mt-3">Back to Posts</a>
      </div>
    </div>
  </div>

@endsection