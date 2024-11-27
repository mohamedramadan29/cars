@extends('front.layouts.master')
@section('title')
    {{ $product['name'] }}
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ url('products') }}"> معرض الاداوات الاحتياطية </a></li>

                        <li class="breadcrumb-item active">
                            <a href="#"> {{ $product['name'] }} </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a> {{ $product['name'] }} </a>
                        </li>
                    </ol>
                </nav>
                <h5 class="card-title car-title">{{ $product['name'] }} </h5>
                <div class="clr"></div>
                <div class="RightShowroom">
                    <div id="myCarousel" class="carousel slide">
                        <!-- عرض صور السيارة -->
                        <div class="carousel-inner">
                            <center>
                                <!-- عرض الصورة الرئيسية كأول صورة -->
                                <div class="carousel-item active" data-slide-number="0">
                                    <img src="<?= asset('assets/uploads/Products/' . $product['main_image']) ?>"
                                        class="img-fluid">
                                </div>

                                <!-- عرض صور المعرض -->
                                <?php foreach ($product->gallary as $index => $image): ?>
                                <div class="carousel-item" data-slide-number="<?= $index + 1 ?>">
                                    <img src="<?= asset('assets/uploads/ProductsGallary/' . $image->image) ?>"
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
                            <!-- الصورة الرئيسية كأول صورة مصغرة -->
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" data-bs-slide-to="0" data-bs-target="#myCarousel">
                                    <img src="<?= asset('assets/uploads/Products/' . $product['main_image']) ?>"
                                        class="img-fluid">
                                </a>
                            </li>

                            <!-- عرض صور المعرض كمصغرات -->
                            <?php foreach ($product->gallary as $index => $image): ?>
                            <li class="list-inline-item">
                                <a id="carousel-selector-<?= $index + 1 ?>" data-bs-slide-to="<?= $index + 1 ?>"
                                    data-bs-target="#myCarousel">
                                    <img src="<?= asset('assets/uploads/ProductsGallary/' . $image->image) ?>"
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
                                وصف المنتج
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <p>
                            {{ $product['desc'] }}
                        </p>
                    </div>
                </div>
                <div class="LeftShowrom">
                    <div class>
                        <div class="car-advertiser-info"><i class="fas fa-user-shield"></i> معلومات المعلن </div>
                        <div class="car-advertiser">
                            <a href="#" target="_blank">
                                <img src="{{ asset('assets/front/uploads/logo.png') }}" style="width:32px;"
                                    title="Premium Membership" /> {{ $product['User']['name'] }} </a>
                            <p> عضو {{ \Carbon\Carbon::parse($product['User']['created_at'])->diffForHumans() }} </p>
                            <p> <i style="color: red" class="fas fa-location"></i> <strong> المحافظة : </strong>
                                {{ $product['User']['City']['name'] }} </p>
                        </div>
                        <div class="clr"></div><br>
                        <div class="car-advertiser-info"> السعر </div>
                        <div class="car-prix"> {{ $product['price'] }} $</div>
                        <div class="clr"></div>
                        <div style="font-size:14px;"></div>
                        <button id="phone" type="button" class="btn btn-danger btn-block w-100"
                            style="padding:10px; margin-bottom:10px" data-text-swap="0600000000"
                            data-text-original="Show Number 06xxxx" style="font-size:25px;">
                            <i class="fa fa-phone" aria-hidden="true"></i> الطلب عبر الهاتف
                        </button>

                        <button style="background-color:#19c75a;border-color:#19c75a" type="button"
                            class="btn btn-primary btn-block w-100" data-toggle="modal" data-target="#message"
                            style="padding:10px;"> <i class="fa fa-comments" aria-hidden="true"></i> الطلب عبر الواتساب
                        </button>
                        <div class="clr"></div>

                        <div class="clr"></div><br>
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
            {{--            <div class="likecar"><i class="fa fa-car"></i> إعلانات مشابهة</div> --}}
            {{--            <div id="owl-car" class="owl-carousel owl-theme" style="padding:10px;"> --}}
            {{--                @foreach ($advs as $adv) --}}
            {{--                    <div class="item"> --}}
            {{--                        <div class="card car-card"> --}}
            {{--                            <div class="ribbon"><span class="ribbon4 ribbonplus"> {{ number_format($adv['c_price'], 2) }} --}}
            {{--                                    $ --}}
            {{--                                </span></div> --}}
            {{--                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img --}}
            {{--                                    src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}" --}}
            {{--                                    class="card-img-top"></a> --}}
            {{--                            <div class="card-body"> --}}
            {{--                                <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"> --}}
            {{--                                    <h5 class="card-title" style="text-align:center;"> {{ $adv['c_title'] }} </h5> --}}
            {{--                                </a> --}}
            {{--                                <div class="card-text"> --}}
            {{--                                    <div class="car-icon"> --}}
            {{--                                        <center><i class="fas fa-dumbbell"></i> --}}
            {{--                                            <div class="clr"></div><span class="txt-icon">{{ $adv['c_trans'] }} --}}
            {{--                                            </span> --}}
            {{--                                        </center> --}}
            {{--                                    </div> --}}
            {{--                                    <div class="car-icon"> --}}
            {{--                                        <center><i class="fas fa-map-marker-alt"></i> --}}
            {{--                                            <div class="clr"></div><span class="txt-icon"> {{ $adv['City']['name'] }} --}}
            {{--                                            </span> --}}
            {{--                                        </center> --}}
            {{--                                    </div> --}}
            {{--                                    <div class="car-icon"> --}}
            {{--                                        <center><i class="fas fa-calendar-alt"></i> --}}
            {{--                                            <div class="clr"></div><span class="txt-icon"> --}}
            {{--                                                {{ $adv['c_years'] }}</span> --}}
            {{--                                        </center> --}}
            {{--                                    </div> --}}
            {{--                                    <div class="car-icon"> --}}
            {{--                                        <center><img --}}
            {{--                                                src="{{ asset('assets/uploads/Marks/' . $adv['carMark']['logo']) }}" /> --}}
            {{--                                        </center> --}}
            {{--                                    </div> --}}
            {{--                                </div> --}}
            {{--                            </div> --}}
            {{--                        </div> --}}
            {{--                    </div> --}}
            {{--                @endforeach --}}
            {{--            </div> --}}
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
