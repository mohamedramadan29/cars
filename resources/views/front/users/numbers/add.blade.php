@extends('front.layouts.master')
@section('title')
    اضافة رقم جديد
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
                            <a href="#" class="list-group-item list-group-item-action active"
                                style="border-radius:0px;color:white;font-size:19px;">
                                <i class="fab fa-buffer"></i> القائمة </a>
                            <a href="{{ url('user/dashboard') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> رئيسية البروفايل</a>
                            <a href="{{ url('user/car/add') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف سيارة للبيع</a>
                            <a href="https://www.chakirdev.com/demo/Cars/messages"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> الرسائل <span class="lft badge badge-primary">0</span></a>
                            <a href="https://www.chakirdev.com/demo/Cars/notice"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> التنبيهات <span class="lft badge badge-danger">0</span></a>

                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{ url('user/centers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="https://www.chakirdev.com/demo/Cars/myposts"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>

                            <a href="https://www.chakirdev.com/demo/Cars/myinfo"
                                class="list-group-item list-group-item-action" style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                            <a href="https://www.chakirdev.com/demo/Cars/logout"
                                class="list-group-item list-group-item-action" style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>

                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">
                    <h5 class="p-title"><i class="fas fa-edit"></i> أضف رقم جديد</h5>
                    <div class="clr"></div><br>

                    <form action="{{ url('user/number/add') }}" method="post" class="p-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="car_number" class="form-control form-control-lg input-form"
                                    placeholder="أدخل رقم السيارة" required="">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="image" id="file" class="input-file" accept="image/*">
                                    <label for="file" class="btn btn-tertiary js-labelFile">
                                        <i class="icon fa fa-check"></i>
                                        <span class="js-fileName">رفع صورة لرقم</span>
                                    </label>
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
                            <div class="col-md-6">
                                <select class="custom-select my-1 mr-sm-2 form-control-lg select-form" name="city"
                                    id="subplace" style="height:45px;">
                                    <option value="">حدد المدينة</option>
                                    @foreach ($citizen as $city)
                                        <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="owner_name" class="form-control form-control-lg input-form"
                                    placeholder="إسم المالك" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="price" class="form-control form-control-lg input-form"
                                    placeholder="السعر " required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control form-control-lg input-form"
                                    placeholder="رقم الهاتف" required="">
                            </div>
                            <div class="col-12">
                                <br>
                                <button type="submit" name="Add" class="rgt btn btn-primary btn-block">أضف
                                    الرقم</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection