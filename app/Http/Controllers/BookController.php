<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         
        $query = Book::where('user_id', auth()->id());
        if($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $books = $query->latest()->paginate(5);

        $finishedCount = Book::where('user_id', auth()->id())
            ->where('status','finished')
            ->whereMonth('finished_at', now()->month)
            ->count();
            return view('books.index',compact('books','finishedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:unread,reading,finished',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);
        Book::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'author' => $request->author,
            'status' => $request->status,
            'rating' => $request->rating,
            'memo' => $request->memo,
            'started_at' => $request->started_at,
            'finished_at' => $request->finished_at,
        ]);
        return redirect()->route('books.index')->with('success','本を登録しました');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(Book $book)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $this->authorizeBook($book);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->authorizeBook($book);

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:unread,reading,finished',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success','更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->authorizeBook($book);
        $book->delete();
        return back()->with('success','削除しました');
    }
    private function authorizeBook(Book $book) 
    {
        if($book->user_id !== auth()->id()) {
            abort(403);
        }
    }

    
}
