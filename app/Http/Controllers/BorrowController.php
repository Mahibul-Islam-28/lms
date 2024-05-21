<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowdBook;
use App\Models\Book;
use App\Models\Member;

class BorrowController extends Controller
{
    function index()
    {
        $borrows = BorrowdBook::all();

        return view('borrow.index')
                ->withBorrows($borrows);
    }
    function create()
    {
        $books = Book::all();
        $members = Member::all();

        return view('borrow.create')
                ->withBooks($books)
                ->withMembers($members);
    }
    function store(Request $request)
    {
        $borrow = new BorrowdBook;
        $borrow->member_id = $request->memberID;
        $borrow->book_id = $request->bookID;
        $borrow->borrow_date = $request->borrowDate;
        $borrow->return_date = $request->returnDate;
        $borrow->status = $request->status;
        $borrow->save();
        
        return redirect(route('borrow'))
                ->with('success','You created a new Borrow!');
    }
    
    function edit($id)
    {
        $borrow = BorrowdBook::find($id);
        $books = Book::all();
        $members = Member::all();

        return view('borrow.edit')
                ->withBorrow($borrow)
                ->withBooks($books)
                ->withMembers($members);
    }
    function update(Request $request, $id)
    {
        $borrow = BorrowdBook::find($id);

        $borrow->member_id = $request->memberID;
        $borrow->book_id = $request->bookID;
        $borrow->borrow_date = $request->borrowDate;
        $borrow->return_date = $request->returnDate;
        $borrow->status = $request->status;
        $borrow->update();
        
        return redirect(route('borrow'))
                ->with('success','You updated a Borrow!');
        

    }
    function delete($id)
    {
        $borrow = BorrowdBook::find($id);
        $borrow->delete();
        
        return redirect(route('borrow'))
                ->with('success','You Deleted a Borrow!');
    }
}
