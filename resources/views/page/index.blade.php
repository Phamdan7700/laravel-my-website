@extends('page.main')
<!-- Trending Area Start -->

@section('slider')
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    {{-- ====================================Trending============================================ --}}
                                    @foreach ($postsHightlight as $post)
                                        <li class="news-item">
                                            <a href="{{ route('post.show', $post->id) }}">
                                                {{ $post->title }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- =========================================TIN MOI NHAT TOP Slide============================================ -->
                        <!-- Trending Top -->
                        <div id="demo" class="carousel slide " data-ride="carousel">
                            <ul class="carousel-indicators">
                                @foreach ($postsHightlight as $post)
                                    @if ($loop->index < 5)
                                        <li data-target="#demo" data-slide-to="{{ $loop->index }}"
                                            class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                                    @endif
                                @endforeach

                            </ul>
                            <div class="carousel-inner trending-top mb-30">
                                {{-- ===================================Slider========================================== --}}
                                @foreach ($postsHightlight as $post)
                                    @if ($loop->index < 5)
                                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                            <div class="trend-top-img">
                                                <a href="{{ route('post.show', $post->id) }}"><img
                                                        src="{{ $post->thumbnail }}" alt="Hinh Anh"></a>
                                                <div class="trend-top-cap">
                                                    <a href="{{ route('type.show', $post->type_id) }}"><span
                                                            class="color1">{{ $post->typeNews->name }}</span></a>
                                                    <h2><a
                                                            href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>

                        <!-- Trending Bottom -->
                        <!-- =========================================TIN MOI NHAT TOP 2============================================ -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($postsHightlight as $post)
                                    @if ($loop->index >= 5 && $loop->index < 8)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <a href="{{ route('post.show', $post->id) }}"><img
                                                            src="{{ $post->thumbnail }}" alt="Hinh Anh"></a>
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <a href="{{ route('type.show', $post->type_id) }}"><span
                                                            class="color1">{{ $post->typeNews->name }}</span></a>
                                                    <h4><a
                                                            href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Right content -->
                    <!-- =========================================TIN MOI NHAT TOP 3============================================ -->
                    <div class="col-lg-4">
                        @foreach ($postsHightlight as $post)
                            @if ($loop->index >= 8 && $loop->index < 12)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img ">
                                        <a href="{{ route('post.show', $post->id) }}"><img
                                                src="{{ $post->thumbnail }}" alt="Hinh Anh"></a>
                                    </div>
                                    <div class="trand-right-cap">
                                        <a href="{{ route('type.show', $post->type_id) }}"><span
                                                class="color1">{{ $post->typeNews->name }}</span></a>
                                        <h4><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!--=====================================================================================-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('tinnoibat')
    @include('page.tinnoibat')
@endsection

@section('content')
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- ========================================The loai=========================================== -->
                    @foreach ($categories as $category)
                        <div class="col-lg-12">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-3 col-md-3">
                                    <div class="section-tittle mb-30">
                                        <h3>
                                            <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="properties__button">
                                        <!--Nav Button  -->
                                        <nav>
                                            <!-- =============================Loai Tin Active====================================== -->

                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-{{ $category->slug }}-tab"
                                                    data-toggle="tab" href="#nav-{{ $category->slug }}" role="tab"
                                                    aria-controls="nav-{{ $category->slug }}" aria-selected="true">Tất
                                                    cả</a>
                                                <!-- ========================================Loai Tin=========================================== -->
                                                @foreach ($category->typeNews as $item)
                                                    <a class="nav-item nav-link " id="nav-{{ $item->slug }}-tab"
                                                        data-toggle="tab" href="#nav-{{ $item->slug }}" role="tab"
                                                        aria-controls="nav-{{ $item->slug }}"
                                                        aria-selected="true">{{ $item->name }}</a>
                                                @endforeach


                                                <!-- ===================================================================== -->
                                            </div>
                                        </nav>
                                        <!--End Nav Button  -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!--============================= Tin Trong Loai Tin Active ======================-->
                                        <div class="tab-pane fade show active" id="nav-{{ $category->slug }}"
                                            role="tabpanel" aria-labelledby="nav-{{ $category->slug }}-tab">
                                            <div class="whats-news-caption">
                                                <div class="row">
                                                    @foreach ($category->posts as $item)
                                                        @if ($loop->index < 4)
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="single-what-news mb-100">
                                                                    <div class="what-img">
                                                                        <a href="{{ route('post.show', $item->id )}}"><img
                                                                                src="{{ $item->thumbnail }}"
                                                                                alt="Hinh Anh"></a>

                                                                    </div>
                                                                    <div class="what-cap">
                                                                        <a
                                                                            href="{{ route('type.show', $item->type_id) }}"><span
                                                                                class="color1">{{ $item->typeNews->name }}</span></a>
                                                                        <h4><a
                                                                                href="{{ route('post.show', $item->id) }}">{{ $item->title }}</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!-- =======================================Tin Trong Loai Tin ==================================-->
                                        @foreach ($category->typeNews as $type)

                                            <div class="tab-pane fade show " id="nav-{{ $type->slug }}" role="tabpanel"
                                                aria-labelledby="nav-{{ $type->slug }}-tab">
                                                <div class="whats-news-caption">
                                                    <div class="row">
                                                        @foreach ($type->posts as $post)
                                                            @if ($loop->index < 4)
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="single-what-news mb-100">
                                                                        <div class="what-img">
                                                                            <a
                                                                                href="{{ route('post.show', $post->id) }}"><img
                                                                                    src="{{ $post->thumbnail }}"
                                                                                    alt="Hinh Anh"></a>
                                                                        </div>
                                                                        <div class="what-cap">
                                                                            <a
                                                                                href="{{ route('type.show', $post->type_id) }}"><span
                                                                                    class="color1">{{ $post->typeNews->name }}
                                                                                </span></a>

                                                                            <h4><a
                                                                                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endforeach
                                                        <!-- =======php======== -->
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        <!-- =============php============ -->
                                    </div>
                                    <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>


                    @endforeach

                </div>

                <div class="col-lg-4 ">
                    <!--================================ SideBar ====================================-->
                    @include('page.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('tintrongtuan')
    @include('page.tintrongtuan')

@endsection
