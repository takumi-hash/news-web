@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            @endauth
            <h1>Saved News</h1>
            <p>あなたが保存したニュースが表示されます。</p>
            @guest
            <p>保存したニュースを表示するにはまずは
                @if (Route::has('login'))
                    <a class="" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                @endif
                @if (Route::has('register'))
                    <!-- 会員登録 -->
                @endif
                してください。</p>
            @else
            @endguest
        </div>
    </div>
</div>
@endsection
