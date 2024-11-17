@extends('front.layouts.master')
@section('title')
    {{ $blog['name'] }}
@endsection
@section('content')
    <div id="HomePage">
        <div class="rgt TopicRight">
            <div class="card" style="margin-bottom:15px;">
                <div class="card-body" style="padding:0px;">
                    <nav aria-label="breadcrumb" class="navbreadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="btn btn-light btn-sm"> الرئيسية
                                </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('blog') }}" class="btn btn-light btn-sm"> المدونة
                                </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('blog-category/' . $blog['Category']['slug']) }}"
                                    class="btn btn-light btn-sm">{{ $blog['Category']['name'] }}</a></li>
                            {{ $blog['name'] }}
                        </ol>
                    </nav>
                    <div class="card bg-inverse card-blogpost">
                        <img class="card-img" src="{{ asset('assets/uploads/Blogs/' . $blog['image']) }}">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <h5 class="title-blogpost">{{ $blog['name'] }}</h5>
                            <p class="card-text">
                                {{-- <small class="rgt text-muted"><button class="btn btn-light btn-sm"><i class="fa fa-user"></i> Admin </button></small> --}}
                                <small class="rgt text-muted"><button class="btn btn-primary btn-sm"><i
                                            class="fa fa-calendar-alt"></i> {{ $blog['created_at'] }} </button></small>
                                {{-- <small class="rgt text-muted"><button class="btn btn-light btn-sm"><i class="fa fa-eye"></i> 23641 </button></small> --}}
                            </p>
                        </div>
                    </div>
                    <div class="card-text content-blogpost">
                        {!! $blog['desc'] !!}
                        <div class="clr"></div><br>
                        <hr class="style14">
                        <div class="clr"></div>
                        @if (count($lastFourPosts) > 0)
                            <h5 class="rgt card-title blogtitle"><i class="fa fa-newspaper"></i> أخبار أخرى </h5>
                            <div class="clr"></div><br>
                            <div class="clearfix2 card" style="margin-bottom:20px;background:#f7f7f7;">
                                @foreach ($lastFourPosts as $post)
                                    <div class="row no-gutters blog">
                                        <div class="col-md-4"><a href="{{ url('blog/' . $post['slug']) }}"><img
                                                    src="{{ asset('assets/uploads/Blogs/' . $post['image']) }}"
                                                    class="blogimg"></a></div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="padding:10px;">
                                                <h5 class="card-title">
                                                    <small class="text-muted" style="font-size:12px;"><a
                                                            href="{{ url('blog-category/' . $post['slug']) }}"><i
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
                                @endforeach

                            </div>
                        @endif

                    </div>
                </div>
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
