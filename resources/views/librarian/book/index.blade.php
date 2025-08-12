@extends('layouts.master')

@section('title', 'Users')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Books</h3>
                <p class="text-subtitle text-muted">List books</p>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('libr.books.create') }}">
            <div class="btn btn-primary">Add New Book</div>
        </a>
    </div>
    <section class="section">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                Books
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Category</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->authors }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                @if ($book->categories->count())
                                {{ $book->categories->pluck('name')->join(', ') }}
                                @else
                                <span class="text-muted">No category</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('libr.books.edit', $book->id) }}" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('libr.books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this Book?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection