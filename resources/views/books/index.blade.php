@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿</h3>
    {{-- <a href="{{ route('books.create') }}" class="btn btn-success">＋ 登録</a> --}}
    <div class="row">
        <div class="col col-md-3 mt-4">
            <nav class="card">
                <div class="card-header bg-gradient text-light">月毎に表示</div>
                <div class="card-body">
                    <a href="{{ route('books.create') }}" class="btn btn-light btn-block">
                        <i class="fas fa-plus"></i>　新規作成
                    </a>
                </div>
                <div class="list-group">
                    @foreach ($books as $book)
                    <a href="{{ route('books.index') }}" class="list-group-item">
                        {{ $book->year }}年{{$book->month}}月
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="column col-md-8 mt-4 ml-auto">
            <div class="table-responsive card">
                {{-- @if (isset($books)) --}}
                <table class="card-table table table-striped">
                    <thead>
                        <tr class="card-header bg-gradient text-white">
                            <th>日付</th>
                            {{-- <th>区分</th> --}}
                            <th>カテゴリ</th>
                            <th>内容</th>
                            <th>金額</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($books as $book)
                        @if ($book->delflag == 0)
                            <tr>
                                <td>{{ $book->year }}/{{ $book->month }}/{{$book->date}}</td>
                                {{-- <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td> --}}
                                <td>{{ $book->category->category_name }}</td>
                                <td>{{ $book->content }}</td>
                                <td>¥{{ number_format($book->amount) }}</td>
                                <td>
                                    <a href="{{ route('books.show', ['book' => $book->id]) }}"
                                        class="btn btn-primary btn-sm">詳細</a>
                                </td>
                                <td>
                                    <a href="{{ route('books.edit', ['book' => $book->id]) }}"
                                        class="btn btn-success btn-sm">編集</a>
                                </td>
                                <td>
                                    <form method="POST" action="/books/{{ $book->id }}/delete" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="delflag" value="1">
                                        <button class="btn btn-secondary btn-sm" onclick="return confirm('ゴミ箱に移動しますか？');"><i
                                                class="fas fa-trash-alt"></i></button>
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
        </div>
    </div>
@endsection
