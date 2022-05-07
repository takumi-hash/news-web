@foreach($articles as $item)
<div class="col-7">
    <div class="card bg-light wikipedia-card">
        <div class="d-flex flex-column">
            <div class="row card-body pb-0">
                <div class="col-8 d-flex align-items-center">
                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="text-reset text-decoration-none ">
                        {{ $item->title }}
                    </a>
                </div>
                <div class="col-4">
                    @auth
                        <div class="text-end">
                            <save-component :data="{{ $item }}" :has_saved="{{ Auth::user()->has_saved($item->url) ? 'true' : 'false' }}">
                            </save-component>
                        </div>
                    @endauth                
                </div>
            </div>
            <p class="card-body wikipedia-card-description">{{ \Str::limit($item->description, 150)."..." }}</p>
        </div>
    </div>
</div>
@endforeach