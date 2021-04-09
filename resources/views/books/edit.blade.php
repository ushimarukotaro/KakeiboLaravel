@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿データ編集</h3>
    <div class="row">
        <form method="POST" action="/books/{{ $book->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label>日付け</label>
                <div class="form-inline">
                    {{-- <select id="year" name="year" class="form-control form-select-sm" aria-label=".form-select-sm example">
                    </select><label class="mx-1" for="year">年</label>
                    <select id="month" name="month" class="form-control form-select-sm" aria-label=".form-select-sm example">
                    </select><label class="mx-1" for="month">月</label>
                    <select id="date" name="date" class="form-control form-select-sm" aria-label=".form-select-sm example">
                    </select><label class="mx-1" for="date">日</label> --}}
                    <input type="text" name="year" class="form-control mx-1 col-md-2" value="{{$book->year}}" maxlength="4" oninput="value = value.replace(/[^0-9]+/i,'');" />年
                    <input type="text" name="month" class="form-control mx-1 col-md-2" value="{{$book->month}}" maxlength="2" oninput="value = value.replace(/[^0-9]+/i,'');" />月
                    <input type="text" name="date" class="form-control mx-1 col-md-2" value="{{$book->date}}" maxlength="2" oninput="value = value.replace(/[^0-9]+/i,'');" />日
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label>収支区分</label>
                </div>
                <div class="form-inline  btn-group">
                    <label class="mr-4">
                        <input type="radio" name="inout" value="1" class="form-check-input"
                            {{ $book->inout == 1 ? 'checked' : '' }}>
                        収入
                    </label>
                    <label>
                        <input type="radio" name="inout" value="2" class="form-check-input"
                            {{ $book->inout == 2 ? 'checked' : '' }}>
                        支出
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>カテゴリー</label>
                <select class="form-control" style="width: 40%;" name="category_id">
                    <option selected disabled>----</option>
                    @foreach (App\Models\Category::$categories as $key => $category)
                        <option value="{{ $key }}" {{ $book->category_id == $key ? 'selected' : '' }}>
                            {{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>内容</label>
                <input type="text" name="content" class="form-control" value="{{ $book->content }}">
            </div>
            <div class="form-group mb-5">
                <label for="product-name">金額</label>
                <label class="form-inline">￥<input type="number" name="amount" id="product-name" class="form-control" value="{{ $book->amount }}"></label>
            </div>
            <div class="form-group mb-5">
                <label>メモ</label>
                <input type="text" name="memo" class="form-control" value="{{ $book->memo }}">
            </div>
            <div class="button-area">
                <button type="submit" class="btn btn-primary btn mr-5">送信</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">戻る</a>
        </form>
        <div class="delete-area">
            <form action="/books/{{ $book->id }}" method="POST" style="display:inline;"
                onclick="return confirm('コチラで削除すると復元できなくなります。\n本当に削除しますか？');">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger">削除</button>
            </form>
        </div>
    </div>
    </div>
@endsection
