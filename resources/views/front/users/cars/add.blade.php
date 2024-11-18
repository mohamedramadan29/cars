@extends('front.layouts.master')
@section('title')
    إضافة سيارة
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
          integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                        <form action="{{url('user/car/add')}}" method="post" id="carAdForm" name="carForm"
                              enctype="multipart/form-data" data-gtm-form-interact-id="0">
                            @csrf
                            <div class="rgt CreateCol1">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">عنوان الإعلان <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_title"
                                           placeholder="مثال : أودي A3 إصدار 2015 بحالة ممتازة" style="height:50px;"
                                           required value="{{old('c_title')}}">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الماركة<span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" style="height:50px;" name="c_brand" id="brand"
                                            required>
                                        <option value="" selected disabled>حدد الماركة</option>
                                        @foreach($marks as $mark)
                                            <option
                                                {{ old('c_brand',request('c_brand')) == $mark['id'] ? 'selected': '' }} value="{{$mark['id']}}"> {{$mark['name']}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الموديل <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select required class="form-select" name="c_model" id="subbrand"
                                            style="height:50px;">
                                        <option value="">حدد الموديل</option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        var oldBrand = "{{ old('c_brand', request('c_brand')) }}";
                                        var oldModel = "{{ old('c_model') }}";
                                        $('#brand').on('change', function () {
                                            var brandId = $(this).val();
                                            if (brandId) {
                                                var ajaxRequest = $.ajax({
                                                    url: '/getModels/' + brandId, // Update with your route
                                                    type: 'GET',
                                                    success: function (data) {
                                                        $('#subbrand').empty();
                                                        $('#subbrand').append('<option value="">حدد الموديل</option>');
                                                        $.each(data, function (key, model) {
                                                            $('#subbrand').append(
                                                                '<option value="' + model.id + '">' + model.name.ar + '</option>'
                                                            );
                                                        });
                                                    }
                                                });
                                                // تأكد من تعيين القيمة القديمة فقط بعد انتهاء عملية التحميل
                                                $.when(ajaxRequest).done(function () {
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

                                <small>إذا لم تجد موديل السيارة في التصنيف فقم<a href="{{url('contact_us')}}">بالإتصال
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
                                        <option
                                            {{ old('c_trans', request('c_trans')) == 'مانيوال' ? 'selected' : '' }} value="مانيوال">
                                            مانيوال
                                        </option>
                                        <option
                                            {{ old('c_trans', request('c_trans')) == 'أتوماتيك' ? 'selected':''}} value="أتوماتيك">
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
                                        <option
                                            {{old('c_km',request('c_km')) == '5 000 - 9 999' ? 'selected':''}} value="5 000 - 9 999">
                                            5 000 - 9 999
                                        </option>
                                        <option value="10 000 - 14 999">10 000 - 14 999</option>
                                        <option value="15 000 - 19 999">15 000 - 19 999</option>
                                        <option value="20 000 - 24 999">20 000 - 24 999</option>
                                        <option value="25 000 - 29 999">25 000 - 29 999</option>
                                        <option value="30 000 - 34 999">30 000 - 34 999</option>
                                        <option value="35 000 - 39 999">35 000 - 39 999</option>
                                        <option value="40 000 - 44 999">40 000 - 44 999</option>
                                        <option value="45 000 - 49 999">45 000 - 49 999</option>
                                        <option value="50 000 - 54 999">50 000 - 54 999</option>
                                        <option value="55 000 - 59 999">55 000 - 59 999</option>
                                        <option value="60 000 - 64 999">60 000 - 64 999</option>
                                        <option value="65 000 - 69 999">65 000 - 69 999</option>
                                        <option value="70 000 - 74 999">70 000 - 74 999</option>
                                        <option value="75 000 - 79 999">75 000 - 79 999</option>
                                        <option value="80 000 - 84 999">80 000 - 84 999</option>
                                        <option value="85 000 - 89 999">85 000 - 89 999</option>
                                        <option value="90 000 - 94 999">90 000 - 94 999</option>
                                        <option value="95 000 - 99 999">95 000 - 99 999</option>
                                        <option value="100 000 - 109 999">100 000 - 109 999</option>
                                        <option value="110 000 - 119 999">110 000 - 119 999</option>
                                        <option value="120 000 - 129 999">120 000 - 129 999</option>
                                        <option value="130 000 - 139 999">130 000 - 139 999</option>
                                        <option value="140 000 - 149 999">140 000 - 149 999</option>
                                        <option value="150 000 - 159 999">150 000 - 159 999</option>
                                        <option value="160 000 - 169 999">160 000 - 169 999</option>
                                        <option value="170 000 - 179 999">170 000 - 179 999</option>
                                        <option value="180 000 - 189 999">180 000 - 189 999</option>
                                        <option value="190 000 - 199 999">190 000 - 199 999</option>
                                        <option value="200 000 - 249 999">200 000 - 249 999</option>
                                        <option value="250 000 - 299 999">250 000 - 299 999</option>
                                        <option value="300 000 - 349 999">300 000 - 349 999</option>
                                        <option value="350 000 - 399 999">350 000 - 399 999</option>
                                        <option value="400 000 - 449 999">400 000 - 449 999</option>
                                        <option value="450 000 - 499 999">450 000 - 499 999</option>
                                        <option value="أكثر من 500.000">أكثر من 500.000</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الوقود <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_fuel" style="height:50px;">
                                        <option value="بنزين">بنزين</option>
                                        <option value="ديزل">ديزل</option>
                                        <option value="غاز الطبيعي">غاز الطبيعي</option>
                                        <option value="كهربائي">كهربائي</option>
                                        <option value="هجين">هجين</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">حالة السيارة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_type" style="height:50px;" required="">
                                        <option value="1">مستعملة</option>
                                        <option value="2">جديدة</option>
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
                                            <li class="color" data-color="#2c3e50"
                                                style="background: rgb(44, 62, 80);"></li>
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
                                            <li class="color" data-color="#1e272e"
                                                style="background: rgb(30, 39, 46);"></li>
                                        </ul>
                                        <input type="hidden" name="c_color" class="form-control" id="setColor"
                                               value="#ecf0f1">
                                    </div>
                                    <script>
                                        var selector = '.color-list .color';
                                        $(".color").css('background', function () {
                                            return $(this).data('color')
                                        });

                                        $(selector).on('click', function () {
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
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option selected="selected" value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">نمط السيارة</div>
                                    </div>
                                    <select class="form-select" name="c_style" style="height:50px;">
                                        <option value="">حدد نمط السيارة</option>
                                        <option value="4x4">4x4</option>
                                        <option value="MVP">MVP</option>
                                        <option value="SUV">SUV</option>
                                        <option value="رياضية">رياضية</option>
                                        <option value="ستيشن">ستيشن</option>
                                        <option value="سيدان">سيدان</option>
                                        <option value="فان">فان</option>
                                        <option value="كابورليه">كابورليه</option>
                                        <option value="كروس اوفر">كروس اوفر</option>
                                        <option value="كوبيه">كوبيه</option>
                                        <option value="ميني باص">ميني باص</option>
                                        <option value="هاتشباك">هاتشباك</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">السعر <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="number" class="form-control" name="c_price"
                                           placeholder="بكم ستبيع السيارة ؟ " style="height:50px;" required="">
                                </div>
                                <div class="clr"></div>
                                <br><br>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الدولة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    {{--                                    <select class="form-select" name="c_place" id="place" style="height:50px;"--}}
                                    {{--                                            required="">--}}
                                    {{--                                        <option value="">حدد الدولة</option>--}}
                                    {{--                                        @foreach($countries as $country )--}}
                                    {{--                                            <option value="{{$country['id']}}"> {{$country['name']}} </option>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </select>--}}
                                    <select class="form-select" name="c_place" id="place" style="height:50px;"
                                            required="">
                                        <option value="1" selected> العراق</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">المدينة <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <select class="form-select" name="c_stats" id="subplace" style="height:50px;">
                                        <option value="">حدد المدينة</option>
                                        @foreach($citizen as $city)
                                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <script>
                                    // $(document).ready(function () {
                                    //     $("#place").on('change', function () {
                                    //         let countryId = $(this).val();
                                    //         if (countryId) {
                                    //             $.ajax({
                                    //                 method: 'GET',
                                    //                 url: '/getcitizen/' + countryId,
                                    //                 success: function (data) {
                                    //                     $('#subplace').empty();
                                    //                     $('#subplace').append('<option> -- حدد المدينة   --  </option>');
                                    //                     $.each(data, function (key, city) {
                                    //                         $('#subplace').append('<option value="' + city.id + '">' + city.name.ar + '</option>');
                                    //                     });
                                    //                 }
                                    //
                                    //             });
                                    //
                                    //         } else {
                                    //             $('#subplace').empty();
                                    //             $('#subplace').append('<option> -- حدد المدينة   --  </option>')
                                    //         }
                                    //     });
                                    // });
                                </script>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الهاتف <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_phone" placeholder="رقم الهاتف"
                                           style="height:50px;" required="">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text CreateCadre">الإيميل <span
                                                style="color:#c72510;">*</span></div>
                                    </div>
                                    <input type="text" class="form-control" name="c_email"
                                           placeholder="البريد الإلكتروني " style="height:50px;">
                                </div>
                                @if(count($agency) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre"> حدد الوكالة   </div>
                                        </div>
                                        <select class="form-select" name="agency" id="agency" style="height:50px;">
                                            <option value=""> حدد الوكالة  </option>
                                            @foreach($agency as $agc)
                                                <option value="{{$agc['id']}}">{{$agc['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="agency" value="null">
                                @endif
                                @if(count($rooms) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre"> حدد المعرض    </div>
                                        </div>
                                        <select class="form-select" name="showroom" id="showroom" style="height:50px;">
                                            <option value=""> حدد المعرض  </option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room['id']}}">{{$room['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="showroom" value="null">
                                @endif
                                @if(count($rents) > 0)
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text CreateCadre"> حدد مكتب تاجير     </div>
                                        </div>
                                        <select class="form-select" name="agency_rent" id="agency_rent" style="height:50px;">
                                            <option value=""> حدد مكتب تاجير   </option>
                                            @foreach($rents as $rent)
                                                <option value="{{$rent['id']}}">{{$rent['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="agency_rent" value="null">
                                @endif



                            </div>
                            <div class="clr"></div>
                            <p class="CreateTitle"><i class="fa fa-plus"></i> التجهيزات</p>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">وسائل الراحة</p>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="1" name="c_comfort[]"
                                               type="checkbox" value="المكيف">
                                        <label class="custom-control-label" for="1">المكيف</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="2" name="c_comfort[]"
                                               type="checkbox" value="ريموت كنترول">
                                        <label class="custom-control-label"
                                               for="2">ريموت كنترول</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="3" name="c_comfort[]"
                                               type="checkbox" value="فتحة سقف"
                                               data-gtm-form-interact-field-id="2"><label class="custom-control-label"
                                                                                          for="3">فتحة سقف</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="4" name="c_comfort[]"
                                               type="checkbox" value="مرايات كهرباء"><label class="custom-control-label"
                                                                                            for="4">مرايات
                                            كهرباء</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="5" name="c_comfort[]"
                                               type="checkbox" value="مرايات ضم إغلاق"><label
                                            class="custom-control-label" for="5">مرايات ضم إغلاق</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="6" name="c_comfort[]"
                                               type="checkbox" value="فرش جلد"><label class="custom-control-label"
                                                                                      for="6">فرش جلد</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="7" name="c_comfort[]"
                                               type="checkbox" value="فرش قماش"><label class="custom-control-label"
                                                                                       for="7">فرش قماش</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="8" name="c_comfort[]"
                                               type="checkbox" value="باور"><label class="custom-control-label" for="8">باور</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="9" name="c_comfort[]"
                                               type="checkbox" value="النظام الذكى لركن السيارة"><label
                                            class="custom-control-label" for="9">النظام الذكى لركن السيارة</label>
                                    </div>
                                </div>
                            </div>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">نوافذ</p>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="11" name="c_windows[]"
                                               type="checkbox" value="نوافذ كهربائية امامية"><label
                                            class="custom-control-label" for="11">نوافذ كهربائية امامية</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="12" name="c_windows[]"
                                               type="checkbox" value="نوافذ كهربائية خلفية"><label
                                            class="custom-control-label" for="12">نوافذ كهربائية خلفية</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="13" name="c_windows[]"
                                               type="checkbox" value="زجاج فاميه"><label class="custom-control-label"
                                                                                         for="13">زجاج فاميه</label>
                                    </div>
                                    <div class="clr"></div>
                                    <br>
                                    <p style="font-weight:bold;color:var(--main-color)">نظام الصوت</p>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="14" name="c_sound[]"
                                               type="checkbox" value="راديو كاسيت"><label class="custom-control-label"
                                                                                          for="14">راديو كاسيت</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="15" name="c_sound[]"
                                               type="checkbox" value="مبدل أقراص"
                                               data-gtm-form-interact-field-id="0"><label class="custom-control-label"
                                                                                          for="15"> مبدل أقراص</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="16" name="c_sound[]"
                                               type="checkbox" value="مشغل اسطوانات"><label class="custom-control-label"
                                                                                            for="16"> مشغل
                                            اسطوانات</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="17" name="c_sound[]"
                                               type="checkbox" value="مدخل USB"><label class="custom-control-label"
                                                                                       for="17"> مدخل USB</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="18" name="c_sound[]"
                                               type="checkbox" value="بلوتوث"><label class="custom-control-label"
                                                                                     for="18"> بلوتوث</label>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">وسائل الامان</p>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="19" name="c_safety[]"
                                               type="checkbox" value="نظام مانع للانغلاق-ABS"><label
                                            class="custom-control-label" for="19">نظام مانع للانغلاق-ABS</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="20" name="c_safety[]"
                                               type="checkbox" value="وسادة هوائية للسائق"><label
                                            class="custom-control-label" for="20">وسادة هوائية للسائق</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="21" name="c_safety[]"
                                               type="checkbox" value="وسادة هوائية للركاب"><label
                                            class="custom-control-label" for="21"> وسادة هوائية للركاب</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="22" name="c_safety[]"
                                               type="checkbox" value="وسادة هوائية جانبية"><label
                                            class="custom-control-label" for="22"> وسادة هوائية جانبية</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="23" name="c_safety[]"
                                               type="checkbox" value="نظام توزيع قوة الفرامل EBD"><label
                                            class="custom-control-label" for="23"> نظام توزيع قوة الفرامل
                                            EBD</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="24" name="c_safety[]"
                                               type="checkbox" value="حساسات"><label class="custom-control-label"
                                                                                     for="24"> حساسات</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="25" name="c_safety[]"
                                               type="checkbox" value="ESP" data-gtm-form-interact-field-id="1"><label
                                            class="custom-control-label" for="25"> ESP</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="26" name="c_safety[]"
                                               type="checkbox" value="حسسات اماميه"><label class="custom-control-label"
                                                                                           for="26"> حسسات
                                            اماميه</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="27" name="c_safety[]"
                                               type="checkbox" value="حسسات خلفيه"><label class="custom-control-label"
                                                                                          for="27"> حسسات خلفيه</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="28" name="c_safety[]"
                                               type="checkbox" value="نظام إيموبليزر ضد السرقة"><label
                                            class="custom-control-label" for="28"> نظام إيموبليزر ضد السرقة</label>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="rgt Tajhizat">
                                <div class="custom-control custom-checkbox">
                                    <p style="font-weight:bold;color:var(--main-color)">آخرى</p>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="29" name="c_other[]"
                                               type="checkbox" value="جنوط"><label class="custom-control-label"
                                                                                   for="29"> جنوط</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="30" name="c_other[]"
                                               type="checkbox" value="مقاعد كهربائية"><label
                                            class="custom-control-label" for="30"> مقاعد كهربائية</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="31" name="c_other[]"
                                               type="checkbox" value="إنذار"><label class="custom-control-label"
                                                                                    for="31"> إنذار</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="32" name="c_other[]"
                                               type="checkbox" value="كشافات ضباب"><label class="custom-control-label"
                                                                                          for="32"> كشافات ضباب</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="33" name="c_other[]"
                                               type="checkbox" value="كاميرا خلفية"><label class="custom-control-label"
                                                                                           for="33"> كاميرا
                                            خلفية</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="34" name="c_other[]"
                                               type="checkbox" value="GPS"><label class="custom-control-label" for="34">
                                            GPS</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="35" name="c_other[]"
                                               type="checkbox" value="مثبت سرعة"><label class="custom-control-label"
                                                                                        for="35"> مثبت سرعة</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="36" name="c_other[]"
                                               type="checkbox" value="قفل مركزى للابواب"><label
                                            class="custom-control-label" for="36"> قفل مركزى للابواب</label>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="form-check form-check-inline">
                                        <input class="custom-control-input form-check-input" id="37" name="c_other[]"
                                               type="checkbox" value="سبويلر خلفي"><label class="custom-control-label"
                                                                                          for="37"> سبويلر خلفي</label>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <br><br>
                            <p class="CreateTitle"><i class="fa fa-info"></i> بيانات إضافية</p>
                            <div class="form-group">
                                <textarea class="form-control" name="more_info"
                                          placeholder="بعض الملاحظات أو معلومات إضافية عن حالة السيارة"
                                          rows="3"></textarea>
                            </div>
                            <div class="clr"></div>
                            <p class="CreateTitle"><i class="fa fa-picture-o"></i> صور السيارة</p>

                            <div class="form-group">
                                <input type="file" class="form-control" name="images[]" multiple>
                                <!-- حقل رفع الملفات -->
{{--                                <input type="file" multiple class="dropify form-control" name="images[]"--}}
{{--                                       id="imageUpload"--}}
{{--                                       accept="image/*" data-max-file-size="3M" data-default-file="" data-height="100">--}}
                            </div>
                            <!-- مكان عرض الصور الجديدة -->
{{--                            <div id="newImagesPreview" style="display: flex; gap: 10px; flex-wrap: wrap;">--}}
{{--                                <!-- الصور الجديدة ستُعرض هنا -->--}}
{{--                            </div>--}}

                            <script>
                                const imagePreviewContainer = document.getElementById('newImagesPreview');
                                const imageInput = document.getElementById('imageUpload');
                                const errorMessage = document.getElementById('errorMessage');
                                const maxImages = 10; // الحد الأقصى لعدد الصور
                                let uploadedImages = []; // تخزين الصور المرفوعة مؤقتًا

                                // عند تغيير الملفات
                                imageInput.addEventListener('change', function (event) {
                                    const files = Array.from(event.target.files); // أخذ جميع الملفات المختارة

                                    // التحقق من الحد الأقصى
                                    if (uploadedImages.length + files.length > maxImages) {
                                        errorMessage.style.display = 'block'; // عرض رسالة خطأ
                                        setTimeout(() => {
                                            errorMessage.style.display = 'none';
                                        }, 3000); // إخفاء الرسالة بعد 3 ثوانٍ
                                        return;
                                    }

                                    files.forEach((file) => {
                                        // التأكد أن الملف صورة
                                        if (!file.type.startsWith("image/")) return;

                                        // قراءة الصورة باستخدام FileReader
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            // إضافة الصورة إلى المصفوفة
                                            uploadedImages.push(file);

                                            // إنشاء عنصر للمعاينة
                                            const previewWrapper = document.createElement('div');
                                            previewWrapper.style.position = "relative";
                                            previewWrapper.style.display = "inline-block";

                                            const img = document.createElement('img');
                                            img.src = e.target.result;
                                            img.alt = "الصورة المرفوعة";
                                            img.style.width = "100px";
                                            img.style.height = "100px";
                                            img.style.marginTop = "10px";
                                            img.style.border = '1px solid #ccc';
                                            img.style.padding = '2px';
                                            img.style.background = '#f0efef';

                                            // زر حذف
                                            const deleteButton = document.createElement('button');
                                            deleteButton.textContent = "×";
                                            deleteButton.style.position = "absolute";
                                            deleteButton.style.top = "10px";
                                            deleteButton.style.left = "0px";
                                            deleteButton.style.width = '20px';
                                            deleteButton.style.height = '20px';
                                            deleteButton.style.background = "red";
                                            deleteButton.style.color = "white";
                                            deleteButton.style.border = "none";
                                            deleteButton.style.borderRadius = "50%";
                                            deleteButton.style.cursor = "pointer";
                                            deleteButton.style.lineHeight = '2px';

                                            // عند الضغط على زر الحذف
                                            deleteButton.addEventListener('click', function () {
                                                // إزالة الصورة من المصفوفة
                                                const index = uploadedImages.indexOf(file);
                                                if (index > -1) uploadedImages.splice(index, 1);

                                                // إزالة العنصر من DOM
                                                previewWrapper.remove();
                                            });

                                            // إضافة الصورة وزر الحذف إلى المعاينة
                                            previewWrapper.appendChild(img);
                                            previewWrapper.appendChild(deleteButton);
                                            imagePreviewContainer.appendChild(previewWrapper);
                                        };

                                        reader.readAsDataURL(file);
                                    });

                                    // تفريغ الإدخال للسماح بإعادة رفع نفس الملف إذا لزم الأمر
                                    event.target.value = "";
                                });
                            </script>
                            <div class="clr"></div>
                            <small style="font-weight:bold;">ملاحظة : يمكنك إضافة 10 صور كأقصى حد</small>
                            <div class="clr"></div>
                            <br><br>
                            <center>
                                <button type="submit" name="Add" class="btn btn-success" onclick="setValue();"
                                        style="width:40%; background-color:#28A745;border-color:#28A745;">أضف اعلانك
                                </button>
                            </center>
                        </form>
                        <div id="errorMessages" style="color: red; display: none;"></div>
                        <script>
                            $(document).ready(function () {
                                $(document).ready(function () {
                                    $('#carAdForm').submit(function (e) {
                                        e.preventDefault();
                                        let formData = new FormData(this);

                                        // تأكد من إضافة الصور إلى FormData بشكل صحيح
                                        let files = $('#imageUpload')[0].files;

                                        // التحقق من أن الصور تم اختيارها
                                        if (files.length === 0) {
                                            $('#errorMessages').text("من فضلك قم بتحميل صور السيارة.").show();
                                            return;
                                        }

                                        // إضافة الصور إلى FormData إذا كانت غير موجودة
                                        for (let i = 0; i < files.length; i++) {
                                            formData.append('images[]', files[i]);  // إضافة كل صورة إلى FormData
                                        }

                                        // إرسال البيانات باستخدام AJAX
                                        $.ajax({
                                            type: 'POST',
                                            url: '/user/car/add',  // تأكد من أن المسار صحيح
                                            data: formData,
                                            processData: false, // لا تعالج البيانات
                                            contentType: false, // لا تحدد نوع المحتوى
                                            success: function (response) {
                                                // عند النجاح، إخفاء رسائل الخطأ
                                                $('#errorMessages').hide();
                                                alert('تم إرسال الإعلان بنجاح');
                                            },
                                            error: function (xhr, status, error) {
                                                // في حالة حدوث خطأ
                                                let errors = xhr.responseJSON.errors;
                                                let errorMessages = '';
                                                if (errors.images) {
                                                    errorMessages = errors.images.join('<br>');
                                                }
                                                $('#errorMessages').html(errorMessages).show();
                                            }
                                        });
                                    });
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
                    أب التالي : <span style="font-weight:bold;">212632551533</span></div>
            </div>
        </div>

        <br>
    </div>
    <div class="clr"></div><br>
@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        var max_size = '3 ميجابايت';
        $('.dropify').dropify({

            messages: {
                'default': 'اضغط للرفع او اسحب الملف الخاص بك هنا ',
                'replace': 'اضغط للرفع او اسحب الملف الخاص بك هنا  للاستبدال ',
                'remove': 'حذف ',
                'error': '!!! ، حدث خطا اثناء الرفع '
            },
            error: {
                'fileSize': `حجم الملف كبير جدًا (الحد الأقصى: ${max_size}).`

            }
        });
    </script>
@endsection
