@php
  $excerpt = array_slice($items, 0, 5);
@endphp
<div id="carouselWithCaptions" class="carousel slide w-100" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach($excerpt as $item)
      @if ($loop->first)
          <button type="button" data-bs-target="#carouselWithCaptions" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide 1"></button>
      @else
        <button type="button" data-bs-target="#carouselWithCaptions" data-bs-slide-to="{{ $loop->index }}"></button>
      @endif
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach($excerpt as $item)
      @if ($loop->first)
        <div class="carousel-item active">
          <img src="{{ $item->urlToImage }}" class="d-block w-100 img-darken" alt="...">
          <div class="carousel-caption d-block">
            <h5 class="small">{{ $item->title }}</h5>
            <p class="small">{{ \Str::limit($item->description,15); }}</p>
          </div>
        </div>
      @else
        <div class="carousel-item">
          <img src="{{ $item->urlToImage }}" class="d-block w-100 img-darken" alt="...">
          <div class="carousel-caption d-block">
            <h5 class="small">{{ $item->title }}</h5>
            <p class="small">{{ \Str::limit($item->description,15); }}</p>
          </div>
        </div>
      @endif
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselWithCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselWithCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>