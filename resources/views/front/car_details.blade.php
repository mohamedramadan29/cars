@extends('front.layouts.master')
@section('title')
    {{ $car['c_title'] }}
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ url('/') }}"> سيارات للبيع </a></li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('new-cars') }}"> / سيارات جديدة </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ url('brand/' . $car['carMark']->slug) }}"> {{ $car['carMark']->name }} </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a> {{ $car['c_title'] }} </a>
                        </li>
                    </ol>
                </nav>
                <h5 class="card-title car-title">{{ $car['c_title'] }} </h5>
                <div class="clr"></div>
                <div class="RightShowroom">
                    <div id="myCarousel" class="carousel slide">
                        <!-- عرض صور السيارة -->
                        <div class="carousel-inner">
                            <center>
                                <?php foreach ($car->carImages as $index => $image): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>"
                                    data-slide-number="<?= $index ?>">
                                    <img src="<?= asset('assets/uploads/carImages/' . $image->c_image) ?>"
                                        class="img-fluid">
                                </div>
                                <?php endforeach; ?>
                            </center>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"><i
                                        class="fas fa-star"></i></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>

                        <!-- عرض الصور المصغرة -->
                        <ul class="carousel-indicators list-inline mx-auto border px-2 thubnail_car_image">
                            <?php foreach ($car->carImages as $index => $image): ?>
                            <li class="list-inline-item <?= $index === 0 ? 'active' : '' ?>">
                                <a id="carousel-selector-<?= $index ?>" data-bs-slide-to="<?= $index ?>"
                                    data-bs-target="#myCarousel">
                                    <img src="<?= asset('assets/uploads/CarImages/' . $image->c_image) ?>"
                                        class="img-fluid">
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- عرض التفاصيل -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link car-tab active" id="pills-one-tab" data-bs-toggle="pill" href="#pills-one"
                                role="tab">
                                تفاصيل السيارة
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link car-tab" id="pills-three-tab" data-bs-toggle="pill" href="#pills-three"
                                role="tab">
                                المميزات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="text-decoration: none;color:#000"> <i
                                    style="color:red" class="fas fa-heart"></i>
                                اضف الي المفضلة
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="text-decoration: none;color:#000"> <i
                                    style="color:red" class="fas fa-share"></i>
                                شارك الإعلان
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- قسم تفاصيل السيارة -->
                        <div class="tab-pane fade show active" id="pills-one" role="tabpanel">
                            <div class="car-info-section">
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car16.svg') }}" alt="المسافة">
                                    <div class="car-info-title">المسافة</div>
                                    <div class="car-info-value">1350 كم</div>
                                </div>
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car15.svg') }}" alt="سيارة">
                                    <div class="car-info-title">الهيكل</div>
                                    <div class="car-info-value">صغير</div>
                                </div>
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car14.svg') }}" alt="وقود">
                                    <div class="car-info-title">نوع الوقود</div>
                                    <div class="car-info-value">بنزين</div>
                                </div>
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car13.svg') }}" alt="محرك">
                                    <div class="car-info-title">المحرك</div>
                                    <div class="car-info-value">2.0 لتر</div>
                                </div>
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car12.svg') }}" alt="ناقل">
                                    <div class="car-info-title">ناقل الحركة</div>
                                    <div class="car-info-value">أتوماتيك</div>
                                </div>
                                <div class="car-info-box">
                                    <img src="{{ asset('assets/icons/car11.svg') }}" alt="الدفع">
                                    <div class="car-info-title">الدفع</div>
                                    <div class="car-info-value">4WD</div>
                                </div>
                            </div>
                            <div class="car_details_info">
                                <ul>
                                    <li> <strong> كم : </strong> <span> {{ $car->c_km }} كم </span> <img
                                            src="{{ asset('assets/icons/car1.png') }}" alt=""> </li>
                                    <li> <strong> الماركة : </strong> <span> {{ $car->carMark->name }} </span> <img
                                            src="{{ asset('assets/uploads/Marks/' . $car->carMark->logo) }}"
                                            alt=""> </li>
                                    <li> <strong> الموديل : </strong> <span> {{ $car['carBrand']->name }} </span> <img
                                            src="{{ asset('assets/icons/car2.svg') }}" alt=""> </li>
                                    <li> <strong> سنة الصنع : </strong> <span> {{ $car->c_year }} </span> <img
                                            src="{{ asset('assets/icons/car3.svg') }}" alt=""> </li>
                                    <li> <strong> المحافظة : </strong> <span> {{ $car['City']->name }} </span> <img
                                            src="{{ asset('assets/icons/car4.png') }}" alt=""> </li>

                                </ul>
                                <ul>
                                    <li> <strong> اللون : </strong> <span
                                            style="border: 5px solid {{ $car['c_color'] }};width:40px "></span> <img
                                            src="{{ asset('assets/icons/car5.svg') }}" alt=""> </li>
                                    <li> <strong> نمط السيارة : </strong> <span> {{ $car['c_style'] }} </span> <img
                                            src="{{ asset('assets/icons/car6.svg') }}" alt=""> </li>
                                    <li> <strong> ناقل الحركة : </strong> <span> {{ $car['c_trans'] }} </span> <img
                                            src="{{ asset('assets/icons/car7.svg') }}" alt=""> </li>
                                    <li> <strong> الوقود : </strong> <span> {{ $car['c_fuel'] }} </span> <img
                                            src="{{ asset('assets/icons/car8.svg') }}" alt=""> </li>
                                    <li> <strong> حالة السيارة : </strong> <span>
                                            @if ($car['c_type'] == 1)
                                                جديدة
                                            @else
                                                مستعلمة
                                            @endif
                                        </span> <img src="{{ asset('assets/icons/car9.svg') }}" alt=""> </li>
                                </ul>
                                <ul>
                                    <li> <strong> كم : </strong> <span> {{ $car->c_km }} كم </span> <img
                                            src="{{ asset('assets/icons/car1.png') }}" alt=""> </li>
                                    <li> <strong> الماركة : </strong> <span> {{ $car->carMark->name }} </span> <img
                                            src="{{ asset('assets/uploads/Marks/' . $car->carMark->logo) }}"
                                            alt=""> </li>
                                    <li> <strong> الموديل : </strong> <span> {{ $car['carBrand']->name }} </span> <img
                                            src="{{ asset('assets/icons/car2.svg') }}" alt=""> </li>
                                    <li> <strong> سنة الصنع : </strong> <span> {{ $car->c_year }} </span> <img
                                            src="{{ asset('assets/icons/car3.svg') }}" alt=""> </li>
                                    <li> <strong> المحافظة : </strong> <span> {{ $car['City']->name }} </span> <img
                                            src="{{ asset('assets/icons/car4.png') }}" alt=""> </li>

                                </ul>
                            </div>

                        </div>

                        <!-- قسم المميزات -->
                        <div class="tab-pane fade" id="pills-three" role="tabpanel">
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> وسائل الراحة
                                    </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_comfort) as $comfort): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i>
                                            <?= $comfort ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> وسائل الامان
                                    </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_safety) as $safety): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i> <?= $safety ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> نوافذ </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_windows) as $windows): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i>
                                            <?= $windows ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> نظام الصوت </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_sound) as $sound): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i> <?= $sound ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> آخرى </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_other) as $other): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i> <?= $other ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="car_description">
                        <h3 class="desc_button"> الوصف </h3>
                        <p> {{ $car['more_info'] }} </p>
                    </div>
                    <div class="car_description">
                        <h3 class="desc_button"> ارشادات الامان </h3>
                        <ul>
                            <li> <i class="bi bi-check"></i> الحرص علي مقابلة البائع شخصيا والتأكد من هويته ( يفضل
                                مقابلته بمكان عام بحضور أحد الأصدقاء ). </li>
                            <li> <i class="bi bi-check"></i> التأكد من معاينة المنتج وفحصه من قبل مختصين. </li>
                            <li> <i class="bi bi-check"></i> توثيق عملية البيع/الشراء مع ذكر تفاصيل كاملة للمنتج. </li>
                            <li> <i class="bi bi-check"></i> عدم تحويل أي أموال إلا بعد التأكد من ( هوية البائع و توثيق
                                عملية البيع وإستلام المنتج ). </li>
                            <li> <i class="bi bi-check"></i> الحرص علي الحصول علي سند قبض موقع من البائع. </li>
                        </ul>
                    </div>
                </div>
                <div class="LeftShowrom">
                    <div class>
                        <div class="car-advertiser-info"><i class="fas fa-user-shield"></i> معلومات المعلن </div>
                        <div class="car-advertiser">
                            <a href="#" target="_blank">
                                <img src="{{ asset('assets/front/uploads/logo.png') }}" style="width:32px;"
                                    title="Premium Membership" /> {{ $car['User']['name'] }} </a>
                            <p> عضو {{ \Carbon\Carbon::parse($car['User']['created_at'])->diffForHumans() }} </p>
                            <p> <i style="color: red" class="fas fa-location"></i> <strong> المنطقة : </strong>
                                {{ $car['Country']['name'] }} -{{ $car['City']['name'] }} </p>
                        </div>
                        <div class="clr"></div><br>
                        <div class="car-advertiser-info"> السعر </div>
                        <div class="car-prix"> {{ number_format($car['c_price'], 2) }} $</div>
                        <div class="clr"></div>
                        <div style="font-size:14px;"></div>
                        <button id="phone" type="button" class="btn btn-success btn-block w-100"
                            style="padding:10px; margin-bottom:10px" data-text-swap="0600000000"
                            data-text-original="Show Number 06xxxx" style="font-size:25px;">
                            <i class="bi bi-whatsapp" aria-hidden="true"></i> واتساب
                        </button>
                        <button id="phone" type="button" class="btn btn-danger btn-block w-100"
                            style="padding:10px; margin-bottom:10px" data-text-swap="0600000000"
                            data-text-original="Show Number 06xxxx" style="font-size:25px;">
                            <i class="fa fa-phone" aria-hidden="true"></i> هاتف
                        </button>

                        <button type="button" class="btn btn-primary btn-block w-100" data-toggle="modal"
                            data-target="#message" style="padding:10px;"> <i class="fa fa-comments"
                                aria-hidden="true"></i> تواصل عبر الرسائل </button>
                        <div class="clr"></div>

                        <div class="clr"></div><br>
                        <div class="car-viptxt"><i class="fas fa-shield-alt"></i> اعلان مميز </div>
                    </div>
                    <script type="text/javascript">
                        $("#phone").on("click", function() {
                            var el = $(this);
                            el.text() == el.data("text-swap") ?
                                el.text(el.data("text-original")) :
                                el.text(el.data("text-swap"));
                        });
                    </script>
                    <div class="clr"></div>

                    <div class="modal fade" id="message" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send a message to chakirdev</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">You must be logged in.
                                        <div class="clr"></div>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#LoginModal" id="logModal" style="margin-top:10px;"> Click here
                                            to register</button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="alert" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title car-alerttxt" id="exampleModalLabel"><i
                                            class="fas fa-ban"></i> Report this announcement</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">You must be logged in.
                                        <div class="clr"></div>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#LoginModal" id="logModal2" style="margin-top:10px;"> Click here
                                            to register</button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="likecar"><i class="fa fa-car"></i> إعلانات مشابهة</div>
            <div id="owl-car" class="owl-carousel owl-theme" style="padding:10px;">
                @foreach ($advs as $adv)
                    <div class="item">
                        <div class="card car-card">
                            <div class="ribbon"><span class="ribbon4 ribbonplus"> {{ number_format($adv['c_price'], 2) }}
                                    $
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
                                            <div class="clr"></div><span class="txt-icon">{{ $adv['c_trans'] }}
                                            </span>
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
                                            <div class="clr"></div><span class="txt-icon">
                                                {{ $adv['c_years'] }}</span>
                                        </center>
                                    </div>
                                    <div class="car-icon">
                                        <center><img
                                                src="{{ asset('assets/uploads/Marks/' . $adv['carMark']['logo']) }}" />
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="clr"></div><br>




    <script>
        $("#logModal").click(function() {
            var button = $(this);

            var id = button.val();

            button.closest(".modal").modal('hide');
            $('#' + id).modal('show');
        });
        $("#logModal2").click(function() {
            var button = $(this);

            var id = button.val();

            button.closest(".modal").modal('hide');
            $('#' + id).modal('show');
        });
        $(document).ready(function() {
            $('#owl-car').owlCarousel({
                rtl: false,
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 2,
                        nav: false
                    },
                    800: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false,
                        loop: false
                    }
                }
            });
        });
    </script>
@endsection
