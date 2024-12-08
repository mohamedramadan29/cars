@extends('front.layouts.master')
@section('title')
    العضويات
@endsection
@section('content')
    <title> العضويات المميزة </title>
    <script src="../../../www.google.com/recaptcha/api.js" async defer></script>
    <div id="HomePage">
        <div class="card PageCard" style="background:#F8F8F8;">
            <div class="card-body" style="padding:30px;">
                <center>
                    <h2 class="subs-title"><i class="fas fa-star-half-alt"></i> العضويات المميزة </h2>
                    <p class="subs-text"> تتيح لك العضوية المميزة الإستفادة القصوى من خصائص الموقع مقارنة بالعضوية العادية
                        المجانية وذلك لتحقيق أفضل النتائج </p>
                </center>
                <div class="clr"></div>
                <section class="pricing py-4" id="navbar-example2">
                    <div class="row">
                        @foreach ($subscriptions as $plan)
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0 price1">
                                    <div class="plan_name">
                                        <h3> {{ $plan['title'] }} </h3>
                                        <p> <span> Free </span> Package </p>
                                    </div>
                                    <div class="card-header">
                                        <h6 class="card-price text-center">{{ $plan['price'] }}$<span class="period">/شهريا
                                            </span></h6>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $advantages = explode(',', $plan['advantages']);
                                            $disadvantage = explode(',', $plan['dis_advantages']);
                                        @endphp
                                        <ul class="fa-ul">
                                            @foreach ($advantages as $adv)
                                                <li><span class="fa-li"><i class="fas fa-check"></i></span>
                                                    {{ $adv }}
                                                </li>
                                            @endforeach
                                            @foreach ($disadvantage as $disadv)
                                                <li class="text-muted"><span class="fa-li"><i
                                                            class="fas fa-times text-muted"></i></span> {{ $disadv }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a href="#order" class="btn btn-block btn-danger"> اشترك </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0 price2">
                                <div class="plan_name">
                                    <h3> الباقة الفضية </h3>
                                    <p> <span> Silver </span> Package </p>
                                </div>

                                <div class="card-header">

                                    <h6 class="card-price text-center">9$<span class="period">/شهريا </span></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إضافات 200 إعلانات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> رابط خاص لحسابك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إحصائيات إعلاناتك و
                                            معارضك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> 2 إعلانات مميزة من
                                            اختيارك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 5 معارض
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 5 وكالات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 أرقام
                                            سيارات</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 مراكز
                                            الصيانة</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> صفحة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> علامة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترقية ترفع الإيقاف عن
                                            العضويات المحظورة </li>
                                    </ul>
                                    <a href="#order" class="btn btn-block btn-info"> اشترك </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card price3">
                                <div class="plan_name">
                                    <h3> الباقة الذهبية </h3>
                                    <p> <span> Gold </span> Package </p>
                                </div>
                                <div class="card-header">
                                    <h6 class="card-price text-center">49$<span class="period">/شهريا </span></h6>
                                </div>
                                <div class="card-body">

                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إضافات 500 إعلانات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> رابط خاص لحسابك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إحصائيات إعلاناتك و
                                            معارضك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> 20 إعلانات مميزة من
                                            اختيارك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 معارض
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 وكالات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 60 أرقام
                                            سيارات</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 40 مراكز
                                            الصيانة</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> صفحة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> علامة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترويج إعلاناتك على
                                            صفحة الأولى</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> نشر إعلاناتك على
                                            صفحات تواصل </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إستفادة من مساحات
                                            إعلانية </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترقية ترفع الإيقاف
                                            عن العضويات المحظورة </li>
                                    </ul>
                                    <a href="#order" class="btn btn-block btn-info"> اشترك </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                    <div class="clr" id="order"></div><br>
                    <center>
                        <h2 class="subs-title"><i class="far fa-handshake"></i> إشترك الأن </h2>
                    </center>
                    <div class="clr"></div>
                    <form action method="post" class="form-rent-req">
                        @if (Auth::check())
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2"> حدد نوع الإشتراك </label>
                                    <select class="form-control form-control-lg" name="subject">
                                        <option value="الفضي"> الفضي </option>
                                        <option value="الذهبي"> الذهبي </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2"> وسيلة الدفع </label>
                                    <select class="form-control form-control-lg" name="msg">
                                        <option value="Bank Transfer"> تحويل بنكي </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2"> الاسم كامل </label>
                                <input type="text" name="fullname" class="form-control form-control-lg"
                                    placeholder="الاسم كامل" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2"> البريد الالكتروني </label>
                                <input type="text" name="email" class="form-control form-control-lg"
                                    placeholder="البريد الالكتروني"required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2"> رقم الهاتف </label>
                                <input type="number" name="mobile" class="form-control form-control-lg"
                                    placeholder="رقم الهاتف ">
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-theme="light"
                                    data-sitekey="6LetnQATAAAAAF0iiOBKpJcLHZQRnRyaqhxXlVxg"></div>
                            </div>
                            <br>
                            <button type="submit" name="sendorder" class="lft btn btn-success"> ارسل الطلب </button>
                        @else
                            <div class="alert alert-info" role="alert"> يجب أن تكون عضو في الموقع قبل إرسال طلب الإشتراك
                                <div class="clr"></div>
                                <a href="{{ url('login') }}"> إضغط هنا لتسجيل </a>
                            </div>
                        @endif

                    </form>
                </div>
                <center>
                    <div class="clr"></div><br><br><br>
                    <h2 class="subs-title"><i class="fas fa-comments-dollar"></i> خيارات الدفع </h2>
                    <div class="clr"></div>
                    <p class="subs-text2" style="margin-top:10px;">
                        1- يمكنك الإشتراك والدفع عبر البطاقة الإئتمانية من خلال خدمة PayPal وتفعيل الخدمة مباشرة <br />
                        <br />
                        2- الإيداع أو التحويل البنكي ثم التواصل مع الإدارة
                    </p>
                    <div class="clr"></div><br><br><br>
                    <h2 class="subs-title"><i class="far fa-comments"></i> تواصل معنا </h2>
                    <div class="clr"></div>
                    <p class="subs-text">
                        <a href="#" class="btn btn-success" style="margin:10px;"><i class="fab fa-whatsapp"></i>
                            عبر الواتساب : 000000000</a> or
                        <a href="{{ url('contactus') }}" class="btn btn-danger" style="margin:10px;"><i
                                class="fa fa-envelope"></i> ارسل رسالة لبريد الموقع </a>
                    </p>
                </center>
            </div>
            <div class="clr"></div><br>
        </div>
    </div>
    <div class="clr"></div><br>
@endsection
