
@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">ゴミ箱</h3>
    <div class="table-responsive mt-5">
        <table class="table table-striped">
            <thead>
                <tr class="bg-gradient text-white rounded-top">
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
            @if($book->delflag == 1)
                <tr>
                    <td>{{ $book->year}}年{{$book->month}}月{{ $book->date }}日</td>
                    <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td>
                    <td>{{ $book->category->category_name }}</td>
                    <td>{{ $book->content }}</td>
                    <td>¥{{ number_format($book->amount) }}</td>
                    <td>
                        <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary btn-sm">詳細</a>
                    </td>
                    <td>
                        <form method="POST" action="/books/{{ $book->id }}/restore" style="display: inline;">
                            @csrf
                            <input type="hidden" name="delflag" value="0">
                            <button type="submit" class="btn btn-success btn-sm">復元する</button>
                        </form>
                    </td>
                    <td>
                        <div class="delete-area">
                            <form action="/books/{{ $book->id }}" method="POST" style="display:inline;"
                                onclick="return confirm('コチラで削除すると復元できなくなります。\n本当に削除しますか？');">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">削除</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>

@endsection
