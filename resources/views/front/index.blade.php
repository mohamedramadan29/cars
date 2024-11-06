@extends('front.layouts.master')
@section('title')
    الرئيسية
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
    <div class="background clearfix2">
        <div class="layer">
            <div id="HomePage">
                <center>
                    <div class="uk-margin">
                        <p class="txt01">هل تريد بيع سيارتك؟ </p>
                        <p class="txt02">قم ببيع سيارتك مجاناً . لدينا كل ما يلزم لجعل عملية بيع سيارتك سهلة على منصتنا
                            بشكل سريع</p>
                        <div class="clr"></div>
                        <form action="https://www.chakirdev.com/demo/Cars/search.php" method="get" class="formsrch">
                            <div class>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="brand" id="brand">
                                        <option value selected>اختر الماركة</option>
                                        <option value="1">أودي</option>
                                        <option value="2">شفروليه</option>
                                        <option value="3">تويوتا</option>
                                        <option value="4">فولكس فاجن</option>
                                        <option value="5">فورد</option>
                                        <option value="6">كيا</option>
                                        <option value="7">مرسيدس</option>
                                        <option value="8">بورش</option>
                                        <option value="9">لمبورغيني</option>
                                        <option value="11">نيسان</option>
                                        <option value="12">سيتروين</option>
                                        <option value="13">هوندا</option>
                                        <option value="14">هيونداي</option>
                                        <option value="15">فيات</option>
                                        <option value="16">بيجو</option>
                                        <option value="17">لاند روفر</option>
                                        <option value="18">رينو</option>
                                        <option value="19">جاغوار</option>
                                        <option value="20">ميتسوبيشي</option>
                                    </select>
                                </div>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="model" id="subbrand">
                                        <option selected>اختر الموديل</option>
                                    </select>
                                </div>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="typecar">
                                        <option value selected>إختر الحالة</option>
                                        <option value="2">جديدة</option>
                                        <option value="1">مستعملة</option>
                                        <option value="3">كلاهما</option>
                                    </select>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" name="search" class="btn btn-primary"><i
                                            class="fa fa-search"></i> بحث
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
    <div class="hero_slider">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/front/uploads/hero_image.jpeg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/front/uploads/hero1.jpeg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/front/uploads/hero_image.jpeg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                    <a href="#">
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
            <p class="home-title"><i class="fa fa-car"></i> <a href="new-car.html">سيارات جديدة</a></p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-car" class="owl-carousel owl-theme new_cars">
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon4 ribbonplus">173000 $ </span></div>
                    <a href="#"><img
                            src="cars/camaro.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">داسيا دوستر 2019</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">مانيوال</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon icon-brand">
                                <center><img src="brands/Renault-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <center><a href="used-car.html" class="lft btn btn-light" style="margin-top:5px;"><i class="fas fa-car"></i>
                المزيد من السيارات الجديدة</a></center>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> <a href="used-car.html">سيارات مستعملة</a></p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-carold" class="owl-carousel owl-theme">
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon5 ribbonplus">25000 $ </span></div>
                    <a href="#"><img
                            src="cars/car01.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title" style="text-align:center;">تویوتا انوفا </h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">جدة </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2013</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clr"></div>
        <center><a href="used-car.html" class="lft btn btn-light" style="margin-top:5px;"><i class="fas fa-car"></i>
                المزيد من السيارات المستعملة</a></center>
        <div class="clr"></div>
        <center>
            <p class="home-title"><i class="fa fa-car"></i> سيارات الأكثر شهرة</p>
        </center>
        <hr class="style14">
        <div class="clr"></div>
        <div id="owl-topcar" class="owl-carousel owl-theme">
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">85000 $ </span></div>
                    <a href="car/33/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_c200-AMG_%d9%83%d8%aa_2020.html"><img
                            src="uploads/amg.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/33/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_c200-AMG_%d9%83%d8%aa_2020.html">
                            <h5 class="card-title" style="text-align:center;">مرسيدس c200-AMG كت 2020</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2020</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Mercedes-Benz-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">30000 $ </span></div>
                    <a href="car/20/%d8%a7%d9%88%d8%af%d9%8a_A5_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img
                            src="uploads/a5.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/20/%d8%a7%d9%88%d8%af%d9%8a_A5_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">اودي A5 2016 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2016</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Audi-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">85000 $ </span></div>
                    <a href="car/22/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_C_300_4Matic_2015.html"><img
                            src="uploads/b-class.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/22/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_C_300_4Matic_2015.html">
                            <h5 class="card-title" style="text-align:center;">مرسيدس C 300 4Matic 2015</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2020</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Mercedes-Benz-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">12500 $ </span></div>
                    <a
                        href="car/26/%d9%81%d9%88%d8%b1%d8%af_%d9%85%d9%88%d8%b3%d8%aa%d9%86%d8%ac_%d8%aa%d9%8a%d8%b1%d8%a8%d9%88_2017_%d8%a7%d9%85%d8%b1%d9%8a%d9%83%d9%8a.html"><img
                            src="uploads/mustang.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a
                            href="car/26/%d9%81%d9%88%d8%b1%d8%af_%d9%85%d9%88%d8%b3%d8%aa%d9%86%d8%ac_%d8%aa%d9%8a%d8%b1%d8%a8%d9%88_2017_%d8%a7%d9%85%d8%b1%d9%8a%d9%83%d9%8a.html">
                            <h5 class="card-title" style="text-align:center;">فورد موستنج تيربو 2017 امريكي</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Ford-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">25000 $ </span></div>
                    <a href="car/19/%d8%a7%d9%88%d8%af%d9%8a_RS_A3_2015.html"><img
                            src="uploads/83d8be72f731a9977c2ac9e41807ac0d.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/19/%d8%a7%d9%88%d8%af%d9%8a_RS_A3_2015.html">
                            <h5 class="card-title" style="text-align:center;">اودي RS A3 2015</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2015</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Audi-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">71200 $ </span></div>
                    <a href="car/32/%d8%ac%d8%a7%d8%ba%d9%88%d8%a7%d8%b1_XE_2017_%d9%86%d8%b5.html"><img
                            src="uploads/jaqguar.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/32/%d8%ac%d8%a7%d8%ba%d9%88%d8%a7%d8%b1_XE_2017_%d9%86%d8%b5.html">
                            <h5 class="card-title" style="text-align:center;">جاغوار XE 2017 نص</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Porsche-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">20500 $ </span></div>
                    <a href="car/30/%d9%84%d9%84%d8%a8%d9%8a%d8%b9_Yaris_%d9%85%d9%88%d8%af%d9%8a%d9%84_2016.html"><img
                            src="uploads/yaris.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/30/%d9%84%d9%84%d8%a8%d9%8a%d8%b9_Yaris_%d9%85%d9%88%d8%af%d9%8a%d9%84_2016.html">
                            <h5 class="card-title" style="text-align:center;">للبيع Yaris موديل 2016</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Toyota-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">10500 $ </span></div>
                    <a href="car/29/Polo_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img src="uploads/polo.jpg"
                                                                                        class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/29/Polo_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">Polo 2016 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Volkswagen-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">61200 $ </span></div>
                    <a
                        href="car/31/%d8%a8%d9%88%d8%b1%d8%b4_%d8%a8%d8%a7%d9%86%d8%a7%d9%85%d9%8a%d8%b1%d8%a7_S_%d9%81%d9%84_2014.html"><img
                            src="uploads/panamera.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a
                            href="car/31/%d8%a8%d9%88%d8%b1%d8%b4_%d8%a8%d8%a7%d9%86%d8%a7%d9%85%d9%8a%d8%b1%d8%a7_S_%d9%81%d9%84_2014.html">
                            <h5 class="card-title" style="text-align:center;">بورش باناميرا S فل 2014</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Porsche-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">12500 $ </span></div>
                    <a
                        href="car/25/%d9%81%d9%88%d8%b1%d8%af_%d9%81%d9%8a%d8%b3%d8%aa%d8%a7_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img
                            src="uploads/fiesta.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a
                            href="car/25/%d9%81%d9%88%d8%b1%d8%af_%d9%81%d9%8a%d8%b3%d8%aa%d8%a7_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">فورد فيستا 2019 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Ford-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">30000 $ </span></div>
                    <a
                        href="car/24/%d8%b4%d9%81%d8%b1%d9%88%d9%84%d9%8a%d9%87_%d8%a8%d9%84%d9%8a%d8%b2%d8%b1_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img
                            src="uploads/cama.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a
                            href="car/24/%d8%b4%d9%81%d8%b1%d9%88%d9%84%d9%8a%d9%87_%d8%a8%d9%84%d9%8a%d8%b2%d8%b1_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">شفروليه بليزر 2019 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Chevrolet-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">85000 $ </span></div>
                    <a href="car/21/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_c200-AMG_%d9%83%d8%aa_2020.html"><img
                            src="uploads/amg.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/21/%d9%85%d8%b1%d8%b3%d9%8a%d8%af%d8%b3_c200-AMG_%d9%83%d8%aa_2020.html">
                            <h5 class="card-title" style="text-align:center;">مرسيدس c200-AMG كت 2020</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2020</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Mercedes-Benz-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">30000 $ </span></div>
                    <a
                        href="car/23/%d8%b4%d9%81%d8%b1%d9%88%d9%84%d9%8a%d9%87_%d8%a8%d9%84%d9%8a%d8%b2%d8%b1_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img
                            src="uploads/blazer.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a
                            href="car/23/%d8%b4%d9%81%d8%b1%d9%88%d9%84%d9%8a%d9%87_%d8%a8%d9%84%d9%8a%d8%b2%d8%b1_2019_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">شفروليه بليزر 2019 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Chevrolet-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">12500 $ </span></div>
                    <a href="car/28/Vento_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img src="uploads/vento.jpg"
                                                                                         class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/28/Vento_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">Vento 2016 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Volkswagen-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card car-card">
                    <div class="ribbon"><span class="ribbon6 ribbonplus">12500 $ </span></div>
                    <a href="car/27/%d9%86%d9%8a%d8%b3%d8%a7%d9%86_Micra_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html"><img
                            src="uploads/micra.jpg" class="card-img-top"></a>
                    <div class="card-body">
                        <a href="car/27/%d9%86%d9%8a%d8%b3%d8%a7%d9%86_Micra_2016_%d9%84%d9%84%d8%a8%d9%8a%d8%b9.html">
                            <h5 class="card-title" style="text-align:center;">نيسان Micra 2016 للبيع</h5>
                        </a>
                        <div class="card-text">
                            <div class="car-icon">
                                <center><i class="fas fa-dumbbell"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">أتوماتيك</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-map-marker-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">الرباط </span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><i class="fas fa-calendar-alt"></i>
                                    <div class="clr"></div>
                                    <span class="txt-icon">2019</span>
                                </center>
                            </div>
                            <div class="car-icon">
                                <center><img src="brands/Nissan-logo.png"/></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <a
                    href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html"><img
                        src="blogimg/img1.jpg" class="card-img-top"></a>
                <div class="card-body" style="padding:18px;">
                    <a
                        href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html">
                        <h5 class="card-title">أفضل سيارة عائلية من فورد...</h5>
                    </a>
                    <div class="card-text">السيارة العائلية هي تصنيف للسيارات المستخدم في أوروبا لوصف السيارات ذات الحجم
                        الطبيعي. يأتي الاسم من ملائمة هذه السيارات لحمل أسرة...
                    </div>
                    <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته بواسطة Admin في
                            2018-05-09 03:34:01</small></div>
                </div>
            </div>
            <div class="rgt card blog-small">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a
                            href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html"><img
                                src="blogimg/52_22-02-2020_53-201429-cars-fuel-consumption-automotive-industry_700x400.jpg"
                                class="card-img-top"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding:10px;">
                            <a
                                href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html">
                                <h5 class="card-title">أكثر سيارات موفرة في إستهلاك البنزين من فئة السيدان</h5>
                            </a>
                            <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته بواسطة
                                    Admin في 2018-05-09 03:37:45</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rgt card blog-small">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a
                            href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html"><img
                                src="blogimg/img3.jpg" class="card-img-top"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding:10px;">
                            <a
                                href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html">
                                <h5 class="card-title">إليكم أفضل 6 سيارات من فئة السيدان الصغيرة للعام الجديد 2020</h5>
                            </a>
                            <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته بواسطة
                                    Admin في 2018-05-09 03:34:01</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rgt card blog-small">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a
                            href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html"><img
                                src="blogimg/67_22-02-2020_whatsapp_image_2020-02-12_at_9.20.07_pm_2.jpg"
                                class="card-img-top"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding:10px;">
                            <a
                                href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html">
                                <h5 class="card-title">غالية المدني تُقدّم رحلة نجاح سيارة لكزس UX</h5>
                            </a>
                            <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته بواسطة
                                    Admin في 2018-05-09 03:37:45</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rgt card blog-small">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a
                            href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html"><img
                                src="blogimg/img1.jpg" class="card-img-top"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="padding:10px;">
                            <a
                                href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html">
                                <h5 class="card-title">أفضل سيارة عائلية من فورد</h5>
                            </a>
                            <div class="card-text" style="line-height:35px;"><small class="text-muted">تم إضافته بواسطة
                                    Admin في 2018-05-09 03:34:01</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="display-mobile">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="padding:10px;">
                <li class="nav-item T1">
                    <a class="nav-link active" id="pills-t1-tab" data-toggle="pill" href="#pills-t1" role="tab"
                       aria-controls="pills-t1" aria-selected="true" style="border-radius:0px;">الأخبار المتعلقة</a>
                </li>
                <li class="nav-item T2">
                    <a class="nav-link" id="pills-t2-tab" data-toggle="pill" href="#pills-t2" role="tab"
                       aria-controls="pills-t2" aria-selected="false" style="border-radius:0px;">أخبار تهمك</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent" style="padding:10px;">
                <div class="tab-pane fade show active" id="pills-t1" role="tabpanel" aria-labelledby="pills-t1-tab">
                    <ul class="list-unstyled">
                        <li class="media">
                            <a
                                href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html"><img
                                    src="blogimg/67_22-02-2020_whatsapp_image_2020-02-12_at_9.20.07_pm_2.jpg"
                                    class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html">غالية
                                        المدني تُقدّم رحلة نجاح سيارة لكزس UX</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:37:45</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html"><img
                                    src="blogimg/img3.jpg" class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html">إليكم
                                        أفضل 6 سيارات من فئة السيدان الصغيرة للعام الجديد 2020</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:34:01</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html"><img
                                    src="blogimg/52_22-02-2020_53-201429-cars-fuel-consumption-automotive-industry_700x400.jpg"
                                    class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html">أكثر
                                        سيارات موفرة في إستهلاك البنزين من فئة السيدان</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:37:45</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html"><img
                                    src="blogimg/img1.jpg" class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html">أفضل
                                        سيارة عائلية من فورد</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:34:01</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                    </ul>
                </div>
                <div class="tab-pane fade" id="pills-t2" role="tabpanel" aria-labelledby="pills-t2-tab">
                    <ul class="list-unstyled">
                        <li class="media">
                            <a
                                href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html"><img
                                    src="blogimg/img1.jpg" class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/10/%d8%a7%d9%94%d9%81%d8%b6%d9%84-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d8%b9%d8%a7%d9%8a%d9%94%d9%84%d9%8a%d8%a9-%d9%85%d9%86-%d9%81%d9%88%d8%b1%d8%af.html">أفضل
                                        سيارة عائلية من فورد</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:34:01</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html"><img
                                    src="blogimg/52_22-02-2020_53-201429-cars-fuel-consumption-automotive-industry_700x400.jpg"
                                    class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/13/%d8%a3%d9%83%d8%ab%d8%b1-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%88%d9%81%d8%b1%d8%a9-%d9%81%d9%8a-%d8%a5%d8%b3%d8%aa%d9%87%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d8%a8%d9%86%d8%b2%d9%8a%d9%86-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86.html">أكثر
                                        سيارات موفرة في إستهلاك البنزين من فئة السيدان</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:37:45</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html"><img
                                    src="blogimg/67_22-02-2020_whatsapp_image_2020-02-12_at_9.20.07_pm_2.jpg"
                                    class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/11/%d8%ba%d8%a7%d9%84%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%86%d9%8a-%d8%aa%d9%8f%d9%82%d8%af%d9%91%d9%85-%d8%b1%d8%ad%d9%84%d8%a9-%d9%86%d8%ac%d8%a7%d8%ad-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a9-%d9%84%d9%83%d8%b2%d8%b3-UX.html">غالية
                                        المدني تُقدّم رحلة نجاح سيارة لكزس UX</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:37:45</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
                        <li class="media">
                            <a
                                href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html"><img
                                    src="blogimg/img3.jpg" class="mr-3 t-img"></a>
                            <div class="media-body">
                                <h5 class="t-title"><a
                                        href="blogpost/12/%d8%a5%d9%84%d9%8a%d9%83%d9%85-%d8%a3%d9%81%d8%b6%d9%84-6-%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa-%d9%85%d9%86-%d9%81%d8%a6%d8%a9-%d8%a7%d9%84%d8%b3%d9%8a%d8%af%d8%a7%d9%86-%d8%a7%d9%84%d8%b5%d8%ba%d9%8a%d8%b1%d8%a9-%d9%84%d9%84%d8%b9%d8%a7%d9%85-%d8%a7%d9%84%d8%ac%d8%af%d9%8a%d8%af-2020.html">إليكم
                                        أفضل 6 سيارات من فئة السيدان الصغيرة للعام الجديد 2020</a></h5>
                                <small class="text-muted" style="font-size:10px;"><i class="fa fa-calendar-alt"></i>
                                    2018-05-09 03:34:01</small>
                            </div>
                        </li>
                        <hr class="style14">
                        <div class="clr"></div>
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
        <center><a href="#" class="btn gradient-btn btn-lg" style="margin-top:5px;"><i class="fas fa-car"></i>
                قم ببيع سيارتك مجانا</a></center>
        <div class="clr"></div>
        <br>
    </div>
@endsection
