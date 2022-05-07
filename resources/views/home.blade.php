@extends('layouts.app')

@section('content')

@guest
    <p>テスト環境です。テストアカウントで<a class="" href="{{ route('login') }}">{{ __('ログイン') }}</a>してください。</p>
@endguest

@auth

    @php
        $formatted_date = Carbon\Carbon::now();
    @endphp

    {{ $formatted_date->toFormattedDateString();  }}

@include('components.carousel', ['items' => $carousel])
<div class="container my-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button
            class="nav-link active"
            id="pills-business-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-business"
            type="button"
            role="tab"
            aria-controls="pills-business"
            aria-selected="true"
            >
            Business
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
            class="nav-link"
            id="pills-technology-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-technology"
            type="button"
            role="tab"
            aria-controls="pills-technology"
            aria-selected="false"
            >
            Technology
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
            class="nav-link"
            id="pills-market-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-market"
            type="button"
            role="tab"
            aria-controls="pills-market"
            aria-selected="false"
            >
            World
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div
            class="tab-pane fade show active"
            id="pills-business"
            role="tabpanel"
            aria-labelledby="pills-business-tab"
        >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('components.news', ['news' => $news_business])
                </div>
            </div>
        </div>
        <div
            class="tab-pane fade"
            id="pills-technology"
            role="tabpanel"
            aria-labelledby="pills-technology-tab"
        >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('components.news', ['news' => $news_technology])
                </div>
            </div>
        </div>
        <div
            class="tab-pane fade"
            id="pills-market"
            role="tabpanel"
            aria-labelledby="pills-market-tab"
        >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('components.news', ['news' => $news_world])
                </div>
            </div>
        </div>
    </div>
</div>
@endauth    
@endsection
