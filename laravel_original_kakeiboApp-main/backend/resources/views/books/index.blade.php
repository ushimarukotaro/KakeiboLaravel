@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="info">
                    <th>日付</th>
                    <th>区分</th>
                    <th>カテゴリ</th>
                    <th>内容</th>
                    <th>金額</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->year }}年{{ $book->month }}月{{ $book->date }}日</td>
                    <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td>
                    <td>{{ $book->category_id }}</td>
                    <td>{{ $book->content }}</td>
                    <td>¥{{ number_format($book->amount) }}</td>
                    <td><a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary btn-sm">詳細</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

