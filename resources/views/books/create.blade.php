@extends('layouts.layouts')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">家計簿データ新規作成</div>
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
                    <form method="POST" action="/books" class="mx-auto col-md-8 mt-4">
                        @csrf
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
                            <div class="form-inline btn-group btn-group-toggle" date-toggle="buttons">
                                <label class="mr-4">
                                    <input type="radio" id="option1" name="inout" autocomplete="off" aria-pressed="false"
                                        value="1" checked class="form-check-input">
                                    収入
                                </label>
                                <label class="">
                                    <input type="radio" name="inout" id="option2" autocomplete="off" aria-pressed="false"
                                        value="2" class="form-check-input">
                                    支出
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>カテゴリー</label>
                            <select class="form-control" style="width: 40%;" name="category_id">
                                <option selected disabled>----</option>
                                @foreach (App\Models\Category::$categories as $key => $category)
                                    <option value="{{ $key }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>内容</label>
                            <input type="text" name="content" value="{{ old('content') }}" class="form-control @error('content') is-invalid @enderror">
                        </div>
                        <div class="form-group mb-5">
                            <label for="product-name">金額</label>
                            <label class="form-inline">￥<input type="number" name="amount" value="{{ old('amount') }}" id="product-name"
                                    class="form-control @error('amount') is-invalid @enderror"></label>
                        </div>
                        <div class="form-group mb-5">
                            <label>メモ</label>
                            <input type="text" name="memo" value="{{ old('memo') }}" class="form-control @error('memo') is-invalid @enderror">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary btn mr-5">送信</button>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
