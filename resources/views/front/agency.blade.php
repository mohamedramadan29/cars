@extends('front.layouts.master')
@section('title')
    الوكالات
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1"><i class="fa fa-car"></i> وكالات السيارات</h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight:bold;">هل لديك وكالة ؟</span> يمكنك إضافة
                    وكالتك معنا وعرض سياراتك على موقعنا</h6>
                <div class="clr"></div>
                <div class="backgroundSR clearfix2 display-desk">
                    <div class="layerSR">
                        <form action="#" method="get" class="formsrchSR">
                            <div class="form-row">
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="brand" id="brand">
                                        <option value selected>اختر الماركة</option>
                                        <option value="1">أودي</option>
                                        <option value="2">شفروليه</option>
                                        <option value="3">تويوتا</option>
                                        <option value="4">فولكس فاجن</option>
                                        <option value="5">فورد</option>
                                        <option value="6">كيا</option>
                                        <option value="7">مرسيدس</option>
                                        <option value="8">بورش</option>
                                        <option value="9">لمبورغيني</option>
                                        <option value="11">نيسان</option>
                                        <option value="12">سيتروين</option>
                                        <option value="13">هوندا</option>
                                        <option value="14">هيونداي</option>
                                        <option value="15">فيات</option>
                                        <option value="16">بيجو</option>
                                        <option value="17">لاند روفر</option>
                                        <option value="18">رينو</option>
                                        <option value="19">جاغوار</option>
                                        <option value="20">ميتسوبيشي</option>
                                    </select>
                                </div>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="model" id="subbrand">
                                        <option selected>اختر الموديل</option>
                                    </select>
                                </div>
                                <div class="colum">
                                    <select class="custom-select mr-sm-2" name="typecar">
                                        <option value selected>إختر الحالة</option>
                                        <option value="2">جديدة</option>
                                        <option value="1">مستعملة</option>
                                        <option value="3">كلاهما</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" name="search" class="btn btn-primary"><i
                                            class="fa fa-search"></i> بحث
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#brand').on('change', function () {
                                    var brandID = $(this).val();
                                    if (brandID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'https://www.chakirdev.com/demo/Cars/ajaxData.php',
                                            data: 'brand_id=' + brandID,
                                            success: function (html) {
                                                $('#subbrand').html(html);
                                            }
                                        });
                                    } else {
                                        $('#subbrand').html('<option value="">حدد الماركة أولا</option>');
                                    }
                                });
                            });

                            $(document).ready(function () {
                                $('#country').on('change', function () {
                                    var placeID = $(this).val();
                                    if (placeID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: '#',
                                            data: 'place_id=' + placeID,
                                            success: function (html) {
                                                $('#subplace').html(html);
                                            }
                                        });
                                    } else {
                                        $('#subplace').html('<option value="">حدد البلد أولا</option>');
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="clr"></div>
                <div class="card-text" style="padding:20px;">
                    <div class="rgt RightShowroom postList">
                        @foreach($agencies as $agency)
                            <div class="rgt card showroomsCard">
                                <div class="row no-gutters">
                                    <div class="ImgPart">
                                        <div class="ribbon"><span class="ribbon4 ribbonplus"><i
                                                    class="fab fa-free-code-camp" style="font-size:12px;"></i> وكالة مميزة</span>
                                        </div>
                                        <center><a
                                                href="{{url('agency/'.$agency['slug'])}}"><img
                                                    src="{{asset('assets/uploads/Agency/'.$agency['logo'])}}" class="card-img-agency"
                                                    alt="{{$agency['name']}}"></a></center>
                                    </div>
                                    <div class="ContentPart">
                                        <div class="card-body">
                                            <a href="{{url('agency/'.$agency['slug'])}}">
                                                <h5 class="card-title CT2"> {{$agency['name']}} </h5>
                                            </a>
                                            <p class="card-text"> {{$agency['address']}} </p>
                                            <p class="card-text">
                                            <div class="rgt Tag"><i class="fa fa-map-marker-alt"></i>  {{$agency['country']}}  - {{$agency['city']}}
                                            </div>
                                            <div class="rgt Tag"><i class="fa fa-building"></i> عدد الفروع : {{count($agency['branches'])}}</div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clr"></div>
                        <center>
{{--                            <div class="show_more_main" id="show_more_main1">--}}
{{--                                <span id="1" class="show_more btn gradient-btn"--}}
{{--                                      title="Load more posts">عرض المزيد</span>--}}
{{--                                <span class="loding" style="display: none;"><span--}}
{{--                                        class="loding_txt">Loading...</span></span>--}}
{{--                            </div>--}}
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
                            <a href="addagency.html" class="btn gradient-btn" style="border-radius:0px;padding:30px;"><i
                                    class="fa fa-plus" style="font-size:12px;"></i> سجل وكالتك الآن</a>
                        </div>
                        <div class="clr"></div>
                        <br>
                        <a href="#"><img src="images/banner.png"/></a>
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
        $(document).ready(function () {
            $(document).on('click', '.show_more', function () {
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loding').show();
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/load_agencies.php',
                    data: 'id=' + ID,
                    success: function (html) {
                        $('#show_more_main' + ID).remove();
                        $('.postList').append(html);
                    }
                });
            });
        });
    </script>
    <div class="clr"></div><br>

@endsection