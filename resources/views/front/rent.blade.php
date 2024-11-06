@extends('front.layouts.master')
@section('title')
    تأجير السيارات
@endsection
@section('content')
<div id="HomePage">
    <div class="card PageCard">
        <div class="card-body" style="padding:0px;">
            <h5 class="card-title CT1"><i class="fa fa-car"></i>   تأجير السيارات </h5>
            <h6 class="text-muted desc-textpg"><span style="font-weight: bold;"> لديك سيارات لتأجير ؟ </span>  يمكنك وعرض سياراتك لتأجير على موقع سيار </h6>
            <div class="clr"></div>
            <div class="backgroundSR clearfix2 display-desk">
                <div class="layerSR">
                    <form action="https://www.chakirdev.com/demo/Cars/search.php" method="get" class="formsrchSR">
                        <div class="form-row">
                            <div class="colum">
                                <select class="custom-select mr-sm-2" name="brand" id="brand">
                                    <option value selected> اختر الماركة  </option>
                                    <option value="1">أودي</option>
                                    <option value="2">شفروليه</option>
                                    <option value="3">تويوتا</option>
                                    <option value="4">فولكس فاجن</option>
                                    <option value="5">فورد</option>
                                    <option value="6">كيا</option>
                                    <option value="7">مرسيدس </option>
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
                                    <option selected> اختر الموديل  </option>
                                </select>
                            </div>
                            <div class="colum">
                                <select class="custom-select mr-sm-2" name="typecar">
                                    <option value selected> اختر الحالة  </option>
                                    <option value="2">New </option>
                                    <option value="1">used </option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> بحث  </button>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#brand').on('change', function() {
                                var brandID = $(this).val();
                                if (brandID) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'https://www.chakirdev.com/demo/Cars/ajaxData.php',
                                        data: 'brand_id=' + brandID,
                                        success: function(html) {
                                            $('#subbrand').html(html);
                                        }
                                    });
                                } else {
                                    $('#subbrand').html('<option value="">Select the brand first</option>');
                                }
                            });
                        });

                        $(document).ready(function() {
                            $('#country').on('change', function() {
                                var placeID = $(this).val();
                                if (placeID) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'https://www.chakirdev.com/demo/Cars/ajaxData.php',
                                        data: 'place_id=' + placeID,
                                        success: function(html) {
                                            $('#subplace').html(html);
                                        }
                                    });
                                } else {
                                    $('#subplace').html('<option value="">Select country first</option>');
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="clr"></div>
            <div class="card-text rent postList" style="padding:20px;">
                @foreach($agencies as $agency)
                    <div class="rgt cardrent">
                        <div class="card-body">
                            <center><a href="{{url('rent/details/'.$agency['slug'])}}">
                                    <img class="rounded-circle rent-img" src="{{asset('assets/uploads/AgencyRent/'.$agency['logo'])}}" alt="{{$agency['name']}}" /></a>
                                <h4 class="card-title titlerent"><a href="{{url('rent/details/'.$agency['slug'])}}" style=""> {{$agency['name']}} </a></h4>
                                <a href="{{url('rent/details/'.$agency['slug'])}}" class="card-link  gradient-btn"> <i class="bi bi-buildings-fill"></i> زيارة المكتب  </a>
                            </center>
                        </div>
                    </div>
                @endforeach


                <div class="clr"></div>
                <center>
                    <div class="show_more_main" id="show_more_main3">
                        <span id="3" class="show_more btn gradient-btn" title="Load more posts"> مشاهدة المزيد  </span>
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
