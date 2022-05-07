@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Interests</h1>
            <ul>
                @foreach($interests as $interest)
                    <span class="badge bg-primary">{{ $interest->text }}</span>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="row justify-cotent-center">
        <div class="col-md-8">
            <h1>あなたが興味を持ちそうなWikipediaの記事</h1>
        </div>
    </div>
    <div class="row flex-row flex-nowrap overflow-auto">
        @include('components.wikipedia', ['news' => $articles])
    </div>
</div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>あなたが興味を持ちそうなニュース</h1>
            @include('components.news', ['news' => $news])
        </div>
    </div>
</div>
@endsection
