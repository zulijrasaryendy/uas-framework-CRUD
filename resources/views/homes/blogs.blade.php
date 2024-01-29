@extends('layouts.homes')

@section('container')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($articles as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" style="width:800px; width:400px;" alt="">
                                @else
                                    <img src="https://source.unsplash.com/800x400?{{ $item->category->name }}"
                                        alt="">
                                @endif
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $item->category->name }}</h3>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="/articles/{{ $item->slug }}">
                                        <h2>{{ $item->title }}</h2>
                                    </a>
                                    <p>{{ $item->excerpt }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="/blogs?author={{ $item->author->username }}"><i class="fa fa-user"></i> {{ $item->author->name }}</a></li>
                                        <li><a href="#"><i class="fa fa-calendar"></i>
                                                {{ $item->created_at->diffForHumans() }}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('homes.right_sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
