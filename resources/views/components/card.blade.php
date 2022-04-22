<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img class="img-fluid" src="{{ $data['urlToImage'] }}" alt="{{ $data['title'] }}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title fs-6">{{ $data['title'] }}</h5>
                <p class="card-text text-end fs-6"><small class="text-muted">{{ $data['publishedAt'] }} from {{ $data['source'] }}</small></p>
                <!-- p class="card-text fs-6">{{ $data['description'] }}</p -->
                <a href="{{ $data['url'] }}" target="_blank" rel="noopener noreferrer" class="stretched-link"></a>
            </div>
        </div>
    </div>
</div>