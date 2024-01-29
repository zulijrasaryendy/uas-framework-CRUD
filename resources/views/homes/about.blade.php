@extends('layouts.homes')

@section('container')
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <img src="img/{{ $image }}" alt="">
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{ $name }}</h3>
                        </div>
                        <div class="about-prea">
                            <p class="about-pera1 mb-25">Website berita yang dikembangkan oleh Zul Ijra Saryendi dengan tujuan untuk menyebarkan berita terkini dari berbagai penjuru dunia</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>1437</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-gt.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>zulijrasaryendy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        {{-- <img src="assets/img/news/news_card.jpg" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
@endsection
