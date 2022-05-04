@foreach($items as $item)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-4">
                <img class="img-fluid" src="{{ $item->urlToImage }}" alt="{{ $item->title }}">
            </div>
            <div class="col-8">
                <div class="card-body" id= "{{ $item->url }}">
                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
                        <h5 class="card-title fs-6">{{ $item->title }}</h5>
                        <p class="card-text text-end fs-6"><small class="text-muted">{{ $item->publishedAt }} from {{ $item->source }}</small></p>
                        <!-- p class="card-text fs-6">{{ $item->description }}</p -->
                    </a>
                    @auth
                        <save-component :data="{{ $item }}" :has_saved="{{ Auth::user()->has_saved($item->url) ? 'true' : 'false' }}">
                        </save-component>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endforeach
