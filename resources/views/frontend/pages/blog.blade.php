@extends('frontend.layouts.app')

@section('content')
    <section class="container space-bottom-3x">

        <!-- Page Title -->
        <div class="page-title space-top">
            <div class="ph-table">
                <div class="ph-td">
                    <h1>Blog Grid 2 Cols</h1>
                </div>
                <div class="ph-td text-right">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li>Blog Grid 2 Cols</li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title End -->

        <!-- Row -->
        <div class="row">

            <!-- Post -->
            @foreach($bloglar as $blog)
                <div class="col-sm-6">
                    <div class="tile tile-block">
                        <div class="tile-thumb">
                            <div class="tags">
                                <a href="#" class="tag tag-info">Flowers</a><br>
                                <a href="#" class="tag tag-success">New Makeup</a><br>
                                <a href="#" class="tag tag-primary">Fashion Trends</a>
                            </div>
                            <div class="post-counters">
                                <a href="#"><i class="pe-7s-comment"></i>35</a>
                                <a href="#"><i class="pe-7s-like"></i>400</a>
                                <a href="#"><i class="pe-7s-share"></i>5K</a>
                            </div>
                            <a href="/frontend/img/blog_resim/{{$blog->slug}}555x360.JPG" class="overlay"><span>+</span></a>
                            <img src="/frontend/img/blog_resim/{{$blog->slug}}555x360.JPG" alt="Thumbnail">
                        </div>
                        <div class="tile-body">
                            <a href="blog-single.html" class="tile-title"><h3>Flower Fashion</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur aut ut dicta repellat
                                repudiandae eaque similique molestiae. Eos consectetur sequi iure accusantium fugit,
                                assumenda soluta autem, architecto saepe labore sapiente.</p>
                        </div>
                        <footer class="tile-footer">
                            <div class="post-meta">
                                <div class="taxonomy">
                                    <span>In</span>
                                    <a href="#">Fashion</a>
                                    <span>by</span>
                                    <a href="#">Bedismo</a>
                                </div>
                                <span>April 17, 2015 </span>
                            </div>
                        </footer>
                    </div>
                </div>
            @endforeach
        <!-- Post -->

        </div>
        <div class="page-numbers">
            {!! $bloglar->render() !!}
        </div>



        <!-- Pagination -->
        <div class="pagination space-top-2x">
            <a href="#" class="prev page-numbers">
                <i class="flaticon-arrow395"></i>
                Newer
            </a>
            <a href="#" class="page-numbers">1</a>
            <span class="page-numbers current">2</span>
            <a href="#" class="page-numbers">3</a>
            <a href="#" class="page-numbers">4</a>
            <a href="#" class="next page-numbers">
                Older
                <i class="flaticon-move13"></i>
            </a>
        </div>
    </section><!-- Container End -->
@endsection