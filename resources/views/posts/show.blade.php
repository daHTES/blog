@extends('layouts.layout')

@section('title', 'Блог обо Всем ::' . $post->title)


@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a></li>
                <li class="breadcrumb-item active">{{$post->title}}</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}" title="">{{$post->category->title}}</a></span>

            <h3>{{$post->title}}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $post->getPostDate() }}</small>
                <small><i class="fa fa-eye"></i>{{$post->views}}</small>
            </div>
            <!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <!-- end post-sharing -->
        </div>
        <!-- end title -->

        <div class="single-post-media">
            <img src="{{$post->getImage()}}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            <div class="pp">
            {!! $post->content !!}
            </div>
            <!-- end pp -->
        </div>
        <!-- end content -->

        <div class="blog-title-area">
            @if($post->tags->count())
            <div class="tag-cloud-single">
                <span>Теги</span>
                @foreach($post->tags as $tag)
                <small><a href="{{route('tags.single', ['slug' => $tag->slug])}}" title="">{{$tag->title}}</a></small>
                @endforeach
            </div>
                <!-- end meta -->
            @endif
            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
                <!-- end post-sharing -->
        </div>
        <!-- end title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    </div>
                    <!-- end banner-img -->
                </div>
                <!-- end banner -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <hr class="invis1">

        <div class="custombox authorbox clearfix">
            <h4 class="small-title">Про автора</h4>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                </div>
                <!-- end col -->

                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h4><a href="#">Игорь Левочкин</a></h4>
                    <p>Уроженец Одессы, с 9 лет жил в Израиле. Служил в АОИ, лейтенант пехоты, участник второй Ливанской войны (2006) и операции "Литой Свинец" (2009). В 2016 году вернулся в Украину, чтобы помочь ее гражданам в борьбе с российскими оккупантами. Создатель и инструктор ГО "Украинская Оборона", в которой при содействии и поддержке участников АТО-ООС молодежь проходит начальную подготовку к службе в ЗСУ. На своем телеграм-канале Ressentiment пишет о современном состоянии и перспективах развития военного дела в Украине и в мире, ведет хронику актуальных военных конфликтов.</p>

                    <div class="topsocial">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                    </div>
                    <!-- end social -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end author-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">Из этой рубрики</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog-box">
                        @foreach($related_category_entries as $relPost)
                        <div class="post-media">
                            <a href="{{ route('posts.single', ['slug' => $relPost->slug]) }}" title="">
                                <img src="{{ $relPost->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div>
                                <!-- end hover -->
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="{{ route('posts.single', ['slug' => $relPost->slug]) }}" title="">{{ Str::limit($relPost['title'], 40) }}</a></h4>
                            @foreach($cats as $cat)
                            <small><a href="{{ route('categories.single', ['slug' => $cat->slug]) }}" title="">{{ $cat->title }}</a></small>
                            @endforeach
                            <small>{{ $relPost->getPostDate() }}</small>
                        </div>
                        <!-- end meta -->
                        @endforeach
                    </div>
                    <!-- end blog-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end custom-box -->

        <hr class="invis1">



        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">Оставить комментарий</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-wrapper">
                        <input type="text" class="form-control" placeholder="Your name">
                        <input type="text" class="form-control" placeholder="Email address">
                        <input type="text" class="form-control" placeholder="Website">
                        <textarea class="form-control" placeholder="Your comment"></textarea>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- end page-wrapper -->

@endsection

