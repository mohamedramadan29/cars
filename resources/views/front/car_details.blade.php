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
                        <li class="breadcrumb-item active"><a href="../../index.html"> سيارات للبيع </a></li>
                        <li class="breadcrumb-item active">
                            <a href="../../used-car.html"> / سيارات جديدة </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="../../brand/1/%d8%a3%d9%88%d8%af%d9%8a.html"> {{ $car['carMark']->name }} </a>
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
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- قسم تفاصيل السيارة -->
                        <div class="tab-pane fade show active" id="pills-one" role="tabpanel">
                            <div class="car_details_info">
                                <ul>
                                    <li> <strong> كم : </strong> {{ $car->c_km }} كم</li>
                                    <li> <strong> الماركة : </strong> {{ $car->carMark->name }} </li>
                                    <li> <strong> الموديل : </strong> {{ $car['carBrand']->name }} </li>
                                    <li> <strong> سنة الصنع : </strong> {{ $car->c_year }} </li>
                                    <li> <strong> المحافظة : </strong> {{ $car['City']->name }} </li>

                                </ul>
                                <ul>
                                    <li> <strong> اللون : </strong> {{ $car['c_color'] }} </li>
                                    <li> <strong> نمط السيارة : </strong> {{ $car['c_style'] }} </li>
                                    <li> <strong> ناقل الحركة : </strong> {{ $car['c_trans'] }} </li>
                                    <li> <strong> الوقود : </strong> {{ $car['c_fuel'] }} </li>
                                    <li> <strong> حالة السيارة : </strong> {{ $car['c_type'] }} </li>
                                </ul>
                                <ul>
                                    <li> <strong> الوقود : </strong> {{ $car->c_fuel }} </li>
                                    <li> <strong> ناقل الحركة: </strong> {{ $car->c_trans }} </li>
                                    <li> <strong> الموقع : </strong> {{ $car->City->name }} </li>

                                </ul>
                            </div>

                        </div>

                        <!-- قسم المميزات -->
                        <div class="tab-pane fade" id="pills-three" role="tabpanel">
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> وسائل الراحة </h5>
                                    <div class="card-text">
                                        <?php foreach (explode(',', $car->c_comfort) as $comfort): ?>
                                        <span class="text-muted"><i class="fas fa-check-double"></i> <?= $comfort ?></span>
                                        <div class="clr"></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card car-tajhizat">
                                <div class="card-body">
                                    <h5 class="card-title tajhi-tit"><i class="fas fa-circle-notch"></i> وسائل الامان </h5>
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
                                        <span class="text-muted"><i class="fas fa-check-double"></i> <?= $windows ?></span>
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
                </div>
                <div class="LeftShowrom">
                    <div class>
                        <div class="car-advertiser-info"><i class="fas fa-user-shield"></i> معلومات المعلن </div>
                        <div class="car-advertiser">
                            <a href="#" target="_blank">
                                <img src="{{ asset('assets/front/uploads/logo.png') }}" style="width:32px;"
                                    title="Premium Membership" /> {{ $car['User']['name'] }} </a>
                            <p> عضو {{ \Carbon\Carbon::parse($car['User']['created_at'])->diffForHumans() }} </p>
                            <p> <i style="color: red" class="fas fa-location"></i> <strong> المحافظة : </strong>
                                {{ $car['User']['City']['name'] }} </p>
                        </div>
                        <div class="clr"></div><br>
                        <div class="car-advertiser-info"> السعر </div>
                        <div class="car-prix"> {{ $car['c_price'] }} $</div>
                        <div class="clr"></div>
                        <div style="font-size:14px;"></div>
                        <button id="phone" type="button" class="btn btn-danger btn-block w-100" style="padding:10px; margin-bottom:10px"
                            data-text-swap="0600000000" data-text-original="Show Number 06xxxx" style="font-size:25px;">
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
