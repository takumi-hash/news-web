@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Interests</h1>
            <ul>
                @foreach($interests as $interest)
                    <li>{{ $interest->text }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <h1>あなたが興味を持ちそうなWikipediaの記事</h1>
            @include('components.news', ['items' => $news])
        </div>
        <div class="col-md-8">
            <h1>あなたが興味を持ちそうなニュース</h1>
            @include('components.news', ['items' => $news])
        </div>
    </div>
</div>
@endsection
