@foreach($news as $item)
<div class="card bg-light text-white">
    @empty($item->urlToImage)
        <img src="{{ asset('images/bookmark_img_fallback.jpeg') }}" class="card-img img-darken bookmark-cover" alt="{{ $item->title }}">
    @else
        <img src="{{ $item->urlToImage }}" class="card-img img-darken bookmark-cover" alt="{{ $item->title }}">
    @endif

    <div class="card-img-overlay d-flex flex-column">
        <div class="row mb-auto">
            <div class=col-10>
                <p class="card-text fs-6"><small class="text-white-50">{{ $item->publishedAt }} from {{ $item->source }}</small></p>
            </div>
            <div class=col-2>
                @auth
                    <div class="text-end">
                        <save-component :data="{{ $item }}" :has_saved="{{ Auth::user()->has_saved($item->url) ? 'true' : 'false' }}">
                        </save-component>
                    </div>
                @endauth                
            </div>
        </div>
        <h5 class="card-title fs-6">
            <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
                {{ $item->title }}
            </a>
        </h5>
    </div>
</div>
@endforeach