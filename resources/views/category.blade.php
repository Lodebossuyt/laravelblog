@extends('layouts.blog-post')
@section('content')
    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">{{$category->name}}</a>
                        </div>
                        <p class="editorial-post-date text-dark mb-0">March 29, 2016</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">
                    @foreach($slides as $slide)

                        <!-- Editorial Post Single Slide -->
                            <div class="editorial-post-single-slide">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="editorial-post-thumb">
                                            <img
                                                src="{{$slide->photo ? asset($slide->photo->file) : 'http://via.placeholder.com/800x600'}}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="editorial-post-content">
                                            <!-- Post Tag -->
                                            <div class="gazette-post-tag">
                                                @foreach($slide->categories as $categorypost)
                                                    <a href="{{route('home.category', $categorypost)}}">{{$categorypost->name}}</a>
                                                @endforeach
                                            </div>
                                            <h2><a href="{{route('home.post', $slide)}}" class="font-pt mb-15">{{Str::limit($slide->title,30,'...')}}</a></h2>
                                            <p class="editorial-post-date mb-15">{{$slide->created_at}}</p>
                                            <p>{{Str::limit($slide->body,200,'...')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->

    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                        <!-- Gazette Welcome Post -->
                        <div class="gazette-welcome-post">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                @foreach($post->categories as $postcategory)
                                <a href="{{route('home.category', $postcategory)}}">{{$postcategory->name}}</a>
                                    @endforeach
                            </div>
                            <h2 class="font-pt">{{Str::limit($post->title,30,'...')}}</h2>
                            <p class="gazette-post-date">{{$post->created_at}}</p>
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail my-5">
                                <img class="img-fluid" src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/400x400'}}" alt="post-thumb">
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{Str::limit($post->body,100,'...')}}</p>
                            <!-- Reading More -->
                            <div class="post-continue-reading-share mt-30">
                                <div class="post-continue-btn">
                                    <a href="{{route('home.post', $post)}}" class="font-pt mt-auto">Continue Reading <i class="fa fa-chevron-right"
                                                                                    aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    {{$posts->render()}}
                </div>

<!--                <div class="col-12 col-md-4">
                    &lt;!&ndash; Gazette Welcome Post &ndash;&gt;
                    <div class="gazette-welcome-post">
                        &lt;!&ndash; Post Tag &ndash;&gt;
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">Report: Hundreds of EPA employees leave</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        &lt;!&ndash; Post Thumbnail &ndash;&gt;
                        <div class="blog-post-thumbnail my-5">
                            <img src="img/blog-img/19.jpg" alt="post-thumb">
                        </div>
                        &lt;!&ndash; Post Excerpt &ndash;&gt;
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc,
                            quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        &lt;!&ndash; Reading More &ndash;&gt;
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    &lt;!&ndash; Gazette Welcome Post &ndash;&gt;
                    <div class="gazette-welcome-post">
                        &lt;!&ndash; Post Tag &ndash;&gt;
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">Judge throws out ethics case against Trump</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        &lt;!&ndash; Post Thumbnail &ndash;&gt;
                        <div class="blog-post-thumbnail my-5">
                            <img src="img/blog-img/20.jpg" alt="post-thumb">
                        </div>
                        &lt;!&ndash; Post Excerpt &ndash;&gt;
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc,
                            quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        &lt;!&ndash; Reading More &ndash;&gt;
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    &lt;!&ndash; Gazette Welcome Post &ndash;&gt;
                    <div class="gazette-welcome-post">
                        &lt;!&ndash; Post Tag &ndash;&gt;
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">WaPo: FBI general counsel being reassigned</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        &lt;!&ndash; Post Thumbnail &ndash;&gt;
                        <div class="blog-post-thumbnail my-5">
                            <img src="img/blog-img/21.jpg" alt="post-thumb">
                        </div>
                        &lt;!&ndash; Post Excerpt &ndash;&gt;
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc,
                            quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        &lt;!&ndash; Reading More &ndash;&gt;
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    &lt;!&ndash; Gazette Welcome Post &ndash;&gt;
                    <div class="gazette-welcome-post">
                        &lt;!&ndash; Post Tag &ndash;&gt;
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">What's behind the world obsession with gems?</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        &lt;!&ndash; Post Thumbnail &ndash;&gt;
                        <div class="blog-post-thumbnail my-5">
                            <img src="img/blog-img/22.jpg" alt="post-thumb">
                        </div>
                        &lt;!&ndash; Post Excerpt &ndash;&gt;
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc,
                            quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        &lt;!&ndash; Reading More &ndash;&gt;
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    &lt;!&ndash; Gazette Welcome Post &ndash;&gt;
                    <div class="gazette-welcome-post d-md-flex align-items-center">
                        &lt;!&ndash; Post Thumbnail &ndash;&gt;
                        <div class="blog-post-thumbnail">
                            <img src="img/blog-img/23.jpg" alt="post-thumb">
                        </div>
                        <div class="welcome-post-contents ml-30">
                            &lt;!&ndash; Post Tag &ndash;&gt;
                            <div class="gazette-post-tag">
                                <a href="#">Politices</a>
                            </div>
                            <h2 class="font-pt">Justice Department rolls guidance on fining poor defendants </h2>
                            <p class="gazette-post-date mb-15">March 29, 2016</p>
                            &lt;!&ndash; Post Excerpt &ndash;&gt;
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas
                                nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                            &lt;!&ndash; Reading More &ndash;&gt;
                            <div class="post-continue-reading-share mt-15">
                                <div class="post-continue-btn">
                                    <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                    aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>

<!--            <div class="row">
                <div class="col-12">
                    <div class="gazette-pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next"><i
                                            class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>-->
        </div>
    </section>
@endsection
