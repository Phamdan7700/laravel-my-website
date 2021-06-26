@extends('page.main')
<style>
    .excert img{
        width: 100%;
        height: auto !important;
    }
</style>
@section('content')
    <!--================Blog Area =================-->
    <div class="bg-dark">
        <ul class="breadcrumb bg-dark container">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('type.show', $singlePost->type_id)}}">{{$singlePost->typeNews->name}}</a></li>
            <li class="breadcrumb-item active"> {{$singlePost->title}}</li>
        </ul>
    </div>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <!-- ==============================Chi Tiet Tin============================================ -->
                <div class="col-lg-8 posts-list">
                    <div class="single-post">

                        <div class="blog_details">
                            <h2>
                               {{$singlePost->title}}
                            </h2>

                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{$singlePost->createdBy->name}}</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> {{$singlePost->comments->count() }} Bình Luận</a></li>
                            </ul>
                            <div class="feature-img">
                                <img class="img-fluid"
                                    src="{{$singlePost->thumbnail}}"
                                    alt="img">
                            </div>
                            <div class="excert">
                                {!! $singlePost->content !!}
                            </div>
                        </div>
                    </div>

                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> {{$singlePost->comments->count() }} Bình Luận</p>
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- ===================================Chuyen Bai Viet Pre Next============================================ -->
                        {{-- <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <?php
                                    $tin->result = $tin->TinCuCungLoai($idTin, 1);
                                    while ($row_tincu = $tin->fetchRow()) { ?>
                                    <div class="thumb">
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tincu['idTin']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo $row_tincu['urlHinh']; ?>"
                                                alt="img">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tincu['idTin']; ?>">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Trước</p>
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tincu['idTin']; ?>">
                                            <h4><?php echo $row_tincu['TieuDe']; ?></h4>
                                        </a>
                                    </div>
                                    <?php }
                                    ?>
                                </div>

                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <?php
                                    $tin->result = $tin->TinMoiCungLoai($idTin, 1);
                                    while ($row_tintieptheo = $tin->fetchRow()) { ?>
                                    <div class="thumb">
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tintieptheo['idTin']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo $row_tintieptheo['urlHinh']; ?>"
                                                alt="img">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tintieptheo['idTin']; ?>">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Sau</p>
                                        <a
                                            href="single-post.php?idTin=<?php echo $row_tintieptheo['idTin']; ?>">
                                            <h4><?php echo $row_tintieptheo['TieuDe']; ?>
                                            </h4>
                                        </a>
                                    </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="{{$singlePost->createdBy->avatar}}" alt="img">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{$singlePost->createdBY->name }}</h4>
                                </a>
                                <p>{{$singlePost->createdBY->name }}</p>
                            </div>
                        </div>
                    </div>
                    <!--=========================================== Binh Luan============================== -->
                    <div class="comments-area">
                        <h4>{{$singlePost->comments->count()}}  Bình Luận</h4>
                        @foreach ($singlePost->comments as $comment)                            
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{asset('./img/comment_1.png')}}" alt="img">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            {{$comment->content}}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#"> {{$comment->name}}</a>
                                                </h5>
                                                <p class="date"> {{$comment->created_at}} </p>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Trả Lời</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                        <!-- ============================================================================ -->
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" action="{{route('storeComment')}}" id="commentForm" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="post_id" 
                                    value="{{$singlePost->id}}">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                                            placeholder="Write Comment" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name"
                                            required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- end php -->
                <div class="col-lg-4">
                    @include('page.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->


@endsection
