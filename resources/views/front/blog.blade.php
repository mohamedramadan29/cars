@extends('front.layouts.master')
@section('title')
    المدونة
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div>
        <br>
        <h5 class="rgt card-title blogtitle"><i class="fa fa-newspaper"></i> آخر أخبار السيارات </h5>
        <form class="lft display-desk" action method="get">
            <div class="searchbar">
                <input class="search_input" type="text" name placeholder="ابحث في الأخبار ...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </form>
        <div class="lft" style="padding:20px;">
            @foreach ($categories as $category)
                <a class="btn btn-primary btn-category display-blogcategory"
                    href="{{ url('blog-category/' . $category['slug']) }}">{{ $category['name'] }}</a>
            @endforeach


            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle btn-category" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    جميع الأقسام
                </button>
                <div class="dropdown-menu">
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ url('blog-category/' . $category['slug']) }}">
                            {{ $category['name'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="card display-desk">
            <div class="card-body blog-descc">
                <div class="blockquote-footer"> والتقييمات الفنية لمواصفاتها بالتفصيل بالإضافة إلى نصائح الصيانة وقوائم
                    أفضل
                    السيارات مع تغطية فعاليات المعارض الدولية للسيارات ومشروعات النقل .
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <br>
        <div class="card-body" style="padding:0px;">

            <div class="rgt card blog-big display-blogcategory">
                <a href="{{ url('blog/' . $lastblog['slug']) }}"><img
                        src="{{ asset('assets/uploads/Blogs/' . $lastblog['image']) }}" class="card-img-top"></a>
                <div class="card-body" style="padding:18px;">
                    <a href="{{ url('blog/' . $lastblog['slug']) }}">
                        <h5 class="card-title">
                            {{ \Illuminate\Support\Str::limit($lastblog['name'], 30, '...') }}
                        </h5>
                    </a>
                    <div class="card-text">
                        {!! $lastblog['short_desc'] !!}
                    </div>
                    <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته في
                            {{ $lastblog['created_at'] }}</small></div>
                </div>
            </div>
            <div class="display-blog">
                @foreach ($lastblogs as $blog)
                    <div class="rgt card blog-small">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <a href="{{ url('blog/' . $blog['slug']) }}"><img
                                        src="{{ asset('assets/uploads/Blogs/' . $blog['image']) }}"
                                        class="card-img-top"></a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body" style="padding:10px;">
                                    <a href="{{ url('blog/' . $blog['slug']) }}">
                                        <h5 class="card-title">
                                            {{ \Illuminate\Support\Str::limit($lastblog['name'], 30, '...') }}</h5>
                                    </a>
                                    <div class="card-text" style="line-height:35px;"> <small class="text-muted">تم إضافته في
                                            {{ $blog['created_at'] }}</small> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clr display-blogcategory"></div>
            <br>
            <hr class="style14 display-blogcategory">
            <div class="clr"></div>
            <div class=" PageCard">
                <div class="card-text" style="padding:20px;">
                    <div class="rgt RightShowroom">
                        @foreach ($categoireslastpost as $categorylast)
                            <div class="card" style="margin-bottom:20px;">
                                <div class="row no-gutters blog">
                                    <div class="col-md-4">
                                        <a href="{{ url('blog/' . $categorylast['lastpost']['slug']) }}">
                                            <img src="{{ asset('assets/uploads/Blogs/' . $categorylast['lastpost']->image) }}"
                                                class="blogimg">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="padding:10px;">
                                            <h5 class="card-title">
                                                <small class="text-muted" style="font-size:12px;"><a
                                                        href="{{url('blog-category/'.$categorylast['slug'])}}"><i
                                                            class="fa fa-tag"></i> {{$categorylast['name']}}</a></small>
                                                <div class="clr"></div>
                                                <div class="htitle"><a
                                                        href="{{ url('blog/' . $categorylast['lastpost']['slug']) }}"> {{ Str::limit($categorylast['lastpost']['name'], 30, '...')}}
                                                         </a></div>
                                            </h5>
                                            <div class="card-text" style="font-size:13px;"> {{$categorylast['lastpost']['short_desc']}} <a
                                                    href="{{ url('blog/' . $categorylast['lastpost']['slug']) }}">اقرأ
                                                    المزيد</a></div>
                                            <div class="card-text" style="margin-top:10px;">
                                                <small class="text-muted" style="font-size:12px;"><i
                                                        class="fa fa-calendar-alt"></i> {{$categorylast['lastpost']['created_at']}} </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clr"></div>
                        <br> <br> <br>
                    </div>
                    <div class="rgt LeftShowrom" style="background:white;">
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
                        <a href="#"><img
                                src="../../../via.placeholder.com/330x6007c7f.png?text=330x600+Banner" /></a>
                        <div class="clr"></div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <br>
    </div>
    <div class="clr"></div>
    <br>
@endsection
