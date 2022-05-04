@foreach($bookmarks as $bookmark)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-4">
                <img class="img-fluid" src="{{ $bookmark->urlToImage }}" alt="{{ $bookmark->title }}">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title fs-6">{{ $bookmark->title }}</h5>
                    <p class="card-text text-end fs-6"><small class="text-muted">{{ $bookmark->publishedAt }} from {{ $bookmark->source }}</small></p>
                    <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
@endforeach
