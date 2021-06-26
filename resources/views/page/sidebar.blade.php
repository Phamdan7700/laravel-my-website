<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <form action="timkiem.php" method="GET">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder='Search Keyword'
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                    <div class="input-group-append">
                        <button class="btns" type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>

        </form>
    </aside>
    <!-- =========================================Danh Muc========================================= -->
    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Danh Mục</h4>
        <ul class="list cat-list">
            @foreach ($categories as $category)

                @foreach ($category->typeNews as $type)
                    <li>
                        <a href="{{ route('type.show', $type->id) }}" class="d-flex justify-content-between
                            ">
                            <p>{{ $type->name }} </p>
                            <p>{{ $type->posts->count() }}</p>
                        </a>
                    </li>
                @endforeach
            @endforeach


        </ul>
    </aside>
    <!-- =========================================Tin Xem Nhieu========================================= -->
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Tin Xem Nhiều</h3>
        @foreach ($postsView as $postView)
            @if ($loop->iteration < 10)
            <div class="media post_item">
                <img src="{{ $postView->thumbnail }}" alt="img">
                <div class="media-body">
                    <a href="{{ route('post.show', $postView->id) }}">
                        <h3>{{ $postView->title }}</h3>
                    </a>
                    <p>{{ $postView->created_at }}
                    </p>
                </div>
            </div>
            @endif
        @endforeach

        <!-- ===============================End Xem Tiep====================== -->
    </aside>
    <aside class="single_sidebar_widget tag_cloud_widget">
        <h4 class="widget_title">Tag Clouds</h4>
        <ul class="list">
            <li>
                <a href="#">project</a>
            </li>
            <li>
                <a href="#">love</a>
            </li>
            <li>
                <a href="#">technology</a>
            </li>
            <li>
                <a href="#">travel</a>
            </li>
            <li>
                <a href="#">restaurant</a>
            </li>
            <li>
                <a href="#">life style</a>
            </li>
            <li>
                <a href="#">design</a>
            </li>
            <li>
                <a href="#">illustration</a>
            </li>
        </ul>
    </aside>
    <aside class="single_sidebar_widget instagram_feeds">
        <h4 class="widget_title">Instagram Feeds</h4>
        <ul class="instagram_row flex-wrap">
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="{{asset('./img/comment_1.png')}}" alt="">
                </a>
            </li>
        </ul>
    </aside>
    <aside class="single_sidebar_widget newsletter_widget">
        <h4 class="widget_title">Newsletter</h4>

        <form action="#">
            <div class="form-group">
                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                type="submit">Subscribe</button>
        </form>
    </aside>
</div>
