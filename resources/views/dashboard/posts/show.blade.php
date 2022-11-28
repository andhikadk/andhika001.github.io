@extends('dashboard.layouts.main')

@section('container')
  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        <h1 class="mb-3">{{ $post->title }}</h1>

        <a href="/dashboard/posts" class="btn btn-success"> <i class="bi bi-arrow-left"></i> Back to all my posts</a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"> Edit</i></a>
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn bg-danger text-white" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg"></i> Delete</button>
        </form>

        @if ($post->image)
          <div style="max-height: 300px; overflow:hidden;" class="img-fluid mt-3">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          </div>
        @else
          <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
        @endif

        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>
      </div>
    </div>
  </div>
@endsection