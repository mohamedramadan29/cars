@extends('front.layouts.master')
@section('title')
    عراق اوتو كار
@endsection
@section('content')
    @if (Session::has('Success_message'))
        @php
            toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
        @endphp
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toastify()->error($error);
            @endphp
        @endforeach
    @endif
    <div class="clearfix2 background"
        style="background-image: url({{ asset('assets/uploads/Banners/' . $main_banner['image']) }})">
        <div class="layer">
            <div id="HomePage">
                <center>
                    <div class="uk-margin">
                        <p class="txt01"> {{ $main_banner['title'] }} </p>
                        <p class="txt02">
                             {{ $main_banner['desc'] }}  
                        </p>
                        <div class="clr"></div>
                        <form action="{{ route('car.search') }}" method="GET" class="formsrch">
                            @csrf
                            <div class>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="c_brand" id="brand">
                                        <option value selected> {{ __('public.select_mark') }} </option>
                                        @foreach ($marks as $mark)
                                            <option value="{{ $mark['id'] }}"
                                                {{ request('c_brand') == $mark['id'] ? 'selected' : '' }}>
                                                {{ $mark['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="c_model" id="subbrand">
                                        <option selected> {{ __('public.select_model') }} </option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var oldBrand = "{{ old('c_brand', request('c_brand')) }}";
                                        var oldModel = "{{ old('c_model', request('c_model')) }}";
                                        $('#brand').on('change', function() {
                                            var brandId = $(this).val();
                                            if (brandId) {
                                                var ajaxRequest = $.ajax({
                                                    url: '/getCarModels/' + brandId, // Update with your route
                                                    type: 'GET',
                                                    success: function(data) {
                                                        $('#subbrand').empty();
                                                        $('#subbrand').append('<option value=""> {{ __('public.select_model') }} </option>');
                                                        $.each(data, function(key, model) {
                                                            $('#subbrand').append(
                                                                '<option value="' + model.id + '">' + model.name
                                                                .ar + '</option>'
                                                            );
                                                        });
                                                    }
                                                });
                                                // تأكد من تعيين القيمة القديمة فقط بعد انتهاء عملية التحميل
                                                $.when(ajaxRequest).done(function() {
                                                    if (oldModel) {
                                                        $('#subbrand').val(oldModel);
                                                    }
                                                });
                                            } else {
                                                $('#subbrand').empty();
                                                $('#subbrand').append('<option value=""> {{ __('public.select_model') }} </option>');
                                            }
                                        });
                                        if (oldBrand) {
                                            $('#brand').trigger('change');
                                        }
                                    });
                                </script>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="typecar">
                                        <option value selected> {{ __('public.select_status') }} </option>
                                        <option value="1">جديدة</option>
                                        <option value="2">مستعملة</option>
                                        <option value="0">كلاهما</option>
                                    </select>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" name="search" class="btn btn-primary"><i
                                            class="fa fa-search"></i> {{ __('public.search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <div class="clr"></div>
    @if(count($sliders) > 0)

    <div class="hero_slider">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $index => $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('assets/uploads/Slider/' . $slider->image) }}" class="d-block w-100"
                            alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    @endif
    <div class="clr"></div>
    <div id="HomePage">
        <div class="clr"></div>
        <br>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> <a href="brands.html">سيارات لأكثر الماركات شهرة</a></p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-brand" class="owl-carousel owl-theme brands-home">
            @foreach($marks as $mark)
                <div class="item">
                    <a href="{{url('brand/'.$mark['slug'])}}">
                        <div class="card">
                            <div class="card-body">
                                <center><img src="{{asset('assets/uploads/Marks/'.$mark['logo'])}}"/></center>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> <a href="{{url('new-cars')}}">سيارات جديدة</a></p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-car" class="owl-carousel owl-theme new_cars">
            @foreach($new_advs as $adv)
                <div class="item">
                    <div class="card car-card">
                        <div class="ribbon"><span class="ribbon4 ribbonplus"> {{ number_format($adv['c_price'], 2) }} $
                                </span></div>
                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img
                                src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                                <h5 class="card-title" style="text-align:center;"> {{ $adv['c_title'] }} </h5>
                            </a>
                            <div class="card-text">
                                <div class="car-icon">
                                    <center><i class="fas fa-dumbbell"></i>
                                        <div class="clr"></div><span class="txt-icon">{{ $adv['c_trans'] }} </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-map-marker-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['City']['name'] }}
                                            </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-calendar-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['c_years'] }}</span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><img src="{{ asset('assets/uploads/Marks/' . $adv['carMark']['logo']) }}" />
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="clr"></div>
        <center><a href="{{url('new-cars')}}" class="lft btn btn-light" style="margin-top:5px;"><i class="fas fa-car"></i>
                المزيد من السيارات الجديدة</a></center>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> <a href="{{url('used-cars')}}">سيارات مستعملة</a></p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-carold" class="owl-carousel owl-theme">
            @foreach($old_advs as $adv)
                <div class="item">
                    <div class="card car-card">
                        <div class="ribbon"><span class="ribbon5 ribbonplus"> {{ number_format($adv['c_price'], 2) }} $
                                </span></div>
                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img
                                src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                                <h5 class="card-title" style="text-align:center;"> {{ $adv['c_title'] }} </h5>
                            </a>
                            <div class="card-text">
                                <div class="car-icon">
                                    <center><i class="fas fa-dumbbell"></i>
                                        <div class="clr"></div><span class="txt-icon">{{ $adv['c_trans'] }} </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-map-marker-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['City']['name'] }}
                                            </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-calendar-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['c_years'] }}</span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><img src="{{ asset('assets/uploads/Marks/' . $adv['carMark']['logo']) }}" />
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clr"></div>
        <center><a href="{{url('used-cars')}}" class="lft btn btn-light" style="margin-top:5px;"><i class="fas fa-car"></i>
                المزيد من السيارات المستعملة</a></center>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> سيارات الأكثر شهرة</p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-topcar" class="owl-carousel owl-theme">
            @foreach($random_advs as $adv)
                <div class="item">
                    <div class="card car-card">
                        <div class="ribbon"><span class="ribbon6 ribbonplus"> {{ number_format($adv['c_price'], 2) }} $
                                </span></div>
                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img
                                src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                                class="card-img-top"></a>
                        <div class="card-body">
                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                                <h5 class="card-title" style="text-align:center;"> {{ $adv['c_title'] }} </h5>
                            </a>
                            <div class="card-text">
                                <div class="car-icon">
                                    <center><i class="fas fa-dumbbell"></i>
                                        <div class="clr"></div><span class="txt-icon">{{ $adv['c_trans'] }} </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-map-marker-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['City']['name'] }}
                                            </span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><i class="fas fa-calendar-alt"></i>
                                        <div class="clr"></div><span class="txt-icon"> {{ $adv['c_years'] }}</span>
                                    </center>
                                </div>
                                <div class="car-icon">
                                    <center><img src="{{ asset('assets/uploads/Marks/' . $adv['carMark']['logo']) }}" />
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> <a href="blog.html">آخر أخبار السيارات وتجارب القيادة </a>
            </p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div class="display-desk">
            <div class="rgt card blog-big">
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
        <div class="display-mobile">
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
        </div>
        <div class="clr"></div>
        <br>
        <div class="icons-home">
            <div class="ico">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-car fa-3x"></i>
                        <div class="clr"></div>
                        <div class="numbertxt">200+</div>
                        <div class="clr"></div>
                        <div class="smalltxt">سيارة يتم بيعها يومياً</div>
                    </div>
                </div>
            </div>
            <div class="ico">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-3x"></i>
                        <div class="clr"></div>
                        <div class="numbertxt">115,000+</div>
                        <div class="clr"></div>
                        <div class="smalltxt">بائع راضٍ عن الخدمة</div>
                    </div>
                </div>
            </div>
            <div class="ico">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-users fa-3x"></i>
                        <div class="clr"></div>
                        <div class="numbertxt">500,000+</div>
                        <div class="clr"></div>
                        <div class="smalltxt">مشتري شهرياً</div>
                    </div>
                </div>
            </div>
            <div class="ico">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-shield-alt fa-3x"></i>
                        <div class="clr"></div>
                        <div class="numbertxt">100%</div>
                        <div class="clr"></div>
                        <div class="smalltxt">مجاناً</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <br><br>
        @if(Auth::check())

            <center><a href="{{url('user/car/add')}}" class="btn gradient-btn btn-lg" style="margin-top:5px;"><i class="fas fa-car"></i>
                    قم ببيع سيارتك مجانا</a></center>
        @else

            <center><a href="{{url('create-car')}}" class="btn gradient-btn btn-lg" style="margin-top:5px;"><i class="fas fa-car"></i>
                    قم ببيع سيارتك  مجانا</a></center>
        @endif


        <div class="clr"></div>
        <br>
    </div>
@endsection
