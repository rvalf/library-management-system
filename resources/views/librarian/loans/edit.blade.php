@extends('layouts.master')

@section('title', 'Edit Loan')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Loan</h3>
                <p class="text-subtitle text-muted">Update loan note</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('libr.loans.update', $loan->id) }}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- Book (read only) --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Book</label>
                                <input type="text" class="form-control" value="{{ $loan->book->title }}" readonly>
                            </div>
                        </div>

                        {{-- Member (read only) --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Member</label>
                                <input type="text" class="form-control" value="{{ $loan->member->name }}" readonly>
                            </div>
                        </div>

                        {{-- Note (editable) --}}
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="note">Note <span class="text-danger">*</span></label>
                                <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" required>{{ old('note', $loan->note) }}</textarea>
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary me-1">Update</button>
                            <a href="{{ route('libr.loans.index') }}" class="btn btn-light-secondary">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
