<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateBook;

class BookController extends Controller
{

    private function checkMyData(Book $book)
    {
        if ($book->user_id != Auth::user()->id) {
            abort(403);
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // bookテーブルに入っているデータを全部取ってくる
        $books = Book::query()->where('user_id', '=', Auth::user()->id)->where('delflag', '=', 0)->orderBy('id', 'desc')
            ->paginate(8);

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book)
    {
        $this->checkMyData($book);

        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(CreateBook $request)
    {

        $book = new Book();
        $book->fill($request->all());
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('books.index', $book);
    }

    public function edit(Book $book)
    {
        $this->checkMyData($book);
        return view('books.edit', compact('book'));
    }

    public function update(CreateBook $request, Book $book)
    {
        $this->checkMyData($book);

        $book->fill($request->all());

        $book->save();

        return redirect()->route('books.index');
    }


    public function delete(Request $request, Book $book)
    {
        $this->checkMyData($book);

        $book->delflag = $request->input('delflag');
        $book->save();

        return redirect()->route('books.index');
    }

    //　ゴミ箱から復元する
    public function restore(Request $request, Book $book)
    {
        $this->checkMyData($book);

        $book->delflag = $request->input('delflag');
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $this->checkMyData($book);

        $book->delete();

        return redirect()->route('books.index');
    }

    public function trash()
    {

        // bookテーブルに入っているデータを全部取ってくる
        $books = Book::query()->where('user_id', '=', Auth::user()->id)->where('delflag', '=', 1)->orderBy('id', 'desc')
            ->paginate(8);

        return view('books.trash', [
            'books' => $books,
        ]);
    }

    //　検索機能
    public function search(Request $request, Book $book)
    {

        //キーワード受け取り
        $keyword = $request->input('keyword');

        //クエリ生成
        $query = Book::query();

        //もしキーワードがあったら
        if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%')
                ->where('user_id', '=', Auth::user()->id)
                ->where('delflag', '=', 0);
        }
        //ページネーション
        $books = $query->orderBy('id', 'desc')->paginate(8);
        return view('books.search')->with('books', $books)->with('keyword', $keyword);
    }


    public function monthly(Request $request, Book $book)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $books = Book::query()->where('user_id', '=', Auth::user()->id)
            ->where('year', '=', $year)->where('month', '=', $month)
            ->where('delflag', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(8);

        $inSum = Book::where('inout', 1)->where('user_id', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->where('delflag', 0)->sum('amount');
        $outSum = Book::where('inout', 2)->where('user_id', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->where('delflag', 0)->sum('amount');

        return view('books.index', [
            'books' => $books,
        ])->with([
            'inSum' => $inSum,
            'outSum' => $outSum,
        ]);
    }
}
