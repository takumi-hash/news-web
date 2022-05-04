@foreach($bookmarks as $bookmark)
<div class="card bg-light text-white">
    <img src="{{ $bookmark->urlToImage }}" class="card-img img-darken bookmark-cover" alt="{{ $bookmark->title }}">
    <div class="card-img-overlay">
        <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
            <p class="card-text fs-6"><small class="text-white-50">{{ $bookmark->publishedAt }} from {{ $bookmark->source }}</small></p>
            <h5 class="card-title">{{ $bookmark->title }}</h5>
        </a>
        @auth
            <div class="text-end">
                <save-component :data="{{ $bookmark }}" :has_saved="{{ Auth::user()->has_saved($bookmark->url) ? 'true' : 'false' }}">
                </save-component>
            </div>
        @endauth
    </div>
</div>
@endforeach