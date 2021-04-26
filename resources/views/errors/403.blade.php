@extends('layouts.layouts')

@section('content')

    <div class="row">
        <div class="col">
            <div class="text-center mt-2">
                <img src="/images/index.png" alt="" class="image">
                <p class="mt-4 py-4">お探しのページにアクセスする権限がありません。</p>
                <a href="{{ route('books.index') }}" class="btn btn-link">
                    ホームへ戻る
                </a>
            </div>
        </div>
    </div>

@endsection
