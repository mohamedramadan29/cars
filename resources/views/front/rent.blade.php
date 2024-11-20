@extends('front.layouts.master')
@section('title')
    تأجير السيارات
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1"><i class="fa fa-car"></i> تأجير السيارات </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight: bold;"> لديك سيارات لتأجير ؟ </span> يمكنك وعرض
                    سياراتك لتأجير على موقع سيار </h6>
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
                <div class="card-text rent postList" style="padding:20px;">
                    @foreach ($agencies as $agency)
                        <div class="rgt cardrent">
                            <div class="card-body">
                                <center><a href="{{ url('rent/details/' . $agency['slug']) }}">
                                        <img class="rounded-circle rent-img"
                                            src="{{ asset('assets/uploads/AgencyRent/' . $agency['logo']) }}"
                                            alt="{{ $agency['name'] }}" /></a>
                                    <h4 class="card-title titlerent"><a href="{{ url('rent/details/' . $agency['slug']) }}"
                                            style=""> {{ $agency['name'] }} </a></h4>
                                    <a href="{{ url('rent/details/' . $agency['slug']) }}" class="card-link  gradient-btn">
                                        <i class="bi bi-buildings-fill"></i> زيارة المكتب </a>
                                </center>
                            </div>
                        </div>
                    @endforeach


                    <div class="clr"></div>
                    <center>
                        <div class="show_more_main" id="show_more_main3">
                            <span id="3" class="show_more btn gradient-btn" title="Load more posts"> مشاهدة المزيد
                            </span>
                            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                        </div>
                    </center>
                    <div class="clr"></div>
                    <div class="clr"></div>
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
                    url: 'https://www.chakirdev.com/demo/Cars/load_rent.php',
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
