@extends('layouts.master')

@section('title', 'Loans')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>List of Loans</h3>
                <p class="text-subtitle text-muted">List of Loans</p>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <a href="{{ route('libr.loans.create') }}">
            <div class="btn btn-primary">Add New Loans</div>
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
                Loans
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Book</th>
                            <th>Loan Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                        <tr>
                            <td>{{ $loan->member->name ?? '-' }}</td>
                            <td>{{ $loan->book->title ?? '-' }}</td>
                            <td>{{ $loan->loan_at ? $loan->loan_at->format('Y-m-d H:i') : '-' }}</td>
                            <td>{{ $loan->returned_at ? $loan->returned_at->format('Y-m-d H:i') : '-' }}</td>
                            <td>
                                @if($loan->returned_at)
                                <span class="badge bg-success">Returned</span>
                                @else
                                <span class="badge bg-warning">On Loan</span>
                                @endif
                            </td>
                            <td>{{ $loan->note ?? '-' }}</td>
                            <td>
                                @if (!$loan->returned_at)
                                <a href="{{ route('libr.loans.edit', $loan->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No loans found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection