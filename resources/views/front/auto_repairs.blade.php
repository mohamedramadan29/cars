@extends('front.layouts.master')
@section('title')
    مراكز صيانة السيارات
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1"><i class="fa fa-car"></i> مراكز صيانة السيارات </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight: bold;"> هل لديك مركز صيانة ؟ </span> يمكنك إضافة
                    مراكز صيانة معنا وعرضها على موقعنا مجانا </h6>
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
                <div class="card-text postList" style="padding:20px;">
                    @foreach ($repairs as $repair)
                        <div class="rgt card cardrepair">
                            <div class="row no-gutters">
                                <div class="col-md-3"><a href="{{ url('auto_repair/' . $repair['slug']) }}"><img
                                            src="{{ asset('assets/uploads/AutoRepair/' . $repair['logo']) }}"
                                            class="repair-img"></a></div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ url('auto_repair/' . $repair['slug']) }}">
                                                {{ $repair['name'] }} </a></h5>
                                        <p class="card-text">
                                        <div class="repair-ico"><i class="fas fa-map-marker-alt"></i> المنطقة : <span>
                                                {{ $repair['country'] }} - {{ $repair['city'] }} <span></div>
                                        <div class="repair-ico"><i class="fas fa-phone"></i>رقم التواصل : <span>
                                                {{ $repair['phone'] }} </span></div>
                                        </p>
                                        <div class="clr"></div>
                                        <a href="tel:{{ $repair['phone'] }}" class="rgt btn btn-success btn-sm"><i
                                                class="fas fa-phone"></i> اتصل </a>
                                        <a href="#" class="rgt btn btn-danger btn-sm"><i class="fas fa-bars"></i>
                                            تفاصيل اكثر </a>
                                        <div class="clr"></div>
                                        <p class="card-text"><small class="text-muted"> تاريخ الإضافة :
                                                {{ $repair['created_at'] }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--                    <div class="clr"></div> --}}
                    {{--                    <center> --}}
                    {{--                        <div class="show_more_main" id="show_more_main1"> --}}
                    {{--                            <span id="1" class="show_more btn gradient-btn" title="Load more posts"> مشاهدة المزيد  </span> --}}
                    {{--                            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span> --}}
                    {{--                        </div> --}}
                    {{--                    </center> --}}
                    {{--                    <div class="clr"></div> --}}
                    {{--                    <div class="clr"></div> --}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show_more', function() {
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loding').show();
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/load_autorepair.php',
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
