@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="table-responsive col-lg-6">

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-sm bg-info text-white"><i class="bi bi-eye"></i></a>
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-sm bg-warning text-white"><i class="bi bi-pencil-square"></i></a>
              <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm bg-danger text-white" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection