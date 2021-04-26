@extends('layouts.layouts')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">家計簿データ編集</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="list-style: none;">
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/books/{{ $book->id }}" class="mx-auto col-md-8 m-4">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>日付け</label>
                            <div class="form-inline">
                                <select id="year" name="year" class="form-control form-select-sm"
                                    aria-label=".form-select-sm example">
                                </select><label class="mx-1" for="year">年</label>
                                <select id="month" name="month" class="form-control form-select-sm"
                                    aria-label=".form-select-sm example">
                                </select><label class="mx-1" for="month">月</label>
                                <select id="date" name="date" class="form-control form-select-sm"
                                    aria-label=".form-select-sm example">
                                </select><label class="mx-1" for="date">日</label>
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
                                    <option value="{{ $key }}"
                                        {{ $book->category_id == $key ? 'selected' : '' }}>
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
                            <label class="form-inline">￥<input type="number" name="amount" id="product-name"
                                    class="form-control" value="{{ $book->amount }}"></label>
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

                        <form method="POST" action="/books/{{ $book->id }}/delete" style="display:inline;">
                            @csrf
                            <input type="hidden" name="delflag" value="1">
                            <button class="btn btn-dark" onclick="return confirm('ゴミ箱に移動しますか？');"><i
                                    class="fas fa-trash-alt"></i>ゴミ箱へ</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
