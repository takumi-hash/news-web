@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
            <div class="card">
                <div class="card-header">{{ __('debug info') }}</div>
                User id: {{ $user_id }}


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
            @foreach($bookmarks as $bookmark)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img class="img-fluid" src="{{ $bookmark['urlToImage'] }}" alt="{{ $bookmark['title'] }}">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title fs-6">{{ $bookmark['title'] }}</h5>
                                <p class="card-text text-end fs-6"><small class="text-muted">{{ $bookmark['publishedAt'] }} from {{ $bookmark['source'] }}</small></p>
                                <!-- p class="card-text fs-6">{{ $bookmark['description'] }}</p -->
                                <a href="{{ $bookmark['url'] }}" target="_blank" rel="noopener noreferrer" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endguest
        </div>
    </div>
</div>
@endsection
