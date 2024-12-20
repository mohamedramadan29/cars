@extends('front.layouts.master')
@section('title')
    الوكالات
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
                {{-- <h5 class="card-title CT1"><i class="fa fa-car"></i> وكالات السيارات</h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight:bold;">هل لديك وكالة ؟</span> يمكنك إضافة
                    وكالتك معنا وعرض سياراتك على موقعنا</h6>
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
                </div> --}}
                <div class="clr"></div>
                {{-- <div class="hero_slider">
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
                <div class="card-text" style="padding:20px;">
                    <div class="rgt RightShowroom postList">
                        @foreach ($agencies as $agency)
                            <div class="rgt card showroomsCard">
                                <div class="row no-gutters">
                                    <div class="ImgPart"> 
                                            <span class="ribbon5 ribbonplus"><i class="fab fa-free-code-camp"
                                                    style="font-size:12px;"></i> وكالة
                                                مميزة</span>
                                        <center><a href="{{ url('agency/' . $agency['slug']) }}"><img
                                                    src="{{ asset('assets/uploads/Agency/' . $agency['logo']) }}"
                                                    class="card-img-agency" alt="{{ $agency['name'] }}"></a></center>
                                    </div>
                                    <div class="ContentPart">
                                        <div class="card-body">
                                            <a href="{{ url('agency/' . $agency['slug']) }}">
                                                <h5 class="card-title CT2"> {{ $agency['name'] }} </h5>
                                            </a>
                                            <p class="card-text"> {{ $agency['address'] }} </p>
                                            <p class="card-text">
                                            <div class="rgt Tag"><i class="fa fa-map-marker-alt"></i>
                                                {{ $agency['Country']['name'] }} - {{ $agency['City']['name'] }}
                                            </div>
                                            <div class="rgt Tag"><i class="fa fa-car"></i> عدد السيارات :
                                                {{ count($agency['advs']) }}</div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clr"></div>
                        <center>
                            {{--                            <div class="show_more_main" id="show_more_main1"> --}}
                            {{--                                <span id="1" class="show_more btn gradient-btn" --}}
                            {{--                                      title="Load more posts">عرض المزيد</span> --}}
                            {{--                                <span class="loding" style="display: none;"><span --}}
                            {{--                                        class="loding_txt">Loading...</span></span> --}}
                            {{--                            </div> --}}
                        </center>
                        <div class="clr"></div>
                    </div>
                    <div class="rgt LeftShowrom">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight:bold;font-size:18px;">هل لديك وكالة ترغب في
                                    تسجيلها ؟</h5>
                                <p class="card-text"> يمكنك إضافة وكالتك معنا وعرض سياراتك على موقعنا</p>
                            </div>
                            <a href="{{ url('user/agency') }}" class="btn gradient-btn"
                                style="border-radius:0px;padding:30px;"><i class="fa fa-plus" style="font-size:12px;"></i>
                                سجل وكالتك الآن</a>
                        </div>
                        <div class="clr"></div>
                        <br>
                        <a href="#"><img src="{{ asset('uploads/banner1.png') }}" /></a>
                        <div class="clr"></div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <br>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show_more', function() {
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loding').show();
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/load_agencies.php',
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
