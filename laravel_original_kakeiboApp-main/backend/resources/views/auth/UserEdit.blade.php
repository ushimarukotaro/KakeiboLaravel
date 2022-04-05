@extends('layouts.layouts')
@section('content')

    <body>




        <div class="text-center mb-4">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">ユーザー設定</div>
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
                            {{-- <form method="POST" action="/user/edit/name">
                                @csrf
                                <div class="form-group row mt-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名変更</label>
                                    <div class="col-md-6">
                                        <input id="name" name="Name" value="{{ $auth['name'] }}"
                                            class="form-control @error('Name') is-invalid @enderror">
                                    </div>
                                </div>
                                <input type="hidden" name="UserId" value={{ $auth['id'] }}>
                                <button dusk="view-button" class="btn btn-primary">ユーザー名変更</button>
                            </form> --}}
                            <form method="POST" action="/user/edit/email">
                                @csrf
                                <div class="form-group row mt-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">email変更</label>
                                    <div class="col-md-6">
                                        <input id="email" name="Email" value="{{ $auth['email'] }}"
                                            class="form-control @error('Email') is-invalid @enderror">
                                    </div>
                                    <input type="hidden" name="UserId" value={{ $auth['id'] }}>
                                    <button dusk="view-button" class="btn btn-primary">更新</button>
                                </div>

                            </form>

                            <form method="POST" action="/user/edit/password">
                                @csrf
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">現在のパスワードを入力</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="CurrentPassword"
                                            class="form-control @error('CurrentPassword') is-invalid @enderror">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">新規パスワードを入力</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="newPassword"
                                            class="form-control @error('password') is-invalid @enderror" name="newPassword">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">新規パスワードを再入力</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" name="newPassword_confirmation"
                                            class="form-control @error('newPassword') is-invalid @enderror"
                                            name="newPassword">
                                    </div>
                                    <input type="hidden" name="UserId" value={{ $auth['id'] }}>
                                    <button dusk="view-button" class="btn btn-primary">更新</button>
                                </div>
                            </form>
                            <form method="GET" action="/user/edit/delete">
                                <br>
                                <button class="btn btn-light button_font_variable_length_withdrawal">退会はコチラ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
@endsection
