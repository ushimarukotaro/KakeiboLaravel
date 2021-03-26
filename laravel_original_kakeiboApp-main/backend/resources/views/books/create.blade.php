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
                    @for($i=1;$i<=12;$i++)
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>日にち</label>
                {{-- <input type="number" name="date" class="form-control"> --}}
                <select class="form-control" name="date" style="width: 40%;">
                    @for($i=1;$i<=31;$i++)
                    <option value={{$i}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <div>
                    <label>収支区分</label>
                </div>
                <div class=" form-inline  btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-secondary">
                        <input type="radio" id="inout1" name="inout" autocomplete="off" value="1" style="display:none;" checked class="form-check-input">
                        収入
                    </label>
                    <label class="btn btn-outline-secondary">
                        <input type="radio" name="inout" id="inout2" autocomplete="off" value="2" style="display:none;" class="form-check-input">
                        支出
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>カテゴリー</label>
                <select class="form-control" style="width: 40%;" name="category">
                    <option value="1">光熱費</option>
                    <option value="2">家賃</option>
                    <option value="3">給料</option>
                    <option value="4">副業</option>
                    <option value="5">雑費</option>
                    <option value="6">食費</option>
                </select>
            </div>
            <div class="form-group">
                <label>内容</label>
                <input type="text" name="content" class="form-control" placeholder="弁当代、本代 etc...">
            </div>
            <div class="form-group">
                <label for="product-name">金額</label>
                <input type="number" name="amount" id="product-name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">送信</button>
        </form>
    </div>
@endsection
