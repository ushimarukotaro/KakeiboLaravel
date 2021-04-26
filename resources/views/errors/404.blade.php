@extends('layouts.layouts')

@section('content')
    <div class="row">
        <div class="col">
            <div class="text-center mt-2">
                <img src="/images/index.png" alt="" class="image">
                <p class="py-4 mt-4">お探しのページは見つかりませんでした。</p>
                <a href="{{ route('books.index') }}" class="btn btn-link">
                    ホームへ戻る
                </a>
            </div>
        </div>
    </div>
@endsection
