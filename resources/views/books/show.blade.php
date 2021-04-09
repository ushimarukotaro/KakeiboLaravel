@extends('layouts.layouts')

@section('content')

    <h3>家計簿詳細</h3>
    <table class="table table-striped col-md-10 mx-auto my-5 show-table">
        <tr>
            <th class="th">年月</th>
            <td>{{ $book->year }} 年 {{$book->month}} 月 {{ $book->date }} 日</td>
        </tr>
        <tr>
            <th>区分</th>
            <td>{{ $book->inout === 1 ? '収入' : '支出' }}</td>
        </tr>
        <tr>
            <th>カテゴリー</th>
            <td>{{ $book->category->category_name }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td>{{ $book->content }}</td>
        </tr>
        <tr>
            <th>金額</th>
            <td>¥{{ number_format($book->amount) }}</td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>{{ $book->memo }}</td>
        </tr>
    </table>
    <div class="button-area">
        <div class="row">
            <a href="{{ route('books.index') }}" class="btn btn-primary mr-4">戻る</a>
            <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-success">編集</a>
        </div>
        <div class="delete-area">
            <form method="POST" action="/books/{{ $book->id }}/delete" style="display:inline;">
                @csrf
                <input type="hidden" name="delflag" value="1">
                <button class="btn btn-dark" onclick="return confirm('ゴミ箱に移動しますか？');"><i class="fas fa-trash-alt"></i>ゴミ箱へ</button>
            </form>
        </div>
    </div>

@endsection
