<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    private function checkMyData(Book $book) {
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        // bookテーブルに入っているデータを全部取ってくる
        $books = Auth::user()->books;
        // $books = Book::all();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book) {
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }
        // $this->checkMyData($book);
        return view('books.show', compact('book'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {

        $book = new Book();
        $book->fill($request->all());
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('books.index', $book);
    }

    public function edit(Book $book) {
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }
        // $this->checkMyData($book);
        return view('books.edit',compact('book'));
    }

    public function update(Request $request,Book $book) {
        // $this->checkMyData($book);
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }

        $book->fill($request->all());

        $book->save();

        return redirect()->route('books.show', $book);

    }


    public function delete(Request $request, Book $book) {
        // $this->checkMyData($book);
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }

        $book->delflag = $request->input('delflag');
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book) {
        // $this->checkMyData($book);
        if($book->user_id != Auth::user()->id) {
            return redirect()->route('books.index');
        }

        $book->delete();

        return redirect()->route('books.index');
    }

    public function trash() {

        // bookテーブルに入っているデータを全部取ってくる
        // $books = Auth::user()->books;
        $books = Book::all();

        return view('books.trash', [
            'books' => $books,
        ]);
    }
}
