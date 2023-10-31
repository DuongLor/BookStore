@extends('client.templates.layout')
@section('title', 'Home')
@section('content')
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($banners as $key => $banner)
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                <a href="" class="text-decoration-none carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="{{ asset($banner->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <!-- Start genre -->
    <div class="container my-5">
        <div class="row">
            <h1>Thể loại</h1>
            <hr>
            @foreach ($genres as $genre)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="text-decoration-none text-dark"
                                href="{{ route('client.genre', ['genre' => $genre->id]) }}">
                                <h5 class="card-title">{{ $genre->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Start genre -->
    <div class="container my-5">
        <div class="row">
            <h1>Sản phẩm nổi bật</h1>
            <hr>
            @foreach ($books_promiment as $item)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="text-decoration-none text-dark" href="">
                                @include('templates.product_card', ['book' => $item])
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End genre -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row py-3">
            </div>
            <div class="row">
                <div class="col-12 rounded shadow p-4 " style="background-color: white">
                    <div class="row ">
                        <h1 class="">Sách ({{ count($books) }} quyển)</h1>
                        @foreach ($books as $book)
                            <div class="col-lg-3 col-md-4 mb-4">
                                @include('templates.product_card', ['book' => $book])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection
