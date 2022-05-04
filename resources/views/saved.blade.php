@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Library</h1>
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
            <bookmark-search-component></bookmark-search-component>
            @include('components.bookmarks', ['bookmarks' => $bookmarks])
            @endguest
        </div>
    </div>
</div>
@endsection
