@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
            <div class="card">
                <div class="card-header">{{ __('Debug info') }}</div>

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
            @foreach($news as $data)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ $data['urlToImage'] }}" alt="{{ $data['title'] }}">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <a href="{{ $data['url'] }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
                                <h5 class="card-title fs-6">{{ $data['title'] }}</h5>
                                <p class="card-text text-end fs-6"><small class="text-muted">{{ $data['publishedAt'] }} from {{ $data['source'] }}</small></p>
                                <!-- p class="card-text fs-6">{{ $data['description'] }}</p -->
                            </a>
                            @auth
                                @if (Auth::user()->has_saved($data['url']))
                                    {!! Form::open(['route' => 'bookmark.delete', 'method' => 'delete']) !!}
                                        {!! Form::hidden('url', $data['url']) !!}
                                        {!! Form::submit('Saved', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => 'bookmark.save', 'method' => 'post']) !!}
                                        {!! Form::hidden('url', $data['url']) !!}
                                        {!! Form::hidden('title', $data['title']) !!}
                                        {!! Form::hidden('urlToImage', $data['urlToImage']) !!}
                                        {!! Form::hidden('author', $data['author']) !!}
                                        {!! Form::hidden('publishedAt', $data['publishedAt']) !!}
                                        {!! Form::hidden('source', $data['source']) !!}
                                        {!! Form::submit('Save this', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
