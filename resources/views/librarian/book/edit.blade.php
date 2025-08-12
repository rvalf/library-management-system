@extends('layouts.master')

@section('title', 'Book')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Book</h3>
                <p class="text-subtitle text-muted">Update book details</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('libr.books.update', $book->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="title">Book Title<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $book->title) }}"
                                    placeholder="Book Title">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Author --}}
                            <div class="form-group">
                                <label for="authors">Author<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('authors') is-invalid @enderror"
                                    id="authors"
                                    name="authors"
                                    value="{{ old('authors', $book->authors) }}"
                                    placeholder="Author">
                                @error('authors')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ISBN --}}
                            <div class="form-group">
                                <label for="isbn">ISBN<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('isbn') is-invalid @enderror"
                                    id="isbn"
                                    name="isbn"
                                    value="{{ old('isbn', $book->isbn) }}"
                                    placeholder="ISBN">
                                @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            {{-- Category - Multiple --}}
                            <div class="form-group">
                                <label for="category">Category<span class="text-danger">*</span></label>
                                <select class="choices form-select @error('category') is-invalid @enderror"
                                    multiple="multiple"
                                    id="category"
                                    name="category[]">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if( (is_array(old('category')) && in_array($category->id, old('category'))) ||
                                            (!old('category') && $book->categories->contains($category->id)) )
                                            selected
                                        @endif>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                @error('category.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                >{{ old('description', $book->description) }}</textarea>
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                            <a href="{{ route('libr.books.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/vendors/choices.js/choices.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('mazer/vendors/choices.js/choices.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Choices('#category', {
            removeItemButton: true,
        });
    });
</script>
@endpush
