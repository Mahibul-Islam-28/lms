<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    function index()
    {
        $books = Book::all();

        return view('book.index')
                ->withBooks($books);
    }
    function create()
    {
        $authors = Author::all();

        return view('book.create')
                ->withAuthors($authors);
    }
    function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_date = $request->publishDate;
        $book->available_copies = $request->availableCopy;
        $book->total_copies = $request->totalCopy;
        $book->author_id = $request->authorID;
        $book->save();
        
        return redirect(route('book'))
                ->with('success','You created a new Book!');
    }
    
    function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();

        return view('book.edit')
                ->withBook($book)
                ->withAuthors($authors);
    }
    function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->published_date = $request->publishDate;
        $book->available_copies = $request->availableCopy;
        $book->total_copies = $request->totalCopy;
        $book->author_id = $request->authorID;
        $book->update();
        
        return redirect(route('book'))
                ->with('success','You updated a Book!');
        

    }
    function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        return redirect(route('book'))
                ->with('success','You Deleted a Book!');
    }
}
