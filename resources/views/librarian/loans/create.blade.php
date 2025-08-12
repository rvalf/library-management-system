@extends('layouts.master')

@section('title', 'Loans')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add New Loan</h3>
                <p class="text-subtitle text-muted">Loans</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('libr.loans.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Book --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="book_id">Book <span class="text-danger">*</span></label>
                                <select 
                                    name="book_id" 
                                    id="book_id" 
                                    class="form-control @error('book_id') is-invalid @enderror">
                                    <option value="">-- Select Book --</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Member --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="member_id">Member <span class="text-danger">*</span></label>
                                <select 
                                    name="member_id" 
                                    id="member_id" 
                                    class="form-control @error('member_id') is-invalid @enderror">
                                    <option value="">-- Select Member --</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                            {{ $member->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('member_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Note --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea 
                                    name="note" 
                                    id="note" 
                                    class="form-control @error('note') is-invalid @enderror" 
                                    rows="3">{{ old('note') }}</textarea>
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection