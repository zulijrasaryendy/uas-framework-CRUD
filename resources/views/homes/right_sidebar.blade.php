<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <form action="/blogs">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder='Search Keyword' name="search"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                    <div class="input-group-append">
                        <button class="btns" type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
        </form>
    </aside>

    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Category</h4>
        <ul class="list cat-list">
            @foreach ($category as $cat)
                <li>
                    <a href="/blogs?category={{ $cat->slug }}" class="d-flex">
                        <p>{{ $cat->name }}</p>
                        <p>({{ $cat->articles->count() }})</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Recent Post</h3>
        @foreach ($recentNews as $item)
            <div class="media post_item">
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" style="width: 90px; height: 90px;" alt="post">
                @else
                    <img src="/assets/img/post/post_1.png" alt="post">
                @endif
                <div class="media-body">
                    <a href="/articles/{{ $item->slug }}">
                        <h3>{{ $item->title }}</h3>
                    </a>
                    <p>{{ $item->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
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
