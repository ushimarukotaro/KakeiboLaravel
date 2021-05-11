@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿</h3>
    @if (isset($_POST['year']) && isset($_POST['month']))
        <h5 class="text-center py-2">{{ $_POST['year'] }} 年 {{ $_POST['month'] }} 月 家計簿一覧</h5>
    @endif
    <div class="row index_font">
        <div class="col col-md-4 mt-4">
            <nav class="card">
                <div class="card-header bg-gradient text-light">月毎に表示</div>
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('books.monthly') }}" class="mx-auto">
                            @csrf
                            <div class="form-inline py-4" style="flex-flow: nowrap;">
                                @if (isset($_POST['year']))
                                    <select name="year" class="form-control form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="{{ date('Y') - 1 }}"
                                            {{ $_POST['year'] == date('Y') - 1 ? 'selected' : '' }}>{{ date('Y') - 1 }}
                                        </option>
                                        <option value="{{ date('Y') }}"
                                            {{ $_POST['year'] == date('Y') ? 'selected' : '' }}>{{ date('Y') }}
                                        </option>
                                    </select><label class="mx-1" for="year">年</label>
                                @else
                                    <select name="year" class="form-control form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="{{ date('Y') - 1 }}">{{ date('Y') - 1 }}</option>
                                        <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                                    </select><label class="mx-1" for="year">年</label>
                                @endif
                                @if (isset($_POST['month']))
                                    <select name="month" class="form-control form-select-sm"
                                        aria-label=".form-select-sm example">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                {{ isset($_POST['month']) && $i == $_POST['month'] ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label class="mx-1" for="month">月</label>
                                @else
                                    <select name="month" class="form-control form-select-sm"
                                        aria-label=".form-select-sm example">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ $i == date('m') ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label class="mx-1" for="month">月</label>
                                @endif
                                <button class="btn btn-outline-secondary btn-block">表示</button>
                            </div>
                    </div>
                    <a href="{{ route('books.create') }}" class="btn btn-outline-success btn-block">
                        <i class="fas fa-plus"></i>　新規作成
                    </a>
                    </form>
                </div>
            </nav>
            @if (isset($_POST['year']) && isset($_POST['month']))
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $_POST['year'] }}年{{ $_POST['month'] }}月の収支合計
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center p-4">
                                <div>収入計 :</div>
                                <div>¥ {{ number_format($inSum) }}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-4 mb-2">
                                <div>支出計 :</div>
                                <div style="color:red;">-  ¥ {{ number_format($outSum) }}</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>合計 :</div>
                                <div>¥ {{ number_format($inSum - $outSum) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="column col-md-8 mt-4 ml-auto">
            <div class="table-responsive card mb-3">
                @if (count($books) > 0)
                    <table id="books-table" class="card-table table table-striped tablesorter">
                        <thead>
                            <tr class="card-header bg-gradient text-white">
                                <th>日付</th>
                                <th>収支　</th>
                                <th>カテゴリ </th>
                                <th>内容</th>
                                <th>金額</th>
                                <th data-sorter="false"></th>
                                <th data-sorter="false"></th>
                                <th data-sorter="false"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->year }}/{{ $book->month }}/{{ $book->date }}</td>
                                    <td>{{ $book->inout == 1 ? '収入' : '支出' }}</td>
                                    <td>{{ $book->category->category_name }}</td>
                                    <td>{{ $book->content }}</td>
                                    <td style="{{ $book->inout == 1 ? '' : 'color:red;' }}">{{ $book->inout == 1 ? '+ ' : '- ' }}¥ {{ number_format($book->amount) }}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="my-4 text-center">
                        <p class="py-4">まだ作成された家計簿はありません</p>
                    </div>
                @endif
            </div>
            {!! $books->render() !!}
        </div>
    </div>
@endsection
