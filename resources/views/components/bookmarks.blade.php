@foreach($bookmarks as $bookmark)
<div class="card bg-dark text-white">
    <img src="{{ $bookmark->urlToImage }}" class="card-img img-darken" alt="{{ $bookmark->title }}">
    <div class="card-img-overlay">
        <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
            <h5 class="card-title">{{ $bookmark->title }}</h5>
            <p class="card-text text-end fs-6"><small class="text-muted">{{ $bookmark->publishedAt }} from {{ $bookmark->source }}</small></p>
        </a>
        @auth
            <save-component :data="{{ $bookmark }}" :has_saved="{{ Auth::user()->has_saved($bookmark->url) ? 'true' : 'false' }}">
            </save-component>
        @endauth
    </div>
</div>
@endforeach