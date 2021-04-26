@extends('layouts.layouts')
@section('content')
    <h3 class="text-center">検索結果</h3>
    <div class="row">

        <div class="column col-md-10 mt-4 mx-auto">
            {{-- {!! $books->render() !!} --}}
            {!! $books->appends(['keyword' => $keyword])->render() !!}
            <div class="table-responsive card">
                <div class="card-header">
                    検索ワード　：　<span
                        style="{{ $keyword ? '' : 'color:red;' }}">{{ $keyword ? $keyword : '検索ワードが空です！' }}</span>
                </div>
                @if ($keyword != '')

                    <table id="books-table" class="card-table table table-striped tablesorter">
                        <thead>
                            <tr class="card-header bg-gradient text-white">
                                <th>日付</th>
                                <th>区分</th>
                                <th>カテゴリ</th>
                                <th>内容</th>
                                <th>金額</th>
                                <th data-sorter="false"></th>
                                <th data-sorter="false"></th>
                                <th data-sorter="false"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($books as $book)
                                @if ($book->delflag == 0)
                                    <tr>
                                        <td>{{ $book->year }}年{{ $book->month }}月{{ $book->date }}日</td>
                                        <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td>
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
                                            <form method="POST" action="/books/{{ $book->id }}/delete"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="delflag" value="1">
                                                <button class="btn btn-secondary btn-sm"
                                                    onclick="return confirm('ゴミ箱に移動しますか？');"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center py-4">検索ワードを入力してください</p>
                @endif
            </div>
        </div>
    </div>
@endsection
