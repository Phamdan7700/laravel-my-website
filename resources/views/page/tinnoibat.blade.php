<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Tin Nổi Bật</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">

                        <!-- ====================================================TIN NOI BAT======================================== -->
                        @foreach ($postsHightlight as $post)
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <a href="{{route('post.show', $post->id) }}">
                                    <img src="{{ $post->thumbnail}}" alt="">
                                </a>
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{ $post->typeNews->name }}</span>
                                    <h4><a href="{{route('post.show', $post->id) }}">{{ $post->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>