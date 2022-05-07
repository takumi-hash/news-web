@extends('layouts.app')

@section('content')
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
@guest
  <div class="px-4 py-5 text-center hero-image text-white">
    <img class="d-block mx-auto mb-4 app-icon" src="{{ asset('images/newspaper_icon.png') }}" alt="" width="80" height="80">
    <h1 class="display-5 fw-bold">News App (β版)</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">情報収集にこだわるあなたにぴったりなアプリ</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="{{ __('login') }}" class="btn btn-primary btn-lg px-4">ウェブ版にログイン</a>
        <a href="#" class="btn  btn-outline-light btn-lg px-4 gap-3">アプリをダウンロード(Coming Soon)</a>
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">わずらわしい広告なし</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">多様なニュースプロバイダーから配信されたニュースに集中できます。</p>
      <!--
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
      </div>
       -->
    </div>
    <div class="overflow-hidden" style="max-height: 90vh;">
      <div class="container px-5">
        <img src="{{ asset('images/picture1.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="500" loading="lazy">
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">保存したニュースは高速で検索できる。</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">インクリメンタルサーチ機能で「あのとき保存したニュース」を瞬時に見つけられます。</p>
      <!--
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
      </div>
       -->
    </div>
    <div class="overflow-hidden" style="max-height: 90vh;">
      <div class="container px-5">
        <img src="{{ asset('images/picture3.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="500" loading="lazy">
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">新しい知識と毎日出会える</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">登録した興味関心や保存したニュースをもとに、あなたがおもしろいと思えるニュース・Wikipedia記事をおすすめします。</p>
      <!--
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
      </div>
       -->
    </div>
    <div class="overflow-hidden" style="max-height: 90vh;">
      <div class="container px-5">
        <img src="{{ asset('images/picture2.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="500" loading="lazy">
      </div>
    </div>
  </div>

  <!-- div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
        <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div -->

  <!-- div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Border hero with cropped image and shadows</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="bootstrap-docs.png" alt="" width="720">
      </div>
    </div>
  </div -->
  <div class="b-example-divider mb-0"></div>
@endguest
@endsection
