@extends('front.layouts.master')
@section('title')
    {{ $category['name'] }}
@endsection
@section('content')
    <div id="HomePage">
        <div class="rgt TopicRight">
                    <div class="card-text content-blogpost">
                        <h5 class="rgt card-title blogtitle"><i class="fa fa-newspaper"></i> {{$category['name']}} </h5>
                        @if (count($posts) > 0)
                            <div class="clr"></div><br>
                            <div class="clearfix2 card" style="margin-bottom:20px;background:#f7f7f7;">
                                @foreach ($posts as $post)
                                    <div class="row no-gutters blog">
                                        <div class="col-md-4"><a href="{{ url('blog/' . $post['slug']) }}"><img
                                                    src="{{ asset('assets/uploads/Blogs/' . $post['image']) }}"
                                                    class="blogimg"></a></div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="padding:10px;">
                                                <h5 class="card-title">
                                                    <small class="text-muted" style="font-size:12px;"><a
                                                            href="{{ url('blog-category/' . $post['category']['slug']) }}"><i
                                                                class="fa fa-tag"></i> {{ $post['Category']['name'] }}
                                                        </a></small>
                                                    <div class="clr"></div>
                                                    <div class="htitle"><a href="{{ url('blog/' . $post['slug']) }}">
                                                            {{ \Illuminate\Support\Str::limit($post['name'], 30, '...') }}
                                                        </a></div>
                                                </h5>
                                                <div class="card-text" style="font-size:13px;">
                                                    {!! $post['short_desc'] !!} <a href="{{ url('blog/' . $post['slug']) }}">
                                                        قراءة المزيد </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div><br>
                                    <hr class="style14">
                                    <div class="clr"></div>
                                @endforeach

                            </div>
                        @endif

                    </div>
        </div>
        <div class="rgt TopicLeft">
            <div class="card">
                <div style="padding:10px;">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item T1" role="presentation">
                            <a class="nav-link active" id="pills-t1-tab" data-bs-toggle="pill" href="#pills-t1" role="tab"
                                aria-controls="pills-t1" aria-selected="true"
                                style="border-radius:0px; background-color:var(--main-color)"> الاخبار المتعلقة </a>
                        </li>
                        <li class="nav-item T2">
                            <a class="nav-link" id="pills-t2-tab" data-bs-toggle="pill" href="#pills-t2" role="tab"
                                aria-controls="pills-t2" aria-selected="false"
                                style="border-radius:0px; background-color:#353b48"> اخبار تهمك </a>
                        </li>
                    </ul>
                    <div class="tab-content blog_tabs" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-t1" role="tabpanel"
                            aria-labelledby="pills-t1-tab">
                            <ul class="list-unstyled">
                                @foreach ($lastFourPosts as $post)
                                    <li class="media">
                                        <div class="display-desk"><a href="{{ url('blog/' . $post['slug']) }}"><img
                                                    src="{{ asset('assets/uploads/Blogs/' . $post['image']) }}"
                                                    class="mr-3 t-img"></a></div>
                                        <div class="media-body">
                                            <h5 class="t-title"><a href="{{ url('blog/' . $post['slug']) }}">
                                                    {{ \Illuminate\Support\Str::limit($post['name'], 30, '...') }} </a>
                                            </h5>
                                            <small class="text-muted" style="font-size:10px;"><i
                                                    class="fa fa-calendar-alt"></i>
                                                {{ $post['created_at'] }} </small>
                                        </div>
                                    </li>
                                    <hr class="style14">
                                    <div class="clr"></div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-t2" role="tabpanel" aria-labelledby="pills-t2-tab">
                            <ul class="list-unstyled">
                                @foreach ($randomposts as $post)
                                    <li class="media">
                                        <div class="display-desk"><a href="{{ url('blog/' . $post['slug']) }}"><img
                                                    src="{{ asset('assets/uploads/Blogs/' . $post['image']) }}"
                                                    class="mr-3 t-img"></a></div>
                                        <div class="media-body">
                                            <h5 class="t-title"><a href="{{ url('blog/' . $post['slug']) }}">
                                                    {{ \Illuminate\Support\Str::limit($post['name'], 30, '...') }} </a>
                                            </h5>
                                            <small class="text-muted" style="font-size:10px;"><i
                                                    class="fa fa-calendar-alt"></i>
                                                {{ $post['created_at'] }} </small>
                                        </div>
                                    </li>
                                    <hr class="style14">
                                    <div class="clr"></div>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div><br>
            <div class="card">
                <p class="TPTitle" style="padding:20px;"><i class="fa fa-bolt"></i> إعلانات </p>
                <center><a href="#"><img src="images/ban300.jpg" /></a></center>
            </div>
            <div class="clr"></div><br>
        </div>
        <div class="clr"></div><br>
    </div>
    <div class="clr"></div><br>

@endsection
