@extends('layouts.layouts')

@section('content')
    <h3 class="text-center">家計簿データ新規作成</h3>
    <div class="row">
        <form method="POST" action="/books">
            @csrf
            <div class="form-group">
                <label>年度</label>
                <input type="number" name="year" class="form-control">
            </div>
            <div class="form-group">
                <label>月</label>
                <select class="form-control" name="month" style="width: 40%;">
                    <option selected disabled>--</option>
                    @for($i=1;$i<=12;$i++)
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>日にち</label>
                {{-- <input type="number" name="date" class="form-control"> --}}
                <select class="form-control" name="date" style="width: 40%;">
                    <option selected disabled>--</option>
                    @for($i=1;$i<=31;$i++)
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label>収支区分</label>
                </div>
                <div class=" form-inline  btn-group">
                    <label class="mr-4">
                        <input type="radio" id="inout1" name="inout" autocomplete="off" value="1" checked class="form-check-input">
                        収入
                    </label>
                    <label>
                        <input type="radio" name="inout" id="inout2" autocomplete="off" value="2" class="form-check-input">
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
                <input type="text" name="content" class="form-control">
            </div>
            <div class="form-group mb-5">
                <label for="product-name">金額</label>
                <input type="number" name="amount" id="product-name" class="form-control">
            </div>
            <div class="form-group mb-5">
                <label>メモ</label>
                <input type="text" name="memo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn mr-5">送信</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">戻る</a>
        </form>
    </div>
@endsection
