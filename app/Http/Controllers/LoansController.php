<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function index()
    {
        $loans = Loans::with(['member', 'book', 'librarian'])
            ->orderByRaw('returned_at IS NOT NULL, loan_at DESC')
            ->get();

        return view('librarian.loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        $members = User::where('role', 'member')->get();

        return view('librarian.loans.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:users,id',
            'note' => 'nullable|string'
        ]);

        Loans::create([
            'book_id' => $validated['book_id'],
            'member_id' => $validated['member_id'],
            'librarian_id' => auth()->id(),
            'loan_at' => now(),
            'note' => $validated['note'] ?? null,
        ]);

        return redirect()->route('libr.loans.index')
            ->with('success', 'Loan created successfully.');
    }

    public function edit($id)
    {
        $loan = Loans::with(['member', 'book', 'librarian'])->findOrFail($id);

        return view('librarian.loans.edit', compact('loan'));
    }

    public function update(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);

        $validated = $request->validate([
            'note' => 'string|max:255',
        ]);

        $loan->note = $validated['note'] ?? $loan->note;
        $loan->returned_at = now();

        $loan->save();

        return redirect()->route('libr.loans.index')
            ->with('success', 'Loan updated successfully.');
    }
}
