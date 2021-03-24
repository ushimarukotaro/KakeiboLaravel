<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index() {
        // bookテーブルに入っているデータを全部取ってくる
        $books = Book::all();

        // return view('books.index',compact('books'));
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book) {
        // ddd($book);
        return view('books.show', compact('book'));
        // return view('books.show',[
        //     // 'id' => $book->id,
        //     'book' => $book->id,
        // ]);
    }
}
