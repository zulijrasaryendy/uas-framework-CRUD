@extends('layouts.homes')

@section('container')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}"
                                    alt="">
                            @else
                                <img src="https://source.unsplash.com/800x400?{{ $article->category->name }}" alt="">
                            @endif
                        </div>
                        <div class="blog_details">
                            <h2>{{ $article->title }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i>{{ $article->author->name }}</a></li>
                                <li><a href="#"><i
                                            class="fa fa-calendar"></i>{{ $article->created_at->diffForHumans() }}</a></li>
                            </ul>
                            {!! $article->body !!}
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            {{-- <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                people like this</p> --}}
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/assets/img/post/preview.png" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="/articles/{{ $random[0]->slug }}">
                                            <h4>{{ $random[0]->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="{{ $random[1]->slug }}">
                                            <h4>{{ $random[1]->title }}</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/assets/img/post/next.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            {{-- <img src="/assets/img/blog/author.png" alt=""> --}}
                            <div class="media-body">
                                <a href="/blogs?author={{ $article->author->username }}">
                                    <h4>{{ $article->author->name }}</h4>
                                </a>
                                <p>Second divided from form fish beast made. Every of seas all gathered use saying you're,
                                    he
                                    our dominion twon Second divided from</p>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>{{ $article->comment->count() }} Comments</h4>
                        @forelse ($article->comment as $item)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        {{-- <div class="thumb">
                                            <img src="/assets/img/comment/comment_1.png" alt="">
                                        </div> --}}
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $item->body }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{ $item->user->name }}</a>
                                                    </h5>
                                                    <p class="date">{{ $item->created_at->diffForHumans() }} </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        @auth
                            <form class="form-contact comment_form"
                                action="{{ route('home.storeComment', ['article' => $article->slug]) }}" method="POST"
                                id="commentForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                placeholder="Write Comment" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                        Message</button>
                                </div>
                            </form>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('homes.right_sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection
