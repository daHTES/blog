@extends('layouts.layout')

@section('title', 'Блог обо Всем :: Home')


@section('header')

    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>Добро пожаловать в блог обо Всем</h2>
                    <p class="lead">Блог Обо Всем – одно из крупнейших украинских информационных агентств. Являясь одним из наиболее авторитетных источников актуальной деловой информации в Украине, мы предоставляем полное информационное обеспечение бизнеса событийной, аналитической, справочной, мониторинговой информацией широкого спектра.</p>
                    <a href="#" class="btn btn-primary">Первый месяц бесплатно</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Стань членом уже сегодня!</h3>
                        <p>Подпишитесь на нас, чтобы быть в курсе наших новостей</p>
                        <form class="form-inline" method="post">
                            <input type="text" name="email" placeholder="Ваш email.." required class="form-control" />
                            <input type="submit" value="Подписаться" class="btn btn-default btn-block" />
                        </form>
                    </div>
                    <!-- end newsletter -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('content')

<div class="page-wrapper">
    <div class="blog-custom-build">
        @foreach($posts as $post)
            <div class="blog-box wow fadeIn">
                <div class="post-media">
                    <a href="{{  route('posts.single', ['slug' => $post->slug]) }}" title="">
                        <img src="{{ $post->getImage()  }}" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div>
                        <!-- end hover -->
                    </a>
                </div>
                <!-- end media -->
                <div class="blog-meta big-meta text-center">
                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                        class="down-mobile">Share on Facebook</span></a></li>
                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                        class="down-mobile">Tweet on Twitter</span></a></li>
                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <!-- end post-sharing -->
                    <h4><a href="{{  route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title  }}</a></h4>
                    <p>{!! $post->description !!}</p>
                    <small><a href="{{route('categories.single', ['slug'=> $post->category->slug])}}" title="">{{ $post->category->title }}</a></small>
                    <small>{{ $post->getPostDate() }}</small>
                    <small><i class="fa fa-eye">{{ $post->views }}</i></small>
                </div>
                <!-- end meta -->
            </div>
            <!-- end blog-box -->

            <hr class="invis">
        @endforeach

    </div>
</div>

<hr class="invis">

<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            {{ $posts->links() }}
        </nav>
    </div><!-- end col -->
</div>

@endsection
