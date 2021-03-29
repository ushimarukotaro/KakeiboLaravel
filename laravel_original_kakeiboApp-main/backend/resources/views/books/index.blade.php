@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿</h3>
    <a href="{{ route('books.create') }}" class="btn btn-success">＋ 登録</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-primary">
                    <th>日付</th>
                    <th>区分</th>
                    <th>カテゴリ</th>
                    <th>内容</th>
                    <th>金額</th>
                    <th></th>
                    <th></th>
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
                    <td><a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-outline-primary btn-sm">詳細</a>
                    </td>
                    <td><a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-success btn-sm">編集</a>
                    </td>
                    <td>
                        <form action="/books/{{ $book->id }}" method="POST" style="display:inline;"
                            onclick="return confirm('本当に削除しますか？');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
