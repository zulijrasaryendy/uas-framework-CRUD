@extends('layouts.homes')

@section('trending')
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach ($trendingNews as $news)
                                        <li class="news-item">{{ $news->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                @if ($trendingNews[0]->image)
                                    <img src="{{ asset('storage/' . $trendingNews[0]->image) }}" alt="">
                                @else
                                    <img src="https://source.unsplash.com/400x400?{{ $trendingNews[0]->category->name }}"
                                        alt="">
                                @endif
                                <div class="trend-top-cap">
                                    <span>{{ $trendingNews[0]->category->name }}</span>
                                    <h2><a href="/articles/{{ $trendingNews[0]->slug }}">{{ $trendingNews[0]->title }}</a></h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @for ($i = 1; $i < 4; $i++)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                @if ($trendingNews[$i]->image)
                                                    <img src="{{ asset('storage/' . $trendingNews[$i]->image) }}"
                                                        alt="">
                                                @else
                                                    <img src="https://source.unsplash.com/400x400?{{ $trendingNews[$i]->category->name }}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">{{ $trendingNews[$i]->category->name }}</span>
                                                <h4><a href="/articles/{{ $trendingNews[$i]->slug }}">{{ $trendingNews[$i]->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        @for ($i = 4; $i < 8; $i++)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    @if ($trendingNews[$i]->image)
                                        <img src="{{ asset('storage/' . $trendingNews[$i]->image) }}" style="width: 200px; height: 150px;" alt="">
                                    @else
                                        <img src="https://source.unsplash.com/200x150?{{ $trendingNews[$i]->category->name }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">{{ $trendingNews[$i]->category->name }}</span>
                                    <h4><a href="/articles/{{ $trendingNews[$i]->slug }}">{{ $trendingNews[$i]->title }}</a></h4>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
@endsection

@section('recentNews')
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($recentNews as $news)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        @if ($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" style="width: 400px; height: 400px;" alt="">
                                        @else
                                            <img src="https://source.unsplash.com/400x400?{{ $news->category->name }}"
                                                alt="">
                                        @endif
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">{{ $news->category->name }}</span>
                                        <h4><a href="/articles/{{ $news->slug }}">{{ $news->title }}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
@endsection
