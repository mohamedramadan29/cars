@extends('front.layouts.master')
@section('title')
    نتائج البحث
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div><br>
        <div class="card">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1" style="padding: 20px"><i class="fa fa-search"></i> نتائج البحث </h5>
            </div>
        </div>
        <div class="PageCard">

            <div class="clr"></div>
            <div class="card-body" style="padding:0px;">

                <div class="rgt card-text showRight postList" style="padding:5px;">
                    @foreach ($lastadvs as $adv)
                    <div class="card CarCard new_car">
                        <div class="row no-gutters" style="align-items: center;">
                            <div class="col-md-4">
                                <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                                    <img src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                                        class="card-img" alt="{{ $adv['c_title'] }}">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="car_price">{{ number_format($adv['c_price'], 2) }} $</div>
                                    <h5 class="card-title CC2">
                                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">{{ $adv['c_title'] }}</a>
                                    </h5>
                                    <div class="car_more_info">
                                        <div class="card-text">
                                            <div class="rgt ico-car">
                                                <img src="{{ asset('assets/uploads/Marks/' . $adv->carMark->logo) }}">
                                            </div>
                                            <div class="rgt ico-car kmclass">{{ $adv['c_km'] }}
                                                <i class="fas fa-tachometer-alt"></i>
                                            </div>
                                            <div class="rgt ico-car"><i class="fas fa-dumbbell"></i> {{ $adv['c_trans'] }}</div>
                                            <div class="rgt ico-car"><i class="fas fa-calendar-alt"></i> {{ $adv['c_years'] }}</div>
                                        </div>
                                        {{-- <small class="text-muted">{{ $adv['created_at'] }}</small> --}}
                                        <div class="more_details">
                                            <div class="address"><i class="bi bi-geo-alt-fill"></i>
                                                <h6> العراق - {{ $adv->City->name }}</h6>
                                            </div>
                                            <div class="details">
                                                <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"
                                                    class="btn btn-danger btn-sm gradient-btn">التفاصيل</a>
                                            </div>
                                            <div class="details">
                                                <span class="lft"><button id="phone31_{{ $adv['id'] }}" type="button"
                                                        class="btn btn-success btn-sm Phone" data-text-swap="{{ $adv['c_phone'] }}"
                                                        data-text-original="{{ $adv['c_phone'] }}">06xx xxxxxx</button></span>
                                                <script type="text/javascript">
                                                    $("#phone31_{{ $adv['id'] }}").on("click", function() {
                                                        var el = $(this);
                                                        el.text() == el.data("text-swap") ?
                                                            el.text(el.data("text-original")) :
                                                            el.text(el.data("text-swap"));
                                                    });
                                                </script>
                                            </div>
                                            <div class="details adv_user">
                                                <div>
                                                    <i class="bi bi-person-fill"></i>
                                                    <p> البائـــع </p>
                                                </div>
                                                <div>
                                                    <img src="{{ asset('assets/icons/person.png')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clr"></div>
                    {{-- <div class="text-center mt-3">
                        <button class="btn btn-primary gradient-btn" id="load-more" data-page="2"> عرض المزيد من
                            الإعلانات </button>
                        <div id="loading" style="display: none;">تحميل...</div>
                    </div> --}}


                    <div class="clr"></div>
                </div>
                <div class="lft card-text showLeft" style="padding:5px;">
                    <div class="rgt card" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title CC3"><i class="fas fa-search"></i> البحث المتقدم</h5>
                            <div class="clr"></div>
                            <form action="{{ route('car.search') }}" method="GET" class="form-search">
                                @csrf
                                <select class="form-select" name="c_brand" id="brand">
                                    <option selected disabled> اختر الماركة </option>
                                    @foreach ($marks as $mark)
                                        <option value="{{ $mark['id'] }}"
                                            {{ request('c_brand') == $mark['id'] ? 'selected' : '' }}>{{ $mark['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="form-select" name="c_model" id="subbrand">
                                    <option value="" selected disabled> اختر الموديل </option>

                                </select>
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
                                <select class="form-select" name="city" id="subplace">
                                    <option value>حدد المدينة</option>
                                    @foreach ($citizen as $city)
                                        <option value="{{ $city['id'] }}"
                                            {{ request('city') == $city['id'] ? 'selected' : '' }}>
                                            {{ $city['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="form-select" name="years">
                                    <option value="">حدد سنة الصنع</option>
                                    @for ($year = 1999; $year <= 2024; $year++)
                                        <option value="{{ $year }}"
                                            {{ request('years') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>

                                <!-- الوقود -->
                                <select class="form-select" name="fuel">
                                    <option value="">الوقود</option>
                                    @foreach (['بنزين', 'ديزل', 'غاز الطبيعي', 'كهربائي', 'هجين'] as $fuel)
                                        <option value="{{ $fuel }}"
                                            {{ request('fuel') == $fuel ? 'selected' : '' }}>
                                            {{ $fuel }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="form-select" name="color" id="color">
                                    <option value>اللون</option>
                                    <option {{ request('color') == '#95a5a6' ? 'selected' : '' }} value="#95a5a6"
                                        style="background:#95a5a6;color:white;">رمادي </option>
                                    <option {{ request('color') == '#1e272e' ? 'selected' : '' }} value="#1e272e"
                                        style="background:#1e272e;color:white;">أسود </option>
                                    <option {{ request('color') == '#2980b9' ? 'selected' : '' }} value="#2980b9"
                                        style="background:#2980b9;color:white;">أزرق فاتح</option>
                                    <option {{ request('color') == '#2c3e50' ? 'selected' : '' }} value="#2c3e50"
                                        style="background:#2c3e50;color:white;">أزرق داكن</option>
                                    <option {{ request('color') == '#2ecc71' ? 'selected' : '' }} value="#2ecc71"
                                        style="background:#2ecc71;color:white;">أخضر </option>
                                    <option {{ request('color') == '#8e44ad' ? 'selected' : '' }} value="#8e44ad"
                                        style="background:#8e44ad;color:white;">بنفسجي </option>
                                    <option {{ request('color') == '#c0392b' ? 'selected' : '' }} value="#c0392b"
                                        style="background:#c0392b;color:white;">أحمر </option>
                                    <option {{ request('color') == '#e67e22' ? 'selected' : '' }} value="#e67e22"
                                        style="background:#e67e22;color:white;">برتقالي </option>
                                    <option {{ request('color') == '#f1c40f' ? 'selected' : '' }} value="#f1c40f"
                                        style="background:#f1c40f">أصفر </option>
                                    <option {{ request('color') == '#ecf0f1' ? 'selected' : '' }} value="#ecf0f1"
                                        style="background:#ecf0f1">أبيض </option>
                                    <option {{ request('color') == '#fad390' ? 'selected' : '' }} value="#fad390"
                                        style="background:#fad390">بني </option>
                                    <option {{ request('color') == '#ef5777' ? 'selected' : '' }} value="#ef5777"
                                        style="background:#ef5777;color:white;">وردي </option>
                                </select>
                                <select class="form-select" name="class" id="class">
                                    <option value>نمط السيارة</option>
                                    <option {{ request('class') == '4x4' ? 'selected' : '' }} value="4x4">4x4</option>
                                    <option {{ request('class') == 'MVP' ? 'selected' : '' }} value="MVP">MVP</option>
                                    <option {{ request('class') == 'SUV' ? 'selected' : '' }} value="SUV">SUV</option>
                                    <option {{ request('class') == 'رياضية' ? 'selected' : '' }} value="رياضية">رياضية
                                    </option>
                                    <option {{ request('class') == 'ستيشن' ? 'selected' : '' }} value="ستيشن">ستيشن
                                    </option>
                                    <option {{ request('class') == 'سيدان' ? 'selected' : '' }} value="سيدان">سيدان
                                    </option>
                                    <option {{ request('class') == 'فان' ? 'selected' : '' }} value="فان">فان</option>
                                    <option {{ request('class') == 'كابورليه' ? 'selected' : '' }} value="كابورليه">
                                        كابورليه</option>
                                    <option {{ request('class') == 'كروس اوفر' ? 'selected' : '' }} value="كروس اوفر">كروس
                                        اوفر</option>
                                    <option {{ request('class') == 'كوبيه' ? 'selected' : '' }} value="كوبيه">كوبيه
                                    </option>
                                    <option {{ request('class') == 'ميني باص' ? 'selected' : '' }} value="ميني باص">ميني
                                        باص</option>
                                    <option {{ request('class') == 'هاتشباك' ? 'selected' : '' }} value="هاتشباك">هاتشباك
                                    </option>
                                </select>
                                <select class="form-select" name="km" id="km">
                                    <option value>المسافة المقطوعة ب Km</option>
                                    <option {{ request('km') == '0 - 4 999' ? 'selected' : '' }} value="0 - 4 999">0 - 4
                                        999</option>
                                    <option {{ request('km') == '5 000 - 9 999' ? 'selected' : '' }}
                                        value="5 000 - 9 999">5 000 - 9 999</option>
                                    <option {{ request('km') == '10 000 - 14 999' ? 'selected' : '' }}
                                        value="10 000 - 14 999">10 000 - 14 999</option>
                                    <option {{ request('km') == '15 000 - 19 999' ? 'selected' : '' }}
                                        value="15 000 - 19 999">15 000 - 19 999</option>
                                    <option {{ request('km') == '20 000 - 24 999' ? 'selected' : '' }}
                                        value="20 000 - 24 999">20 000 - 24 999</option>
                                    <option {{ request('km') == '25 000 - 29 999' ? 'selected' : '' }}
                                        value="25 000 - 29 999">25 000 - 29 999</option>
                                    <option {{ request('km') == '30 000 - 34 999' ? 'selected' : '' }}
                                        value="30 000 - 34 999">30 000 - 34 999</option>
                                    <option {{ request('km') == '35 000 - 39 999' ? 'selected' : '' }}
                                        value="35 000 - 39 999">35 000 - 39 999</option>
                                    <option {{ request('km') == '40 000 - 44 999' ? 'selected' : '' }}
                                        value="40 000 - 44 999">40 000 - 44 999</option>
                                    <option {{ request('km') == '45 000 - 49 999' ? 'selected' : '' }}
                                        value="45 000 - 49 999">45 000 - 49 999</option>
                                    <option {{ request('km') == '50 000 - 54 999' ? 'selected' : '' }}
                                        value="50 000 - 54 999">50 000 - 54 999</option>
                                    <option {{ request('km') == '55 000 - 59 999' ? 'selected' : '' }}
                                        value="55 000 - 59 999">55 000 - 59 999</option>
                                    <option {{ request('km') == '60 000 - 64 999' ? 'selected' : '' }}
                                        value="60 000 - 64 999">60 000 - 64 999</option>
                                    <option {{ request('km') == '65 000 - 69 999' ? 'selected' : '' }}
                                        value="65 000 - 69 999">65 000 - 69 999</option>
                                    <option {{ request('km') == '70 000 - 74 999' ? 'selected' : '' }}
                                        value="70 000 - 74 999">70 000 - 74 999</option>
                                    <option {{ request('km') == '75 000 - 79 999' ? 'selected' : '' }}
                                        value="75 000 - 79 999">75 000 - 79 999</option>
                                    <option {{ request('km') == '80 000 - 84 999' ? 'selected' : '' }}
                                        value="80 000 - 84 999">80 000 - 84 999</option>
                                    <option {{ request('km') == '85 000 - 89 999' ? 'selected' : '' }}
                                        value="85 000 - 89 999">85 000 - 89 999</option>
                                    <option {{ request('km') == '90 000 - 94 999' ? 'selected' : '' }}
                                        value="90 000 - 94 999">90 000 - 94 999</option>
                                    <option {{ request('km') == '95 000 - 99 999' ? 'selected' : '' }}
                                        value="95 000 - 99 999">95 000 - 99 999</option>
                                    <option {{ request('km') == '100 000 - 109 999' ? 'selected' : '' }}
                                        value="100 000 - 109 999">100 000 - 109 999</option>
                                    <option {{ request('km') == '110 000 - 119 999' ? 'selected' : '' }}
                                        value="110 000 - 119 999">110 000 - 119 999</option>
                                    <option {{ request('km') == '120 000 - 129 999' ? 'selected' : '' }}
                                        value="120 000 - 129 999">120 000 - 129 999</option>
                                    <option {{ request('km') == '130 000 - 139 999' ? 'selected' : '' }}
                                        value="130 000 - 139 999">130 000 - 139 999</option>
                                    <option {{ request('km') == '140 000 - 149 999' ? 'selected' : '' }}
                                        value="140 000 - 149 999">140 000 - 149 999</option>
                                    <option {{ request('km') == '150 000 - 159 999' ? 'selected' : '' }}
                                        value="150 000 - 159 999">150 000 - 159 999</option>
                                    <option {{ request('km') == '160 000 - 169 999' ? 'selected' : '' }}
                                        value="160 000 - 169 999">160 000 - 169 999</option>
                                    <option {{ request('km') == '170 000 - 179 999' ? 'selected' : '' }}
                                        value="170 000 - 179 999">170 000 - 179 999</option>
                                    <option {{ request('km') == '180 000 - 189 999' ? 'selected' : '' }}
                                        value="180 000 - 189 999">180 000 - 189 999</option>
                                    <option {{ request('km') == '190 000 - 199 999' ? 'selected' : '' }}
                                        value="190 000 - 199 999">190 000 - 199 999</option>
                                    <option {{ request('km') == '200 000 - 249 999' ? 'selected' : '' }}
                                        value="200 000 - 249 999">200 000 - 249 999</option>
                                    <option {{ request('km') == '250 000 - 299 999' ? 'selected' : '' }}
                                        value="250 000 - 299 999">250 000 - 299 999</option>
                                    <option {{ request('km') == '300 000 - 349 999' ? 'selected' : '' }}
                                        value="300 000 - 349 999">300 000 - 349 999</option>
                                    <option {{ request('km') == '350 000 - 399 999' ? 'selected' : '' }}
                                        value="350 000 - 399 999">350 000 - 399 999</option>
                                    <option {{ request('km') == '400 000 - 449 999' ? 'selected' : '' }}
                                        value="400 000 - 449 999">400 000 - 449 999</option>
                                    <option {{ request('km') == '450 000 - 499 999' ? 'selected' : '' }}
                                        value="450 000 - 499 999">450 000 - 499 999</option>
                                    <option {{ request('km') == 'أكثر من 500.000' ? 'selected' : '' }}
                                        value="أكثر من 500.000">أكثر من 500.000</option>
                                </select>
                                <div class="clr"></div><br>
                                <span style="font-weight:bold;">نطاق سعر السيارة بالدولار </span>
                                <div class="clr"></div>
                                <span style="font-weight:bold;color:var(--main-color);">من : <span
                                        id="minVal">{{ request('pricemin', 0) }}</span> $</span>
                                <div class="form-group" style="direction:ltr;">
                                    <input type="range" name="pricemin" class="custom-range" min="0"
                                        max="100000" step="10" id="min"
                                        value="{{ request('pricemin', 0) }}">
                                </div>
                                <div class="clr"></div>
                                <span style="font-weight:bold;color:var(--main-color);">إلى : <span
                                        id="maxVal">{{ request('pricemax', 100000) }}</span>$</span>
                                <div class="form-group" style="direction:ltr;">
                                    <input type="range" name="pricemax" class="custom-range" min="0"
                                        max="100000" step="10" id="max"
                                        value="{{ request('pricemax', 100000) }}">
                                </div>
                                <div class="clr"></div><br>
                                <span style="font-weight:bold;padding:5px;">حالة السيارة</span>
                                <div class="clr"></div>
                                <div class="rgt custom-control custom-radio" style="margin:5px;">
                                    <input type="radio" class="custom-control-input" id="1" name="typecar"
                                        value="1" {{ request('typecar') == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="1">جديدة</label>
                                </div>
                                <div class="rgt custom-control custom-radio" style="margin:5px;">
                                    <input type="radio" class="custom-control-input" id="2" name="typecar"
                                        value="2" {{ request('typecar') == '2' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="2">مستعملة</label>
                                </div>
                                <div class="rgt custom-control custom-radio" style="margin:5px;">
                                    <input type="radio" class="custom-control-input" id="3" name="typecar"
                                        value="0" {{ request('typecar') == '0' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="3">كلاهما</label>
                                </div>
                                <div class="clr"></div><br>
                                <button type="submit" name="search" class="btn btn-primary btn-block main_seach_button"><i
                                        class="fas fa-search"></i> البحث </button>
                            </form>
                        </div>
                    </div>
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
                    url: 'load_newcar.php',
                    data: 'id=' + ID,
                    success: function(html) {
                        $('#show_more_main' + ID).remove();
                        $('.postList').append(html);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        // تحديث القيم الظاهرة عند تغيير المدخلات
        $(document).ready(function() {
            $('#min').on('input', function() {
                $('#minVal').text(this.value);
            });

            $('#max').on('input', function() {
                $('#maxVal').text(this.value);
            });

            // تعيين القيم المبدئية من الحقول مباشرة
            $('#min').trigger('input');
            $('#max').trigger('input');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#owl-car').owlCarousel({
                rtl: true,
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
    <div class="clr"></div><br>
@endsection
