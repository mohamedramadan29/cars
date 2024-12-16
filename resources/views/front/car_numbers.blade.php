@extends('front.layouts.master')
@section('title')
    أرقام سيارات مميزة
@endsection
@section('content')
<div class="clearfix2 background section_background"
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
                                <option value selected>اختر الماركة</option>
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
                                <option selected>اختر الموديل</option>
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
                                                $('#subbrand').append('<option value="">حدد الموديل</option>');
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
                                        $('#subbrand').append('<option value="">حدد الموديل</option>');
                                    }
                                });
                                if (oldBrand) {
                                    $('#brand').trigger('change');
                                }
                            });
                        </script>
                        <div class="colum">
                            <select class="custom-select mr-sm-2" name="typecar">
                                <option value selected>إختر الحالة</option>
                                <option value="1">جديدة</option>
                                <option value="2">مستعملة</option>
                                <option value="0">كلاهما</option>
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


    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                {{-- <h5 class="card-title CT1"><i class="fa fa-car"></i> أرقام سيارات مميزة </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight: bold;"> هل لديك أرقام سيارات مميزة ؟ </span>
                    يمكنك إضافة أرقام سياراتك معنا وعرضها على موقعنا </h6>
                <div class="clr"></div>
                <div class="backgroundSR clearfix2 display-desk">
                    <div class="layerSR">
                        <form action="{{ route('car.search') }}" method="get" class="formsrchSR">
                            @csrf
                            <div class="form-row">
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="c_brand" id="brand">
                                        <option value selected>اختر الماركة</option>
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
                                        <option selected>اختر الموديل</option>
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
                                                        $('#subbrand').append('<option value="">حدد الموديل</option>');
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
                                                $('#subbrand').append('<option value="">حدد الموديل</option>');
                                            }
                                        });
                                        if (oldBrand) {
                                            $('#brand').trigger('change');
                                        }
                                    });
                                </script>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="typecar">
                                        <option value selected>إختر الحالة</option>
                                        <option value="1">جديدة</option>
                                        <option value="2">مستعملة</option>
                                        <option value="0">كلاهما</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" name="search" class="btn btn-primary"><i
                                            class="fa fa-search"></i> بحث
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clr"></div>
                <div class="hero_slider">
                    <div class="container-fluid">
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
                                    <img src="{{ asset('assets/front/uploads/hero_image.jpeg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/front/uploads/hero1.jpeg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/front/uploads/hero_image.jpeg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div class="clr"></div>
                <div class="card-text postList" style="padding:20px;">
                    @foreach ($numbers as $number)
                        <div class="rgt card cardnumber">
                            <div class="ribbon"><span class="ribbon5 ribbonplus"><i class="fab fa-free-code-camp"
                                        style="font-size:12px;"></i> رقم مميز </span>
                            </div>
                            <img src="{{ asset('assets/uploads/CarNumbers/' . $number['logo']) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><span><i class="fas fa-sort-numeric-up"></i> الرقم : </span>
                                    {{ $number['car_number'] }} </h5>
                                <h5 class="card-title"><span><i class="fas fa-map-marker-alt"></i> المنطقة : </span>
                                    {{ $number['Country']['name'] }} - {{ $number['City']['name'] }} </h5>
                                <h5 class="card-title"><span><i class="fas fa-user"></i> المالك : </span> {{ $number['User']['name'] }}</h5>
                                <h5 class="card-title"><span><i class="fas fa-money-bill-alt"></i> السعر : </span>
                                    {{ number_format($number['price'], 2) }} ريال</h5>
                                <h5 class="card-title"><span><i class="fas fa-phone"></i> رقم التواصل :</span>
                                    {{ $number['phone'] }} </h5>
                                <h5 class="card-title"><span><i class="far fa-calendar"></i> التاريخ :</span>
                                    {{ $number['created_at'] }} </h5>
                                <a href="tel:{{ $number['phone'] }}" class="btn btn-info btn-sm btn-block"><i
                                        class="fas fa-phone"></i> اتصل </a>
                                <button href="#" class="btn btn-success btn-sm btn-block"><i
                                        class="fas fa-comment"></i> ارسال رسالة  </button>
                            </div>
                        </div>
                    @endforeach
                    <div class="clr"></div>
                    {{--                <center> --}}
                    {{--                    <div class="show_more_main" id="show_more_main1"> --}}
                    {{--                        <span id="1" class="show_more btn gradient-btn" title="Load more posts"> عرض المزيد  </span> --}}
                    {{--                        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span> --}}
                    {{--                    </div> --}}
                    {{--                </center> --}}
                    {{--                <div class="clr"></div> --}}
                    {{--                <div class="clr"></div> --}}
                </div>
            </div>
        </div>
        <div class="clr"></div><br>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show_more', function() {
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loding').show();
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/load_numbers.php',
                    data: 'id=' + ID,
                    success: function(html) {
                        $('#show_more_main' + ID).remove();
                        $('.postList').append(html);
                    }
                });
            });
        });
    </script>
    <div class="clr"></div><br>
@endsection
