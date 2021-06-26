<div class="weekly2-news-area  weekly2-pading gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Tin Trong Tuần</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        @foreach ($postInWeek as $post)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <img src="{{ $post->thumbnail }}" alt="">
                                    </a>
                                </div>
                                <div class="weekly2-caption">
                                    <a
                                        href="{{route('type.show', $post->type_id) }}">
                                        <span class="color1">{{ $post->typeNews->name }}</span>
                                    </a>
                                    <p>{{ $post->create_at }}</p>
                                    <h4><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
