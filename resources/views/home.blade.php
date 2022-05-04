@extends('layouts.app')

@section('content')
@include('components.carousel', ['items' => $news])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('components.news', ['items' => $news])
        </div>
    </div>
</div>

@endsection
