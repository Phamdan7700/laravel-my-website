@extends('page.main')
@section('content')
    <div class="bg-dark">
        <ul class="breadcrumb bg-dark container">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item active"> {{$posts[0]->typeNews->name}}</li>
        </ul>
    </div>
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <!-- Tin Theo loai tin -->
                        @foreach ($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ $post->thumbnail }}" alt="img">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $post->created_at->format('l') }}</h3>
                                        <p>{{ $post->created_at->format('y-m-d') }}</p>
                                    </a>
                                </div>
    
                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('post.show', $post->id )}}">
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p>{{ $post->summary }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> {{ $post->createdBy->name }}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> {{ $post->comments->count() }}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                        
    
                        
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $posts->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('page.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection

<!--================Blog Area =================-->


