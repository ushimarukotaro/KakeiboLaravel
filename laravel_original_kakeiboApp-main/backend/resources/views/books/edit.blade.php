@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿データ編集</h3>
    <div class="row">
        <form method="POST" action="/books/{{ $book->id }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>年度</label>
                <input type="number" name="year" class="form-control" value="{{ $book->year }}">
            </div>
            <div class="form-group">
                <label>月</label>
                <select class="form-control" name="month" style="width: 40%;">
                    <option selected disabled>--</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value={{ $i }} {{ $book->month == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>日にち</label>
                {{-- <input type="number" name="date" class="form-control"> --}}
                <select class="form-control" name="date" style="width: 40%;">
                    <option selected disabled>--</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value={{ $i }} {{ $book->date == $i ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label>収支区分</label>
                </div>
                <div class=" form-inline  btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="mr-4">
                        <input type="radio" id="inout1" name="inout"  value="1" class="form-check-input"
                            {{ $book->inout == 1 ? 'checked' : '' }}>
                        収入
                    </label>
                    <label>
                        <input type="radio" name="inout" id="inout2"  value="2" class="form-check-input"
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
                        <option value="{{ $book->category_id }}" {{ $book->category_id == $key ? 'selected' : '' }}>
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
                <input type="number" name="amount" id="product-name" class="form-control" value="{{ $book->amount }}">
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
