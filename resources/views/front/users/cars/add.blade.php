@extends('front.layouts.master')
@section('title')
    إضافة سيارة
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div id="HomePage">
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
        <center>
            <p class="home-title"><i class="fa fa-car"></i> بيع سيارتك مجانا </p>
        </center>
        <div class="clr"></div>
        <br>
        <div class="card CreateCard">
            <div class="card CreateCard">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight:bold;color:var(--main-color)">أدخل معلومات سيارتك</h5>
                    <h6 class="card-subtitle mb-2 text-muted">جميع الحقول التي تحمل علامة <span
                            style="color:#c72510;">*</span> إلزامية</h6>
                    <div class="card-text" style="padding-top:20px;">
                        <form action="{{ url('user/car/add') }}" method="post" id="uploadForm" name="carForm"
                            enctype="multipart/form-data" data-gtm-form-interact-id="0">
                            @csrf
                            <div class="rgt CreateCol1">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">عنوان الإعلان <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_title"
                                        placeholder="مثال : أودي A3 إصدار 2015 بحالة ممتازة" style="height:50px;" required
                                        value="{{ old('c_title') }}">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الماركة<span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" style="height:50px;" name="c_brand" id="brand" required>
                                        <option value="" selected disabled>حدد الماركة</option>
                                        @foreach ($marks as $mark)
                                            <option
                                                {{ old('c_brand', request('c_brand')) == $mark['id'] ? 'selected' : '' }}
                                                value="{{ $mark['id'] }}"> {{ $mark['name'] }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الموديل <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select required class="form-select" name="c_model" id="subbrand" style="height:50px;">
                                        <option value="">حدد الموديل</option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var oldBrand = "{{ old('c_brand', request('c_brand')) }}";
                                        var oldModel = "{{ old('c_model') }}";
                                        $('#brand').on('change', function() {
                                            var brandId = $(this).val();
                                            if (brandId) {
                                                var ajaxRequest = $.ajax({
                                                    url: '/getModels/' + brandId, // Update with your route
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

                                <small>إذا لم تجد موديل السيارة في التصنيف فقم<a href="{{ url('contact_us') }}">بالإتصال
                                        بنا</a></small>
                                <div class="clr"></div>
                                <br>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre"> ناقل الحركة<span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select required class="form-select" name="c_trans" style="height:50px;">
                                        <option value="" selected disabled>حدد</option>
                                        <option {{ old('c_trans', request('c_trans')) == 'مانيوال' ? 'selected' : '' }}
                                            value="مانيوال">
                                            مانيوال
                                        </option>
                                        <option {{ old('c_trans', request('c_trans')) == 'أتوماتيك' ? 'selected' : '' }}
                                            value="أتوماتيك">
                                            أتوماتيك
                                        </option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الكيلومترات</div>
                                    </div>
                                    <select required class="form-select" name="c_km" style="height:50px;direction:ltr;">
                                        <option value="0 - 4999">0 - 4999</option>
                                        <option {{ old('c_km', request('c_km')) == '5 000 - 9 999' ? 'selected' : '' }}
                                            value="5 000 - 9 999">
                                            5 000 - 9 999
                                        </option>
                                        <option {{ old('c_km', request('c_km')) == '10 000 - 14 999' ? 'selected' : '' }}
                                            value="10 000 - 14 999">10 000 - 14 999</option>
                                        <option {{ old('c_km', request('c_km')) == '15 000 - 19 999' ? 'selected' : '' }}
                                            value="15 000 - 19 999">15 000 - 19 999</option>
                                        <option {{ old('c_km', request('c_km')) == '20 000 - 24 999' ? 'selected' : '' }}
                                            value="20 000 - 24 999">20 000 - 24 999</option>
                                        <option {{ old('c_km', request('c_km')) == '25 000 - 29 999' ? 'selected' : '' }}
                                            value="25 000 - 29 999">25 000 - 29 999</option>
                                        <option {{ old('c_km', request('c_km')) == '30 000 - 34 999' ? 'selected' : '' }}
                                            value="30 000 - 34 999">30 000 - 34 999</option>
                                        <option {{ old('c_km', request('c_km')) == '35 000 - 39 999' ? 'selected' : '' }}
                                            value="35 000 - 39 999">35 000 - 39 999</option>
                                        <option {{ old('c_km', request('c_km')) == '40 000 - 44 999' ? 'selected' : '' }}
                                            value="40 000 - 44 999">40 000 - 44 999</option>
                                        <option {{ old('c_km', request('c_km')) == '45 000 - 49 999' ? 'selected' : '' }}
                                            value="45 000 - 49 999">45 000 - 49 999</option>
                                        <option {{ old('c_km', request('c_km')) == '50 000 - 54 999' ? 'selected' : '' }}
                                            value="50 000 - 54 999">50 000 - 54 999</option>
                                        <option {{ old('c_km', request('c_km')) == '55 000 - 59 999' ? 'selected' : '' }}
                                            value="55 000 - 59 999">55 000 - 59 999</option>
                                        <option {{ old('c_km', request('c_km')) == '60 000 - 64 999' ? 'selected' : '' }}
                                            value="60 000 - 64 999">60 000 - 64 999</option>
                                        <option {{ old('c_km', request('c_km')) == '65 000 - 69 999' ? 'selected' : '' }}
                                            value="65 000 - 69 999">65 000 - 69 999</option>
                                        <option {{ old('c_km', request('c_km')) == '70 000 - 74 999' ? 'selected' : '' }}
                                            value="70 000 - 74 999">70 000 - 74 999</option>
                                        <option {{ old('c_km', request('c_km')) == '75 000 - 79 999' ? 'selected' : '' }}
                                            value="75 000 - 79 999">75 000 - 79 999</option>
                                        <option {{ old('c_km', request('c_km')) == '80 000 - 84 999' ? 'selected' : '' }}
                                            value="80 000 - 84 999">80 000 - 84 999</option>
                                        <option {{ old('c_km', request('c_km')) == '85 000 - 89 999' ? 'selected' : '' }}
                                            value="85 000 - 89 999">85 000 - 89 999</option>
                                        <option {{ old('c_km', request('c_km')) == '90 000 - 94 999' ? 'selected' : '' }}
                                            value="90 000 - 94 999">90 000 - 94 999</option>
                                        <option {{ old('c_km', request('c_km')) == '95 000 - 99 999' ? 'selected' : '' }}
                                            value="95 000 - 99 999">95 000 - 99 999</option>
                                        <option {{ old('c_km', request('c_km')) == '100 000 - 109 999' ? 'selected' : '' }}
                                            value="100 000 - 109 999">100 000 - 109 999</option>
                                        <option {{ old('c_km', request('c_km')) == '110 000 - 119 999' ? 'selected' : '' }}
                                            value="110 000 - 119 999">110 000 - 119 999</option>
                                        <option {{ old('c_km', request('c_km')) == '120 000 - 129 999' ? 'selected' : '' }}
                                            value="120 000 - 129 999">120 000 - 129 999</option>
                                        <option {{ old('c_km', request('c_km')) == '130 000 - 139 999' ? 'selected' : '' }}
                                            value="130 000 - 139 999">130 000 - 139 999</option>
                                        <option {{ old('c_km', request('c_km')) == '140 000 - 149 999' ? 'selected' : '' }}
                                            value="140 000 - 149 999">140 000 - 149 999</option>
                                        <option {{ old('c_km', request('c_km')) == '150 000 - 159 999' ? 'selected' : '' }}
                                            value="150 000 - 159 999">150 000 - 159 999</option>
                                        <option {{ old('c_km', request('c_km')) == '160 000 - 169 999' ? 'selected' : '' }}
                                            value="160 000 - 169 999">160 000 - 169 999</option>
                                        <option {{ old('c_km', request('c_km')) == '170 000 - 179 999' ? 'selected' : '' }}
                                            value="170 000 - 179 999">170 000 - 179 999</option>
                                        <option {{ old('c_km', request('c_km')) == '180 000 - 189 999' ? 'selected' : '' }}
                                            value="180 000 - 189 999">180 000 - 189 999</option>
                                        <option {{ old('c_km', request('c_km')) == '190 000 - 199 999' ? 'selected' : '' }}
                                            value="190 000 - 199 999">190 000 - 199 999</option>
                                        <option {{ old('c_km', request('c_km')) == '200 000 - 249 999' ? 'selected' : '' }}
                                            value="200 000 - 249 999">200 000 - 249 999</option>
                                        <option {{ old('c_km', request('c_km')) == '250 000 - 299 999' ? 'selected' : '' }}
                                            value="250 000 - 299 999">250 000 - 299 999</option>
                                        <option {{ old('c_km', request('c_km')) == '300 000 - 349 999' ? 'selected' : '' }}
                                            value="300 000 - 349 999">300 000 - 349 999</option>
                                        <option {{ old('c_km', request('c_km')) == '350 000 - 399 999' ? 'selected' : '' }}
                                            value="350 000 - 399 999">350 000 - 399 999</option>
                                        <option {{ old('c_km', request('c_km')) == '400 000 - 449 999' ? 'selected' : '' }}
                                            value="400 000 - 449 999">400 000 - 449 999</option>
                                        <option {{ old('c_km', request('c_km')) == '450 000 - 499 999' ? 'selected' : '' }}
                                            value="450 000 - 499 999">450 000 - 499 999</option>
                                        <option {{ old('c_km', request('c_km')) == 'أكثر من 500.000' ? 'selected' : '' }}
                                            value="أكثر من 500.000">أكثر من 500.000</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الوقود <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_fuel" style="height:50px;">
                                        <option value="بنزين" {{ old('c_fuel') == 'بنزين' ? 'selected' : '' }}>بنزين
                                        </option>
                                        <option value="ديزل" {{ old('c_fuel') == 'ديزل' ? 'selected' : '' }}>ديزل
                                        </option>
                                        <option value="غاز الطبيعي"
                                            {{ old('c_fuel') == 'غاز الطبيعي' ? 'selected' : '' }}>غاز الطبيعي</option>
                                        <option value="كهربائي" {{ old('c_fuel') == 'كهربائي' ? 'selected' : '' }}>كهربائي
                                        </option>
                                        <option value="هجين" {{ old('c_fuel') == 'هجين' ? 'selected' : '' }}>هجين
                                        </option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">حالة السيارة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_type" style="height:50px;" required="">
                                        <option value="1" {{ old('c_type') == '1' ? 'selected' : '' }}>مستعملة
                                        </option>
                                        <option value="2" {{ old('c_type') == '2' ? 'selected' : '' }}>جديدة</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre" style="line-height: 4.7;">اللون
                                            الخارجي <span style="color:#c72510;">*</span></div>
                                    </div>
                                    <div class="color-picker">
                                        <ul class="color-list">
                                            <li class="color" data-color="#2ecc71"
                                                style="background: rgb(46, 204, 113);"></li>
                                            <li class="color" data-color="#2980b9"
                                                style="background: rgb(41, 128, 185);"></li>
                                            <li class="color" data-color="#8e44ad"
                                                style="background: rgb(142, 68, 173);"></li>
                                            <li class="color" data-color="#c0392b"
                                                style="background: rgb(192, 57, 43);"></li>
                                            <li class="color" data-color="#e67e22"
                                                style="background: rgb(230, 126, 34);"></li>
                                            <li class="color" data-color="#f1c40f"
                                                style="background: rgb(241, 196, 15);"></li>
                                            <li class="color" data-color="#2c3e50" style="background: rgb(44, 62, 80);">
                                            </li>
                                            <li class="color active" data-color="#ecf0f1"
                                                style="background: rgb(236, 240, 241);"></li>
                                            <li class="color" data-color="#95a5a6"
                                                style="background: rgb(149, 165, 166);"></li>
                                            <li class="color" data-color="#fad390"
                                                style="background: rgb(250, 211, 144);"></li>
                                            <li class="color" data-color="#f6b93b"
                                                style="background: rgb(246, 185, 59);"></li>
                                            <li class="color" data-color="#ef5777"
                                                style="background: rgb(239, 87, 119);"></li>
                                            <li class="color" data-color="#A3CB38"
                                                style="background: rgb(163, 203, 56);"></li>
                                            <li class="color" data-color="#1e272e" style="background: rgb(30, 39, 46);">
                                            </li>
                                        </ul>
                                        <input type="hidden" name="c_color" class="form-control" id="setColor"
                                            value="{{ old('c_color', '#ecf0f1') }}">

                                    </div>
                                    <script>
                                        var selector = '.color-list .color';
                                        $(".color").css('background', function() {
                                            return $(this).data('color')
                                        });

                                        $(selector).on('click', function() {
                                            var colorHEX = $(this).data('color');
                                            $(selector).removeClass('active');
                                            $(this).addClass('active');
                                            $('#setColor').val(colorHEX);

                                            function setValue() {
                                                document.carForm.setColor.value = colorHEX;
                                                document.forms["carForm"].submit();
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="clr"></div>
                                <br>
                            </div>
                            <div class="rgt CreateCol2">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">سنة الصنع <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_years" style="height:50px;">
                                        <option value="#">حدد سنة</option>
                                        @for ($year = 1999; $year <= 2025; $year++)
                                            <option value="{{ $year }}"
                                                {{ old('c_years') == $year ? 'selected' : '' }}>{{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">نمط السيارة</div>
                                    </div>
                                    <select class="form-select" name="c_style" style="height:50px;">
                                        <option value="">حدد نمط السيارة</option>
                                        <option value="4x4" {{ old('c_style') == '4x4' ? 'selected' : '' }}>4x4
                                        </option>
                                        <option value="MVP" {{ old('c_style') == 'MVP' ? 'selected' : '' }}>MVP
                                        </option>
                                        <option value="SUV" {{ old('c_style') == 'SUV' ? 'selected' : '' }}>SUV
                                        </option>
                                        <option value="رياضية" {{ old('c_style') == 'رياضية' ? 'selected' : '' }}>رياضية
                                        </option>
                                        <option value="ستيشن" {{ old('c_style') == 'ستيشن' ? 'selected' : '' }}>ستيشن
                                        </option>
                                        <option value="سيدان" {{ old('c_style') == 'سيدان' ? 'selected' : '' }}>سيدان
                                        </option>
                                        <option value="فان" {{ old('c_style') == 'فان' ? 'selected' : '' }}>فان
                                        </option>
                                        <option value="كابورليه" {{ old('c_style') == 'كابورليه' ? 'selected' : '' }}>
                                            كابورليه</option>
                                        <option value="كروس اوفر" {{ old('c_style') == 'كروس اوفر' ? 'selected' : '' }}>
                                            كروس اوفر</option>
                                        <option value="كوبيه" {{ old('c_style') == 'كوبيه' ? 'selected' : '' }}>كوبيه
                                        </option>
                                        <option value="ميني باص" {{ old('c_style') == 'ميني باص' ? 'selected' : '' }}>ميني
                                            باص</option>
                                        <option value="هاتشباك" {{ old('c_style') == 'هاتشباك' ? 'selected' : '' }}>
                                            هاتشباك</option>
                                    </select>

                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">السعر <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="number" class="form-control" name="c_price"
                                        placeholder="بكم ستبيع السيارة ؟" style="height:50px;" required=""
                                        value="{{ old('c_price') }}">

                                </div>
                                <div class="clr"></div>
                                <br><br>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre"> المدينة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_place" id="place" style="height:50px;"
                                        required="">
                                        <option value="">حدد المدينة </option>
                                        @foreach ($countries as $country)
                                            <option {{ old('c_place') == $country['id'] ? 'selected' : '' }}
                                                value="{{ $country['id'] }}">
                                                {{ $country['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre"> المنطقة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_stats" id="subplace" style="height:50px;">
                                        <option value="">حدد المنطقة</option>
                                        @if (old('c_stats'))
                                            <option value="{{ old('c_stats') }}" selected>
                                                {{ $oldCityName ?? 'المنطقة السابقة' }}
                                            </option>
                                        @endif
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        let oldSubplace = "{{ old('c_stats') }}"; // القيمة القديمة للمكان الفرعي

                                        $("#place").on('change', function() {
                                            let countryId = $(this).val();
                                            if (countryId) {
                                                $.ajax({
                                                    method: 'GET',
                                                    url: '/getcitizen/' + countryId,
                                                    success: function(data) {
                                                        $('#subplace').empty();
                                                        $('#subplace').append(
                                                            '<option value=""> -- حدد المدينة -- </option>');
                                                        $.each(data, function(key, city) {
                                                            $('#subplace').append('<option value="' + city.id +
                                                                '">' + city.name.ar + '</option>');
                                                        });

                                                        // ضبط القيمة القديمة إذا كانت موجودة
                                                        if (oldSubplace) {
                                                            $('#subplace').val(oldSubplace).trigger('change');
                                                        }
                                                    }
                                                });
                                            } else {
                                                $('#subplace').empty();
                                                $('#subplace').append('<option> -- حدد المدينة -- </option>');
                                            }
                                        });

                                        // تشغيل الحدث عند تحميل الصفحة إذا كانت القيمة القديمة للحقل الأول موجودة
                                        if ($("#place").val()) {
                                            $("#place").trigger('change');
                                        }
                                    });
                                </script>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الهاتف <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_phone" placeholder="رقم الهاتف"
                                        value="{{ old('c_phone') }}" style="height:50px;" required="">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الإيميل <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_email"
                                        placeholder="البريد الإلكتروني" value="{{ old('c_email') }}"
                                        style="height:50px;">
                                </div>
                                @if (count($agency) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre">حدد الوكالة</div>
                                        </div>
                                        <select class="form-select" name="agency" id="agency" style="height:50px;">
                                            <option value="">حدد الوكالة</option>
                                            @foreach ($agency as $agc)
                                                <option value="{{ $agc['id'] }}"
                                                    {{ old('agency') == $agc['id'] ? 'selected' : '' }}>
                                                    {{ $agc['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                @if (count($rooms) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre">حدد المعرض</div>
                                        </div>
                                        <select class="form-select" name="showroom" id="showroom" style="height:50px;">
                                            <option value="">حدد المعرض</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room['id'] }}"
                                                    {{ old('showroom') == $room['id'] ? 'selected' : '' }}>
                                                    {{ $room['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                @if (count($rents) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre">حدد مكتب تأجير</div>
                                        </div>
                                        <select class="form-select" name="agency_rent" id="agency_rent"
                                            style="height:50px;">
                                            <option value="">حدد مكتب تأجير</option>
                                            @foreach ($rents as $rent)
                                                <option value="{{ $rent['id'] }}"
                                                    {{ old('agency_rent') == $rent['id'] ? 'selected' : '' }}>
                                                    {{ $rent['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                            </div>
                            <div class="clr"></div>
                            <p class="CreateTitle"><i class="fa fa-plus"></i> التجهيزات</p>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">وسائل الراحة</p>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="1"
                                            name="c_comfort[]" type="checkbox" value="المكيف"
                                            {{ in_array('المكيف', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="1">المكيف</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="2"
                                            name="c_comfort[]" type="checkbox" value="ريموت كنترول"
                                            {{ in_array('ريموت كنترول', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="2">ريموت كنترول</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="3"
                                            name="c_comfort[]" type="checkbox" value="فتحة سقف"
                                            {{ in_array('فتحة سقف', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="3">فتحة سقف</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="4"
                                            name="c_comfort[]" type="checkbox" value="مرايات كهرباء"
                                            {{ in_array('مرايات كهرباء', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="4">مرايات كهرباء</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="5"
                                            name="c_comfort[]" type="checkbox" value="مرايات ضم إغلاق"
                                            {{ in_array('مرايات ضم إغلاق', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="5">مرايات ضم إغلاق</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="6"
                                            name="c_comfort[]" type="checkbox" value="فرش جلد"
                                            {{ in_array('فرش جلد', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="6">فرش جلد</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="7"
                                            name="c_comfort[]" type="checkbox" value="فرش قماش"
                                            {{ in_array('فرش قماش', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="7">فرش قماش</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="8"
                                            name="c_comfort[]" type="checkbox" value="باور"
                                            {{ in_array('باور', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="8">باور</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="9"
                                            name="c_comfort[]" type="checkbox" value="النظام الذكى لركن السيارة"
                                            {{ in_array('النظام الذكى لركن السيارة', old('c_comfort', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="9">النظام الذكى لركن
                                            السيارة</label>
                                    </div>
                                </div>

                            </div>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">نوافذ</p>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="11"
                                            name="c_windows[]" type="checkbox" value="نوافذ كهربائية امامية"
                                            {{ in_array('نوافذ كهربائية امامية', old('c_windows', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="11">نوافذ كهربائية امامية</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="12"
                                            name="c_windows[]" type="checkbox" value="نوافذ كهربائية خلفية"
                                            {{ in_array('نوافذ كهربائية خلفية', old('c_windows', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="12">نوافذ كهربائية خلفية</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="13"
                                            name="c_windows[]" type="checkbox" value="زجاج فاميه"
                                            {{ in_array('زجاج فاميه', old('c_windows', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="13">زجاج فاميه</label>
                                    </div>
                                    <div class="clr"></div>

                                    <br>
                                    <p style="font-weight:bold;color:var(--main-color)">نظام الصوت</p>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="14"
                                            name="c_sound[]" type="checkbox" value="راديو كاسيت"
                                            {{ in_array('راديو كاسيت', old('c_sound', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="14">راديو كاسيت</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="15"
                                            name="c_sound[]" type="checkbox" value="مبدل أقراص"
                                            {{ in_array('مبدل أقراص', old('c_sound', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="15">مبدل أقراص</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="16"
                                            name="c_sound[]" type="checkbox" value="مشغل اسطوانات"
                                            {{ in_array('مشغل اسطوانات', old('c_sound', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="16">مشغل اسطوانات</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="17"
                                            name="c_sound[]" type="checkbox" value="مدخل USB"
                                            {{ in_array('مدخل USB', old('c_sound', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="17">مدخل USB</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="18"
                                            name="c_sound[]" type="checkbox" value="بلوتوث"
                                            {{ in_array('بلوتوث', old('c_sound', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="18">بلوتوث</label>
                                    </div>
                                    <div class="clr"></div>

                                </div>
                            </div>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">وسائل الامان</p>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="19"
                                            name="c_safety[]" type="checkbox" value="نظام مانع للانغلاق-ABS"
                                            {{ in_array('نظام مانع للانغلاق-ABS', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="19">نظام مانع للانغلاق-ABS</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="20"
                                            name="c_safety[]" type="checkbox" value="وسادة هوائية للسائق"
                                            {{ in_array('وسادة هوائية للسائق', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="20">وسادة هوائية للسائق</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="21"
                                            name="c_safety[]" type="checkbox" value="وسادة هوائية للركاب"
                                            {{ in_array('وسادة هوائية للركاب', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="21">وسادة هوائية للركاب</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="22"
                                            name="c_safety[]" type="checkbox" value="وسادة هوائية جانبية"
                                            {{ in_array('وسادة هوائية جانبية', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="22">وسادة هوائية جانبية</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="23"
                                            name="c_safety[]" type="checkbox" value="نظام توزيع قوة الفرامل EBD"
                                            {{ in_array('نظام توزيع قوة الفرامل EBD', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="23">نظام توزيع قوة الفرامل
                                            EBD</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="24"
                                            name="c_safety[]" type="checkbox" value="حساسات"
                                            {{ in_array('حساسات', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="24">حساسات</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="25"
                                            name="c_safety[]" type="checkbox" value="ESP"
                                            {{ in_array('ESP', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="25">ESP</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="26"
                                            name="c_safety[]" type="checkbox" value="حسسات اماميه"
                                            {{ in_array('حسسات اماميه', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="26">حسسات اماميه</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="27"
                                            name="c_safety[]" type="checkbox" value="حسسات خلفيه"
                                            {{ in_array('حسسات خلفيه', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="27">حسسات خلفيه</label>
                                    </div>
                                    <div class="clr"></div>

                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="28"
                                            name="c_safety[]" type="checkbox" value="نظام إيموبليزر ضد السرقة"
                                            {{ in_array('نظام إيموبليزر ضد السرقة', old('c_safety', [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="28">نظام إيموبليزر ضد
                                            السرقة</label>
                                    </div>
                                    <div class="clr"></div>
                                </div>

                            </div>
                            <div class="rgt Tajhizat">
                                @php
                                    $otherFeatures = [
                                        'جنوط',
                                        'مقاعد كهربائية',
                                        'إنذار',
                                        'كشافات ضباب',
                                        'كاميرا خلفية',
                                        'GPS',
                                        'مثبت سرعة',
                                        'قفل مركزى للابواب',
                                        'سبويلر خلفي',
                                    ];
                                @endphp

                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">آخرى</p>
                                    @foreach ($otherFeatures as $index => $feature)
                                        <div class="form-check form-check-inline">
                                            <input class="custom-control-input form-check-input"
                                                id="{{ 29 + $index }}" name="c_other[]" type="checkbox"
                                                value="{{ $feature }}"
                                                {{ in_array($feature, old('c_other', [])) ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="{{ 29 + $index }}">{{ $feature }}</label>
                                        </div>
                                        <div class="clr"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="clr"></div>
                            <br><br>
                            <p class="CreateTitle"><i class="fa fa-info"></i> بيانات إضافية</p>
                            <div class="form-group">
                                <textarea class="form-control" name="more_info" placeholder="بعض الملاحظات أو معلومات إضافية عن حالة السيارة"
                                    rows="3">{{ old('more_info') }}</textarea>
                            </div>
                            <div class="clr"></div>
                            <p class="CreateTitle"><i class="fa fa-picture-o"></i> صور السيارة</p>

                            <div class="form-group">
                                <input type="file" class="form-control" name="images[]" multiple accept="image/*">
                                <!-- حقل رفع الملفات -->
                                {{--                                <input type="file" multiple class="dropify form-control" name="images[]" --}}
                                {{--                                       id="imageUpload" --}}
                                {{--                                       accept="image/*" data-max-file-size="3M" data-default-file="" data-height="100"> --}}
                            </div>
                            <!-- مكان عرض الصور الجديدة -->
                            {{--                            <div id="newImagesPreview" style="display: flex; gap: 10px; flex-wrap: wrap;"> --}}
                            {{--                                <!-- الصور الجديدة ستُعرض هنا --> --}}
                            {{--                            </div> --}}
                            <div class="clr"></div>
                            <small style="font-weight:bold;">ملاحظة : يمكنك إضافة 10 صور كأقصى حد</small>
                            <div class="clr"></div>
                            <br><br>
                            <center>
                                <button id="submitBtn" type="submit" name="Add" class="btn btn-success" onclick="setValue();"
                                    style="width:40%; background-color:#28A745;border-color:#28A745;">أضف اعلانك
                                </button>
                                <p id="uploadingText"
                                style="display: none; font-size: 16px; color: green; text-align: center;">
                                <span class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                جاري رفع البيانات، يرجى الانتظار...
                            </p>
                            </center>
                        </form>
                        <script>
                            document.getElementById('uploadForm').addEventListener('submit', function() {
                                // إخفاء زر الإرسال
                                document.getElementById('submitBtn').style.display = 'none';
                                // عرض رسالة جاري الرفع
                                document.getElementById('uploadingText').style.display = 'block';
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <div class="card CreateCard">
            <div class="card-body">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input form-check-input" type="checkbox" id="rule" value="rule"
                        checked="">
                    <label class="custom-control-label" for="rule"> اقر ان جميع البيانات السابقة صحيحة و على مسئوليتي
                        الشخصية</label>
                </div>
                <div class="clr"></div>
                <br>
                <div class="alert alert-info"><i class="fab fa-whatsapp"></i> للمساعدة المباشرة، تواصل معنا عبر الواتس
                    أب التالي : <span style="font-weight:bold;">  7738000166 <span> 964+ </span> </span></div>
            </div>
        </div>

        <br>
    </div>
    <div class="clr"></div><br>
@endsection
