@extends('layouts.layouts')

@section('content')

<h3>家計簿詳細</h3>
<table class="table table-striped">
    <tr>
        <th>年月</th>
        <td>{{ $book->year }}年{{ $book->month }}月{{ $book->date }}日</td>
    </tr>
    <tr>
        <th>区分</th>
        <td>{{ $book->inout === 1 ? '収入' : '支出' }}</td>
    </tr>
    <tr>
        <th>カテゴリー</th>
        <td>{{ $book->category_id }}</td>
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

<a href="{{ route('books.index') }}" class="btn btn-primary">戻る</a>

@endsection
