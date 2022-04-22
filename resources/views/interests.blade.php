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
            <h1>Interests</h1>
            @foreach($news as $data)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ $data['urlToImage'] }}" alt="{{ $data['title'] }}">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title fs-6">{{ $data['title'] }}</h5>
                            <p class="card-text text-end fs-6"><small class="text-muted">{{ $data['publishedAt'] }} from {{ $data['source'] }}</small></p>
                            <!-- p class="card-text fs-6">{{ $data['description'] }}</p -->
                            <a href="{{ $data['url'] }}" target="_blank" rel="noopener noreferrer" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
