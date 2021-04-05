
@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿</h3>
    <a href="{{ route('books.create') }}" class="btn btn-success">＋ 登録</a>
    <div class="table-responsive">
        {{-- @if(isset($books)) --}}
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
            @if($book->delflag == 0)
                <tr>
                    <td>{{ $book->year }}年{{ $book->month }}月{{ $book->date }}日</td>
                    <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td>
                    <td>{{ $book->category_id }}</td>
                    <td>{{ $book->content }}</td>
                    <td>¥{{ number_format($book->amount) }}</td>
                    <td>
                        <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary btn-sm">詳細</a>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-success btn-sm">編集</a>
                    </td>
                    <td>
                        <form method="POST" action="/books/{{ $book->id }}/delete" style="display: inline;">
                            @csrf
                            <input type="hidden" name="delflag" value="1">
                            <button class="btn btn-light btn-sm" onclick="return confirm('ゴミ箱に移動しますか？');"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </table>
        {{-- @else
        <p>まだ作成された家計簿はありません</p>
        @endif --}}
    </div>
@endsection
