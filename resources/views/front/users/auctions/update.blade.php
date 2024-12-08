@extends('front.layouts.master')
@section('title')
    تعديل المكتب
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
        <div class="clr"></div>
        <br>

        <div>
            <h5 class="card-title CT1"><i class="fas fa-user-shield"></i> بروفايل شخصي</h5>
            <h6 class="card-subtitle mb-2 text-muted" style="padding:20px;">من خلال البروفايل يمكنك تعديل بياناتك
                الشخصيت و إضافة سيارتك المتاحة للبيع كما يمكنك إضافة المعارض و الوكالات .</h6>
        </div>
        <div class="PageCard">
            <div class="card-body" style="padding:0px;">
                <div class="rgt profileRight">
                    <a class="btn btn-primary display-btnprofile" data-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">عرض القائمة</a>
                    <div class="collapse show" id="collapseExample">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action"
                                style="border-radius:0px;color:white;font-size:19px;">
                                <i class="fab fa-buffer"></i> القائمة </a>
                            <a href="{{ url('user/dashboard') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> رئيسية البروفايل</a>
                            <a href="{{ url('user/car/add') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف سيارة للبيع</a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> الرسائل <span class="lft badge badge-primary">0</span></a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> التنبيهات <span class="lft badge badge-danger">0</span></a>
                            <a href="{{ url('user/agency') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف وكالة </a>
                            <a href="{{ url('user/rooms') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف معرض </a>
                            <a href="{{ url('user/rent') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف مكتب تاجير </a>
                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{ url('user/centers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="{{ url('user/washs') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف محطة غسيل </a>
                            <a href="{{ url('user/auctions') }}" class="list-group-item list-group-item-action active">
                                <i class="fab fa-buffer"></i> مكتب لشركة مزاد </a>
                            <a href="{{ url('user/products') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضافة منتج </a>
                            <a href="{{ url('user/forums') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>
                            <a href="{{ url('user/update') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                            <a href="{{ url('user/logout') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">
                    <h5 class="p-title"><i class="fas fa-edit"></i> تعديل المكتب </h5>
                    <div class="clr"></div><br>
                    <form id="uploadForm" action="{{ url('user/auction/update/' . $auction['id']) }}" method="post" class="p-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control form-control-lg input-form"
                                    placeholder="أدخل إسم المركز" required="" value="{{ $auction['name'] }}">
                            </div>
                            <div class="col-md-12">
                                <select required class="custom-select my-1 mr-sm-2 form-control-lg select-form"
                                    name="country" id="place" style="height:45px;">
                                    <option value="">حدد المدينة</option>
                                    @foreach ($countries as $city)
                                        <option @if ($city['id'] == $auction['country']) selected @endif
                                            value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <select required class="custom-select my-1 mr-sm-2 form-control-lg select-form"
                                    name="city" id="subplace" style="height:50px;">
                                    <option selected value="{{ $auction['city'] }}">{{ $auction['City']['name'] }}</option>
                                </select>
                            </div>
                            <script>
                                $(document).ready(function() {

                                    $("#place").on('change', function() {
                                        let countryId = $(this).val();
                                        if (countryId) {
                                            $.ajax({
                                                method: 'GET',
                                                url: '/getcitizen/' + countryId,
                                                success: function(data) {
                                                    $('#subplace').empty();
                                                    $('#subplace').append('<option> -- حدد المنطقة   --  </option>');
                                                    $.each(data, function(key, city) {
                                                        $('#subplace').append('<option value="' + city.id +
                                                            '">' + city.name.ar + '</option>');
                                                    });
                                                }

                                            });

                                        } else {
                                            $('#subplace').empty();
                                            $('#subplace').append('<option> -- حدد المدينة   --  </option>')
                                        }
                                    });
                                });
                            </script>

                            <div class="col-12">
                                <input type="text" name="address" class="form-control form-control-lg input-form"
                                    placeholder="العنوان" value="{{ $auction['address'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" class="form-control form-control-lg input-form"
                                    placeholder="البريد الاكتروني" value="{{ $auction['email'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control form-control-lg input-form"
                                    placeholder="رقم التواصل" value="{{ $auction['phone'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone2" class="form-control form-control-lg input-form"
                                    placeholder="رقم تواصل ثاني (اختياري)" value="{{ $auction['phone2'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="work_time" class="form-control form-control-lg input-form"
                                    placeholder="أوقات العمل" value="{{ $auction['work_time'] }}">
                            </div>
                            <div class="col-md-6">
                                <select class="custom-select my-1 mr-sm-2 form-control-lg select-form" name="car_status">
                                    <option value="" selected="" disabled=""> حالة السيارات </option>
                                    <option @if ($auction['car_status'] == 'مستعملة') selected @endif value="مستعملة"> مستعملة
                                    </option>
                                    <option @if ($auction['car_status'] == 'جديدة') selected @endif value="جديدة"> جديدة
                                    </option>
                                    <option @if ($auction['car_status'] == 'كلاهما') selected @endif value="كلاهما"> كلاهما
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="website" class="form-control form-control-lg input-form"
                                    placeholder="رابط الموقع الالكتروني " value="{{ $auction['website'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="facebook_link"
                                    class="form-control form-control-lg input-form" placeholder=" رابط الفيسبوك"
                                    value="{{ $auction['facebook_link'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="twitter_link" class="form-control form-control-lg input-form"
                                    placeholder="رابط تويتر " value="{{ $auction['twitter_link'] }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="instagram_link"
                                    class="form-control form-control-lg input-form" placeholder="رابط انستجرام"
                                    value="{{ $auction['instagram_link'] }}">

                            </div>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" name="desc" rows="2" placeholder="نبذة عن المركز">{{ $auction['desc'] }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="image" id="file" class="input-file"
                                        accept="image/*">
                                    <label for="file" class="btn btn-tertiary js-labelFile">
                                        <i class="icon fa fa-check"></i>
                                        <span class="js-fileName">رفع صورة الوكالة </span>
                                    </label>
                                    <br>
                                    <img src="{{ asset('assets/uploads/Auctions/' . $auction['logo']) }}" width="100px"
                                        height="100px" class="img-thumbnail" alt="">
                                </div>
                                <script type="text/javascript">
                                    (function() {

                                        'use strict';

                                        $('.input-file').each(function() {
                                            var $input = $(this),
                                                $label = $input.next('.js-labelFile'),
                                                labelVal = $label.html();

                                            $input.on('change', function(element) {
                                                var fileName = '';
                                                if (element.target.value) fileName = element.target.value.split('\\').pop();
                                                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label
                                                    .removeClass('has-file').html(labelVal);
                                            });
                                        });

                                    })();
                                </script>
                            </div>
                            <div class="col-12">
                                <br>
                                <button id="submitBtn" type="submit" name="Add"
                                    class="rgt btn btn-primary btn-block">تعديل
                                    المكتب <i class="fa fa-edit"></i></button>
                                <p id="uploadingText"
                                    style="display: none; font-size: 16px; color: green; text-align: center;">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    جاري رفع البيانات، يرجى الانتظار...
                                </p>
                            </div>
                        </div>
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
@endsection
