@foreach($items as $item)
<div class="card bg-dark text-white">
    <img src="{{ $item->urlToImage }}" class="card-img" alt="{{ $item->title }}">
    <div class="card-img-overlay">
        <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text text-end fs-6"><small class="text-muted">{{ $item->publishedAt }} from {{ $item->source }}</small></p>
        </a>
        @auth
            <save-component :data="{{ $item }}" :has_saved="{{ Auth::user()->has_saved($item->url) ? 'true' : 'false' }}">
            </save-component>
        @endauth
    </div>
</div>
@endforeach