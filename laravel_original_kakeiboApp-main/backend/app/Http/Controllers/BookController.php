<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //
    public function index() {
        // bookテーブルに入っているデータを全部取ってくる
        $books = Book::all();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book) {
        // ddd($book);
        // return view('books.show', ['book' => $book->id]);
        return view('books.show', compact('book'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {

        $book = new Book();
        $book->fill($request->all());

        $book->save();

        return redirect()->route('books.show', $book);
    }

    public function edit(Book $book) {

        return view('books.edit',compact('book'));
    }

    public function update(Request $request,Book $book) {

        $book->fill($request->all());

        $book->save();

        return redirect()->route('books.show', $book);

    }

    public function destroy(Book $book) {
        $book->delete();

        return redirect()->route('books.index');
    }
}
