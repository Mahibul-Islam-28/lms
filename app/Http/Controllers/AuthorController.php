<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    function index()
    {
        $authors = Author::all();

        return view('author.index')
                ->withAuthors($authors);
    }
    function create()
    {
        return view('author.create');
    }
    function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->save();
        
        return redirect(route('author'))
                ->with('success','You created a new Author!');
    }
    
    function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit')
                ->withAuthor($author);
    }
    function update(Request $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->name;
        $author->bio = $request->bio;
        $author->update();
        
        return redirect(route('author'))
                ->with('success','You updated a Author!');
        

    }
    function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        
        return redirect(route('author'))
                ->with('success','You Deleted a Author!');
    }
}
